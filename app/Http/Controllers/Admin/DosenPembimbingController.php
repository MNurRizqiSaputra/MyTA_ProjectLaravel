<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\DosenPembimbing;
use Illuminate\Http\Request;

class DosenPembimbingController extends Controller
{
    public function index()
    {
        return view('pages.admin.dosen_pembimbing.index', [
            'dosen_pembimbings' => DosenPembimbing::all(),
        ]);
    }
}
