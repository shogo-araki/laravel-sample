<?php

namespace App\Console;

use App\Console\Commands\HelloCommand;
use App\Console\Commands\SampleCommand;
use App\Console\Commands\SendOrdersCommand;
use Carbon\CarbonImmutable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {
        //     return 0;
        // })->description('call method')
        //     ->everrMinute();

        // $schedule->exec('/path/to/command parm1 parm2')
        //     ->description('exec method')
        //     ->everyMinute();

        // $schedule->command(HelloCommand::class)->cron('* * * * *');
        // $schedule->command(HelloCommand::class)->cron('0 1 * * *');

        $schedule->command(
            SendOrdersCommand::class,
            [CarbonImmutable::yesterday()->format('Ymd')]
        )->daily('05:00')
            ->description('send purchased history')
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
