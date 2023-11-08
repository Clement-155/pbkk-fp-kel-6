<?php

namespace App\Console;

use App\Http\Tasks\LogBackup;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     * Dev Note : Ingat untuk setup cron itu sendiri agar ini berjalan otomatis.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call( function () {
                $task = new LogBackup();
                $task->execute();
        }
        )->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
