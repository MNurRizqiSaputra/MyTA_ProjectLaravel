<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\Dosen;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        try {
            // Get all dosen
            $dosens = Dosen::all();
            if (!$dosens) {
                throw new Exception("Dosen Not Found");
            }
            return ResponseFormatter::success($dosens, 'Semua data dosen berhasil ditampilkan');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            // get id dosen
            $dosen = Dosen::find($id);
            // Check if role exists
            if (!$dosen) {
                throw new Exception('Dosen Not Found');
            }
            return ResponseFormatter::success($dosen, 'Dosen ' . $dosen->user->nama . ' found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(UpdateDosenRequest $request, $id)
    {
        try {
            // Get Id
            $dosen = Dosen::findOrFail($id);
            // Check if dosen exists
            if (!$dosen) {
                throw new Exception('Dosen Not Found');
            }

            // Update data dosen
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('public/fotos');
            }
            $dosen->update([
                'foto' => $path,
            ]);

            // Update data user
            $user = $dosen->user;
            $user->update([
                'nama' => $request->input('nama')
            ]);

            return ResponseFormatter::success($dosen, 'Dosen updated successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dosen = Dosen::findOrFail($id);
            $dosen->delete();
            return ResponseFormatter::success($dosen, 'Dosen deleted successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
