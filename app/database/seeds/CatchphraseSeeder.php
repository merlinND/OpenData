<?php
class CatchphraseSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		DB::table('catchphrases')->delete();
		
		$types = Type::all();
		foreach ($types as $type) {

			echo "Generate catchphrases for ".$type->value."...\n";

			if($type->value == 'museum') {

				$catch = array();
				$catch[] = Catchphrase::create(array(
					'key'     => 'catchphrases.typeMuseum1',
					'table'   => 'types',
					'idTable' => $type->id
					));

				$catch[] = Catchphrase::create(array(
					'key'     => 'catchphrases.typeMuseum2',
					'table'   => 'types',
					'idTable' => $type->id
					));

				$places = Place::where('idType', '=', $type->id)->get();
				foreach ($places as $place) {
					
					$catch_rand = array_rand($catch);
					Catchphrase::create(array(
						'key'     => $catch[$catch_rand]->key,
						'table'   => 'places',
						'idTable' => $place->id
						));
				}
			}
	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value == 'artwork') {

				$catch = Catchphrase::create(array(
					'key'     => 'catchphrases.typeArtwork1',
					'table'   => 'types',
					'idTable' => $type->id
					));

				$places = Place::where('idType', '=', $type->id)->get();
				foreach ($places as $place) {
					
					Catchphrase::create(array(
						'key'     => $catch->key,
						'table'   => 'places',
						'idTable' => $place->id
						));
				}
			}
	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value == 'viewpoint') {

				Catchphrase::create(array(
					'key'     => 'catchphrases.typeViewpoint1',
					'table'   => 'types',
					'idTable' => $type->id
					));

				$places = Place::where('idType', '=', $type->id)->get();
				foreach ($places as $place) {
					
					Catchphrase::create(array(
						'key'     => $catch->key,
						'table'   => 'places',
						'idTable' => $place->id
						));
				}
			}

	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value == 'theme_park') {

				Catchphrase::create(array(
					'key'     => 'catchphrases.typeThemePark1',
					'table'   => 'types',
					'idTable' => $type->id
					));

				$places = Place::where('idType', '=', $type->id)->get();
				foreach ($places as $place) {
					
					Catchphrase::create(array(
						'key'     => $catch->key,
						'table'   => 'places',
						'idTable' => $place->id
						));
				}
			}

	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value == 'ExportOpenData') {
				
				Catchphrase::create(array(
					'key'     => 'catchphrases.typeMediatheque1',
					'table'   => 'types',
					'idTable' => $type->id
					));

				$places = Place::where('idType', '=', $type->id)->get();
				foreach ($places as $place) {
					
					Catchphrase::create(array(
						'key'     => $catch->key,
						'table'   => 'places',
						'idTable' => $place->id
						));
				}
			}
	// - - - - - - - - - - - - - - - - - - - - - -//
			else if ($type->value == 'lieuxdediffusion') {

				$catch = array();
				$catch[] = Catchphrase::create(array(
					'key'     => 'catchphrases.typeLieuCulturel1',
					'table'   => 'types',
					'idTable' => 2
					));

				$catch[] = Catchphrase::create(array(
					'key'     => 'catchphrases.typeLieuCulturel1',
					'table'   => 'types',
					'idTable' => 2
					));

				$places = Place::where('idType', '=', $type->id)->get();
				foreach ($places as $place) {
					
					$catch_rand = array_rand($catch);
					Catchphrase::create(array(
						'key'     => $catch[$catch_rand]->key,
						'table'   => 'places',
						'idTable' => $place->id
						));
				}
			}	
		}

	}
}
?>