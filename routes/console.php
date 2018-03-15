<?php

use Illuminate\Foundation\Inspiring;
use App\Order;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('order:info', function () {
		$header = ['#', 'user', 'amount', 'tax'];
    $order = Order::all()->toArray();
		$this->table($header, $order);
});
