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
				$url = $faker->image('/home/vagrant/Code/Dishes/public/tmp', 800, 600, 'food');
				$url = str_replace('/home/vagrant/Code/Dishes/public/', '', $url);
				$disk = new Dish;
				$disk->title = $faker->colorName;
				$disk->description = $faker->sentence(300);
				$disk->image_url = $url;
				$disk->price = $faker->randomFloat(2, 5, 95);
				$disk->save();
			}
    }
}
