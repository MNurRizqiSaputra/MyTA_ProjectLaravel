<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Exception;
use Illuminate\Http\Request;

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
            return ResponseFormatter::success($dosen, 'Dosen found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
