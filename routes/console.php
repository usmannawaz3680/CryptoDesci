<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// ✅ Schedule the arbitrage:complete-subscriptions command to run daily
Schedule::command('arbitrage:complete-subscriptions')->daily();

// ✅ Schedule the sync:crypto-currencies command to run every 12 hours
Schedule::command('sync:crypto-currencies')->twiceDaily();
