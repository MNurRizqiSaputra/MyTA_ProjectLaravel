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
}
