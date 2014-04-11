<?php

class Utils {

	/*
	 * @return An array ('lat' => <latitude>, 'long' => <longitude>)
	 */
	static function position($latitude, $longitude) {
		return array(
			'lat' => $latitude,
			'lon' => $longitude
		);
	}

	/*
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
}