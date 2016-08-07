<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 3) as $index)
		{
			Product::create([
				'imagePath' => 'images/watch1.png',
				'title' => $faker->name,
				'description' => $faker->text,
				'price' => $faker->randomNumber(2)
			]);
		}
	}

}