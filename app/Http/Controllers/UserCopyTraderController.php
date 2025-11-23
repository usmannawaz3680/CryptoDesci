<?php

namespace App\Http\Controllers;

use App\Services\CopyTradingService;
use App\Models\CopyTrader;
use App\Models\CopyTraderPackage;
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
        $packages = $trader->availablePackages()
            ->with('copyTradingPackage')
            ->get();
        return view('web.pages.copyTrading.create', compact('trader', 'packages'));
    }

    public function invest(Request $request, $id)
    {
        $request->validate([
            'investment_amount' => ['required', 'numeric', 'min:0.01'],
            'copy_trader_package_id' => ['required', 'exists:copy_trader_packages,id'],
            'terms' => ['accepted'],
        ], [
            'investment_amount.required' => 'Please enter an investment amount.',
            'copy_trader_package_id.required' => 'Please select a valid investment package.',
            'terms.accepted' => 'You must agree to the User Service Agreement.',
        ]);
        $userId = Auth::guard('web')->id();
        $amount = $request->input('investment_amount');
        $tpId = $request->input('copy_trader_package_id');

        // Optional extra safety: ensure package belongs to given trader
        $traderPackage = CopyTraderPackage::where('id', $tpId)
            ->where('copy_trader_id', $id)
            ->where('is_active', true)
            ->whereHas('copyTradingPackage', function ($q) {
                $q->where('is_active', true);
            })
            ->firstOrFail();

        try {
            // $this->copyTradingService->invest($userId, $id, $request->input('investment_amount'), $request->input('period_days'));
            $this->copyTradingService->invest($userId, $id, $amount, $traderPackage);

            return redirect()->back()->with('success', 'Investment created successfully! Profits will be added to your wallet daily.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}