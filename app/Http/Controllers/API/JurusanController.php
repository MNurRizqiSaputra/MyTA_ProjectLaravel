<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        try {
            $jurusans = Jurusan::all();
            if (!$jurusans) {
                throw new Exception("Jurusan Not Found");
            }
            return ResponseFormatter::success($jurusans, "Jurusan found");
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function store(CreateJurusanRequest $request)
    {
        try {
            $jurusan = Jurusan::create([
                'nama' => $request->nama
            ]);

            if (!$jurusan) {
                throw new Exception("Jurusan not created");
            }
            return ResponseFormatter::success($jurusan, 'Jurusan Created');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(UpdateJurusanRequest $request, $id)
    {
        try {
            // get jurusan by id
            $jurusan = Jurusan::findOrFail($id);

            // Check if jurusan exists
            if (!$jurusan) {
                throw new Exception('Jurusan Not Found');
            }

            // Update jurusan
            $jurusan->update([
                'nama' => $request->nama
            ]);

            return ResponseFormatter::success($jurusan, 'Jurusan Updated');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            // get id jurusan
            $jurusan = Jurusan::findOrFail($id);
            $jurusan->delete();
            return ResponseFormatter::success($jurusan, 'Jurusan deleted successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            // get id jurusan
            $jurusan = Jurusan::findOrFail($id);
            // Check if jurusan exists
            if (!$jurusan) {
                throw new Exception('Jurusan Not Found');
            }
            // Ambil semua data mahasiswa yang terkait dengan jurusan
            $mahasiswa = Mahasiswa::where('jurusan_id', $jurusan->id)->get();

            // Ambil semua data dosen yang terkait dengan jurusan
            $dosen = Dosen::where('jurusan_id', $jurusan->id)->get();

            // Gabungkan data jurusan, mahasiswa, dan dosen dalam satu respons
            $data = [
                'jurusan' => $jurusan,
                'mahasiswa' => $mahasiswa,
                'dosen' => $dosen
            ];
            return ResponseFormatter::success($data, 'Jurusan ' . $jurusan->nama . ' found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
