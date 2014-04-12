<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Launchpage
// You can change the URL, but keep the name of the route!
Route::get('/', array('as' => 'home', function() {
	return View::make('homepage/home');
}));

// After the launchpage
// You can change the URL, but keep the name of the route!
// You will have these values: duration (minutes) / longitude / latitude.
// We'll need a controller here. Get the values with Input::get('duration') etc.
Route::match(array('GET', 'POST'), '/proposition', array('as' => 'proposition', function() {

	// Fetch data from the user
	$latitude = Session::get('latitude');
	if ($latitude) {
		$latitude = Session::get('latitude');
		$longitude = Session::get('longitude');
		$duration = Session::get('duration');
	}
	else {
		$latitude = Input::get('latitude');
		$longitude = Input::get('longitude');
		$duration = (int) Input::get('duration') * 60;
		Session::put('latitude', $latitude);
		Session::put('longitude', $longitude);
		Session::put('duration', $duration);
	}

	if (!$latitude || !$longitude || !$duration)
		return Redirect::to('/', 302);

	return PropositionController::showPlace($latitude, $longitude, $duration);
}));

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
// TODO: move whole api to subdomain api.<domain>.<tld> ?

// Patterns

Route::group(array('prefix' => '/api'), function() {

	Route::pattern('from', '\[\d+,\d+\]');
	Route::pattern('place_id', '[0-9]+');

	Route::model('place_id', 'Place');
	Route::get('/place/{place_id}', function(Place $place) {
		return $place;
	});

	Route::get('/place/random', function() {
		return ApiController::getRandomPlace();
	});

	Route::get('/place/all', function() {
		$coords = json_decode(Input::get('from'));
		if (count($coords) != 2) {
			App::abort(404);
			return Response::view('errors.missing', array(), 404);
		}
		$from = new Position($coords[0], $coords[1]);

		return ApiController::getAllPlaces($from);
	});


	Route::get('/place/', function() {
		// No parameter => top ranked
		if(count(Input::all()) < 1)
			return ApiController::getTopRankedPlace();

		// No valid parameter => 404 error
		$params = array();
		foreach (ApiController::$supportedParameters as $key) {
			if (Input::has($key) && strlen(Input::get($key)) > 0) {
				$params[$key] = Input::get($key);
			}
		}

		// The <from> parameter is required
		$coords = json_decode(Input::get('from'));
		if (count($params) < 1 || !Input::has('from') || count($coords) != 2) {
			App::abort(404);
			return Response::view('errors.missing', array(), 404);
		}
		$from = new Position($coords[0], $coords[1]);

		// Interpreting the meaning of the <distance> parameter
		// Nothing specified => talking about max distance
		if (isset($params['distance'])) {
			$distances = json_decode(Input::get('distance'));
			if(count($distances) > 1) {
				$params['distance'] = array(
					'min' => $distances[0],
					'max' => $distances[1]
				);
			}
			else {
				$params['distance'] = array(
					'min' => 0,
					'max' => $params['distance']
				);
			}
		}

		// Parameter(s) => filtered search
		$results = ApiController::getPlaces($from, $params);

		return $results;
	});
});


// Routes for Flickr
Route::get('flickr/auth', function() {
    Flickering::handshake();
    return Flickering::getOpauth();
});

Route::any('flickr/oauth_callback', function() {
    Flickering::handshake();
    if(Request::getMethod() == 'POST'){
        Flickering::getOpauthCallback();
        return 'Authenticated!';
    }else{
        Flickering::getOpauth();
        return 'Being redirected..';
    }
});