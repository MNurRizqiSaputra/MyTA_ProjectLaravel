<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SeminarPenelitian;
use App\Models\SeminarPenelitianNilai;
use Illuminate\Http\Request;

class SeminarPenelitianNilaiController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.seminar_penelitian_nilai.index', [
            'seminar_penelitian_nilais' => SeminarPenelitianNilai::orderByDesc('created_at')->get(),
        ]);
    }

    public function nilai(SeminarPenelitian $seminarPenelitian)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_pengujis->pluck('id');
        $seminarPenelitianNilai = $seminarPenelitian->seminar_penelitian_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();

        return view('pages.dashboard.seminar_penelitian.nilai', [
            'seminarPenelitian' => $seminarPenelitian,
            'seminarPenelitianNilai' => $seminarPenelitianNilai,
        ]);
    }

    public function update(Request $request, SeminarPenelitian $seminarPenelitian)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_pengujis->pluck('id');

        $validated = $request->validate([
            'dosen_penguji_id' => 'required',
            'seminar_penelitian_id' => 'required',
            'nilai' => 'required|integer',
        ]);

        $seminarPenelitianNilai = $seminarPenelitian->seminar_penelitian_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();
        $seminarPenelitianNilai->update($validated);

        // setelah memberi nilai, hitung nilai akhir dari semua nilai seminar
        $nilaiAkhir = $seminarPenelitian->seminar_penelitian_nilais()->avg('nilai');

        // update data nilai akhir seminar penelitian
        $seminarPenelitian->update([
            'nilai_akhir' => $nilaiAkhir
        ]);

        return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id])->with('success', 'Seminar Penelitian berhasil dinilai.');
    }
}
