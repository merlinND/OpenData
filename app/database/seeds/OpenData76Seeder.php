<?php
class OpenData76Seeder extends PlaceSeeder {

	private $baseURLNominatim = 'http://nominatim.openstreetmap.org/search?format=json&email=thibaud@dauce.fr&addressdetails=1&countrycodes=fr&state=Haute-Normandie&';
	private $baseURLOpenData = 'http://odata76.cloudapp.net/v1/opendata76/';
	private $endURLOpenData = '?$filter=&format=json';

	private $names    = array('intitule_bibliotheque', 'organisme', 'nom_ens');
	private $adresses = array('numero_et_adresse', 'adresse');
	private $zipcodes = array('cp', 'code_postal');
	private $cities   = array('ville', 'comm_ens');

	private $requests   = array();
	private $requestsNb = 0;
	private $failNb     = 0;
	private $places     = array();

	private $types;

	public function run()
	{

		$time = time();
		echo "Starting requesting...\n";
		$responses = jyggen\Curl::get($this->getLinks());
		$duration = time() - $time;
		echo "Requesting terminated. (".$duration."s elapsed)\n";

		foreach ($responses as $idResponse => $response) {
			
			$data = json_decode($response->getContent());
			foreach ($data->d as $element) {
				
				if ($this->requestsNb < 20) {

					$infos = $this->getInformations($element);

					if (!empty($infos))
					{
						$infos['idType'] = $this->types[$idResponse]->id;
	
						Place::create($infos);
						$this->places[] = $infos['name'];
					}
					else
						$this->failNb++;
				}
			}
		}

		$duration = time() - $time;
		echo "Requesting Nominatim terminated. (".$duration."s elapsed)\n";
		echo "  * ".$this->requestsNb." requests. ".$this->failNb." fails\n";

	}

	private function getInformations($element)
	{
		$name = $this->getName($element);
		$zipcode = $this->getZipcode($element);
		$city = $this->getCity($element);
		$adress = $this->getAdress($element);

		if (!in_array($name, $this->places)) {

			$this->requestsNb++;
			echo "Requesting Nominatim for ".$name."...\n";
			$result = $this->getLocalisationFromNominatim($this->getRequestForNominatim($city, $zipcode, $adress));
		}

		if (!isset($result) OR $result == false)
			return false;
		else
		{
			return array(
				'name'      => $name,
				'latitude'  => $result['lat'],
				'longitude' => $result['lon'],
				'zipcode'   => $zipcode,
				'city'      => $city,
				);
		}
	}

	private function getLinks()
	{
		$links = array();
		$this->types = Type::where('category', '=', 'opendata')->get();

		foreach ($this->types as $type) {
			
			$links[] = $this->baseURLOpenData.$type->value.$this->endURLOpenData;
		}

		return $links;
	}

	private function getProperty($element, $names)
	{
		foreach ($names as $name) {
			
			if (property_exists($element, $name))
				return $element->$name;
		}

		return false;
	}

	private function getName($element)
	{
		return ucfirst(strtolower($this->getProperty($element, $this->names)));
	}

	private function getAdress($element)
	{
		return str_replace(' ', '+', strtolower($this->getProperty($element, $this->adresses)));
	}

	private function getZipcode($element)
	{
		return $this->getProperty($element, $this->zipcodes);
	}

	private function getCity($element)
	{
		return str_replace(' ', '+', ucfirst(strtolower(current(explode(',', $this->getProperty($element, $this->cities))))));
	}

	private function getRequestForNominatim($city, $zipcode = '', $adress = '')
	{
		$data[] = 'city='.$city;

		if (!empty($zipcode))
			$data[] = 'postalcode='.$zipcode;

		if (!empty($adress))
			$data[] = 'street='.$adress;

		return $this->baseURLNominatim.implode('&', $data);
	}

	private function getLocalisationFromNominatim($requestURL)
	{
		$request = new jyggen\Curl\Request($requestURL);
		$request->setOption(CURLOPT_CONNECTTIMEOUT, 1);
		$request->setOption(CURLOPT_TIMEOUT, 2);
		$request->execute();

		if ($request->isSuccessful()) {

			$response = $request->getResponse();
			$data = current(json_decode($response->getContent()));

			if (empty($data))
				return false;
				
			return array(
				'lat' => $data->lat,
				'lon' => $data->lon,
				);
		}

		return false;
	}
}