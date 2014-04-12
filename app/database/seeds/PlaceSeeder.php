<?php
class PlaceSeeder extends Seeder {

	public function run()
	{

		DB::table('places')->delete();

		$this->call('OpenStreetMapSeeder');
		$this->call('OpenData76Seeder');
	}
}
?>