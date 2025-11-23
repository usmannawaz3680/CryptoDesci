<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register your custom middleware aliases here
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
        ]);
    })
    ->withSchedule(function (Schedule $schedule) {
        // $schedule->command('arbitrage:run')->everyMinute();
        $schedule->command('profits:calculate-daily')->daily();
        $schedule->command('copy:process-auto-invest')->everyFifteenMinutes();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();