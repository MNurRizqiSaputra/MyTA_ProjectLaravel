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
            // get id dosen penguji yang login
            $dosenPengujiId = $dosenPenguji->pluck('id');

            // Ambil daftar seminar penelitian yang terkait dengan dosen penguji
            $seminarPenelitianId = SeminarPenelitianNilai::whereIn('dosen_penguji_id', $dosenPengujiId)->pluck('seminar_penelitian_id');

            // Tampilkan daftar seminar penelitian yang terkait
            $seminarPenelitians = SeminarPenelitian::whereIn('id', $seminarPenelitianId)->get();

            // Ambil dosen penguji yang belum memberikan nilai
            $pengujiNilai = SeminarPenelitianNilai::where('dosen_penguji_id', $dosenPengujiId)->whereNull('nilai')->pluck('seminar_penelitian_id');

            return view('pages.dashboard.seminar_penelitian.index', [
                'seminarPenelitians' => $seminarPenelitians,
                'dosenPengujiId' => $dosenPengujiId,
                'pengujiNilai' => $pengujiNilai
            ]);
        } else {
            $seminarPenelitians = SeminarPenelitian::all();
            $pengujiNilai = SeminarPenelitianNilai::whereNull('nilai')->pluck('seminar_penelitian_id');

            return view('pages.dashboard.seminar_penelitian.index', [
                'seminarPenelitians' => SeminarPenelitian::all(),
                'pengujiNilai' => $pengujiNilai

            ]);
        }
    }

    public function show(SeminarPenelitian $seminarPenelitian)
    {
        $admin = Auth::user()->role->nama == 'admin';
        if ($admin) {
            $dosenSeminarPenelitians = DosenPenguji::with('dosen.user')->get();
            $selectedDosenPenelitian = $seminarPenelitian->seminar_penelitian_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_penelitian.show', [
                'seminarPenelitian' => $seminarPenelitian,
                'dosenSeminarPenelitians' => $dosenSeminarPenelitians,
                'selectedDosenPenelitian' => $selectedDosenPenelitian
            ]);
        } else {
            $dosenSeminarPenelitians = $seminarPenelitian->seminar_penelitian_nilais()->with('dosen_penguji.dosen.user')->get();
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

        // periksa nilai seminar proposal
        if (!isset($seminarProposal->nilai_akhir)) {
            return redirect()->back()->with('error', 'Mohon Maaf, Harap lengkapi penilaian Seminar Proposal Anda');
        }
        elseif ($seminarProposal->nilai_akhir) {
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

        // Ambil daftar dosen penguji yang dipilih
        $selectedDosenPengujiIds = $request->input('dosen_penguji_', []);

        // hapus data dosen penguji yang tidak dipilih pada tabel seminar_penelitian_nilai
        $seminarPenelitian->seminar_penelitian_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete();

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
