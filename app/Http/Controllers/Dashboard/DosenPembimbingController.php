<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPembimbing;
use Illuminate\Http\Request;

class DosenPembimbingController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.dosen_pembimbing.index', [
            'dosen_pembimbings' => DosenPembimbing::all(),
        ]);
    }
}
