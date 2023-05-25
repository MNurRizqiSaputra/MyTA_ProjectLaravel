<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|email|unique:users',
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
        if ($user->role_id == 1) {
            // Tambahkan data dosen
            Dosen::create([
                'user_id' => $user->id,
                // tambahkan kolom lain sesuai kebutuhan
            ]);
        } elseif ($user->role_id == 2) {
            // Tambahkan data mahasiswa
            Mahasiswa::create([
                'user_id' => $user->id,
                // tambahkan kolom lain sesuai kebutuhan
            ]);
        }

        return redirect()->back()->with('success', 'Data user berhasil ditambahkan.');
    }
}
