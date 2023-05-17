<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;//Panggil Controller yang telah dibuat sebelumnya
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return 'Selamat Pagi';
}); //Routing memanggil dirinya sendiri

Route::get('/ucapan', function () {
    return view('ucapan');
}); //Routing untuk mwngarahkan ke view yang ada di folder

Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/daftar_nilai', function () {
    return view('daftar_nilai');
});

//Menggunakan Routing ke Controller
Route::get(
    '/siswa',
    [SiswaController::class,'dataSiswa']
    );

Route::get('/dashboard',[DashboardController::class,'index'])->name('index');
