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
define('API_PREFIX', '/api');

// Patterns
Route::pattern('place_id', '[0-9]+');

//Route::model('place_id', 'Place');
Route::get(API_PREFIX.'/place/{place_id}', function($place_id) // (Place $place)
{
	return "TODO: retourner l'endroit avec id $place_id.";
});

Route::get(API_PREFIX.'/place/', function()
{
	$supported = array('from', 'time', 'distance', 'except');

	// Aucun paramètre => lieu aléatoire
	if(count(Input::all()) < 1)
		return "TODO: retourner un endroit aléatoire.";

	// Aucun paramètre invalide => 404
	$valid = false;
	foreach ($supported as $key) {
		if (Input::has($key))
			$valid = true;
	}
	if (!$valid) {
		App::abort(404);
		return Response::view('errors.missing', array(), 404);
	}

	// Paramètre(s) => recherche filtrée
	return var_dump(Input::all());
});

			if (Input::has($key) && strlen(Input::get($key)) > 0) {