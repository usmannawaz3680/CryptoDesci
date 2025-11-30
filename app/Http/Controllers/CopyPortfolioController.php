<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCopyInvestment;
use App\Models\CopyAutoInvestment;
use Illuminate\Http\Request;

class CopyPortfolioController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Ongoing = active subscriptions
        $ongoingInvestments = UserCopyInvestment::with([
            'copyTrader',
            'copyTraderPackage.copyTradingPackage',
            'transactions' => function ($q) {
                $q->where('type', 'profit')
                    ->orderBy('transaction_date', 'desc')
                    ->limit(30); // last 30 daily records
            },
        ])
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->orderByDesc('start_date')
            ->get();

        // Closed = closed / completed subscriptions
        $closedInvestments = UserCopyInvestment::with([
            'copyTrader',
            'copyTraderPackage.copyTradingPackage',
            'transactions' => function ($q) {
                $q->where('type', 'profit')
                    ->orderBy('transaction_date', 'desc');
            },
        ])
            ->where('user_id', $user->id)
            ->whereIn('status', ['closed', 'completed', 'cancelled'])
            ->orderByDesc('start_date')
            ->get();

        // Active + paused auto-invest configs
        $autoInvests = CopyAutoInvestment::with('copyTrader')
            ->where('user_id', $user->id)
            ->whereIn('status', ['active', 'paused'])
            ->orderBy('created_at', 'desc')
            ->get();

        // ---- Top summary metrics ----

        // Total copying balance = sum of current balances of ongoing investments
        $totalCopyingBalance = $ongoingInvestments->sum(function (UserCopyInvestment $inv) {
            return $inv->transactions()->sum('amount');
        });

        // Unrealized PnL = current balance - net_investment for active
        $totalUnrealizedPnl = $ongoingInvestments->sum(function (UserCopyInvestment $inv) {
            $currentBalance = $inv->transactions()->sum('amount');
            return $currentBalance - $inv->net_investment;
        });

        // Realized PnL = for closed investments, current balance - net_investment
        $totalRealizedPnl = $closedInvestments->sum(function (UserCopyInvestment $inv) {
            $currentBalance = $inv->transactions()->sum('amount');
            return $currentBalance - $inv->net_investment;
        });

        $netProfit = $totalRealizedPnl + $totalUnrealizedPnl;

        return view('web.pages.copyTrading.portfolio', compact(
            'ongoingInvestments',
            'closedInvestments',
            'autoInvests',
            'totalCopyingBalance',
            'totalRealizedPnl',
            'totalUnrealizedPnl',
            'netProfit'
        ));
    }

    public function cancelAutoInvest(Request $request, CopyAutoInvestment $auto)
    {
        // make sure this auto-invest belongs to logged in user
        if ($auto->user_id !== $request->user()->id) {
            abort(403);
        }

        $auto->update(['status' => 'cancelled']);

        return back()->with('success', 'Auto-invest subscription cancelled.');
    }
}
