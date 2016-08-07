<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		User::create([
			'username' => 'yodme',
			'password' => Hash::make('secret123'),
			'email' => $faker->email,
			'firstname' => $faker->firstNameMale,
			'lastname' => $faker->lastName,
			'remember_token' => $faker->sha256
		]);
	}

}