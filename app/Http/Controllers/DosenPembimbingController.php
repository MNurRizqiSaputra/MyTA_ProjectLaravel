<?php

namespace App\Http\Controllers;

use App\Models\DosenPembimbing;
use Illuminate\Http\Request;

class DosenPembimbingController extends Controller
{
    public function index()
    {
        return view('dosen_pembimbing.index', [
            'dosen_pembimbings' => DosenPembimbing::all(),
        ]);
    }
}
