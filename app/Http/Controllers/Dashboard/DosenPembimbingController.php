<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
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

    public function create()
    {
        return view('pages.dashboard.dosen_pembimbing.create', [
            'dosens' => Dosen::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id|unique:dosen_pembimbings,dosen_id'
        ]);

        DosenPembimbing::create($validated);
        return redirect()->route('dosen-pembimbing.index');
    }
}
