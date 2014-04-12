<?php

class Position {

	/**
	 * Maximum distance (in kilometers) at which we
	 * assume that the user can walk / bike.
	 * <em>
	 * 	And I would walk 500 miles, 
	 * 	and I would walk 500 more...
	 * </em>
	 */
	const MAX_WALKING_DISTANCE = 10;
	const MAX_CYCLING_DISTANCE = 15;
	/**
	 * In km / hour.
	 * Used to compute very rough travel time estimation
	 * without using any API.
	 */
	public static $MAX_SPEEDS = array(
		'walking' => 7,
		'cycling' => 25,
		'driving' => 130
	);

	// Properties
	public $lat, $lon;

	/**
	 * @return An array ('lat' => <latitude>, 'long' => <longitude>)
	 */
	function __construct__($latitude, $longitude) {
		$this->lat = $latitude;
		$this->lon = $longitude;
	}

	function distanceTo($destination) {
		return self::distance($this, $destination);
	}


	/**
	 * Compute the distance between two positions.
	 * @param $p1 Instance of Position
	 * @param $p2 Instance of Position
	 * @param unit Supported units : 'K' => kilometers, otherwise => miles 
	 */
	static function distance($p1, $p2, $unit = 'K') {

		$theta = $p1->lon - $p2->lon;
		$dist = sin(deg2rad($p1->lat)) * sin(deg2rad($p2->lat)) +  cos(deg2rad($p1->lat)) * cos(deg2rad($p2->lat)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else {
			return $miles;
		}
	}

	/**
	 * @param distance In km
	 * @param mode (of transportation). Chose among 'walking', 'cycling' or 'driving'. By default (or 'auto', we try to 
	 * determine it automatically based on distance range.
	 * @return An estimate (in seconds) of the time taken to cover this distance,
	 * using rough estimates of travel speed
	 * corresponding to the mode of transportation
	 */
	static function getEstimatedTravelTime($distance, $mode = '') {
		// Determining mode of transportation
		if (!array_key_exists($mode, self::$MAX_SPEEDS))
			$mode = '';
		if (empty($mode) || $mode == 'auto') {
			$mode = 'driving';
			if ($distance < self::MAX_CYCLING_DISTANCE)
				$mode = 'cycling';
			else if ($distance < self::MAX_WALKING_DISTANCE)
				$mode = 'walking';
		}

		// Compute a rough estimate based on maximum possible speed
		// Convert km/hour in km/second
		$speed = self::$MAX_SPEEDS[$mode] / 3600;
		return $distance / $speed;
	}
}