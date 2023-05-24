<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DosenController;
use App\Http\Controllers\Dashboard\DosenPengujiController;
use App\Http\Controllers\Dashboard\JurusanController;
use App\Http\Controllers\Dashboard\MahasiswaController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\DosenPembimbingController;
use App\Http\Controllers\Dashboard\SeminarPenelitianController;
use App\Http\Controllers\Dashboard\SeminarPenelitianNilaiController;
use App\Http\Controllers\Dashboard\SeminarProposalController;
use App\Http\Controllers\Dashboard\SeminarProposalNilaiController;
use App\Http\Controllers\Dashboard\SidangAkhirController;
use App\Http\Controllers\Dashboard\SidangAkhirNilaiController;
use App\Http\Controllers\Dashboard\TugasAkhirController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix("dashboard")
    ->group(function () {
        Route::get("/", [DashboardController::class, "index"])->name(
            "dashboard"
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
