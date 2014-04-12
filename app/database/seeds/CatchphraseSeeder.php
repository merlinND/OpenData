<?php
class CatchphraseSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		CatchPhrase::create(array(
			'key'=>'Le musée, un lieu pour vous amuser',
			'table'=> 'types',
			'idTable'=> 1
			));
	}
}
?>