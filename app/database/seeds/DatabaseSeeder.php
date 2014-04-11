<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('places')->delete();

		$this->call('TypeTableSeeder');
		$this->call('OpenStreetMapSeeder');
	}

}