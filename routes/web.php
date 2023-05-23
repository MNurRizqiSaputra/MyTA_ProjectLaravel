<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\DosenPengujiController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DosenPembimbingController;
use App\Http\Controllers\Admin\SeminarPenelitianController;
use App\Http\Controllers\Admin\SeminarPenelitianNilaiController;
use App\Http\Controllers\Admin\SeminarProposalController;
use App\Http\Controllers\Admin\SeminarProposalNilaiController;
use App\Http\Controllers\Admin\SidangAkhirController;
use App\Http\Controllers\Admin\SidangAkhirNilaiController;
use App\Http\Controllers\Admin\TugasAkhirController;
use Illuminate\Support\Facades\Route;


Route::prefix("admin")
    ->group(function () {
        Route::get("/overview", [DashboardController::class, "index"])->name(
            "admin-dashboard"
        );
        Route::resource("role", RoleController::class);
        Route::resource("user", UserController::class);
        Route::resource("jurusan", JurusanController::class);
        Route::resource("dosen", DosenController::class);
        Route::resource("dosen-penguji", DosenPengujiController::class);
        Route::resource("dosen-pembimbing", DosenPembimbingController::class);
        Route::resource("mahasiswa", MahasiswaController::class);
        Route::resource("tugas-akhir", TugasAkhirController::class);
        Route::resource("seminar-proposal", SeminarProposalController::class);
        Route::resource("seminar-proposal-nilai", SeminarProposalNilaiController::class);
        Route::resource("seminar-penelitian", SeminarPenelitianController::class);
        Route::resource("seminar-penelitian-nilai", SeminarPenelitianNilaiController::class);
        Route::resource("sidang-akhir", SidangAkhirController::class);
        Route::resource("sidang-akhir-nilai", SidangAkhirNilaiController::class);
});
