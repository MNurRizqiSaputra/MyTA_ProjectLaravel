<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SeminarPenelitian;
use App\Models\SeminarProposal;
use App\Models\SidangAkhir;
use App\Models\SidangAkhirNilai;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;

class SidangAkhirNilaiController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.sidang_akhir_nilai.index', [
            'sidang_akhir_nilais' => SidangAkhirNilai::orderByDesc('created_at')->get(),
        ]);
    }

    public function nilai(SidangAkhir $sidangAkhir)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_penguji->id;
        $sidangAkhirNilai = $sidangAkhir->sidang_akhir_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();

        return view('pages.dashboard.sidang_akhir.nilai', [
            'sidangAkhir' => $sidangAkhir,
            'sidangAkhirNilai' => $sidangAkhirNilai,
        ]);
    }

    public function update(Request $request, SidangAkhir $sidangAkhir)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_penguji->id;

        $validated = $request->validate([
            'dosen_penguji_id' => 'required',
            'sidang_akhir_id' => 'required',
            'nilai' => 'required|integer',
        ]);

        $sidangAkhirNilai = $sidangAkhir->sidang_akhir_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();
        $sidangAkhirNilai->update($validated);

        // membandingkan jumlah nilai sidang akhir yang diberikan oleh semua dosen penguji dengan jumlah total dosen penguji yang seharusnya memberikan nilai.
        $countNilaiSidangAkhir = ($sidangAkhir->sidang_akhir_nilais()->count() == $sidangAkhir->sidang_akhir_nilais->pluck('dosen_penguji_id')->count());

        if ($countNilaiSidangAkhir) {
            $totalNilai = $sidangAkhir->sidang_akhir_nilais()->sum('nilai');
            $nilaiAkhir = $totalNilai / $sidangAkhir->sidang_akhir_nilais->count();

            // update data nilai akhir sidang akhir
            $sidangAkhir->update([
                'nilai_akhir' => $nilaiAkhir
            ]);
        }

        // Panggil metode updateTotalNilai() setelah nilai akhir sidang akhir berhasil diisi
        $this->updateTotalNilai($sidangAkhir->tugas_akhir);
        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id])->with('success', 'Sidang Akhir berhasil dinilai.');
    }

    public function updateTotalNilai(TugasAkhir $tugasAkhir)
    {
        $seminarProposalNilaiAkhir = SeminarProposal::where('tugas_akhir_id', $tugasAkhir->id)->first();
        $seminarPenelitianNilaiAkhir = SeminarPenelitian::where('tugas_akhir_id', $tugasAkhir->id)->first();
        $sidangAkhirNilaiAkhir = SidangAkhir::where('tugas_akhir_id', $tugasAkhir->id)->first();

        if ($seminarProposalNilaiAkhir && $seminarPenelitianNilaiAkhir && $sidangAkhirNilaiAkhir) {
            // Hitung nilai rata-rata
            $totalNilai = ($seminarProposalNilaiAkhir->nilai_akhir + $seminarPenelitianNilaiAkhir->nilai_akhir + $sidangAkhirNilaiAkhir->nilai_akhir) / 3;

            // Update total nilai tugas akhir
            $tugasAkhir->update([
                'total_nilai' => $totalNilai
            ]);
        }
    }
}
