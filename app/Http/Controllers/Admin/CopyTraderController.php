<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CopyTrader;
use Illuminate\Support\Facades\DB;

class CopyTraderController extends Controller
{
    public function create()
    {
        return view('admin.pages.copy_traders.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:copy_traders',
            'email' => 'required|email|max:255|unique:copy_traders',
            'bio' => 'nullable|string',
            'risk_level' => 'required|in:low,medium,high',
            'level' => 'required|string|max:255',
            'trading_style' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive,suspended,full',
            'badges' => 'nullable|array',
            'followers' => 'nullable|integer|min:0',
            'copiers' => 'nullable|integer|min:0',
            'trades' => 'required|integer|min:0',
            'win_trades' => 'required|integer|min:0',
            'win_rate' => 'required|numeric|min:0|max:100',
            'total_aum' => 'required|numeric|min:0',
            'roi' => 'required|numeric',
            'pnl' => 'required|numeric',
            'sharp_ratio' => 'required|numeric',
            'mdd' => 'required|numeric',
            'profit_sharing' => 'required|numeric|min:0|max:100',
            'lead_balance' => 'required|numeric|min:0',
            'min_copy_amount' => 'required|numeric|min:0',
            'max_copy_amount' => 'required|numeric|min:0',
            'member_since' => 'nullable|date',
        ]);

        // Handle badges
        $badges = [
            'top_performer' => $request->input('badges.top_performer', 0) == 1,
            'trading_expert' => $request->input('badges.trading_expert', 0) == 1,
            'risk_awareness' => $request->input('badges.risk_awareness', 0) == 1,
        ];

        // Generate random holdings for asset_preferences
        $cryptoList = ['BTC', 'ETH', 'SOL', 'ADA', 'DOT', 'LINK', 'MATIC', 'AVAX', 'LTC', 'XRP'];
        $numHoldings = rand(5, 6);
        $selectedCryptos = array_rand($cryptoList, $numHoldings);
        $weights = array_map(function () {
            return rand(1, 100);
        }, range(1, $numHoldings));
        $sum = array_sum($weights);
        $percentages = array_map(function ($w) use ($sum) {
            return round(($w / $sum) * 100, 2);
        }, $weights);

        $assetPreferences = [];
        foreach ($selectedCryptos as $index => $cryptoIndex) {
            $assetPreferences[$cryptoList[$cryptoIndex]] = $percentages[$index];
        }

        // Create the copy trader
        $copyTrader = new CopyTrader();
        $copyTrader->name = $validated['name'];
        $copyTrader->username = $validated['username'];
        $copyTrader->email = $validated['email'];
        $copyTrader->bio = $validated['bio'];
        $copyTrader->risk_level = $validated['risk_level'];
        $copyTrader->level = $validated['level'];
        $copyTrader->trading_style = $validated['trading_style'];
        $copyTrader->status = $validated['status'];
        $copyTrader->badges = $badges;
        $copyTrader->followers = $validated['followers'] ?? 0;
        $copyTrader->copiers = $validated['copiers'] ?? rand(1001, 3024);
        $copyTrader->trades = $validated['trades'];
        $copyTrader->win_trades = $validated['win_trades'];
        $copyTrader->win_rate = $validated['win_rate'];
        $copyTrader->total_aum = $validated['total_aum'];
        $copyTrader->roi = $validated['roi'];
        $copyTrader->pnl = $validated['pnl'];
        $copyTrader->sharp_ratio = $validated['sharp_ratio'];
        $copyTrader->mdd = $validated['mdd'];
        $copyTrader->profit_sharing = $validated['profit_sharing'];
        $copyTrader->lead_balance = $validated['lead_balance'];
        $copyTrader->min_copy_amount = $validated['min_copy_amount'];
        $copyTrader->max_copy_amount = $validated['max_copy_amount'];
        $copyTrader->member_since = $validated['member_since'] ?? now();
        $copyTrader->asset_preferences = $assetPreferences;
        $copyTrader->position_history = []; // Initially empty
        $copyTrader->save();

        return redirect()->route('copy-traders.index')->with('success', 'Copy Trader created successfully.');
    }
    public function index() {
        $copyTraders = CopyTrader::all();
        return view('admin.pages.copy_traders.index', compact('copyTraders'));
    }
    public function show(CopyTrader $copyTrader) {
        return view('admin.pages.copy_traders.show', compact('copyTrader'));
    }
}
