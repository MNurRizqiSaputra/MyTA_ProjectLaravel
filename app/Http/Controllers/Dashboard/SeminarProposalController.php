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
        if (Auth::user()->dosen && Auth::user()->dosen->dosen_pengujis->pluck('id')) {
            // get id dosen penguji yang login
            $dosenPengujiId = Auth::user()->dosen->dosen_pengujis->pluck('id');

            // Ambil daftar seminar proposal yang terkait dengan dosen penguji
            $seminarProposalId = SeminarProposalNilai::whereIn('dosen_penguji_id', $dosenPengujiId)->pluck('seminar_proposal_id');

            // Tampilkan daftar seminar proposal yang terkait
            $seminarProposals = SeminarProposal::whereIn('id', $seminarProposalId)->get();

            return view('pages.dashboard.seminar_proposal.index', [
                'seminarProposals' => $seminarProposals,
            ]);
        } else {
            $seminarProposals = SeminarProposal::all();

            return view('pages.dashboard.seminar_proposal.index', [
                'seminarProposals' => $seminarProposals,
            ]);
        }
    }

    public function show(SeminarProposal $seminarProposal)
    {
        if (Auth::user()->role->nama == 'admin') {
            $dosenSeminarProposals = DosenPenguji::with('dosen.user')->get();
            $selectedDosenProposal = $seminarProposal->seminar_proposal_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_proposal.show', [
                'seminarProposal' => $seminarProposal,
                'dosenSeminarProposals' => $dosenSeminarProposals,
                'selectedDosenProposal' => $selectedDosenProposal
            ]);
        } else {
            $dosenSeminarProposals = $seminarProposal->seminar_proposal_nilais()->with('dosen_penguji.dosen.user')->get();
            $selectedDosenProposal = $seminarProposal->seminar_proposal_nilais()->pluck('dosen_penguji_id')->all();

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
        return redirect()->back()->with('error', 'Mohon Maaf, Harap lengkapi Tugas Akhir Anda');

    }

    public function store(Request $request)
    {
        $request->validate([
            'tempat' => 'nullable',
            'tanggal' => 'nullable',
            'waktu' => 'nullable',
            'tugas_akhir_id' => 'required|exists:tugas_akhirs,id'
        ]);

        $tugasAkhir = TugasAkhir::find($request->tugas_akhir_id);
        if ($tugasAkhir->seminar_proposal) {
            return redirect()->back()->with('error', 'Mohon Maaf, Anda sudah menambahkan seminar proposal');
        }

        $seminarProposal = SeminarProposal::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);
        return redirect()->route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id])
            ->with('success', 'Seminar Proposal berhasil ditambahkan.');
    }

    // public function edit(SeminarProposal $seminarProposal)
    // {
    //     $daftarDosenPenguji = DosenPenguji::with('dosen.user')->get();
    //     $selectedDosenPenguji = $seminarProposal->seminar_proposal_nilais->pluck('dosen_penguji_id')->all();

    //     return view('pages.dashboard.seminar_proposal.edit', [
    //         'seminarProposal' => $seminarProposal,
    //         'daftarDosenPenguji' => $daftarDosenPenguji,
    //         'selectedDosenPenguji' => $selectedDosenPenguji
    //     ]);
    // }

    public function update(Request $request, SeminarProposal $seminarProposal)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required',
        ]);

        $seminarProposal->update($validate);

        // Ambil daftar dosen penguji yang dipilih
        $selectedDosenPengujiIds = $request->input('dosen_penguji_id', []);

        // hapus data dosen penguji yang tidak dipilih pada tabel seminar_proposal_nilai
        $seminarProposal->seminar_proposal_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete();

        // Tambahkan data dosen penguji terpilih ke seminar_proposal_nilai
        foreach ($selectedDosenPengujiIds as $dosenPengujiId) {
            $seminarProposalNilai = SeminarProposalNilai::firstOrNew([
                'seminar_proposal_id' => $seminarProposal->id,
                'dosen_penguji_id' => $dosenPengujiId,
            ]);
            $seminarProposalNilai->save();
        }

        return redirect()->route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id])->with('success', 'Data Seminar Proposal berhasil diperbarui.');
    }
}
