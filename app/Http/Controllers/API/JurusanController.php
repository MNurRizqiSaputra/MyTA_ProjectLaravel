<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Models\Jurusan;
use Exception;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function all()
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

            // Check if role exists
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

    public function getUsersById($id)
    {
        try {
            // get id jurusan
            $jurusan = Jurusan::findOrFail($id);
            // Check if role exists
            if (!$jurusan) {
                throw new Exception('Jurusan Not Found');
            }
            return ResponseFormatter::success($jurusan, 'Jurusan ' . $jurusan->nama . ' found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
