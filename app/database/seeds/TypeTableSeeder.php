<?php
class TypeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('types')->delete();

		Type::create(array(
			'category' => 'tourism',
			'value'    => 'museum',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 2 * 60 * 60,
				'maximum' => 4 * 60 * 60
				))->id
			));
	}

}