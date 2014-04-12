<?php
class CatchphraseSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		Catchphrase::create(array(
			'key'=>'catchphrases.typeMuseum1',
			'table'=> 'types',
			'idTable'=> 1
			));
		Catchphrase::create(array(
			'key'=>'catchphrases.typeMuseum2',
			'table'=> 'types',
			'idTable'=> 1
			));
		Catchphrase::create(array(
			'key'=>'catchphrases.typeMuseum3',
			'table'=> 'types',
			'idTable'=> 1
			));
	}
}
?>