<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('web.pages.UserDashboard.dashboard');
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
        return view('web.pages.tradingBots.arbitrage');
    }
    public function nftProfile()
    {
        return view('web.pages.nft.profile');
    }
    public function nftCollection()
    {
        return view('web.pages.nft.show');
    }
}
