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

Route::get('/', function()
{
	return View::make('hello');
});

// Launchpage
// You can change the URL, but keep the name of the route!
Route::get('/home', array('as' => 'home', function()
{
	return View::make('homepage/home');
}));

// After the launchpage
// You can change the URL, but keep the name of the route!
// You will have these values: duration (minutes) / longitude / latitude.
// We'll need a controller here. Get the values with Input::get('duration') etc.
Route::post('/proposition', array('as' => 'proposition', function()
{
	$data = array(
		'backgroundURL' => '/assets/img/home.jpg',
		'catchphrase' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio augue, adipiscing sit amet ante vel, varius euismod odio.'
	);

	return View::make('proposition/home', $data);
}));

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
// TODO: move whole api to subdomain api.<domain>.<tld> ?

// Patterns
Route::pattern('place_id', '[0-9]+');

Route::group(array('prefix' => '/api'), function() {

	//Route::model('place_id', 'Place');
	//Route::get('/place/{place_id}', function(Place $place) {
	Route::get('/place/{place_id}', function($place_id) {
		return "TODO: retourner l'endroit avec id $place_id.";
	});

	Route::get('/place/', function() {
		// No parameter => random place
		if(count(Input::all()) < 1)
			return ApiController::getRandomPlace();

		// No valid parameter => 404 error
		$params = array();
		foreach (ApiController::$supportedParameters as $key) {
			if (Input::has($key) && strlen(Input::get($key)) > 0) {
				$params[$key] = Input::get($key);
				$valid = true;
			}
		}

		// The <from> parameter is required
		if (count($params) < 1 || !Input::has('from')) {
			App::abort(404);
			return Response::view('errors.missing', array(), 404);
		}

		// Paramètre(s) => recherche filtrée
		$coords = json_decode(Input::get('from'));

		$results = ApiController::getPlaces($coords, $params);

		return $results->flatten();
	});
});
