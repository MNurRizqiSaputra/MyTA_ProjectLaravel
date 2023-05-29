<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.jurusan.index', [
            'jurusans' => Jurusan::all(),
        ]);
    }
}
