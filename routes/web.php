<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Models\Transaksi;
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
Route::get('/', function () {
    return view('layouts.admin.index');
})->name('admin.index');

// Route lainnya
Route::get('/admin/produk', [ProdukController::class, 'adminIndex'])->name('admin.produk');
Route::get('/admin/produk/{id}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
Route::put('/admin/produk/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');
Route::post('/admin/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
// Route untuk halaman transaksi di admin
Route::get('/admin/transaksi', function () {
    // load transaksi with details (no pelanggan)
    $transaksis = Transaksi::with('detail')->orderBy('id_transaksi', 'desc')->get();
    return view('layouts.admin.transaksi', compact('transaksis'));
})->name('admin.transaksi');

// Route to return invoice detail HTML for a transaksi (used by modal)
Route::get('/admin/transaksi/{id}', function ($id) {
    $transaksi = Transaksi::with('detail.produk')->findOrFail($id);
    return view('layouts.admin.transaksi_invoice', compact('transaksi'));
})->name('admin.transaksi.show');


// Route::get('/', [ProdukController::class, 'index'])->name('home');
// Route::get('/menu', [ProdukController::class, 'index'])->name('menu.index');

// Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
// Route::get('/cart/data', function () {
//     return response()->json(session('cart', []));
// });

// use App\Http\Controllers\CheckoutController;

// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
// Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
// Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('checkout.callback');
// Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
// Route::post('/checkout/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');
// });
