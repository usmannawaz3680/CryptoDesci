<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.pages.home');
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
    public function admin()
    {
        return view('admin.pages.home');
    }
}
