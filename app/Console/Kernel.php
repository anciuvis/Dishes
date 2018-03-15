<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use App\Order;
use App\Mail\OrderInfo;
use Illuminate\Support\Facades\Mail;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
					// $users = User::where('id', 5);
					// $users->delete();
					$prevDay = time() - (24 * 60 * 60);
					$prevDay = date("Y-m-d H:i:s", $prevDay);
					$orders = Order::where('created_at', '>', $prevDay)->get();
					// dd('update: ' . count($orders) . ' orders were made in last 24h');

					Mail::to('nonofthem@gmail.com')
						->send(new OrderInfo($orders));

				})->daily();


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
