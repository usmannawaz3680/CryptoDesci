<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CopyAutoInvestment;
use App\Services\CopyTradingService;

class ProcessCopyAutoInvestments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Run with: php artisan copy:process-auto-invest
     */
    protected $signature = 'copy:process-auto-invest';

    /**
     * The console command description.
     */
    protected $description = 'Process active copy-trading auto-invest subscriptions and create new investments when due.';

    /**
     * @var \App\Services\CopyTradingService
     */
    protected CopyTradingService $copyTradingService;

    public function __construct(CopyTradingService $copyTradingService)
    {
        parent::__construct();
        $this->copyTradingService = $copyTradingService;
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $now = Carbon::now();

        // Frequency → number of days for the investment period + next_run calculation
        $frequencyDays = [
            'everyday' => 1,
            '7d'       => 7,
            '14d'      => 14,
            '30d'      => 30,
        ];

        $autoInvests = CopyAutoInvestment::where('status', 'active')
            ->where(function ($q) use ($now) {
                $q->whereNull('next_run_at')
                  ->orWhere('next_run_at', '<=', $now);
            })
            ->get();

        if ($autoInvests->isEmpty()) {
            $this->info('No auto-invest records to process.');
            return self::SUCCESS;
        }

        $this->info('Processing '.$autoInvests->count().' auto-invest records...');

        foreach ($autoInvests as $auto) {
            $freqKey = $auto->frequency;
            $days    = $frequencyDays[$freqKey] ?? 1;

            // Sanity: ignore garbage frequencies
            if ($days <= 0) {
                $this->warn("Auto-invest ID {$auto->id} has invalid frequency '{$freqKey}', skipping.");
                continue;
            }

            // Wrap each auto-invest in its own transaction so one failure doesn't kill the loop
            DB::beginTransaction();

            try {
                $amount = (float) $auto->amount;

                if ($amount <= 0) {
                    $this->warn("Auto-invest ID {$auto->id} has non-positive amount, skipping.");
                    DB::rollBack();
                    continue;
                }

                // Create a new *fixed ratio* investment
                $investment = $this->copyTradingService->investFixedRatio(
                    $auto->user_id,
                    $auto->copy_trader_id,
                    $amount,
                    $days
                );

                // Update scheduling fields
                $auto->last_run_at = $now;
                $auto->next_run_at = (clone $now)->addDays($days);
                $auto->save();

                DB::commit();

                $this->info("Auto-invest ID {$auto->id}: created investment ID {$investment->id}, next run at {$auto->next_run_at}.");

            } catch (\Throwable $e) {
                DB::rollBack();
                $this->error("Auto-invest ID {$auto->id} failed: ".$e->getMessage());
                report($e);
                // continue with the next one
            }
        }

        $this->info('Auto-invest processing finished.');
        return self::SUCCESS;
    }
}
