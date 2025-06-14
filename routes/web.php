<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/nft-home', [WebController::class, 'nftHome'])->name('nft.home');
Route::get('/dashboard', [WebController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('user.dashboard');

// testing route
Route::get('/admin/dashboard-test', [WebController::class, 'admin'])->name('admin.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
