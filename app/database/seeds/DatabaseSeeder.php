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

		$this->call('TypeTableSeeder');
		$this->call('PlaceSeeder');
		$this->call('ScoreSeeder');
		$this->call('CatchphraseSeeder');
		$this->call('FlickrSeeder');
	}

}