<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserCopyInvestment;
use App\Models\CopyTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CalculateDailyProfits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'profits:calculate-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate and add daily profits to active user investments';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->startOfDay();

        $activeInvestments = UserCopyInvestment::where('status', 'active')->get();

        DB::transaction(function () use ($activeInvestments, $today) {
            foreach ($activeInvestments as $investment) {

                // 1) Close if period has expired
                if ($investment->period_days) {
                    $endDate = Carbon::parse($investment->start_date)->addDays($investment->period_days)->startOfDay();

                    if ($today->greaterThan($endDate)) {
                        $investment->update(['status' => 'closed']);
                        $this->info("Investment ID {$investment->id} closed due to period expiration.");
                        continue;
                    }
                }

                // 2) Determine which day in the cycle this is (1-based)
                $startDate = Carbon::parse($investment->start_date)->startOfDay();
                $dayIndex  = $startDate->diffInDays($today) + 1;

                // 3) Base amount for P&L
                if ($investment->mode === 'fixed_amount' && $investment->cost_per_order > 0) {
                    // Weird fixed-amount behaviour: PnL is always on cost_per_order
                    $baseAmount = $investment->cost_per_order;
                } else {
                    // Default behaviour (same as old code): use current balance from transactions
                    $baseAmount = $investment->transactions()->sum('amount');
                }

                if ($baseAmount <= 0) {
                    $this->warn("Investment ID {$investment->id} has zero or negative base amount, skipping.");
                    continue;
                }

                // 4) Decide if today is a loss day (per trader package)
                $isLossDay       = false;
                $profitPercentage = 0.0;

                $traderPackage = $investment->copyTraderPackage ?? null;

                if ($traderPackage && $traderPackage->loss_day && $dayIndex == $traderPackage->loss_day) {
                    // LOSS DAY: pick a negative percentage between min_loss_percentage and max_loss_percentage
                    $minLoss = (float) $traderPackage->min_loss_percentage;
                    $maxLoss = (float) $traderPackage->max_loss_percentage;

                    if ($minLoss > 0 && $maxLoss >= $minLoss) {
                        $lossPct = mt_rand((int) ($minLoss * 100), (int) ($maxLoss * 100)) / 100;
                        $profitPercentage = -$lossPct; // negative
                        $isLossDay = true;
                    } else {
                        // Misconfigured loss range, fall back to normal profit range
                        $this->warn("Invalid loss range for trader package ID {$traderPackage->id}, using profit range instead.");
                    }
                }

                if (!$isLossDay) {
                    // NORMAL DAY: use investment's min/max profit percentages
                    $minProfit = (float) $investment->min_profit_percentage;
                    $maxProfit = (float) $investment->max_profit_percentage;

                    if ($maxProfit < $minProfit) {
                        // swap if accidentally reversed
                        [$minProfit, $maxProfit] = [$maxProfit, $minProfit];
                    }

                    $profitPercentage = mt_rand(
                        (int) ($minProfit * 100),
                        (int) ($maxProfit * 100)
                    ) / 100;
                }

                // 5) Calculate profit (may be negative on loss day)
                $profitAmount = $baseAmount * ($profitPercentage / 100);

                if ($profitAmount == 0.0) {
                    $this->warn("Investment ID {$investment->id} got 0 profit, skipping wallet update.");
                    continue;
                }

                // 6) Find user's USDT wallet
                $wallet = $investment->user->wallets()
                    ->where('asset_coin_id', function ($query) {
                        $query->select('id')
                              ->from('asset_coins')
                              ->where('symbol', 'USDT')
                              ->limit(1);
                    })
                    ->first();

                if (!$wallet) {
                    $this->warn("No USDT wallet found for user ID {$investment->user_id}, skipping profit.");
                    continue;
                }

                // 7) Update wallet balance (can go down on loss day)
                $wallet->increment('balance', $profitAmount);

                // 8) Log transaction
                CopyTransaction::create([
                    'user_investment_id' => $investment->id,
                    'type'               => 'profit',
                    'amount'             => $profitAmount,
                    'profit_percentage'  => $profitPercentage,
                    'transaction_date'   => now(),
                ]);

                $this->info(sprintf(
                    "Investment %d | day %d | %s %.4f%% on %.4f = %.4f to wallet ID %d",
                    $investment->id,
                    $dayIndex,
                    $isLossDay ? 'LOSS' : 'PROFIT',
                    $profitPercentage,
                    $baseAmount,
                    $profitAmount,
                    $wallet->id
                ));
            }
        });

        $this->info('Daily profits calculation finished.');
    }
}
