<?php
class PlaceSeeder extends Seeder {

	public function run()
	{
		$this->call('OpenStreetMapSeeder');
		$this->call('OpenData76Seeder');
	}
}
?>