<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArbitrageInterval;
use Carbon\Carbon;

class ProcessArbitrageIntervals extends Command
{
    protected $signature = 'arbitrage:process-intervals';
    protected $description = 'Checks ended arbitrage intervals and rolls next_funding_rate into apr_3d, then clears ends_at and next_funding_rate.';

    public function handle(): int
    {
        $now = Carbon::now();

        $intervals = ArbitrageInterval::query()
            ->whereNotNull('ends_at')
            ->where('ends_at', '<=', $now)
            ->get();

        if ($intervals->isEmpty()) {
            $this->info('No arbitrage intervals need processing at this time.');
            return self::SUCCESS;
        }

        $processed = 0;
        foreach ($intervals as $interval) {
            // If no next_funding_rate provided, do nothing
            if ($interval->next_funding_rate === null) {
                $this->info("Interval #{$interval->id} ended but has no next_funding_rate; skipping.");
                continue;
            }

            $interval->apr_3d = $interval->next_funding_rate;
            $interval->next_funding_rate = null;
            $interval->ends_at = null;
            $interval->save();

            $processed++;
            $this->info("Processed interval #{$interval->id}: apr_3d set, ends_at and next_funding_rate cleared.");
        }

        $this->info("Arbitrage intervals processed: {$processed}.");
        return self::SUCCESS;
    }
}