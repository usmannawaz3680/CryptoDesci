<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArbitrageSubscription;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CompleteArbitrageSubscriptions extends Command
{
    protected $signature = 'arbitrage:complete-subscriptions';
    protected $description = 'Complete expired arbitrage subscriptions and credit profit to user wallets';

    public function handle()
    {
        $now = Carbon::now();
        // $subs = ArbitrageSubscription::where('status', 'active')->where('end_at', '<=', $now)->get();
        $subs = ArbitrageSubscription::where('status', 'active')->get();
        foreach ($subs as $sub) {
            DB::beginTransaction();
            try {
                // Calculate profit
                $profit = $sub->amount * ($sub->apr_percentage / 100);
                $totalReturn = $sub->amount + $profit;
                $wallet = $sub->wallet;
                $wallet->balance += $totalReturn;
                $wallet->save();
                $sub->profit = $profit;
                $sub->status = 'completed';
                $sub->save();
                DB::commit();
                $this->info("Subscription #{$sub->id} completed. Profit: {$profit}");
            } catch (\Exception $e) {
                DB::rollBack();
                $this->error("Failed to complete subscription #{$sub->id}: " . $e->getMessage());
            }
        }
    }
}
