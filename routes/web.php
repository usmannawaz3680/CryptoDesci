<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/markets', [WebController::class, 'markets'])->name('web.markets');
Route::get('/nft-home', [WebController::class, 'nftHome'])->name('web.nft.home');
Route::get('/nft/profile', [WebController::class, 'nftProfile'])->name('web.nft.profile');
Route::get('/nft/collection', [WebController::class, 'nftCollection'])->name('web.nft.collection');
Route::get('/copy-trading', [WebController::class, 'copyTrading'])->name('web.copytrading');
Route::get('/trading-bots', [WebController::class, 'tradingBots'])->name('web.tradingbots');
Route::get('/arbitrage-bots', [WebController::class, 'arbitrageBots'])->name('web.arbitragebots');
Route::get('/earn/overview', [WebController::class, 'earnOverview'])->name('web.earn.overview');
Route::get('/markets', [WebController::class, 'markets'])->name('web.markets');
// route('web.earn.overview')
// User Dashboard
Route::get('/dashboard', [WebController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('user.dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/deposit', [WebController::class, 'deposit'])->name('deposit');
    // Route::post('/deposit/submit', [WebController::class, 'depositSubmit'])->name('deposit.submit');
    // Route::get('/withdraw', [WebController::class, 'withdraw'])->name('withdraw');
    // Route::post('/withdraw/submit', [WebController::class, 'withdrawSubmit'])->name('withdraw.submit');
});
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
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    });
});


require __DIR__ . '/auth.php';
