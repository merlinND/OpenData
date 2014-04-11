<?php

class ApiController extends Controller {

	const MAX_RESULTS = 25;
	public static $supportedParameters = array(
		'from',
		'time',
		'distance',
		'except',
		'limit'
	);

	public static function helloApi() {
		return "Hello API.";
	}

	public static function getRandomPlace() {
		return "TODO: retourner un endroit aléatoire.";
	}

	/**
	 * @param from Associative array {'lat'=>, 'long'=>}
	 * @param limit
	 * @return A list of the <limit> closest places to <from>
	 */
	public static function getAllPlaces($from, $limit = self::MAX_RESULTS) {
		// TODO
		$places = array();
		$places[] = array(
			'id' => 1,
			'name' => 'TODO',
			'position' => array('lat' => 0, 'long' => 0)
		);
		return $places;
	}

	/**
	 * @param from Associative array {'lat'=>, 'long'=>}
	 * @param filters Associative array : key = name of the filter
	 */
	public static function getPlaces($from, $filters) {
		$candidates = self::getAllPlaces($from);

		// The 'limit' filter must be applied last
		$limit = -1;
		if (isset($filters['limit'])) {
			$limit = $filters['limit'];
			unset($filters['limit']);
		}

		foreach ($filters as $filter => $value) {
			$candidates = self::filter($filter, $value, $candidates);
		}
		
		// TODO : score => ranking

		// Finally, apply 'limit' filter
		if ($limit > 0)
			$candidates = self::filter('limit', $limit, $candidates);

		return $candidates;
	}

	/**
	 * Apply the filter corresponding to the <key>
	 * and return the filtered set
	 */
	protected static function filter($key, $value, $data) {
		switch ($key) {
			case 'time':
				return self::filterWithTime($value, $data);
			case 'distance':
				return self::filterWithDistance($value, $data);
			case 'except':
				return self::filterWithDistance($value, $data);
			case 'limit':
				return self::limitResults($value, $data);
			default:
				return $data;
		}
	}

	/**
	 * Filter depending on euclidian distance from <from>
	 */
	protected static function filterWithDistance($params, $candidates) {
		// TODO
		return $candidates;
	}

	/**
	 * Filter depending on time_limit attribute
	 * but also computing the needed travel time
	 */
	protected static function filterWithTime($timeLimit, $candidates) {
		// TODO: first compute rough travel time based on euclidian distance and constant travel speed, then call the travel API only whith what's left
		return $candidates;
	}

	/**
	 * @param placesId A list of the places to be excluded
	 */
	protected static function excludePlaces($placesId, $candidates) {
		// TODO
		return $candidates;
	}

	/**
	 * @param n Only keep the n first results
	 */
	protected static function limitResults($n, $candidates) {
		// TODO
		return $candidates;
	}

}