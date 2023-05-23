<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDosenPengujiRequest;
use App\Http\Requests\UpdateDosenPengujiRequest;
use App\Models\DosenPenguji;
use Exception;
use Illuminate\Http\Request;

class DosenPengujiController extends Controller
{
    public function index()
    {
        try {
            // Get All Dosen penguji
            $dosen_penguji = DosenPenguji::all();
            if (!$dosen_penguji) {
                throw new Exception("Dosen penguji Not Found");
            }
            return ResponseFormatter::success($dosen_penguji, 'Semua data dosen penguji berhasil ditampilkan');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            // get id dosen penguji
            $dosen_penguji_id = DosenPenguji::findOrFail($id);
            // Check if role exists
            if (!$dosen_penguji_id) {
                throw new Exception('Dosen penguji Not Found');
            }
            return ResponseFormatter::success($dosen_penguji_id, 'Dosen penguji ' . $dosen_penguji_id->dosen->user->nama . ' found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function store(CreateDosenPengujiRequest $request)
    {
        try {
            $dosen_penguji = DosenPenguji::create([
                'dosen_id' => $request->dosen_id
            ]);

            if (!$dosen_penguji) {
                throw new Exception("Dosen Penguji not created");
            }
            return ResponseFormatter::success($dosen_penguji, 'Dosen Penguji Created');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(UpdateDosenPengujiRequest $request, $id)
    {
        try {
            // get id dosen_penguji
            $dosen_penguji_id = DosenPenguji::findOrFail($id);

            // Check if Dosen Penguji exists
            if (!$dosen_penguji_id) {
                throw new Exception('Dosen Penguji Not Found');
            }

            // Update DosenPenguji
            $dosen_penguji_id->update([
                'dosen_id' => $request->dosen_id
            ]);

            return ResponseFormatter::success($dosen_penguji_id, 'Dosen Penguji Updated');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            // get id dosen penguji
            $dosen_penguji_id = DosenPenguji::findOrFail($id);
            // Check if role exists
            if (!$dosen_penguji_id) {
                throw new Exception('Dosen penguji Not Found');
            }
            $dosen_penguji_id->delete();
            return ResponseFormatter::success($dosen_penguji_id, 'Dosen Penguji ' . $dosen_penguji_id->dosen->user->nama . ' deleted successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
