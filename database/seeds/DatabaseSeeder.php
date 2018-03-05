<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	        $this->call(UserSeeder::class);
					$this->call(DishSeeder::class);
					$this->call(ReservationSeeder::class);
					// $this->call(OrderSeeder::class);
    }
}
