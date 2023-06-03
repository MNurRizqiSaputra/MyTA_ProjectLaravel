<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SidangAkhir;
use App\Models\SidangAkhirNilai;
use Illuminate\Http\Request;

class SidangAkhirNilaiController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.sidang_akhir_nilai.index', [
            'sidang_akhir_nilais' => SidangAkhirNilai::all(),
        ]);
    }

    public function nilai(SidangAkhir $sidangAkhir)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_pengujis->pluck('id');
        $sidangAkhirNilai = $sidangAkhir->sidang_akhir_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();

        return view('pages.dashboard.sidang_akhir.nilai', [
            'sidangAkhir' => $sidangAkhir,
            'sidangAkhirNilai' => $sidangAkhirNilai,
        ]);
    }

    public function update(Request $request, SidangAkhir $sidangAkhir)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_pengujis->pluck('id');

        $validated = $request->validate([
            'dosen_penguji_id' => 'required',
            'sidang_akhir_id' => 'required',
            'nilai' => 'required|integer',
        ]);

        $sidangAkhirNilai = $sidangAkhir->sidang_akhir_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();
        $sidangAkhirNilai->update($validated);

        // setelah memberi nilai, hitung nilai akhir dari semua nilai sidang
        $nilaiAkhir = $sidangAkhir->sidang_akhir_nilais()->avg('nilai');

        // update data nilai akhir sidang akhir
        $sidangAkhir->update([
            'nilai_akhir' => $nilaiAkhir
        ]);

        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id])->with('success', 'Sidang Akhir berhasil dinilai.');
    }
}
