<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawlController;
use App\Http\Controllers\Admin\DepositController as AdminDepositController;
use App\Http\Controllers\Admin\WithdrawalController as AdminWithdrawalController;
use App\Http\Controllers\Admin\ExchangeController;
use App\Http\Controllers\Admin\TradingPairController;
use App\Http\Controllers\Admin\ArbitrageController;
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
    Route::post('/notifications/{id}/read', function ($id) {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return response()->json(['success' => true]);
    })->name('notifications.read');
    Route::get('/deposit', [WebController::class, 'deposit'])->name('deposit');
    Route::post('/deposit/submit', [DepositController::class, 'submit'])->name('user.deposit.submit');
    Route::get('/dashboard/withdrawls', [WebController::class, 'withdrawls'])->name('user.withdrawls');
    Route::post('/withdraw/submit', [WithdrawlController::class, 'submit'])->name('user.withdraw.submit');
    Route::get('dashboard/assets', [WebController::class, 'assets'])->name('user.assets');
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
        Route::get('/deposits', [AdminDepositController::class, 'index'])->name('admin.deposits');
        Route::get('/deposits/{id}', [AdminDepositController::class, 'show'])->name('admin.deposits.show');
        Route::post('/deposits/{id}/approve', [AdminDepositController::class, 'approve'])->name('admin.deposits.approve');
        Route::post('/deposits/{id}/reject', [AdminDepositController::class, 'reject'])->name('admin.deposits.reject');
        Route::get('/notifications/markAsRead', [AdminAuthController::class, 'markNotificationsAsRead'])->name('notifications.markAsRead');
        Route::get('/withdrawals', [AdminWithdrawalController::class, 'index'])->name('withdrawals.index');
        Route::post('/withdrawals/{withdrawal}/approve', [AdminWithdrawalController::class, 'approve'])->name('withdrawals.approve');
        Route::post('/withdrawals/{withdrawal}/reject', [AdminWithdrawalController::class, 'reject'])->name('withdrawals.reject');
        Route::get('/exchanges', [ExchangeController::class, 'index'])->name('admin.exchanges.index');
        Route::get('/pairs', [TradingPairController::class, 'index'])->name('admin.pairs.index');
        Route::get('/arbitrage-bots/create', [ArbitrageController::class, 'create'])->name('admin.arbitrage.create');
        Route::get('/arbitrage-bots', [ArbitrageController::class, 'index'])->name('admin.arbitrage.index');
    });
});


require __DIR__ . '/auth.php';
