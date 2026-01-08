<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route untuk menampilkan form login (GET)
Route::get('/login', function () {
    return view('layouts.login');
})->name('login');

// Route untuk proses login (POST) - gunakan path /login untuk konsistensi
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');

// Route untuk logout (POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group untuk route yang butuh autentikasi
Route::middleware('auth')->group(function () {
    // Route utama (/) - akan redirect ke login jika belum auth
    Route::get('/', [ProdukController::class, 'index']);
    
    // Route lainnya
    Route::get('/home', [ProdukController::class, 'index'])->name('home');  // Opsional, jika perlu
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/data', function () {
        return response()->json(session('cart', []));
    });
});