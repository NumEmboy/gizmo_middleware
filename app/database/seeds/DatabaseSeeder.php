<?php

class DatabaseSeeder extends Seeder {

	private $tables = [
		'users'
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$this->cleanDatabase();
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('Users Table Seeded!');

		// $this->call('CategoryTableSeeder');
		// $this->command->info('Categories Table Seeded!');

		// $this->call('ProductTableSeeder');
		// $this->command->info('Products Table Seeded!');

	}

	private function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach ($this->tables as $tableName) {
			DB::table($tableName)->truncate();
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
