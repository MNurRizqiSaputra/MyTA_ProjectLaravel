<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.user.index', [
            'users' => User::with('role')->orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.user.create', [
            'roles' => Role::orderBy('nama')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Tambahkan data user
        $user = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('role_id'),
        ]);

        // Cek role_id
        if ($user->role_id == ($user->role->nama == 'dosen')) {
            // Tambahkan data dosen
            Dosen::create([
                'user_id' => $user->id,
            ]);
        }

        if ($user->role_id == ($user->role->nama == 'mahasiswa')) {
            // Tambahkan data mahasiswa
            Mahasiswa::create([
                'user_id' => $user->id,
            ]);
        }

        return redirect()->back()->with('success', 'Data user berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        return view('pages.dashboard.user.show', [
            'user' => $user,
            'roles' => Role::orderBy('nama')->get()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'role_id' => 'required',
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role_id' => $request->role_id,
        ]);

        if ($request->role_id == Role::where('nama', 'dosen')->first()->id) {
            // Periksa apakah user tersebut sudah memiliki data di tabel dosen
            if (!$user->dosen) {
                // Buat data baru pada tabel dosen
                Dosen::create([
                    'user_id' => $user->id,
                ]);
                $user->mahasiswa->delete();
            }
        }

        if ($request->role_id == Role::where('nama', 'mahasiswa')->first()->id){
            if (!$user->mahasiswa) {
                // Buat data baru pada tabel mahasiswa
                Mahasiswa::create([
                    'user_id' => $user->id,
                ]);
                $user->dosen->delete();
            }
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        // Menghapus user
        if ($user->dosen){
            $user->dosen->delete();
            // Menghapus data dosen_pengujis terkait
            $user->dosen->dosen_pengujis->delete();
            // Menghapus data dosen_pembimbings terkait
            $user->dosen->dosen_pembimbings->delete();
            // Menghapus user
            $user->delete();
        } else if ($user->mahasiswa){
            $user->mahasiswa->delete();
        } else {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
