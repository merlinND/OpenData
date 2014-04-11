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

	public static function getRandomPlace() {
		return Place::all()->random();
	}

	/**
	 * @param from Associative array {'lat'=>, 'long'=>}
	 * @param limit
	 * @return Eloquent\Collection of the <limit> closest places to <from>
	 */
	public static function getAllPlaces($from, $limit = self::MAX_RESULTS) {
		return Place::all()->slice(0, $limit);
	}

	/**
	 * @param from Associative array {'lat'=>, 'long'=>}
	 * @param filters Associative array : key = name of the filter
	 * @return Eloquent\Collection of the filtered places
	 */
	public static function getPlaces($from, $filters) {
		$candidates = self::getAllPlaces($from);

		// The 'limit' filter must be applied last
		// because we want to return the most relevant results
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
	 * @param $data Eloquent\Collection
	 */
	protected static function filter($key, $value, $data) {
		switch ($key) {
			case 'time':
				return self::filterWithTime($value, $data);
			case 'distance':
				return self::filterWithDistance($value, $data);
			case 'except':
				return self::excludePlaces($value, $data);
			case 'limit':
				return self::limitResults($value, $data);
			default:
				return $data;
		}
	}

	/**
	 * Filter depending on euclidian distance from <from>
	 * @param $candidates Eloquent\Collection
	 */
	protected static function filterWithDistance($params, $candidates) {
		// TODO
		return $candidates;
	}

	/**
	 * Filter depending on time_limit attribute
	 * but also computing the needed travel time
	 * @param $candidates Eloquent\Collection
	 */
	protected static function filterWithTime($timeLimit, $candidates) {
		// TODO: first compute rough travel time based on euclidian distance and constant travel speed, then call the travel API only whith what's left
		return $candidates;
	}

	/**
	 * @param placesId String of format [id1, id2, id3, ...]
	 * @param $candidates Eloquent\Collection
	 */
	protected static function excludePlaces($placesId, $candidates) {

		$placesId = json_decode($placesId);

		$excluder = function($candidate) use ($placesId) {
			return !in_array($candidate->id, $placesId);
		};

		return $candidates->filter($excluder);
	}

	/**
	 * @param n Only keep the n first results
	 * @param $candidates Eloquent\Collection
	 */
	protected static function limitResults($n, $candidates) {
		return $candidates->slice(0, $n);
	}

}