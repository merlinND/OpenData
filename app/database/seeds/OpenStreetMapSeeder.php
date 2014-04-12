<?php
class OpenStreetMapSeeder extends PlaceSeeder {

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
		echo "Starting OpenStreetMapSeeder.\n";
		$this->createRequests();

		$time = time();
		echo "Starting requesting...\n";
		$responses = jyggen\Curl::get($this->requests);
		$duration = time() - $time;
		echo "Requesting terminated. (".$duration."s elapsed)\n";

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

		foreach ($this->regions as $regionName => $regionCode) {
			
			foreach ($types as $type) {

				if ($type->category != 'opendata') {

					// Save type information for create use
					$this->types[$type->category][$type->value] = $type->id;

					$this->requests[] = $this->createRequest($regionCode, $type->category, $type->value);
					echo "Request for k=".$type->category.", v=".$type->value." in ".$regionName." created.\n";
				}
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

			if (property_exists($nominatim, 'address') AND property_exists($nominatim->address, 'postcode') AND property_exists($nominatim->address, 'city')) {

				Place::create(array(
					'name'      => $element->tags->name,
					'latitude'  => $element->lat,
					'longitude' => $element->lon,
					'zipcode'   => $nominatim->address->postcode,
					'city'      => $nominatim->address->city,
					'idType'    => $this->getIdType($element),
					// 'description' => $this->getWikipediaDescription($element->tags->name),
				));
			}
		}
	}

	private function getAdressFromNominatim($element)
	{
		$request = $this->baseURLNominatim.'osm_type='.ucfirst(substr($element->type, 0, 1)).'&osm_id='.$element->id;
		$response = current(jyggen\Curl::get($request));
		
		return json_decode($response->getContent());
	}

	private function getWikipediaDescription($pageName)
	{
		echo $pageName."\n";

		$url = 'http://fr.wikipedia.org/w/api.php?action=parse&page='.$pageName.'&format=json&prop=text&section=0&wgMaxArticleSize=4096';
		$result = '';
		echo $url."\n";

		$ch = curl_init($url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_USERAGENT, "tartetat.in bot"); 
		curl_setopt ($ch, CURLOPT_TIMEOUT, 1000); 
		$c = curl_exec($ch);

		$json = json_decode($c);

		if (is_object($json) AND !property_exists($json, "error")) {
			$content = $json->{'parse'}->{'text'}->{'*'};

			$pattern = '#<p>(.*)</p>#Us';
			if (preg_match($pattern, $content, $matches)) {
				$result = strip_tags($matches[1]);
			}
		}


		return $result;
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