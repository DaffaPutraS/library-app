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

// Group route yang butuh autentikasi
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Books routes - for all authenticated users
    Route::resource('books', BookController::class);

    // Categories and Loans routes - for librarians and admins only
    Route::middleware('role:librarian,admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('loans', LoanController::class);
    });

    // Users routes - for admins only
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });
});

require __DIR__.'/auth.php';