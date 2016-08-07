<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryProductTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		// cellphone seeder
		$i=1;
		foreach(range(1, 4) as $index)
		{
			DB::table('category_product')->insert([
				'category_id' => 1,
				'product_id' => $i++
			]);
		}

		// laptop seeder
		foreach(range(1, 4) as $index)
		{
			DB::table('category_product')->insert([
				'category_id' => 2,
				'product_id' => $i++
			]);
		}

		// watch seeder
		foreach(range(1, 3) as $index)
		{
			DB::table('category_product')->insert([
				'category_id' => 3,
				'product_id' => $i++
			]);
		}

		// camera seeder
		foreach(range(1, 4) as $index)
		{
			DB::table('category_product')->insert([
				'category_id' => 4,
				'product_id' => $i++
			]);
		}
	}

}