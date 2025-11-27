<?php

namespace App\Services;

use App\Models\CopyTraderFeeProfit;
use App\Models\CopyTraderPackage;
use App\Models\UserCopyInvestment;
use App\Models\CopyTransaction;
use App\Models\CopyAutoInvestment;
use Illuminate\Support\Facades\DB;

class CopyTradingService
{
    /**
     * Fixed Ratio:
     * - User enters a single amount
     * - Profit/loss applied on full amount for the selected period
     */
    public function investFixedRatio(int $userId, int $copyTraderId, float $amount, int $periodDays): UserCopyInvestment
    {
        return DB::transaction(function () use ($userId, $copyTraderId, $amount, $periodDays) {
            // validate period_days however you like (or remove this)
            $validPeriods = []; // or derive from packages
            foreach (CopyTraderPackage::where('copy_trader_id', $copyTraderId)->get() as $package) {
                $validPeriods[] = $package->copyTradingPackage->duration_days;
            }
            if (!in_array($periodDays, $validPeriods)) {
                throw new \InvalidArgumentException('Invalid investment period.');
            }

            $range = CopyTraderFeeProfit::where('copy_trader_id', $copyTraderId)
                ->where('min_amount', '<=', $amount)
                ->where('max_amount', '>=', $amount)
                ->firstOrFail();

            $feeAmount     = $amount * ($range->fee_percentage / 100);
            $netInvestment = $amount - $feeAmount;

            $investment = UserCopyInvestment::create([
                'user_id'               => $userId,
                'copy_trader_id'        => $copyTraderId,
                'mode'                  => 'fixed_ratio',
                'investment_amount'     => $amount,
                'copy_amount'           => null,
                'cost_per_order'        => null,
                'fee_percentage'        => $range->fee_percentage,
                'fee_amount'            => $feeAmount,
                'net_investment'        => $netInvestment,
                'min_profit_percentage' => $range->min_profit_percentage,
                'max_profit_percentage' => $range->max_profit_percentage,
                'start_date'            => now(),
                'period_days'           => $periodDays,
                'status'                => 'active',
            ]);

            // virtual investment txn
            CopyTransaction::create([
                'user_investment_id' => $investment->id,
                'type'               => 'investment',
                'amount'             => $amount,
                'transaction_date'   => now(),
            ]);

            // virtual fee txn
            CopyTransaction::create([
                'user_investment_id' => $investment->id,
                'type'               => 'fee',
                'amount'             => -$feeAmount,
                'transaction_date'   => now(),
            ]);

            return $investment;
        });
    }

    /**
     * Fixed Amount:
     * - copy_amount = total capital locked for this subscription
     * - cost_per_order = amount used per day ("per order") for profit/loss
     * - period_days = how many days this weird thing will run
     */
    public function investFixedAmount(
        int $userId,
        int $copyTraderId,
        float $copyAmount,
        float $costPerOrder,
        int $periodDays
    ): UserCopyInvestment {
        return DB::transaction(function () use ($userId, $copyTraderId, $copyAmount, $costPerOrder, $periodDays) {

            // We use copyAmount to choose the fee range
            $range = CopyTraderFeeProfit::where('copy_trader_id', $copyTraderId)
                ->where('min_amount', '<=', $copyAmount)
                ->where('max_amount', '>=', $copyAmount)
                ->firstOrFail();

            $feeAmount     = $copyAmount * ($range->fee_percentage / 100);
            $netInvestment = $copyAmount - $feeAmount;

            $investment = UserCopyInvestment::create([
                'user_id'               => $userId,
                'copy_trader_id'        => $copyTraderId,
                'mode'                  => 'fixed_amount',
                'investment_amount'     => $copyAmount,  // treat whole locked amount as "investment_amount"
                'copy_amount'           => $copyAmount,
                'cost_per_order'        => $costPerOrder,
                'fee_percentage'        => $range->fee_percentage,
                'fee_amount'            => $feeAmount,
                'net_investment'        => $netInvestment,
                'min_profit_percentage' => $range->min_profit_percentage,
                'max_profit_percentage' => $range->max_profit_percentage,
                'start_date'            => now(),
                'period_days'           => $periodDays, // whatever user selected
                'status'                => 'active',
            ]);

            // We'll still log a single "investment" txn with full locked amount.
            CopyTransaction::create([
                'user_investment_id' => $investment->id,
                'type'               => 'investment',
                'amount'             => $copyAmount,
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

    /**
     * Legacy invest method for backward compatibility (uses fixed_ratio mode)
     */
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
                'mode'                    => 'fixed_ratio',
                'investment_amount'       => $amount,
                'copy_amount'             => null,
                'cost_per_order'          => null,
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

    /**
     * Create or update auto-invest configuration
     */
    public function createOrUpdateAutoInvest(int $userId, int $copyTraderId, float $amount, string $frequency): CopyAutoInvestment
    {
        return CopyAutoInvestment::updateOrCreate(
            [
                'user_id'        => $userId,
                'copy_trader_id' => $copyTraderId,
            ],
            [
                'amount'    => $amount,
                'frequency' => $frequency,
                'status'    => 'active',
                // next_run_at we'll fill in later when we do cron logic
            ]
        );
    }
}
