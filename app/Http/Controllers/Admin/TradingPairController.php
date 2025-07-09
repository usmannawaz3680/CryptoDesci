<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TradingPair;

class TradingPairController extends Controller
{
    public function index()
    {
        $pairs = TradingPair::with('exchange')->latest()->paginate(20);
        return view('admin.pages.pairs.index', compact('pairs'));
    }
}