<?php
class TimeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('times')->delete();

		Time::create(array(
			'minimum' => 'foo@bar.com'
			'maximum' => 'foo@bar.com'
			));
	}

}