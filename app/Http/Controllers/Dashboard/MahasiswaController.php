<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.mahasiswa.index', [
            'mahasiswas' => Mahasiswa::all(),
        ]);
    }
    public function show(Mahasiswa $mahasiswa)
    {
        return view('pages.dashboard.mahasiswa.show', [
            'mahasiswa' => $mahasiswa,
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        // Validasi input data
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jurusan_id' => 'required|exists:jurusans,id',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'nohp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->user->id,
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // Update data pada model User
        $user = $mahasiswa->user;
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->save();

        // Update data pada model Mahasiswa
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->nohp = $request->input('nohp');
        $mahasiswa->jurusan_id = $request->input('jurusan_id');

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::delete($mahasiswa->foto);
            }

            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('public/fotos/mahasiswa/', $fileName);
            $mahasiswa->foto = $path;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.show', ['mahasiswa' => $mahasiswa])->with('success', 'Berhasil mengubah data mahasiswa.');
    }
}
