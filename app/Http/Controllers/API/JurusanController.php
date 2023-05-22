<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
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
}
