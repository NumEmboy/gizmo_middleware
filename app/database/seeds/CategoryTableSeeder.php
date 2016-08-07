<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

			Category::create([
				'name' => 'Cellphone'
			]);

			Category::create([
				'name' => 'Laptop'
			]);

			Category::create([
				'name' => 'Watch'
			]);

			Category::create([
				'name' => 'Camera'
			]);
	}

}