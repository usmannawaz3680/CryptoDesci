<?php

namespace App\Http\Controllers;

use App\Models\ArbitrageBot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AssetCoin;
use App\Models\CopyTrader;

class WebController extends Controller
{
    public function index()
    {
        return view('web.pages.home');
    }

    public function markets()
    {
        return view('web.pages.markets.index');
    }
    public function dashboard()
    {
        $wallets = Auth::user()->wallets;
        $holdings = $wallets->map(function ($wallet) {
            return [
                'coin' => $wallet->coin,
                'balance' => $wallet->balance,
            ];
        })->filter(function ($holding) {
            return $holding['balance'] > 0;
        });
        return view('web.pages.UserDashboard.dashboard', [
            'wallets' => $wallets,
            'holdings' => $holdings,
        ]);
    }
    public function nftHome()
    {
        return view('web.pages.nft.index');
    }
    public function copyTrading()
    {
        $copyTraders = CopyTrader::where('status', 'active')->orderBy('trades', 'desc')->get();
        return view('web.pages.copyTrading.index', compact('copyTraders'));
    }
    public function copyTraderProfile($username)
    {
        $trader = CopyTrader::where('username', $username)->firstOrFail();
        if ($trader->status !== 'active') {
            abort(404);
        }
        $trader->load('feeProfitRanges');

        // Example Position History (or use $trader->position_history if available)
        $positionHistory = $trader->position_history ?? [
            [
                'symbol' => 'ETHUSDT',
                'type' => 'Perp',
                'side' => 'Cross Long',
                'status' => 'Closed',
                'opened' => '2025-08-11 19:40:29',
                'entry_price' => '4,290.69 USDT',
                'avg_close_price' => '4,271.00 USDT',
                'max_open_interest' => '11.553 ETH',
                'closed_vol' => '11.553 ETH',
                'closing_pnl' => '-227.43 USDT',
                'closed_at' => '2025-08-11 19:49:18',
            ],
            [
                'symbol' => 'ETHUSDT',
                'type' => 'Perp',
                'side' => 'Cross Long',
                'status' => 'Closed',
                'opened' => '2025-08-11 18:52:23',
                'entry_price' => '4,268.08 USDT',
                'avg_close_price' => '4,280.37 USDT',
                'max_open_interest' => '10.574 ETH',
                'closed_vol' => '10.574 ETH',
                'closing_pnl' => '+129.95 USDT',
                'closed_at' => '2025-08-11 19:00:44',
            ],
        ];

        // Example Latest Records
        $latestRecords = [
            ['date' => '2025-08-11', 'action' => 'Closed Position', 'details' => 'ETHUSDT Long', 'pnl' => '+129.95 USDT'],
            ['date' => '2025-08-11', 'action' => 'Closed Position', 'details' => 'ETHUSDT Short', 'pnl' => '+299.58 USDT'],
        ];

        // Example Transfer History
        $transferHistory = [
            ['time' => '2025-08-10 17:40:27', 'coin' => 'USDT', 'amount' => '10,000.00000000', 'from' => 'Fiat and Spot', 'to' => 'Lead Trading'],
            ['time' => '2025-08-10 11:05:55', 'coin' => 'BNB', 'amount' => '0.14888825', 'from' => 'Fiat and Spot', 'to' => 'Lead Trading'],
        ];

        // Example Copy Traders
        $copyTraders = [
            ['user_id' => 'Tra********uto', 'margin_balance' => '158,031.58 USDT', 'total_pnl' => '+8,031.58 USDT', 'total_roi' => '+5.35%', 'duration' => '1 Days'],
            ['user_id' => 'Use****efc', 'margin_balance' => '5,409.61 USDT', 'total_pnl' => '+2,652.23 USDT', 'total_roi' => '+115.78%', 'duration' => '9 Days'],
        ];

        return view('web.pages.copyTrading.detail', compact('trader', 'positionHistory', 'latestRecords', 'transferHistory', 'copyTraders'));
    }
    public function tradingBots()
    {
        return view('web.pages.tradingBots.index');
    }
    public function earnOverview()
    {
        return view('web.pages.earn.overview');
    }
    public function arbitrageBots()
    {
        $bots = ArbitrageBot::with(['intervals', 'fees', 'tradingPair'])->where('is_active', 1)->get();
        return view('web.pages.tradingBots.arbitrage', compact('bots'));
    }
    public function arbitrageBotsDetail($id)
    {
        $bots = ArbitrageBot::with(['intervals', 'fees', 'tradingPair', 'exchange_from', 'exchange_to'])->where('is_active', 1)->get();
        $bot = $bots->where('id', $id)->first();
        // dd($bot);
        return view('web.pages.tradingBots.arbitrage-detail', compact('bot', 'bots'));
    }
    public function nftProfile()
    {
        return view('web.pages.nft.profile');
    }
    public function nftCollection()
    {
        return view('web.pages.nft.show');
    }
    public function deposit()
    {
        $assets = AssetCoin::where('is_active', true)->get();
        return view('web.pages.UserDashboard.deposit', [
            'assets' => $assets,
        ]);
    }
    public function assets()
    {
        $wallets = Auth::user()->wallets()->with('coin')->get();
        $assets = AssetCoin::where('is_active', true)->get();

        return view('web.pages.UserDashboard.assets', [
            'wallets' => $wallets,
            'assets' => $assets,
        ]);
    }
    public function withdrawls()
    {
        $coins = AssetCoin::where('is_active', true)->get();
        $withdrawls = Auth::user()->withdrawls()->with('coin')->get();
        // $wallets = Wallet::where('user_id', Auth::user()->id)->get();
        $wallets = auth()->user()->wallets()->pluck('balance', 'asset_coin_id')->toArray();
        return view('web.pages.UserDashboard.withdrawls', [
            'withdrawls' => $withdrawls,
            'wallets' => $wallets,
            'coins' => $coins,
        ]);
    }
}
