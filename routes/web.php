<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\SpesifikasiController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login', 'authentication')->name('login');
})->middleware('guest');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // ROUTE API WILAYAH
    Route::get('/getKabupaten', [AdminController::class, 'getKabupaten'])->name('api-kabupaten');
    Route::get('/getKecamatan', [AdminController::class, 'getKecamatan'])->name('api-kecamatan');
    Route::get('/getDesa', [AdminController::class, 'getDesa'])->name('api-desa');
    Route::get('/getDusun', [AdminController::class, 'getDusun'])->name('api-dusun');

    // ROUTE PERUMAHAN
    Route::controller(PerumahanController::class)->group(function () {
        Route::get('/perumahan', 'index')->name('perumahan');
        Route::get('/tambah-perumahan', 'create')->name('add-perumahan');
        Route::post('/tambah-perumahan', 'store')->name('store-perumahan');
        Route::get('/detail-perumahan/{perumahan:slug}', 'show')->name('detail-perumahan');
        Route::get('/detail-perumahan/{perumahan:slug}/blok-perumahan', 'blok');
        Route::post('/tambah-blok', 'storeBlok')->name('tambah-blok');
        Route::delete('/delete-blok/{id}', 'deleteBlok');
    });

    // ROUTE PENJUALAN
    Route::controller(PenjualanController::class)->group(function () {
        Route::get('/penjualan', 'index');
        Route::get('/api-rumah', 'apirumah')->name('api-rumah');
        Route::post('/penjualan', 'storePenjualan')->name('add-penjualan');
    });


    Route::resource('/spesifikasi', SpesifikasiController::class);
    Route::resource('/blok', BlokController::class);
    Route::resource('/rumah', RumahController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
