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
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'role_id' => 'required|exists:roles,id',
        ]);

        // if($request->has('tanggal_lahir')) {
        //     $tanggal_lahir = $request->input('tanggal_lahir');
        //     $data['tanggal_lahir'] = $tanggal_lahir;
        //     $data['password'] = bcrypt($tanggal_lahir);
        // }

        $user = User::create($validated); // Tambahkan data user

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
        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan.');
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
            'tanggal_lahir' => 'required|date',
            'role_id' => 'required',
        ]);

        if($request->password) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }

        if ($request->tanggal_lahir != $user->tanggal_lahir) {
            //jika tanggal lahir diupdate maka update tanggal lahir saja
            $user->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'tanggal_lahir' => $request->tanggal_lahir,
                'role_id' => $request->role_id,
            ]);
        } else {
            //jika password diupdate maka update password
            $user->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'role_id' => $request->role_id,
            ]);
        }

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
        if($user->dosen->dosen_penguji || $user->dosen->dosen_pembimbing){
            return redirect()->back()->with('error', 'Tidak bisa menghapus data dosen yang sudah terkait sebagai dosen pembimbing atau dosen penguji.');
        }elseif ($user->dosen){
            $user->dosen->delete();
            $user->delete();
        } else if ($user->mahasiswa){
            $user->mahasiswa->delete();
        } else {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
