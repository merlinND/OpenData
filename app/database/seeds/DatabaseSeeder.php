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
		$this->call('OpenData76Seeder');
		$this->call('ScoreSeeder');
		$this->call('CatchphraseSeeder');
		$this->call('FlickrSeeder');
	}

}