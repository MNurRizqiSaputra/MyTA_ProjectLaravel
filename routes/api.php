<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DosenController;
use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth API
Route::name('auth.')->group(function(){
    Route::post('login', [UserController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('fetch', [UserController::class, 'fetch'])->name('fetch');
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
    });
});

// User API
Route::prefix('user')->middleware('auth:sanctum')->name('user.')->group(function(){
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('{id}', [UserController::class, 'show'])->name('show');
    Route::post('', [UserController::class, 'store'])->name('store');
    Route::put('{id}', [UserController::class, 'update'])->name('update');
    Route::delete('{id}', [UserController::class, 'destroy'])->name('delete');
});

// Role API
Route::prefix('role')->middleware('auth:sanctum')->name('role.')->group(function(){
    Route::get('', [RoleController::class, 'index'])->name('index');
    Route::get('{id}', [RoleController::class, 'show'])->name('show');
    Route::post('', [RoleController::class, 'store'])->name('store');
    Route::put('{id}', [RoleController::class, 'update'])->name('update');
    Route::delete('{id}', [RoleController::class, 'destroy'])->name('destroy');
});

//  Jurusan API
Route::prefix('jurusan')->middleware('auth:sanctum')->name('jurusan.')->group(function(){
    Route::get('', [JurusanController::class, 'index'])->name('index');
    Route::get('{id}', [JurusanController::class, 'show'])->name('show');
    Route::post('', [JurusanController::class, 'store'])->name('store');
    Route::put('{id}', [JurusanController::class, 'update'])->name('update');
    Route::delete('{id}', [JurusanController::class, 'destroy'])->name('destroy');
});

// Dosen API
Route::prefix('dosen')->middleware('auth:sanctum')->name('dosen.')->group(function(){
    Route::get('', [DosenController::class, 'index'])->name('index');
    Route::get('{id}', [DosenController::class, 'show'])->name('show');
    Route::post('update/{id}', [DosenController::class, 'update'])->name('update');
    Route::delete('{id}', [DosenController::class, 'destroy'])->name('destroy');
});

// Mahasiswa API
Route::prefix('mahasiswa')->middleware('auth:sanctum')->name('mahasiswa.')->group(function(){
    Route::get('', [MahasiswaController::class, 'index'])->name('index');
    Route::get('{id}', [MahasiswaController::class, 'show'])->name('show');
    Route::post('update/{id}', [MahasiswaController::class, 'update'])->name('update');
    Route::delete('{id}', [MahasiswaController::class, 'destroy'])->name('destroy');
});


