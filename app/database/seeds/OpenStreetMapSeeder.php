<?php
class OpenStreetMapSeeder extends Seeder {

	private $baseURL = 'http://overpass-api.de/api/interpreter?data=';
	private $baseURLNominatim = 'http://nominatim.openstreetmap.org/reverse?format=json&';

	private $regions = array(
		'Seine-Maritime' => 3600007426,
		'Eure' => 3600007435
		);

	private $requests = array();
	private $types = array();

	public function run()
	{
		$this->createRequests();

		$responses = jyggen\Curl::get($this->requests);

		foreach ($responses as $response) {
			
			$data = json_decode($response->getContent());

			foreach ($data->elements as $element) {
				
				switch ($element->type) {
					case 'node':
						$this->createPlaceFromNode($element);
						break;
					
					default:
						# code...
						break;
				}
			}
		}
	}

	private function createRequests()
	{
		$types = Type::all();

		foreach ($this->regions as $regionCode) {
			
			foreach ($types as $type) {

				// Save type information for create use
				$this->types[$type->category][$type->value] = $type->id;

				$this->requests[] = $this->createRequest($regionCode, $type->category, $type->value);
			}
		}
	}

	private function createRequest($regionCode, $key, $value)
	{
		$data = '
			[out:json]
			[timeout:25]
			;
			area('.$regionCode.')->.area;
			(
				node
					["'.$key.'"="'.$value.'"]
					(area.area);
				way
					["'.$key.'"="'.$value.'"]
					(area.area);
				relation
					["'.$key.'"="'.$value.'"]
					(area.area);
			);
			out body;
			>;
			out skel qt;
			';

		return $this->baseURL.urlencode($data);
	}

	private function createPlaceFromNode($element)
	{

		if (property_exists($element, 'tags') AND property_exists($element->tags, 'name'))
		{
			$nominatim = $this->getAdressFromNominatim($element);

			Place::create(array(
				'name'      => $element->tags->name,
				'latitude'  => $element->lat,
				'longitude' => $element->lon,
				'zipcode'   => $nominatim->address->postcode,
				'city'      => $nominatim->address->city,
				'idType'    => $this->getIdType($element),
				));
		}
	}

	private function getAdressFromNominatim($element)
	{
		$request = $this->baseURLNominatim.'osm_type='.ucfirst(substr($element->type, 0, 1)).'&osm_id='.$element->id;
		$response = current(jyggen\Curl::get($request));
		
		return json_decode($response->getContent());
	}

	private function getIdType($element)
	{
		foreach ($this->types as $category => $valueAndId) {
			
			foreach ($valueAndId as $value => $id) {

				if (property_exists($element->tags, $category) AND $element->tags->$category == $value)
					return $id;
			}
		}
	}
}