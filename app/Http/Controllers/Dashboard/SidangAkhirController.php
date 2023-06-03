<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SidangAkhir;
use Illuminate\Http\Request;

class SidangAkhirController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.sidang_akhir.index', [
            'sidang_akhirs' => SidangAkhir::all(),
        ]);
    }
    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugasAkhir = $mahasiswa->tugas_akhir;
        $seminarPenelitian = $tugasAkhir->seminar_penelitian;

        // periksa nilai seminar penelitian
        if ($seminarPenelitian->nilai_akhir) {
            return view('pages.dashboard.sidang_akhir.create', [
                'tugasAkhir' => $tugasAkhir
            ]);
        }
        return redirect()->back()->with('error', 'Mohon Maaf, Harap lengkapi penilaian Seminar Penelitian Anda');
    }
}
