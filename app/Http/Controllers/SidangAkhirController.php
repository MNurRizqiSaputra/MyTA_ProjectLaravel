<?php

namespace App\Http\Controllers;

use App\Models\SidangAkhir;
use Illuminate\Http\Request;

class SidangAkhirController extends Controller
{
    public function index()
    {
        return view('sidang_akhir.index', [
            'sidang_akhirs' => SidangAkhir::all(),
        ]);
    }
}
