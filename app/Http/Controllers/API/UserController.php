<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            // validate request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // Find user by email
            $credential = request(['email', 'password']);
            if (!Auth::attempt($credential)) {
                return ResponseFormatter::error('Unauthorized', 401);
            }

            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password)) {
                throw new Exception("Invalid Password");
            }

            // Generate token
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            // Return Response
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Login Success');
        } catch (Exception $e) {
            return ResponseFormatter::error("Authentication Error");
        }
    }

    public function register(Request $request)
    {
        try {
            // validate request
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role_id' => 'required'
            ]);

            // create user
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id
            ]);

            // Generate token
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            // Return Response
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Register Success');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage());
        }
    }
    public function logout(Request $request)
    {
        // revoke token
        $token = $request->user()->currentAccessToken()->delete();

        // return response
        return ResponseFormatter::success($token, 'Logout Success');
    }

    public function fetch(Request $request)
    {
        // Get User Login
        $user = $request->user();

        // Return Response
        return ResponseFormatter::success($user, 'Fetch Success');
    }
    public function all()
    {
        // get all users
        try {
            $users = User::all();
            if (!$users) {
                throw new Exception("User not found");
            }
            return ResponseFormatter::success($users, "User Found");
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
    public function userById($id)
    {
        try {
            // Get User by id
            $user = User::find($id);

            // Check if user exists
            if (!$user) {
                throw new Exception('User Not Found');
            }
            return ResponseFormatter::success($user, 'user found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
    public function destroy($id)
    {
        try {
            // get id user
            $user = User::find($id);
            $user->delete();
            return ResponseFormatter::success($user, 'User deleted successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Validasi inputan
            $request->validate([
                'nama' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'role_id' => 'required',
            ]);

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
            return ResponseFormatter::success($user, 'User created successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Cari data user
            $user = User::findOrFail($id);

            // Validasi inputan
            $validated = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'role_id' => 'required',
            ]);

            // Update data user
            $user->update($validated);
            $user->save();

            // Jika ada data dosen terkait
            if ($user->dosen) {
                // Update data dosen
                $validateDosen = $request->validate([
                    'nip' => 'required|size:8|alpha_num|unique:dosens,nip,'.$user->dosen->id,
                    'foto' => 'required',
                    'jurusan_id' => 'required'
                ]);
                $user->dosen->update($validateDosen);
                // return redirect()->route('dosen.index');
            }

            if ($user->mahasiswa) {
                // Update data mahasiswa
                $validateMahasiswa = $request->validate([
                    'nim' => 'required|size:8|alpha_num|unique:mahasiswas,nim,'.$user->mahasiswa->id,
                    'foto' => 'required',
                    'jurusan_id' => 'required'
                ]);
                $user->mahasiswa->update($validateMahasiswa);
                // return redirect()->route('mahasiswa.index');
            }

            // return redirect()->route('users.index');
            return ResponseFormatter::success($user, 'User updated successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
