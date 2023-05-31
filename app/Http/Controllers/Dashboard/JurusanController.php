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

    public function create()
    {
        return view('pages.dashboard.jurusan.create', [
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Jurusan::create([
            'nama' => $request->input('nama'),
        ]);

        return redirect()->back()->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        return view('pages.dashboard.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);

        $jurusan->update([
            'nama' => $request->input('nama'),
        ]);

        return redirect()->back()->with('success', 'Data user berhasil ditambahkan.');
    }

    public function destroy(Request $request)
    {
        $jurusanId = $request->input('jurusan_id');
        $jurusan = Jurusan::findOrfail($jurusanId);

        $jurusan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
