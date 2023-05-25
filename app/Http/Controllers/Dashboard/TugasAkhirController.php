<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;

class TugasAkhirController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.tugas_akhir.index', [
            'tugas_akhirs' => TugasAkhir::all(),
        ]);
    }
}
