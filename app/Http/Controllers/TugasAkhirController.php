<?php

namespace App\Http\Controllers;

use App\Models\TugasAkhir;
use Illuminate\Http\Request;

class TugasAkhirController extends Controller
{
    public function index()
    {
        return view('tugas_akhir.index', [
            'tugas_akhirs' => TugasAkhir::all(),
        ]);
    }
}
