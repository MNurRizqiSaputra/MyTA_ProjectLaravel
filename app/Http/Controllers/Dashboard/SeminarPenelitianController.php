<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPenguji;
use App\Models\SeminarPenelitian;
use App\Models\SeminarPenelitianNilai;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeminarPenelitianController extends Controller
{
    public function index()
    {
        if (Auth::user()->dosen && Auth::user()->dosen->dosen_pengujis->pluck('id')) {
            $dosenPenguji = auth()->user()->dosen->dosen_pengujis;
            $dosenPengujiId = $dosenPenguji->pluck('id'); // get id dosen penguji yang login
            $seminarPenelitianId = SeminarPenelitianNilai::whereIn('dosen_penguji_id', $dosenPengujiId)->pluck('seminar_penelitian_id'); // Ambil daftar seminar penelitian yang terkait dengan dosen penguji
            $seminarPenelitians = SeminarPenelitian::whereIn('id', $seminarPenelitianId)->orderByDesc('created_at')->get(); // Tampilkan daftar seminar penelitian yang terkait
            $pengujiNilai = SeminarPenelitianNilai::where('dosen_penguji_id', $dosenPengujiId)->whereNull('nilai')->pluck('seminar_penelitian_id'); // Ambil dosen penguji yang belum memberikan nilai

            return view('pages.dashboard.seminar_penelitian.index', [
                'seminarPenelitians' => $seminarPenelitians,
                'dosenPengujiId' => $dosenPengujiId,
                'pengujiNilai' => $pengujiNilai
            ]);
        } else {
            $seminarPenelitians = SeminarPenelitian::orderByDesc('created_at')->get();
            $pengujiNilai = SeminarPenelitianNilai::whereNull('nilai')->pluck('seminar_penelitian_id');

            return view('pages.dashboard.seminar_penelitian.index', [
                'seminarPenelitians' => $seminarPenelitians,
                'pengujiNilai' => $pengujiNilai

            ]);
        }
    }

    public function show(SeminarPenelitian $seminarPenelitian)
    {
        $admin = Auth::user()->role->nama == 'admin';
        if ($admin) {
            $dosenSeminarPenelitians = DosenPenguji::with('dosen')
                                                    ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                    ->join('users', 'dosens.user_id', '=', 'users.id')
                                                    ->select(
                                                        'dosen_pengujis.id as id',
                                                        'users.nama as nama'
                                                    )->orderBy('users.nama')->get(); //mengambil daftar dosen seminar penelitian
            $selectedDosenPenelitian = $seminarPenelitian->seminar_penelitian_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_penelitian.show', [
                'seminarPenelitian' => $seminarPenelitian,
                'dosenSeminarPenelitians' => $dosenSeminarPenelitians,
                'selectedDosenPenelitian' => $selectedDosenPenelitian
            ]);
        } else {
            $dosenSeminarPenelitians = $seminarPenelitian->seminar_penelitian_nilais()->with('dosen_penguji.dosen.user')
                                                                                        ->join('dosen_pengujis', 'seminar_penelitian_nilai.dosen_penguji_id', '=', 'dosen_pengujis.id')
                                                                                        ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                                                        ->join('users', 'dosens.user_id', '=', 'users.id')
                                                                                        ->where('seminar_penelitian_nilai.seminar_penelitian_id', $seminarPenelitian->id)
                                                                                        ->orderBy('users.nama')
                                                                                        ->get(); //mengambil daftar dosen seminar proposal yang terkait dengan seminar proposal
            $selectedDosenPenelitian = $seminarPenelitian->seminar_penelitian_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_penelitian.show', [
                'seminarPenelitian' => $seminarPenelitian,
                'dosenSeminarPenelitians' => $dosenSeminarPenelitians,
                'selectedDosenPenelitian' => $selectedDosenPenelitian
            ]);
        }
    }

    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugasAkhir = $mahasiswa->tugas_akhir;
        $seminarProposal = $tugasAkhir->seminar_proposal;
        $dosenPengujiBelumNilai = $seminarProposal->seminar_proposal_nilais()->whereNull('nilai')->with('dosen_penguji')->get();

        if ($dosenPengujiBelumNilai) {
            return redirect()->back()->with('error', 'Mohon Maaf, Masih terdapat Dosen Penguji yang belum menilai Seminar Proposal Anda');
        }
        else {
            return view('pages.dashboard.seminar_penelitian.create', [
                'tugasAkhir' => $tugasAkhir
            ]);
        }
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
        if ($tugasAkhir->seminar_penelitian) {
            return redirect()->back()->with('error', 'Mohon Maaf, Anda sudah menambahkan sidang penelitian');
        }

        $seminarPenelitian = SeminarPenelitian::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);

        return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id])->with('success', 'Seminar Penelitian berhasil ditambahkan.');
    }

    public function update(Request $request, SeminarPenelitian $seminarPenelitian)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required',
        ]);

        $seminarPenelitian->update($validate);

        $selectedDosenPengujiIds = $request->input('dosen_penguji_', []); // Ambil daftar dosen penguji yang dipilih
        $seminarPenelitian->seminar_penelitian_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete(); // hapus data dosen penguji yang tidak dipilih pada tabel seminar_penelitian_nilai

        // Tambahkan data dosen penguji terpilih ke seminar_penelitian_nilai
        foreach ($selectedDosenPengujiIds as $dosenPengujiId) {
            $seminarPenelitianNilai = SeminarPenelitianNilai::firstOrNew([
                'seminar_penelitian_id' => $seminarPenelitian->id,
                'dosen_penguji_id' => $dosenPengujiId,
            ]);
            $seminarPenelitianNilai->save();
        }

        return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id])->with('success', 'Data Seminar Proposal berhasil diperbarui.');
    }
}
