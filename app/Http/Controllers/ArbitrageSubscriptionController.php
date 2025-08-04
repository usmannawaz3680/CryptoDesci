<?php

namespace App\Http\Controllers;

use App\Models\ArbitrageSubscription;
use App\Models\ArbitrageBot;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ArbitrageSubscriptionController extends Controller
{
    // User creates a subscription
    public function store(Request $request)
    {
        $request->validate([
            'arbitrage_bot_id' => 'required|exists:arbitrage_bots,id',
            'amount' => 'required|numeric|min:1',
            'apr_interval' => 'required|in:3d,7d,30d',
        ]);

        $user = Auth::user();
        $bot = ArbitrageBot::with(['fees', 'intervals'])->findOrFail($request->arbitrage_bot_id);
        $wallet = $user->wallets()->where('asset_coin_id', 1)->first();
        if (!$wallet || $wallet->balance < $request->amount) {
            return back()->with('error', 'Insufficient wallet balance.');
        }

        // Get APR percentage for selected interval
        $interval = $request->apr_interval;
        $apr = 0;
        if ($interval === '3d') {
            $apr = $bot->intervals->first()->apr_3d ?? 0;
        } elseif ($interval === '7d') {
            $apr = $bot->intervals->first()->apr_7d ?? 0;
        } elseif ($interval === '30d') {
            $apr = $bot->intervals->first()->apr_30d ?? 0;
        }

        // Find correct fee tier
        $feePercent = 0;
        foreach ($bot->fees as $fee) {
            if ($request->amount >= $fee->min_amount && (is_null($fee->max_amount) || $request->amount <= $fee->max_amount)) {
                $feePercent = $fee->fee_percentage;
                break;
            }
        }
        $feeAmount = $request->amount * ($feePercent / 100);
        $totalDeduct = $request->amount + $feeAmount;

        if ($wallet->balance < $totalDeduct) {
            return back()->with('error', 'Insufficient wallet balance for amount + fee.');
        }

        DB::beginTransaction();
        try {
            // Deduct from wallet
            $wallet->balance -= $totalDeduct;
            $wallet->save();

            // Set start/end time
            $startAt = Carbon::now();
            $endAt = match($interval) {
                '3d' => $startAt->copy()->addDays(3),
                '7d' => $startAt->copy()->addDays(7),
                '30d' => $startAt->copy()->addDays(30),
            };

            $subscription = ArbitrageSubscription::create([
                'user_id' => $user->id,
                'arbitrage_bot_id' => $bot->id,
                'wallet_id' => $wallet->id,
                'amount' => $request->amount,
                'fee_deducted' => $feeAmount,
                'apr_interval' => $interval,
                'apr_percentage' => $apr,
                'start_at' => $startAt,
                'end_at' => $endAt,
                'status' => 'active',
                'transaction_id' => null,
            ]);

            DB::commit();
            return back()->with('success', 'Arbitrage subscription created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create subscription: ' . $e->getMessage());
        }
    }

    // Admin view of active subscriptions
    public function adminIndex()
    {
        $subscriptions = ArbitrageSubscription::with(['user', 'arbitrageBot'])->where('status', 'active')->get();
        return view('admin.pages.arbitrage_subscriptions.index', compact('subscriptions'));
    }
}
