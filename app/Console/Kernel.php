<?php

namespace App\Console;

use Illuminate\Support\Facades\DB;
use App\Console\Commands\UpdateUserStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('app:notification-checker-commands')->everyMinute();
        // $schedule->command('app:check-employee-attendance')->everyMinute();
        // $schedule->call(function () {
        //     app('App\Http\Controllers\adminside\AdminController')->generateNotifications();
        // })->everyMinute();
        // ->cron("53 9 3 3 *")

    $schedule->call(function () {
        app('App\Http\Controllers\adminside\AdminController')->updateOperationStatus();
    })->cron("50 10 3 3 *");
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
        [
            \App\Console\Commands\UpdateUserStatus::class,
            
        ];
    }
}
