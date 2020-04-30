<?php

namespace App\Console;

use App\Console\Commands\UpdateVkDataCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        UpdateVkDataCommand::class
    ];

    /**
     * @param  Schedule  $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('vk:update')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
