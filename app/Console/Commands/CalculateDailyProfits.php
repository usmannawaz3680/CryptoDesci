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
        $activeInvestments = UserCopyInvestment::where('status', 'active')->get();

        DB::transaction(function () use ($activeInvestments) {
            foreach ($activeInvestments as $investment) {
                // Check if investment period has expired
                if ($investment->period_days) {
                    $endDate = Carbon::parse($investment->start_date)->addDays($investment->period_days);
                    if (Carbon::now()->greaterThan($endDate)) {
                        $investment->update(['status' => 'closed']);
                        $this->info("Investment ID {$investment->id} closed due to period expiration.");
                        continue;
                    }
                }

                // Get current balance from transactions
                $currentBalance = $investment->transactions()->sum('amount');

                if ($currentBalance <= 0) {
                    $this->warn("Investment ID {$investment->id} has zero or negative balance, skipping.");
                    continue;
                }

                // Random profit percentage within range
                $profitPercentage = mt_rand(
                    $investment->min_profit_percentage * 100,
                    $investment->max_profit_percentage * 100
                ) / 100;

                // Calculate profit amount
                $profitAmount = $currentBalance * ($profitPercentage / 100);

                // Find or create user's USDT wallet
                $wallet = $investment->user->wallets()
                    ->where('asset_coin_id', function ($query) {
                        $query->select('id')->from('asset_coins')->where('symbol', 'USDT')->limit(1);
                    })
                    ->first();

                if (!$wallet) {
                    $this->warn("No USDT wallet found for user ID {$investment->user_id}, skipping profit.");
                    continue;
                }

                // Update wallet balance
                $wallet->increment('balance', $profitAmount);

                // Log the profit transaction
                CopyTransaction::create([
                    'user_investment_id' => $investment->id,
                    'type' => 'profit',
                    'amount' => $profitAmount,
                    'profit_percentage' => $profitPercentage,
                    'transaction_date' => now(),
                ]);

                $this->info("Added profit of {$profitAmount} (at {$profitPercentage}%) to wallet ID {$wallet->id} for investment ID {$investment->id}");
            }
        });

        $this->info('Daily profits calculated and added to wallets successfully.');
    }
}
