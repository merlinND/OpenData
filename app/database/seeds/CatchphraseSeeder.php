<?php
class CatchphraseSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		$types = Type::all();
		foreach ($types as $type) {
			if($type->value=='museum') {
				Catchphrase::create(array(
					'key'=>'catchphrases.typeMuseum1',
					'table'=> 'types',
					'idTable'=> $type->id
					));
				Catchphrase::create(array(
					'key'=>'catchphrases.typeMuseum2',
					'table'=> 'types',
					'idTable'=> $type->id
					));
			}
	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value =='artwork') {
				Catchphrase::create(array(
					'key'=>'catchphrases.typeArtwork1',
					'table'=> 'types',
					'idTable'=> $type->id
					));
			}
	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value =='viewpoint') {
				Catchphrase::create(array(
					'key'=>'catchphrases.typeViewpoint1',
					'table'=> 'types',
					'idTable'=> $type->id
					));
			}

	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value =='theme_park') {
				Catchphrase::create(array(
					'key'=>'catchphrases.typeThemePark1',
					'table'=> 'types',
					'idTable'=> $type->id
					));
			}

	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value == 'ExportOpenData') {
				Catchphrase::create(array(
					'key'=>'catchphrases.typeMediatheque1',
					'table'=> 'types',
					'idTable'=> $type->id
					));
			}
	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value == 'lieuxdediffusion') {
				Catchphrase::create(array(
					'key'=>'catchphrases.typeLieuCulturel1',
					'table'=> 'types',
					'idTable'=> 2
					));
				Catchphrase::create(array(
					'key'=>'catchphrases.typeLieuCulturel1',
					'table'=> 'types',
					'idTable'=> 2
					));
			}	
		}

	}
}
?>