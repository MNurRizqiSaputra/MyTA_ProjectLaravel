<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPenguji;
use App\Models\SeminarPenelitian;
use Illuminate\Http\Request;

class SeminarPenelitianController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.seminar_penelitian.index', [
            'seminar_penelitians' => SeminarPenelitian::all(),
        ]);
    }

    public function show(SeminarPenelitian $seminarPenelitian)
    {
        $admin = auth()->user()->role->nama == 'admin';
        if ($admin) {
            $dosenSeminarPenelitians = DosenPenguji::with('dosen.user')->get();
            $selectedDosenPenguji = $seminarPenelitian->seminar_penelitian_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_penelitian.show', [
                'seminarPenelitian' => $seminarPenelitian,
                'dosenSeminarPenelitians' => $dosenSeminarPenelitians,
                'selectedDosenPenguji' => $selectedDosenPenguji
            ]);
        } else {
            $dosenSeminarPenelitians = $seminarPenelitian->seminar_penelitian_nilais()->with('dosen_penguji.dosen.user')->get();
            $selectedDosenPenguji = $seminarPenelitian->seminar_penelitian_nilais()->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_penelitian.show', [
                'seminarPenelitian' => $seminarPenelitian,
                'dosenSeminarPenelitians' => $dosenSeminarPenelitians,
                'selectedDosenPenguji' => $selectedDosenPenguji
            ]);
        }
    }

    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugasAkhir = $mahasiswa->tugas_akhir;
        $seminarProposal = $mahasiswa->tugas_akhir->seminar_proposal;

        // periksa nilai seminar proposal
        if ($seminarProposal->nilai_akhir) {
            return view('pages.dashboard.seminar_penelitian.create', [
                'tugasAkhir' => $tugasAkhir
            ]);
        }
        return redirect()->back()->with('error', 'Mohon Maaf, Harap lengkapi penilaian Seminar Proposal Anda');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tempat' => 'nullable',
            'tanggal' => 'nullable',
            'waktu' => 'nullable',
            'tugas_akhir_id' => 'required|exists:tugas_akhirs,id'
        ]);

        $seminarPenelitian = SeminarPenelitian::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);

        return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id])->with('success', 'Seminar Penelitian berhasil ditambahkan.');
    }
}
