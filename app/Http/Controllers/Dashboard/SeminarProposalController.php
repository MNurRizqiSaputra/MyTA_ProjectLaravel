<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DosenPenguji;
use App\Models\SeminarProposal;
use App\Models\SeminarProposalNilai;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeminarProposalController extends Controller
{
    public function index()
    {
        if (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji) {
            $dosenPengujiId = Auth::user()->dosen->dosen_penguji->id; // get id dosen penguji yang login
            $seminarProposalId = SeminarProposalNilai::where('dosen_penguji_id', $dosenPengujiId)->pluck('seminar_proposal_id'); // Ambil daftar seminar proposal yang terkait dengan dosen penguji
            $seminarProposals = SeminarProposal::whereIn('id', $seminarProposalId)->orderByDesc('created_at')->get(); // Tampilkan daftar seminar proposal yang terkait

            // Ambil seminar proposal yang belum dinilai
            $pengujiBelumNilai = SeminarProposalNilai::where('dosen_penguji_id', $dosenPengujiId)->whereNull('nilai')->pluck('seminar_proposal_id');

            return view('pages.dashboard.seminar_proposal.index', [
                'dosenPengujiId' => $dosenPengujiId,
                'seminarProposals' => $seminarProposals,
                'pengujiBelumNilai' => $pengujiBelumNilai
            ]);
        } else {
            $seminarProposals = SeminarProposal::orderByDesc('created_at')->get();
            $pengujiBelumNilai = SeminarProposalNilai::whereNull('nilai')->pluck('seminar_proposal_id');

            return view('pages.dashboard.seminar_proposal.index', [
                'seminarProposals' => $seminarProposals,
                'pengujiBelumNilai' => $pengujiBelumNilai
            ]);
        }
    }

    public function show(SeminarProposal $seminarProposal)
    {
        if (Auth::user()->role->nama == 'admin') {
            $dosenSeminarProposals = DosenPenguji::with('dosen')
                                                ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                ->join('users', 'dosens.user_id', '=', 'users.id')
                                                ->select(
                                                    'dosen_pengujis.id as id',
                                                    'users.nama as nama'
                                                )
                                                ->orderBy('users.nama')->get(); //mengambil daftar dosen seminar proposal
            $selectedDosenProposal = $seminarProposal->seminar_proposal_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_proposal.show', [
                'seminarProposal' => $seminarProposal,
                'dosenSeminarProposals' => $dosenSeminarProposals,
                'selectedDosenProposal' => $selectedDosenProposal
            ]);
        } else {
            $dosenSeminarProposals = $seminarProposal->seminar_proposal_nilais()->with('dosen_penguji.dosen.user')
                                                                                ->join('dosen_pengujis', 'seminar_proposal_nilai.dosen_penguji_id', '=', 'dosen_pengujis.id')
                                                                                ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                                                ->join('users', 'dosens.user_id', '=', 'users.id')
                                                                                ->where('seminar_proposal_nilai.seminar_proposal_id', $seminarProposal->id)
                                                                                ->orderBy('users.nama')
                                                                                ->get(); //mengambil daftar dosen seminar proposal yang terkait dengan seminar proposal
            $selectedDosenProposal = $seminarProposal->seminar_proposal_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_proposal.show', [
                'seminarProposal' => $seminarProposal,
                'dosenSeminarProposals' => $dosenSeminarProposals,
                'selectedDosenProposal' => $selectedDosenProposal
            ]);
        }
    }

    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugasAkhir = $mahasiswa->tugas_akhir;

        // Periksa status persetujuan tugas akhir
        if ($tugasAkhir->status_persetujuan == 'Disetujui') {
            return view('pages.dashboard.seminar_proposal.create', [
                'tugasAkhir' => $mahasiswa->tugas_akhir
            ]);
        }
        session()->flash('error', 'Mohon Maaf, Tugas Akhir anda belum disetujui');
        return redirect()->back();

    }

    public function store(Request $request)
    {
        $request->validate([
            'tempat' => 'nullable',
            'tanggal' => 'nullable|date',
            'waktu_mulai' => 'nullable',
            'waktu_selesai' => 'nullable',
            'tugas_akhir_id' => 'required|exists:tugas_akhirs,id'
        ]);

        $tugasAkhir = TugasAkhir::find($request->tugas_akhir_id);
        if ($tugasAkhir->seminar_proposal) {
            session()->flash('error', 'Mohon Maaf, anda sudah menambahkan seminar proposal');
            return redirect()->back();
        }

        $seminarProposal = SeminarProposal::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);
        session()->flash('success', 'Seminar Proposal berhasil ditambahkan');
        return redirect()->route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]);
    }

    public function update(Request $request, SeminarProposal $seminarProposal)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required',
        ]);

        $tanggal = $request->tanggal;
        $tempat = $request->tempat;

        $bentrok = SeminarProposal::where('id', '!=', $seminarProposal->id)
                    ->where('tempat', $tempat)
                    ->where('tanggal', $tanggal)
                    ->where(function($query) use ($validate){
                        $query->where(function ($query) use ($validate) {
                            $query->whereBetween('waktu_mulai', [$validate['waktu_mulai'], $validate['waktu_selesai']])
                                ->orWhereBetween('waktu_selesai', [$validate['waktu_mulai'], $validate['waktu_selesai']]);
                        })
                        ->orWhere(function ($query) use ($validate) {
                            $query->where('waktu_mulai', '<=', $validate['waktu_mulai'])
                                ->where('waktu_selesai', '>=', $validate['waktu_selesai']);
                        });
                    })->exists();
        if ($bentrok) {
            return redirect()->back()->with('error', 'Maaf, terdapat bentrok dengan acara lain pada waktu dan tempat tersebut.');
        }

        $seminarProposal->update($validate);

        $selectedDosenPengujiIds = $request->input('dosen_penguji_', []); // Ambil daftar dosen penguji yang dipilih
        $seminarProposal->seminar_proposal_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete(); // hapus data dosen penguji yang tidak dipilih pada tabel seminar_proposal_nilai

        // Tambahkan data dosen penguji terpilih ke seminar_proposal_nilai
        foreach ($selectedDosenPengujiIds as $dosenPengujiId) {
            $seminarProposalNilai = SeminarProposalNilai::firstOrNew([
                'seminar_proposal_id' => $seminarProposal->id,
                'dosen_penguji_id' => $dosenPengujiId,
            ]);
            $seminarProposalNilai->save();
        }

        session()->flash('success', 'Data Seminar Proposal berhasil diperbarui');
        return redirect()->route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]);
    }
}
