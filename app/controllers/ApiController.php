<?php

class ApiController extends Controller {

	const OSRM_API_URL = 'http://router.project-osrm.org';

	const MAX_RESULTS = 25;
	public static $supportedParameters = array(
		'from',
		'time',
		'distance',
		'except',
		'limit'
	);

	/**
	 * @param Eloquent\Collection
	 * @param Position
	 * @return Eloquent\Collection Sorted by euclidian distance to <from>. The distance is also cached in the instance.
	 */
	public static function sortByDistance($collection, $from) {
		return $collection->sortBy(function($c) use ($from) {
			$to = new Position($c->latitude, $c->longitude);
			$distance = $from->distanceTo($to);

			$c->distance = $distance;

			return $distance;
		});
	}

	// TODO : update score on actions (go, skip, etc)
	public static function getTopRankedPlace() {
		$candidates = Place::all();

		$maxScore = 0;
		$top = $candidates->first();
		$candidates = $candidates->map(function($c) use (&$top, &$maxScore) {
			$score = $c->counters->score;
			if ($score > $maxScore) {
				$top = $c;
				$maxScore = $score;
			}
		});

		return $top;
	}

	public static function getRandomPlace() {
		return Place::all()->random();
	}

	/**
	 * @param from Associative array {'lat'=>, 'long'=>}
	 * @param limit A hard limit on the number of results (determined by the server, not the client)
	 * @return Eloquent\Collection of the <limit> closest places to <from>, ordered by euclidian distance
	 */
	public static function getAllPlaces($from, $limit = self::MAX_RESULTS) {
		
		$candidates = Place::all();
		$candidates = self::sortByDistance($candidates, $from);

		return $candidates->slice(0, $limit);
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
			$candidates = self::applyFilter($filter, $value, $candidates, $from);
		}

		// Finally, apply 'limit' filter
		if ($limit > 0)
			$candidates = self::applyFilter('limit', $limit, $candidates, $from);

		// Remove unneeded informations from the places
		$results = $candidates->map(function($c){
			$c = $c->toArray();
			unset($c['type']);
			return $c;
		});

		return $results;
	}

	/**
	 * Apply the filter corresponding to the <key>
	 * and return the filtered set.
	 * @param $data Eloquent\Collection
	 */
	protected static function applyFilter($key, $value, $data, $from) {
		switch ($key) {
			case 'time':
				return self::filterWithTime($value, $data, $from);

			case 'distance':
				if (!isset($value['max']))
					$value['max'] = PHP_INT_MAX;
				if (!isset($value['min']))
					$value['min'] = 0;

				return self::filterWithDistance($value, $data, $from);

			case 'except':
				$placesId = json_decode($value);
				return self::excludePlaces($placesId, $data, $from);

			case 'limit':
				return self::limitResults($value, $data, $from);

			default:
				return $data;
		}
	}

	/**
	 * Filter depending on euclidian distance from <from>
	 * @param $distances Associative array {'min'=>, 'max'=>}
	 * @param $candidates Eloquent\Collection
	 * @param $from The position of the origin
	 */
	protected static function filterWithDistance($distances, $candidates, $from) {

		$keeper = function($c) use ($from, $distances) {
			$destination = new Position($c->latitude, $c->longitude);
			$distance = $from->distanceTo($destination);
			return ($distance >= $distances['min'] && $distance <= $distances['max']);
		};

		return $candidates->filter($keeper);
	}

	/**
	 * Filter depending on time_limit attribute
	 * but also computing the needed travel time
	 * @param $timeLimit Total time available (in seconds)
	 * @param $candidates Eloquent\Collection
	 */
	protected static function filterWithTime($timeLimit, $candidates, $from) {
		// First pass : eliminate most candidates
		// through a rough estimate of travel time
		$candidates = $candidates->filter(function($c) use ($timeLimit, $from) {
			$to = new Position($c->latitude, $c->longitude);
			$distance = $from->distanceTo($to);
			$time = Position::getEstimatedTravelTime($distance);

			// Cache the travel time in this object
			$c->travelTime = $time;

			// Maximum time for *one* travel
			// (still need time to enjoy the place, and come back)
			$max = ($timeLimit - $c->getTime()->minimum) / 2;

			return ($time <= $max);
		});

		// Second pass : actually compute travel time
		// using the OSRM Routing API <3
		// TODO: add credit to the OSRM server used
		$client = new Osrm\OsrmClient(self::OSRM_API_URL);
		$routeFrom = new Osrm\Coordinate($from->lat, $from->lon);
		$candidates = $candidates->filter(function($c) use ($timeLimit, $client, $from, $routeFrom) {
			$routeTo = new Osrm\Coordinate($c->latitude, $c->longitude);

			$distance = $from->distanceTo(new Position($c->latitude, $c->longitude));
			$time = Position::getEstimatedTravelTime($distance);
			try {
				$route = $client->getRoute($routeFrom, $routeTo);
				$time = $route->getTotalTime();
			} catch (Exception $e) {
			}

			// Maximum time for *one* travel
			// (still need time to enjoy the place, and come back)
			$max = ($timeLimit - $c->getTime()->minimum) / 2;

			return $time <= $max;
		});

		return $candidates;
	}

	/**
	 * @param placesId List of ids [id1, id2, id3, ...]
	 * @param $candidates Eloquent\Collection
	 */
	protected static function excludePlaces($placesId, $candidates) {

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