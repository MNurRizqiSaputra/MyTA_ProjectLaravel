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
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix("dashboard")
    ->middleware('auth')
    ->group(function () {
        Route::get("/overview", [DashboardController::class, "index"])->name("dashboard");

        Route::prefix('role')->name('role.')->group(function(){
            Route::get('', [RoleController::class, 'index'])->name('index'); // all users
        });

        Route::prefix('user')->name('user.')->group(function(){
            Route::get('', [UserController::class, 'index'])->name('index')->middleware('admin'); // all users
            Route::get('create', [UserController::class, 'create'])->name('create')->middleware('admin'); // admin
            Route::post('store', [UserController::class, 'store'])->name('store')->middleware('admin'); // admin
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit')->middleware('admin'); //admin
            Route::put('update/{id}', [UserController::class, 'update'])->name('update')->middleware('admin'); //admin
            Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('destroy')->middleware('admin'); // admin
        });

        Route::prefix('jurusan')->name('jurusan.')->group(function(){
            Route::get('', [JurusanController::class, 'index'])->name('index')->middleware('admin'); // all admin
        });

        Route::prefix('dosen')->name('dosen.')->group(function(){
            Route::get('', [DosenController::class, 'index'])->name('index')->middleware('admin'); //admin
            Route::get('{dosen}', [DosenController::class, 'show'])->name('show')->middleware('adminOrDosen'); // admin, dosen
            Route::put('{dosen}', [DosenController::class, 'update'])->name('update')->middleware('adminOrDosen'); // admin, dosen
        });

        Route::prefix('dosen-penguji')->name('dosen-penguji.')->group(function(){
            Route::get('', [DosenPengujiController::class, 'index'])->name('index'); // all users
            Route::get('create', [DosenPengujiController::class, 'create'])->name('create')->middleware('admin'); // admin
            Route::post('store', [DosenPengujiController::class, 'store'])->name('store')->middleware('admin'); // admin
        });

        Route::prefix('dosen-pembimbing')->name('dosen-pembimbing.')->group(function(){
            Route::get('', [DosenPembimbingController::class, 'index'])->name('index'); // all users
            Route::get('create', [DosenPembimbingController::class, 'create'])->name('create')->middleware('admin'); // admin
            Route::post('store', [DosenPembimbingController::class, 'store'])->name('store')->middleware('admin'); // admin
        });

        Route::prefix('mahasiswa')->name('mahasiswa.')->group(function(){
            Route::get('', [MahasiswaController::class, 'index'])->name('index')->middleware('admin'); // admin
            Route::get('{mahasiswa}', [MahasiswaController::class, 'show'])->name('show')->middleware('adminOrMahasiswa'); // admin, mahasiswa
            Route::put('{mahasiswa}', [MahasiswaController::class, 'update'])->name('update')->middleware('adminOrMahasiswa'); // admin, mahasiswa
        });

        Route::prefix('tugas-akhir')->name('tugas-akhir.')->group(function(){
            Route::get('', [TugasAkhirController::class, 'index'])->name('index'); // all users
            Route::get('create', [TugasAkhirController::class, 'create'])->name('create')->middleware('adminOrMahasiswa'); // admin, mahasiswa
            Route::post('store', [TugasAkhirController::class, 'store'])->name('store')->middleware('adminOrMahasiswa'); // admin, mahasiswa
            Route::get('{tugasAkhir}', [TugasAkhirController::class, 'show'])->name('show'); // admin, mahasiswa
            Route::put('{tugasAkhir}', [TugasAkhirController::class, 'update'])->name('update'); // admin, mahasiswa
        });

        Route::prefix('seminar-proposal')->name('seminar-proposal.')->group(function(){
            Route::get('', [SeminarProposalController::class, 'index'])->name('index')->middleware('adminOrDosen'); //
            Route::get('detail/{seminarProposal}', [SeminarProposalController::class, 'show'])->name('show'); //
            Route::get('create', [SeminarProposalController::class, 'create'])->name('create')->middleware('mahasiswa'); //
            Route::post('store', [SeminarProposalController::class, 'store'])->name('store'); //
            Route::get('edit/{seminarProposal}', [SeminarProposalController::class, 'edit'])->name('edit'); //
            Route::put('{seminarProposal}', [SeminarProposalController::class, 'update'])->name('update'); //
            Route::get('detail/{seminarProposal}/nilai', [SeminarProposalController::class, 'nilai'])->name('nilai'); //
        });

        Route::prefix('seminar-proposal-nilai')->name('seminar-proposal-nilai.')->group(function(){
            Route::get('', [SeminarProposalNilaiController::class, 'index'])->name('index'); // all users
        });

        Route::prefix('seminar-penelitian')->name('seminar-penelitian.')->group(function(){
            Route::get('', [SeminarPenelitianController::class, 'index'])->name('index'); // all users
            Route::get('detail/{seminarPenelitian}', [SeminarPenelitianController::class, 'show'])->name('show'); //
            Route::get('create', [SeminarPenelitianController::class, 'create'])->name('create')->middleware('mahasiswa'); //
            Route::post('store', [SeminarPenelitianController::class, 'store'])->name('store'); //
            Route::get('edit/{seminarPenelitian}', [SeminarPenelitianController::class, 'edit'])->name('edit'); //
            Route::put('{seminarPenelitian}', [SeminarPenelitianController::class, 'update'])->name('update'); //
            Route::get('detail/{seminarPenelitian}/nilai', [SeminarPenelitianController::class, 'nilai'])->name('nilai'); //
        });

        Route::prefix('seminar-penelitian-nilai')->name('seminar-penelitian-nilai.')->group(function(){
            Route::get('', [SeminarPenelitianNilaiController::class, 'index'])->name('index'); // all users
        });

        Route::prefix('sidang-akhir')->name('sidang-akhir.')->group(function(){
            Route::get('', [SidangAkhirController::class, 'index'])->name('index'); // all users
            Route::get('detail/{sidangAkhir}', [SidangAkhirController::class, 'show'])->name('show'); //
            Route::get('create', [SidangAkhirController::class, 'create'])->name('create')->middleware('mahasiswa'); //
            Route::post('store', [SidangAkhirController::class, 'store'])->name('store'); //
            Route::get('edit/{sidangAkhir}', [SidangAkhirController::class, 'edit'])->name('edit'); //
            Route::put('{sidangAkhir}', [SidangAkhirController::class, 'update'])->name('update'); //
            Route::get('detail/{sidangAkhir}/nilai', [SidangAkhirController::class, 'nilai'])->name('nilai'); //
        });

        Route::prefix('sidang-akhir-nilai')->name('sidang-akhir-nilai.')->group(function(){
            Route::get('', [SidangAkhirNilaiController::class, 'index'])->name('index'); // all users
        });
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
