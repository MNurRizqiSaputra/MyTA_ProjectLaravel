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
}
