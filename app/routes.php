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
Route::get('/home', function()
{
	return View::make('homepage/home');
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
// TODO: move whole api to subdomain api.<domain>.<tld> ?

// Patterns
Route::pattern('place_id', '[0-9]+');

Route::group(array('prefix' => '/api'), function() {

	Route::get('/hello', 'ApiController@helloApi');

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
		$valid = false;
		foreach (ApiController::$supportedParameters as $key) {
			if (Input::has($key) && strlen(Input::get($key)) > 0) {
				$valid = true;
			}
		}
		// The <from> parameter is required
		if (!$valid || !Input::has('from')) {
			App::abort(404);
			return Response::view('errors.missing', array(), 404);
		}

		$coords = json_decode(Input::get('from'));

		// Paramètre(s) => recherche filtrée
		return ApiController::getPlaces($coords, Input::all());
	});
});
