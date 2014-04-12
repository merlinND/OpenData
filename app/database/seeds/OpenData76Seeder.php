<?php
class OpenData76Seeder extends Seeder {

	private $baseURLNominatim = 'http://nominatim.openstreetmap.org/search?format=json&email=thibaud@dauce.fr&addressdetails=1&countrycodes=fr&state=Haute-Normandie&';

	private $links = array(
		// 'http://odata76.cloudapp.net/v1/opendata76/TAC22utilisationparthemeetaffilie?$filter=&format=json',
		'http://odata76.cloudapp.net/v1/opendata76/ExportOpenData?$filter=&format=json',
		'http://odata76.cloudapp.net/v1/opendata76/lieuxdediffusion?$filter=&format=json',
		'http://odata76.cloudapp.net/v1/opendata76/ENSpoint?$filter=&format=json',
		);

	private $names    = array('intitule_bibliotheque', 'organisme', 'nom_ens');
	private $adresses = array('numero_et_adresse', 'adresse');
	private $zipcodes = array('cp', 'code_postal');
	private $cities   = array('ville', 'comm_ens');

	private $requests   = array();
	private $requestsNb = 0;
	private $failNb     = 0;
	private $places     = array();

	public function run()
	{

		$time = time();
		echo "Starting requesting...\n";
		$responses = jyggen\Curl::get($this->links);
		$duration = time() - $time;
		echo "Requesting terminated. (".$duration."s elapsed)\n";

		foreach ($responses as $response) {
			
			$data = json_decode($response->getContent());
			foreach ($data->d as $element) {
				
				$infos = $this->getInformations($element);

				if (!empty($infos))
				{
					Place::create($infos);
					$this->places[] = $infos['name'];
				}
				else
					$this->failNb++;
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

	private function getLocalisationFromNominatim($request)
	{
		$response = current(jyggen\Curl::get($request));
		$data = current(json_decode($response->getContent()));

		if (!empty($data)) {
			
			return array(
				'lat' => $data->lat,
				'lon' => $data->lon,
				);
		}

		return false;
	}
}