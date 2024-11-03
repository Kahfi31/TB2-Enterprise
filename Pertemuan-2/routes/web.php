<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKahfi; // Tambahkan ini untuk mengimpor controller
// use App\Http\Controllers\ControllerProduk;
use App\Http\Controllers\ProdukPenjualanController;
use App\Http\Controllers\ControllerPenjualan;
use App\Http\Controllers\ControllerLaporan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penjualan', [ControllerPenjualan::class, 'TampilPenjualan']);

Route::get('/laporan', [ControllerLaporan::class, 'TampilLaporan']);

Route::get('/contoh', [ControllerKahfi::class, 'TampilContoh']);

Route::get('/produk', [ProdukPenjualanController::class, 'TampilPenjualan']);
Route::get('/produk/add', [ProdukPenjualanController::class, 'TambahProduk']);
Route::post('/produk/add', [ProdukPenjualanController::class, 'BuatProduk']);
Route::delete('/produk/delete/{kode_produk}', [ProdukPenjualanController::class, 'HapusProduk']);
Route::get('/produk/edit/{kode_produk}', [ProdukPenjualanController::class, 'TampilanEdit']);
Route::put('/produk/edit/{kode_produk}', [ProdukPenjualanController::class, 'UpdateProduk']);

//Route::get ('produk', function() {
    //return view('produk');
//});
