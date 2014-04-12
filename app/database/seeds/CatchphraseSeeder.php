<?php
class CatchphraseSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		CatchPhrase::create(array(
			'key'=>'catchphrases.typeMuseum',
			'table'=> 'types',
			'idTable'=> 1
			));
	}
}
?>