<?php

namespace App\Services;

use App\Models\CopyTraderFeeProfit;
use App\Models\CopyTraderPackage;
use App\Models\UserCopyInvestment;
use App\Models\CopyTransaction;
use Illuminate\Support\Facades\DB;

class CopyTradingService
{
    public function invest(int $userId, int $copyTraderId, float $amount, CopyTraderPackage $traderPackage)
    {
        return DB::transaction(function () use ($userId, $copyTraderId, $amount, $traderPackage) {

            // Sanity: trader must match
            if ($traderPackage->copy_trader_id !== $copyTraderId) {
                throw new \RuntimeException('Trader package does not belong to this copy trader.');
            }

            $copyTrader = $traderPackage->copyTrader;
            $template   = $traderPackage->copyTradingPackage;

            // Your existing fee-profit range logic
            $range = CopyTraderFeeProfit::where('copy_trader_id', $copyTrader->id)
                ->where('min_amount', '<=', $amount)
                ->where('max_amount', '>=', $amount)
                ->firstOrFail();

            $feeAmount     = $amount * ($range->fee_percentage / 100);
            $netInvestment = $amount - $feeAmount;

            $investment = UserCopyInvestment::create([
                'user_id'                 => $userId,
                'copy_trader_id'          => $copyTrader->id,
                'copy_trader_package_id'  => $traderPackage->id,
                'investment_amount'       => $amount,
                'fee_percentage'          => $range->fee_percentage,
                'fee_amount'              => $feeAmount,
                'net_investment'          => $netInvestment,
                'min_profit_percentage'   => $range->min_profit_percentage,
                'max_profit_percentage'   => $range->max_profit_percentage,
                'start_date'              => now(),
                'period_days'             => $template->duration_days,
                'status'                  => 'active',
            ]);

            CopyTransaction::create([
                'user_investment_id' => $investment->id,
                'type'               => 'investment',
                'amount'             => $amount,
                'transaction_date'   => now(),
            ]);

            CopyTransaction::create([
                'user_investment_id' => $investment->id,
                'type'               => 'fee',
                'amount'             => -$feeAmount,
                'transaction_date'   => now(),
            ]);

            return $investment;
        });
    }
}
