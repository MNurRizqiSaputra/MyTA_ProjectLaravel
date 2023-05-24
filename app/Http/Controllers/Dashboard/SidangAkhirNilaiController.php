<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
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
}
