<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        return view('pages.admin.jurusan.index', [
            'jurusans' => Jurusan::all(),
        ]);
    }
}
