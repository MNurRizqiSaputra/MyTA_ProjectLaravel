<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\DosenPenguji;
use Illuminate\Http\Request;

class DosenPengujiController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.dosen_penguji.index', [
            'dosen_pengujis' => DosenPenguji::all(),
        ]);
    }
    public function create()
    {
        return view('pages.dashboard.dosen_penguji.create', [
            'dosens' => Dosen::all()
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id|unique:dosen_pengujis,dosen_id'
        ]);
        DosenPenguji::create($validated);
        return redirect()->route('dosen-penguji.index');
    }
}
