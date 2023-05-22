<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth API
Route::name('auth.')->group(function(){
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('register', [UserController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('fetch', [UserController::class, 'fetch'])->name('fetch');
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
    });
});

// User API
Route::prefix('user')->middleware('auth:sanctum')->name('user.')->group(function(){
    Route::get('', [UserController::class, 'all'])->name('all');
    Route::get('{id}', [UserController::class, 'userById'])->name('user-id');
    Route::post('', [UserController::class, 'store'])->name('store');
    Route::put('{id}', [UserController::class, 'update'])->name('update');
    Route::delete('{id}', [UserController::class, 'destroy'])->name('delete');
});

// Role API
Route::prefix('role')->middleware('auth:sanctum')->name('role.')->group(function(){
    Route::get('', [RoleController::class, 'all'])->name('all');
    Route::get('{role}', [RoleController::class, 'getUsersByRole'])->name('users');
    Route::post('', [RoleController::class, 'store'])->name('store');
    Route::put('update/{id}', [RoleController::class, 'update'])->name('update');
    Route::delete('{id}', [RoleController::class, 'destroy'])->name('destroy');
});


//  Jurusan API
Route::prefix('jurusan')->middleware('auth:sanctum')->name('jurusan.')->group(function(){
    Route::get('', [JurusanController::class, 'all'])->name('all');
});
