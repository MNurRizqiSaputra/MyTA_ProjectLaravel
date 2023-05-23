<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('pages.admin.mahasiswa.index', [
            'mahasiswas' => Mahasiswa::all(),
        ]);
    }
}
