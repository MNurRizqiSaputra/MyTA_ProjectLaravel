<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\DosenPenguji;
use Illuminate\Http\Request;

class DosenPengujiController extends Controller
{
    public function index()
    {
        return view('pages.admin.dosen_penguji.index', [
            'dosen_pengujis' => DosenPenguji::all(),
        ]);
    }
}
