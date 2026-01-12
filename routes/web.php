<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Transaksi;

/*
|--------------------------------------------------------------------------
| USER (PUBLIC) - TANPA LOGIN
|--------------------------------------------------------------------------
*/

// halaman utama user
Route::get('/', [ProdukController::class, 'index'])->name('home');

// menu (pakai controller yang sama, tidak dobel logic)
Route::get('/menu', [ProdukController::class, 'index'])->name('menu.index');

// cart
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');


/*
|--------------------------------------------------------------------------
| AUTH (ADMIN LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('layouts.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN AREA - WAJIB LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('layouts.admin.index');
    })->name('admin.index');

    // produk
    Route::get('/produk', [ProdukController::class, 'adminIndex'])->name('admin.produk');
    Route::post('/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');

    // transaksi
    Route::get('/transaksi', function () {
        $transaksis = Transaksi::with('detail')
            ->orderBy('id_transaksi', 'desc')
            ->get();

        return view('layouts.admin.transaksi', compact('transaksis'));
    })->name('admin.transaksi');

    Route::get('/transaksi/{id}', function ($id) {
        $transaksi = Transaksi::with('detail.produk')->findOrFail($id);

        if (request()->ajax()) {
            return view('layouts.admin.transaksi_invoice_partial', compact('transaksi'));
        }

        return view('layouts.admin.transaksi_invoice', compact('transaksi'));
    })->name('admin.transaksi.show');
});
