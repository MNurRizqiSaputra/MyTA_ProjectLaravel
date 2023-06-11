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
            'jurusans' => Jurusan::orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|unique:jurusans,nama'
        ]);

        Jurusan::create($validated);
        return redirect()->route('jurusan.index');
    }

    public function show(Jurusan $jurusan)
    {
        return view('pages.dashboard.jurusan.show', [
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|unique:jurusans,nama'
        ]);
        $jurusan->update($validated);
        return redirect()->route('jurusan.index');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index');
    }
}
