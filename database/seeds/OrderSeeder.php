<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			// $table->integer('user_id')->unsigned();
			// $table->float('total_amount', 8, 4);
			// $table->float('tax_amount', 8, 4);

			foreach (range(1, 5) as $key) {
				$order = new Order;
				$order->user_id = $faker->numberBetween($min = 1, $max = 12);
				$order->total_amount = $faker->randomFloat(2, 5, 95);
				$order->tax_amount = $faker->lastName;
				$order->save();
			}
    }
}
