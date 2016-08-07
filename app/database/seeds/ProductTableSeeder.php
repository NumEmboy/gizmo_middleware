<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$i=1;
		// cellphones
		foreach(range(1, 4) as $index)
		{
			Product::create([
				'imagePath' => 'images/cellphone/cp' .$i++. '.jpg',
				'title' => $faker->name,
				'description' => $faker->text,
				'price' => $faker->numberBetween($min = 1000, $max = 9000)
			]);
		}

		// laptops
		$j=1;
		foreach(range(1, 4) as $index)
		{
			Product::create([
				'imagePath' => 'images/laptop/l' .$j++. '.jpg',
				'title' => $faker->name,
				'description' => $faker->text,
				'price' => $faker->numberBetween($min = 1000, $max = 9000)
			]);
		}

		// watches
		$x=1;
		foreach(range(1, 3) as $index)
		{
			Product::create([
				'imagePath' => 'images/watch/w' .$x++. '.jpg',
				'title' => $faker->name,
				'description' => $faker->text,
				'price' => $faker->numberBetween($min = 1000, $max = 9000)
			]);
		}

		// cameras
		$y=1;
		foreach(range(1, 4) as $index)
		{
			Product::create([
				'imagePath' => 'images/camera/c' .$y++. '.jpg',
				'title' => $faker->name,
				'description' => $faker->text,
				'price' => $faker->numberBetween($min = 1000, $max = 9000)
			]);
		}

	}

}