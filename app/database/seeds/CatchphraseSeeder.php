<?php
class CatchphraseSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		Catchphrase::create(array(
			'key'=>'catchphrases.typeMuseum',
			'table'=> 'types',
			'idTable'=> 1
			));
	}
}
?>