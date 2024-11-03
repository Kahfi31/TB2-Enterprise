<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/biodata', function () {
    $data = [
        'name' =>'Kahfi Budianto',
        'age' => 21,
        'NIM' => '41522010148',
        'Alamat' => 'Jl.Kh.Syahdan no 1a',
        'Email' => 'Kahfi032004.kb.kb@gmail.com'
    ];
    return view('biodata', compact('data'));
});

Route::get('/deskripsi', function () {
    return view('deskripsi');
});
