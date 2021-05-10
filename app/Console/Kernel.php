<?php

namespace App\Console;

use App\Console\Commands\System\Zoho\RenewTokenCommand;
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
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*
         * ┌────────────────────────────────────────────────────────────────────────────────────────────────┐
         * │ TASK         : RenewTokenCommand                                                               │
         * │ @copyright   : Noktos © 2021                                                                   │
         * │ @version     : 1.0.0                                                                           │
         * └────────────────────────────────────────────────────────────────────────────────────────────────┘.
         */
        $schedule->command(RenewTokenCommand::class, [])->everyThirtyMinutes();
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

    /**
     * Get the timezone that should be used by default for scheduled events.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {
        return 'America/Mexico_City';
    }
}
