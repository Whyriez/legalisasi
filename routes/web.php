<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'cek_login:admin'], function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('data_bukti', [AdminController::class, 'legalisasi'])->name('data_bukti');
        Route::get('data_nbukti', [AdminController::class, 'legalisasi_nbukti'])->name('data_nbukti');
        Route::get('data/show', [AdminController::class, 'lihat_bukti'])->name('data/show');
        Route::put('data/konfirmasi', [AdminController::class, 'update_konfirmasi'])->name('data/konfirmasi');
        Route::get('profile', [AdminController::class, 'lihat_profile'])->name('profile');
        Route::put('profile/update', [AdminController::class, 'update_profile'])->name('profile/update');
        Route::get('profile/hapus/{id}', [AdminController::class, 'hapus_profile'])->name('profile/hapus/{id}');
        Route::get('pengaturan', [AdminController::class, 'view_pengaturan'])->name('pengaturan');
        Route::get('getHarga', [AdminController::class, 'view_getHarga'])->name('getHarga');
        Route::put('pengaturan/updateHarga', [AdminController::class, 'update_harga'])->name('pengaturan/updateHarga');
        Route::put('pengaturan/updateAlamat', [AdminController::class, 'update_alamat'])->name('pengaturan/updateAlamat');
    });
});
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'cek_login:user'], function () {
        Route::get('home', [UserController::class, 'index'])->name('home');
        Route::get('legalisasi', [UserController::class, 'legalisasi_user'])->name('legalisasi');
        Route::get('tambah_legalisasi', [UserController::class, 'tambah_legalisasi_user'])->name('tambah_legalisasi');
        Route::post('tambah_legalisasi/simpan', [UserController::class, 'simpan'])->name('tambah_legalisasi/simpan');
        Route::put('legalisasi/upload', [UserController::class, 'upload_konfirmasi'])->name('legalisasi/upload');
        Route::get('legalisasi/show', [UserController::class, 'lihat_bukti'])->name('legalisasi/show');
        Route::get('myprofile', [UserController::class, 'lihat_profile'])->name('myprofile');
        Route::put('myprofile/update', [UserController::class, 'update_profile'])->name('myprofile/update');
        Route::get('myprofile/hapus/{id}', [UserController::class, 'hapus_profile'])->name('myprofile/hapus/{id}');
    });
});
