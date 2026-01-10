<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route untuk menampilkan form login (GET)
// Route::get('/', function () {
//     return view('layouts.home');
// });
// ->name('login');

// Route untuk proses login (POST) - gunakan path /login untuk konsistensi
// Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');

// Route untuk logout (POST)
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group untuk route yang butuh autentikasi
// Route::middleware('auth')->group(function () {
    // Route utama (/) - akan redirect ke login jika belum auth
    // Route::get('/', [ProdukController::class, 'index']);

    // Route lainnya
Route::get('/', [ProdukController::class, 'index'])->name('home');
Route::get('/menu', [ProdukController::class, 'index'])->name('menu.index');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/data', function () {
    return response()->json(session('cart', []));
});

use App\Http\Controllers\CheckoutController;

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('checkout.callback');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::post('/checkout/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');
// });
