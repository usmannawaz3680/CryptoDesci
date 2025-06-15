<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/nft-home', [WebController::class, 'nftHome'])->name('nft.home');

// User Dashboard
Route::get('/dashboard', [WebController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('user.dashboard');

// Admin Dashboard (Filament or Custom)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [WebController::class, 'admin'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
