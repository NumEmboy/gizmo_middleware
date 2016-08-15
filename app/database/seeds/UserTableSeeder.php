<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		User::create([
			'firstname' => $faker->firstNameMale,
			'lastname' => $faker->lastName,
			'email' => 'bigEm021712@gmail.com',
			'password' => Hash::make('secret123'),
			'telephone' => '09068380300',
			'admin' => 1
		]);
	}

}