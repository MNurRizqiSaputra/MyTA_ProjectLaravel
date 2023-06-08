<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\DeleteUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.user.index', [
            'users' => User::with('role')->get(),
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.user.create', [
            'roles' => Role::all(),
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
                // tambahkan kolom lain sesuai kebutuhan
            ]);
        } elseif ($user->role_id == ($user->role->nama == 'mahasiswa')) {
            // Tambahkan data mahasiswa
            Mahasiswa::create([
                'user_id' => $user->id,
                // tambahkan kolom lain sesuai kebutuhan
            ]);
        }

        return redirect()->back()->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('pages.dashboard.user.edit', compact('user' ,'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $request->input('password') ? bcrypt($request->input('password')) : $user->password,
            'role_id' => $request->input('role_id'),
        ]);

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
