<?php

use Illuminate\Database\Seeder;
use App\Reservation; // ideda modeli kaip klase

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$faker = Faker\Factory::create();

			foreach (range(1, 5) as $key) {
				$reservation = new Reservation;
				$reservation->name = $faker->firstName;
				$reservation->people_amount = $faker->numberBetween($min = 1, $max = 10);
				$reservation->date = $faker->dateTimeThisMonth($min = 'now', $timezone = null); // date to reserve
				$reservation->time = $faker->time($format = 'H:i', $min = '10:00', $max = '23:00');
				$reservation->phone = $faker->e164PhoneNumber;
				$reservation->user_id = $faker->numberBetween($min = 1, $max = 12);
				$reservation->save();
			}
    }
}
