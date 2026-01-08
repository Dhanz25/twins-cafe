<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.login');
});

Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/home', [ProdukController::class, 'index'])->name('home')->middleware('auth');
// Route::get('/', [ProdukController::class, 'index']);
