<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::truncate();
		Product::truncate();

		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->command->info('Users Table Seeded!');

		$this->call('ProductsTableSeeder');
		$this->command->info('Products Table Seeded!');
	}

}
