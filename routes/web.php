<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.login');
});
Route::get('/', [ProdukController::class, 'index']);

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');




Route::get('/cart/data', function () {
    return response()->json(session('cart', []));
});

