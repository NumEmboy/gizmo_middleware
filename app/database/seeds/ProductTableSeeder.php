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
				'category_id' 		=> 1,
				'title' 			=> $faker->name,
				'description' 		=> $faker->text,
				'price' 			=> $faker->numberBetween($min = 1000, $max = 9000),
				'availability' 		=> $faker->numberBetween(0,1),
				'imagePath' 		=> 'images/cellphone/cp' .$i++. '.jpg',
			]);
		}

		// laptops
		$j=1;
		foreach(range(1, 4) as $index)
		{
			Product::create([
				'category_id' 		=> 2,
				'title' 			=> $faker->name,
				'description' 		=> $faker->text,
				'price' 			=> $faker->numberBetween($min = 1000, $max = 9000),
				'availability' 		=> $faker->numberBetween(0,1),
				'imagePath' 		=> 'images/laptop/l' .$j++. '.jpg',
			]);
		}

		// watches
		$x=1;
		foreach(range(1, 3) as $index)
		{
			Product::create([
				'category_id' 		=> 3,
				'title' 			=> $faker->name,
				'description' 		=> $faker->text,
				'price' 			=> $faker->numberBetween($min = 1000, $max = 9000),
				'availability' 		=> $faker->numberBetween(0,1),
				'imagePath' 		=> 'images/watch/w' .$x++. '.jpg',
			]);
		}

		// cameras
		$y=1;
		foreach(range(1, 4) as $index)
		{
			Product::create([
				'category_id' 		=> 4,
				'title' 			=> $faker->name,
				'description'	 	=> $faker->text,
				'price' 			=> $faker->numberBetween($min = 1000, $max = 9000),
				'availability' 		=> $faker->numberBetween(0,1),
				'imagePath' 		=> 'images/camera/c' .$y++. '.jpg',
			]);
		}

	}

}