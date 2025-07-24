<?php

namespace App\Http\Controllers;

use App\Models\ArbitrageBot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\AssetCoin;

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
        return view('web.pages.copyTrading.index');
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
        $bots = ArbitrageBot::with(['intervals', 'fees', 'tradingPair', 'exchange_from.pair', 'exchange_to.pair'])->where('is_active', 1)->get();
        $bot = $bots->where('id', $id)->first();
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
