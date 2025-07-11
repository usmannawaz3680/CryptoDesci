<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use App\Models\TradingPair;
use Illuminate\Http\Request;

class ArbitrageController extends Controller
{
    public function create()
    {
        $tradingPairs = TradingPair::where('exchange_id', 1)->get();
        $exchanges = Exchange::all();
        return view('admin.pages.arbitrage.create', compact('tradingPairs', 'exchanges'));
    }
}
