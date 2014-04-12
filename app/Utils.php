<?php

class Utils {

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

	/**
	 * @return An array ('lat' => <latitude>, 'long' => <longitude>)
	 */
	static function position($latitude, $longitude) {
		return array(
			'lat' => $latitude,
			'lon' => $longitude
		);
	}

	/**
	 * Compute the distance between two positions.
	 * @param position An array ('lat' => 1.0, 'long' => -2.5)
	 * @param unit Supported units : 'K' => kilometers, otherwise => miles 
	 */
	static function distance($position1, $position2, $unit = 'K') {
		$lat1 = $position1['lat'];
		$lon1 = $position1['lon'];
		$lat2 = $position2['lat'];
		$lon2 = $position2['lon'];

		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
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