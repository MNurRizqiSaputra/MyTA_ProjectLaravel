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
        $dosenPengujiId = auth()->user()->dosen->dosen_penguji->id;
        $seminarPenelitianNilai = $seminarPenelitian->seminar_penelitian_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();

        return view('pages.dashboard.seminar_penelitian.nilai', [
            'seminarPenelitian' => $seminarPenelitian,
            'seminarPenelitianNilai' => $seminarPenelitianNilai,
        ]);
    }

    public function update(Request $request, SeminarPenelitian $seminarPenelitian)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_penguji->id;

        $validated = $request->validate([
            'dosen_penguji_id' => 'required',
            'seminar_penelitian_id' => 'required',
            'nilai' => 'required|integer',
        ]);

        $seminarPenelitianNilai = $seminarPenelitian->seminar_penelitian_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();
        $seminarPenelitianNilai->update($validated);

        // membandingkan jumlah nilai seminar penelitian yang diberikan oleh semua dosen penguji dengan jumlah total dosen penguji yang seharusnya memberikan nilai.
        $countNilaiPenelitian = ($seminarPenelitian->seminar_penelitian_nilais()->count() == $seminarPenelitian->seminar_penelitian_nilais->pluck('dosen_penguji_id')->count());

        if ($countNilaiPenelitian) {
            $sumNilai = $seminarPenelitian->seminar_penelitian_nilais()->sum('nilai');
            $nilaiAkhir = $sumNilai / $seminarPenelitian->seminar_penelitian_nilais()->count();

            // update data nilai akhir seminar penelitian
            $seminarPenelitian->update([
                'nilai_akhir' => $nilaiAkhir
            ]);
        }
        return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id])->with('success', 'Seminar Penelitian berhasil dinilai.');
    }
}
