<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.mahasiswa.index', [
            'mahasiswas' => Mahasiswa::all(),
        ]);
    }
}
