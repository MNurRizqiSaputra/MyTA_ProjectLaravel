<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view('pages.admin.dosen.index', [
        'dosens' => Dosen::all(),
        ]);
    }
}
