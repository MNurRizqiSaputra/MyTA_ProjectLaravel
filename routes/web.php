<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenPengujiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenPembimbingController;
use App\Http\Controllers\SeminarPenelitianController;
use App\Http\Controllers\SeminarPenelitianNilaiController;
use App\Http\Controllers\SeminarProposalController;
use App\Http\Controllers\SeminarProposalNilaiController;
use App\Http\Controllers\SidangAkhirController;
use App\Http\Controllers\SidangAkhirNilaiController;
use App\Http\Controllers\TugasAkhirController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function(){
    Route::get('', [UserController::class, 'index'])->name('index');
});

Route::prefix('role')->name('role.')->group(function(){
    Route::get('', [RoleController::class, 'index'])->name('index');
});

Route::prefix('jurusan')->name('jurusan.')->group(function(){
    Route::get('', [JurusanController::class, 'index'])->name('index');
});

Route::prefix('dosen')->name('dosen.')->group(function(){
    Route::get('', [DosenController::class, 'index'])->name('index');
});

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function(){
    Route::get('', [MahasiswaController::class, 'index'])->name('index');
});

Route::prefix('dosen-penguji')->name('dosen-penguji.')->group(function(){
    Route::get('', [DosenPengujiController::class, 'index'])->name('index');
});

Route::prefix('dosen-pembimbing')->name('dosen-pembimbing.')->group(function(){
    Route::get('', [DosenPembimbingController::class, 'index'])->name('index');
});

Route::prefix('tugas-akhir')->name('tugas-akhir.')->group(function(){
    Route::get('', [TugasAkhirController::class, 'index'])->name('index');
});

Route::prefix('seminar-proposal')->name('seminar-proposal.')->group(function(){
    Route::get('', [SeminarProposalController::class, 'index'])->name('index');
});

Route::prefix('seminar-proposal-nilai')->name('seminar-proposal-nilai.')->group(function(){
    Route::get('', [SeminarProposalNilaiController::class, 'index'])->name('index');
});

Route::prefix('seminar-penelitian')->name('seminar-penelitian.')->group(function(){
    Route::get('', [SeminarPenelitianController::class, 'index'])->name('index');
});

Route::prefix('seminar-penelitian-nilai')->name('seminar-penelitian-nilai.')->group(function(){
    Route::get('', [SeminarPenelitianNilaiController::class, 'index'])->name('index');
});

Route::prefix('sidang-akhir')->name('sidang-akhir.')->group(function(){
    Route::get('', [SidangAkhirController::class, 'index'])->name('index');
});

Route::prefix('sidang-akhir-nilai')->name('sidang-akhir-nilai.')->group(function(){
    Route::get('', [SidangAkhirNilaiController::class, 'index'])->name('index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
