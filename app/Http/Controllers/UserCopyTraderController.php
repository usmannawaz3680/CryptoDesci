<?php

namespace App\Http\Controllers;

use App\Services\CopyTradingService;
use App\Models\CopyTrader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCopyTraderController extends Controller
{
    protected $copyTradingService;

    public function __construct(CopyTradingService $copyTradingService)
    {
        $this->copyTradingService = $copyTradingService;
    }

    public function create($username)
    {
        $trader = CopyTrader::where('username', $username)->firstOrFail();
        return view('web.pages.copyTrading.create', compact('trader'));
    }

    public function invest(Request $request, $id)
    {
        $trader = CopyTrader::findOrFail($id);
        $userId = Auth::id();

        $request->validate([
            'investment_amount' => 'required|numeric|min:0',
            'period_days' => 'required|in:7,10,30',
            'terms' => 'required|accepted',
        ], [
            'investment_amount.required' => 'Please enter an investment amount.',
            'period_days.in' => 'Please select a valid investment period (7, 10, or 30 days).',
            'terms.accepted' => 'You must agree to the User Service Agreement.',
        ]);

        try {
            $this->copyTradingService->invest($userId, $id, $request->input('investment_amount'), $request->input('period_days'));
            return redirect()->back()->with('success', 'Investment created successfully! Profits will be added to your wallet daily.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}