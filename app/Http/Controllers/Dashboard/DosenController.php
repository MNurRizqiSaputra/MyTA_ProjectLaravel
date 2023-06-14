<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.dosen.index', [
        'dosens' => Dosen::with('user')
                        ->leftJoin('users', 'dosens.user_id', '=', 'users.id')
                        ->leftJoin('jurusans', 'dosens.jurusan_id', '=', 'jurusans.id')
                        ->select(
                            'dosens.id as id',
                            'dosens.nip as nip',
                            'users.nama as nama',
                            'users.email as email',
                            'jurusans.nama as jurusan',
                        )
                        ->orderBy('users.nama')
                        ->get(),
        ]);
    }
    public function show(Dosen $dosen)
    {
        return view('pages.dashboard.dosen.show', [
            'dosen' => $dosen,
            'jurusans' => Jurusan::all(),
        ]);
    }

    public function update(Request $request, Dosen $dosen)
    {
        // Validasi input data
        $request->validate([
            'nip' => 'required|string|size:10|unique:dosens,nip,' . $dosen->id,
            'jurusan_id' => 'required|exists:jurusans,id',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'nohp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $dosen->user->id,
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // Update data pada model User
        $user = $dosen->user;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->save();

        // Update data pada model Dosen
        $dosen->nip = $request->input('nip');
        $dosen->nohp = $request->input('nohp');
        $dosen->jurusan_id = $request->input('jurusan_id');

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($dosen->foto) {
                Storage::delete($dosen->foto);
            }

            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('public/fotos/dosen/', $fileName);
            $dosen->foto = $path;
        }

        $dosen->save();

        return redirect()->route('dosen.show', ['dosen' => $dosen])->with('success', 'Berhasil mengubah data dosen.');
    }
}
