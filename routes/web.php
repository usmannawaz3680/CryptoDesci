<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/nft-home', [WebController::class, 'nftHome'])->name('web.nft.home');
Route::get('/copy-trading', [WebController::class, 'copyTrading'])->name('web.copytrading');
Route::get('/trading-bots', [WebController::class, 'tradingBots'])->name('web.tradingbots');
Route::get('/earn/overview', [WebController::class, 'earnOverview'])->name('web.earn.overview');
// route('web.earn.overview')
// User Dashboard
Route::get('/dashboard', [WebController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    });
});


require __DIR__ . '/auth.php';
