<?php

class PropositionController extends Controller {

	public function showPlace()
	{
		// Fetch data from the user
		if (Session::has('latitude')) {
			$latitude = Session::get('latitude');
			$longitude = Session::get('longitude');
			$duration = Session::get('duration');
		}	
		else	 {
			$latitude = Input::get('latitude');
			$longitude = Input::get('longitude');
			$duration = (int) Input::get('duration') * 60;
			Session::put('latitude', $latitude);
			Session::put('longitude', $longitude);
			Session::put('duration', $duration);
		}

		// The user doesn't want to go to this place
		if (Input::has('except')) {
			if (!Session::has('exceptedPlaces'))
				Session::put('exceptedPlaces', array(Input::get('except')));
			else {
				$except = Input::get('except');
				if (!in_array($except, Session::get('exceptedPlaces'))) {
					$exceptedPlaces = Session::get('exceptedPlaces');
					array_push($exceptedPlaces, $except);
					Session::put('exceptedPlaces', $exceptedPlaces);
				}
			}
		}

		$data = array(
			'from' => '['.$latitude.','.$longitude.']',
			'time' => $duration,
			'limit' => 1,
		);

		// Add excepted places if we have some
		if (Session::has('exceptedPlaces'))
			$data['except'] =  '['.implode(",", Session::get("exceptedPlaces")).']';

		// Call our API
		$request = Request::create('api/place', 'GET', $data);
		Request::replace($request->input());
		$resp = Route::dispatch($request)->getOriginalContent();
		$respJSON = json_decode($resp);
		
		if (!empty($respJSON))
			$respJSON = $respJSON[0];
		else
			return Response::view('errors.missing', array(), 404);
		

		// TODO, change $placeID
		$placeID = $respJSON->id;
		Session::put('previousPlaceID', $placeID);

		// Expected data
		$data = array(
			'backgroundURL' => 'https://farm3.staticflickr.com/2211/2495499504_78eed392dd_b.jpg',
			'catchphrase' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio augue, adipiscing sit amet ante vel, varius euismod odio.',
			'name' => $respJSON->name,
			'description' => $respJSON->description,
			'duration' => '2h20',
			'placeID' => $placeID,
		);

		return View::make('proposition/home', $data);
	}

}