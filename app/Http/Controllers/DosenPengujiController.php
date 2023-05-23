<?php

namespace App\Http\Controllers;

use App\Models\DosenPenguji;
use Illuminate\Http\Request;

class DosenPengujiController extends Controller
{
    public function index()
    {
        return view('dosen_penguji.index', [
            'dosen_pengujis' => DosenPenguji::all(),
        ]);
    }
}
