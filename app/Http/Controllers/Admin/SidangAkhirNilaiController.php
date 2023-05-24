<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SidangAkhirNilai;
use Illuminate\Http\Request;

class SidangAkhirNilaiController extends Controller
{
    public function index()
    {
        return view('pages.admin.sidang_akhir_nilai.index', [
            'sidang_akhir_nilais' => SidangAkhirNilai::all(),
        ]);
    }
}
