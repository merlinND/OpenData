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
		// Aucun paramètre => lieu aléatoire
		if(count(Input::all()) < 1)
			return ApiController::getRandomPlace();

		// Aucun paramètre invalide => 404
		$valid = false;
		foreach (ApiController::$supportedParameters as $key) {
			if (Input::has($key) && strlen(Input::get($key)) > 0) {
				$valid = true;
			}
		}
		if (!$valid) {
			App::abort(404);
			return Response::view('errors.missing', array(), 404);
		}

		// Paramètre(s) => recherche filtrée
		return var_dump(Input::all());
	});
});