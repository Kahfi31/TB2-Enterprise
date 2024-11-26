<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKahfi; // Tambahkan ini untuk mengimpor controller
// use App\Http\Controllers\ControllerProduk;
use App\Http\Controllers\ProdukPenjualanController;
use App\Http\Controllers\ControllerPenjualan;
use App\Http\Controllers\ControllerLaporan;
use App\Http\Controllers\ControllerAutentikasi;
use App\Http\Middleware\UserAccessMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/penjualan', [ControllerPenjualan::class, 'TampilPenjualan']);

// Route::get('/laporan', [ControllerLaporan::class, 'TampilLaporan']);

//Route untuk user
Route::middleware(['auth', 'user-access:user'])->prefix('user')->group(function () {
    Route::get('/contoh', [ControllerKahfi::class, 'TampilContoh']);
    Route::get('/produk', [ProdukPenjualanController::class, 'TampilPenjualan']);
    Route::get('/produk/add', [ProdukPenjualanController::class, 'TambahProduk']);
    Route::post('/produk/add', [ProdukPenjualanController::class, 'BuatProduk']);

    Route::delete('/produk/delete/{kode_produk}', [ProdukPenjualanController::class, 'HapusProduk']);
    Route::get('/produk/edit/{kode_produk}', [ProdukPenjualanController::class, 'TampilanEdit']);
    Route::put('/produk/edit/{kode_produk}', [ProdukPenjualanController::class, 'UpdateProduk']);

    Route::get('/laporan', [ProdukPenjualanController::class, 'TampilLaporan']);
    Route::get('/report', [ProdukPenjualanController::class, 'print']);
});

//Route untuk admin
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/contoh', [ControllerKahfi::class, 'TampilContoh']);
    Route::get('/produk', [ProdukPenjualanController::class, 'TampilPenjualan']);
    Route::get('/produk/add', [ProdukPenjualanController::class, 'TambahProduk']);
    Route::post('/produk/add', [ProdukPenjualanController::class, 'BuatProduk']);

    Route::delete('/produk/delete/{kode_produk}', [ProdukPenjualanController::class, 'HapusProduk']);
    Route::get('/produk/edit/{kode_produk}', [ProdukPenjualanController::class, 'TampilanEdit']);
    Route::put('/produk/edit/{kode_produk}', [ProdukPenjualanController::class, 'UpdateProduk']);

    Route::get('/laporan', [ProdukPenjualanController::class, 'TampilLaporan']);
    Route::get('/report', [ProdukPenjualanController::class, 'print']);
});

//Route::get ('produk', function() {
    //return view('produk');
//});

Route::get('/login', [ControllerAutentikasi::class, 'showLoginForm']);
Route::post('/login', [ControllerAutentikasi::class, 'login']);

Route::get('/register', [ControllerAutentikasi::class, 'showRegisterForm']);
Route::post('/register', [ControllerAutentikasi::class, 'register']);

Route::post('/logout', [ControllerAutentikasi::class, 'logout']);
