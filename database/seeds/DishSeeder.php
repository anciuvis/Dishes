<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishSeeder extends Seeder
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
				$url = $faker->image('/home/vagrant/Code/Dishes/storage/app/public/dishes', 800, 600, 'food');
				$url = str_replace('/home/vagrant/Code/Dishes/storage/app/public', '/storage', $url);
				
				$dish = new Dish;
				$dish->title = $faker->colorName;
				$dish->description = $faker->sentence(300);
				$dish->image_url = $url;
				$dish->price = $faker->randomFloat(2, 5, 95);
				$dish->save();
			}
    }
}
