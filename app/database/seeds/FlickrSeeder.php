<?php
class FlickrSeeder extends Seeder {

	public function run()
	{
		DB::table('photos')->delete();

		$places = Place::all();

		Flickering::handshake();

		foreach ($places as $place)
		{	
			$methodSearch = Flickering::callMethod('photos.search', array('lat' => $place->latitude, 'lon' => $place->longitude));
			echo "Fetching result for photos...\n";
			$data = $methodSearch->getResults('photo');

			if (!empty($data))
			{
				$infos = $this->getPhotoInformations($data[0]['id']);

				if (!empty($infos))
					Photo::create(array(
					'url' => $infos['source'],
					'idPlace' => $place->id,
					'width' => $infos['width'],
					'height' => $infos['height']
					));
			}
		}
	}

	private function getPhotoInformations($idPhoto, $label = 'Large')
	{
		Flickering::handshake();
	
		$methodSizes = Flickering::callMethod('photos.getSizes', array('photo_id' => $idPhoto));
		echo "Fetching result for getSizes...\n";
		$sizes = $methodSizes->getResults('size');

		foreach ($sizes as $size) {
			
			if ($size['label'] == $label)
				return $size;
		}

		return NULL;
	}

}