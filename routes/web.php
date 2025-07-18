<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

// Rute publik
Route::get('/', function () {
    return view('welcome');
});

// Rute yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    // Resources lainnya
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('users', UserController::class);
});

// Rute autentikasi
require __DIR__.'/auth.php';