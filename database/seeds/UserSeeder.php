<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

			$faker = Faker\Factory::create(); // create('lt_LT') - duoda lokalizacija

			// Admin sukurimas userio:
			$admin = new User;
			$admin->name = 'admin';
			$admin->surname = 'admin';
			$admin->date = '1989-02-06';
			$admin->email = 'admin@admin.lt';
			$admin->password = 'admin';
			$admin->phone = '+37064739059';
			$admin->address = 'Toli-toli kazkur';
			$admin->city = 'Vilnius';
			$admin->zipcode = 'LT-914343';
			$admin->country = 'Lithuania';
			$admin->role = 'admin';
			$admin->save();

			// Simle testinis useris:
			$user = new User;
			$user->name = 'simple';
			$user->surname = 'simple';
			$user->date = $faker->dateTimeThisCentury($max = 'now', $timezone = null); // date of birth
			$user->email = 'simple@simple.lt';
			$user->password = 'simple';
			$user->phone = 'nera';
			$user->address = 'cia';
			$user->city = 'Vilnius';
			$user->zipcode = 'LT-914343';
			$user->country = 'Lithuania';
			$user->role = 'user';
			$user->save();

			foreach (range(1, 10) as $key) {
				$user = new User;
				$user->name = $faker->firstName;
				$user->surname = $faker->lastName;
				$user->date = $faker->dateTimeThisCentury($max = 'now', $timezone = null); // date of birth
				$user->email = $faker->email;
				$user->password = $faker->password;
				$user->phone = $faker->e164PhoneNumber;
				$user->address = $faker->address;
				$user->city = $faker->city;
				$user->zipcode = $faker->postcode;
				$user->country = $faker->country;
				$user->role = 'user';
				$user->save();
			}
    }
}
