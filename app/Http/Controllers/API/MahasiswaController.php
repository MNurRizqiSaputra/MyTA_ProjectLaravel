<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        try {
            // Get all mahasiswa
            $mahasiswas = Mahasiswa::all();
            if (!$mahasiswas) {
                throw new Exception("Mahasiswa Not Found");
            }
            return ResponseFormatter::success($mahasiswas, 'Semua data mahasiswa berhasil ditampilkan');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            // get id mahasiswa
            $mahasiswa = Mahasiswa::find($id);
            // Check if role exists
            if (!$mahasiswa) {
                throw new Exception('Mahasiswa Not Found');
            }
            return ResponseFormatter::success($mahasiswa, 'Mahasiswa ' . $mahasiswa->user->nama . ' found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(UpdateMahasiswaRequest $request, $id)
    {
        try {
            // Get Id
            $mahasiswa = Mahasiswa::findOrFail($id);
            // Check if mahasiswa exists
            if (!$mahasiswa) {
                throw new Exception('Mahasiswa Not Found');
            }

            // Update data mahasiswa
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('public/fotos');
            }
            $mahasiswa->update([
                'foto' => $path,
            ]);

            // Update data user
            $user = $mahasiswa->user;
            $user->update([
                'nama' => $request->input('nama')
            ]);

            return ResponseFormatter::success($mahasiswa, 'Mahasiswa updated successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }


    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->delete();
            return ResponseFormatter::success($mahasiswa, 'Mahasiswa deleted successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
