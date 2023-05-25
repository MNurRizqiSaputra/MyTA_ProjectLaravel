<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
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

    public function store(CreateRoleRequest $request)
    {
        try {
            // Buat data user baru
            $user = User::create([
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => $request->input('role_id'),
            ]);

            // Jika role adalah dosen
            if ($request->input('role_id') == 1) {
                // Buat data dosen terkait
                if ($request->hasFile('foto')) {
                    $path = $request->file('foto')->store('public/fotos');
                }
                $user->dosen()->create([
                    'nip' => $request->input('nip'),
                    'foto' => $path,
                    'jurusan_id' => $request->input('jurusan_id'),
                ]);
            }

            // Jika role adalah mahasiswa
            if ($request->input('role_id') == 2) {
                // Buat data mahasiswa terkait
                if ($request->hasFile('foto')) {
                    $path = $request->file('foto')->store('public/fotos');
                }
                $user->mahasiswa()->create([
                    'nim' => $request->input('nim'),
                    'foto' => $path,
                    'jurusan_id' => $request->input('jurusan_id'),
                ]);
            }
            return redirect()->route('user.create')->with('success', 'Successfully created a user');
        } catch (Exception $e) {
            return redirect()->route('user.create')->with('error', 'Successfully created a user');
        }
    }
}
