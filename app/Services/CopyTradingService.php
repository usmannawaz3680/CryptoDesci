<?php

namespace App\Services;

use App\Models\CopyTraderFeeProfit;
use App\Models\UserCopyInvestment;
use App\Models\CopyTransaction;
use Illuminate\Support\Facades\DB;

class CopyTradingService
{
    public function invest($userId, $copyTraderId, $amount, $periodDays)
    {
        // Validate period_days
        $validPeriods = [7, 10, 30];
        if (!in_array($periodDays, $validPeriods)) {
            throw new \Exception('Invalid investment period. Choose 7, 10, or 30 days.');
        }

        // Find applicable range
        $range = CopyTraderFeeProfit::where('copy_trader_id', $copyTraderId)
            ->where('min_amount', '<=', $amount)
            ->where('max_amount', '>=', $amount)
            ->first();

        if (!$range) {
            throw new \Exception('No fee/profit range found for this amount.');
        }

        $feeAmount = $amount * ($range->fee_percentage / 100);
        $netInvestment = $amount - $feeAmount;

        return DB::transaction(function () use ($userId, $copyTraderId, $amount, $range, $feeAmount, $netInvestment, $periodDays) {
            // Create investment record (no wallet deduction)
            $investment = UserCopyInvestment::create([
                'user_id' => $userId,
                'copy_trader_id' => $copyTraderId,
                'investment_amount' => $amount,
                'fee_percentage' => $range->fee_percentage,
                'fee_amount' => $feeAmount,
                'net_investment' => $netInvestment,
                'min_profit_percentage' => $range->min_profit_percentage,
                'max_profit_percentage' => $range->max_profit_percentage,
                'start_date' => now(),
                'period_days' => $periodDays,
                'status' => 'active',
            ]);

            // Log investment transaction (virtual commitment)
            CopyTransaction::create([
                'user_investment_id' => $investment->id,
                'type' => 'investment',
                'amount' => $amount,
                'transaction_date' => now(),
            ]);

            // Log fee transaction (virtual deduction, not from wallet)
            CopyTransaction::create([
                'user_investment_id' => $investment->id,
                'type' => 'fee',
                'amount' => -$feeAmount,
                'transaction_date' => now(),
            ]);

            return $investment;
        });
    }
}