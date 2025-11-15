<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ArbitrageSubscriptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawlController;
use App\Http\Controllers\Admin\DepositController as AdminDepositController;
use App\Http\Controllers\Admin\WithdrawalController as AdminWithdrawalController;
use App\Http\Controllers\Admin\ExchangeController;
use App\Http\Controllers\Admin\TradingPairController;
use App\Http\Controllers\Admin\ArbitrageController;
use App\Http\Controllers\Admin\CopyTraderController as AdminCopyTraderController;
use App\Http\Controllers\UserCopyTraderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/markets', [WebController::class, 'markets'])->name('web.markets');
Route::get('/nft-home', [WebController::class, 'nftHome'])->name('web.nft.home');
Route::get('/nft/profile', [WebController::class, 'nftProfile'])->name('web.nft.profile');
Route::get('/nft/collection', [WebController::class, 'nftCollection'])->name('web.nft.collection');
Route::get('/copy-trading', [WebController::class, 'copyTrading'])->name('web.copytrading');
Route::get('/copy-trading/trader/{username}', [WebController::class, 'copyTraderProfile'])->name('web.copytrading.detail');
Route::get('copy-trader/{username}/invest', [UserCopyTraderController::class, 'create'])->name('web.copytrading.create');
Route::post('copy-trader/{id}/invest', [UserCopyTraderController::class, 'invest'])->name('web.copytrading.invest');
Route::get('/trading-bots', [WebController::class, 'tradingBots'])->name('web.tradingbots');
Route::get('/arbitrage-bots', [WebController::class, 'arbitrageBots'])->name('web.arbitragebots');
Route::get('/arbitrage-bots/{id}', [WebController::class, 'arbitrageBotsDetail'])->name('web.arbitragebots.detail');
Route::post('/arbitrage-subscriptions', [ArbitrageSubscriptionController::class, 'store'])->name('arbitrage.subscription.store');
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
        Route::get('/arbitrage-bots/subscription', [ArbitrageController::class, 'subscriptions'])->name('admin.arbitrage.subscriptions');
        Route::post('/arbitrage-bots', [ArbitrageController::class, 'store'])->name('admin.arbitrage-bots.store');
        Route::get('/arbitrage-bots/{id}/configure', [ArbitrageController::class, 'configure'])->name('admin.arbitrage.configure');
        Route::post('/arbitrage-bots/{id}/save-fees', [ArbitrageController::class, 'saveFees'])->name('admin.arbitrage-bots.saveFees');
        Route::post('/arbitrage-bots/{id}/save-interval', [ArbitrageController::class, 'saveInterval'])->name('admin.arbitrage-bots.saveInterval');
        Route::resource('copy-traders', AdminCopyTraderController::class);
        Route::get('copy-traders/{copyTrader}/fee-profit-ranges/create', [AdminCopyTraderController::class, 'createFeeProfitRange'])->name('admin.copy-traders.create-fee-profit-range');
        Route::post('copy-traders/{copyTrader}/fee-profit-ranges', [AdminCopyTraderController::class, 'storeFeeProfitRange'])->name('admin.copy-traders.store-fee-profit-range');
        Route::delete('copy-traders/fee-profit-ranges/{feeProfit}', [AdminCopyTraderController::class, 'deleteFeeProfitRange'])->name('admin.copy-traders.delete-fee-profit-range');

        // Copy trading subscriptions management
        Route::get('/copy-trading/subscriptions', [\App\Http\Controllers\Admin\CopyTradeSubscriptionController::class, 'index'])->name('admin.copytrade-subscriptions.index');
        Route::get('/copy-trading/subscriptions/export', [\App\Http\Controllers\Admin\CopyTradeSubscriptionController::class, 'export'])->name('admin.copytrade-subscriptions.export');
        Route::post('/copy-trading/subscriptions/{investment}/pause', [\App\Http\Controllers\Admin\CopyTradeSubscriptionController::class, 'pause'])->name('admin.copytrade-subscriptions.pause');
        Route::post('/copy-trading/subscriptions/{investment}/resume', [\App\Http\Controllers\Admin\CopyTradeSubscriptionController::class, 'resume'])->name('admin.copytrade-subscriptions.resume');
        Route::post('/copy-trading/subscriptions/{investment}/terminate', [\App\Http\Controllers\Admin\CopyTradeSubscriptionController::class, 'terminate'])->name('admin.copytrade-subscriptions.terminate');
    });
});


require __DIR__ . '/auth.php';
