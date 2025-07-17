<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard, hanya untuk user yang sudah login dan terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Books routes - semua user yang login (admin, librarian, member)
    Route::resource('books', BookController::class);

    // Categories & Loans - hanya librarian & admin
    Route::middleware('role:librarian,admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('loans', LoanController::class);
    });

    // Users - hanya admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });
});