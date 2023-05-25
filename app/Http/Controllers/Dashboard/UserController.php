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

    public function store(CreateUserRequest $request)
    {
        try {
            // Buat data user baru
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
            ]);

            // Jika role adalah dosen
            if ($request->role_id == 1) {
                // Buat data dosen terkait
                Dosen::create([
                    'user_id' => $user->id,
                ]);
            }

            // Jika role adalah mahasiswa
            if ($request->role_id == 2) {
                // Buat data mahasiswa terkait
                Mahasiswa::create([
                    'user_id' => $user->id,
                ]);
            }
            return redirect()->route('user.index')->with('success', 'Berhasil menambahkan user');
        } catch (Exception $e) {
            return redirect()->route('user.create')->with('error', 'Gagal menambahkan user');
        }
    }
}
