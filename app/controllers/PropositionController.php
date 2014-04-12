<?php

class PropositionController extends Controller {

	public static function showPlace($latitude, $longitude, $duration)
	{
		// Fetch data from the user
		$latitude = Session::get('latitude');
		if ($latitude) {
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
		

		$placeID = $respJSON->id;
		Session::put('previousPlaceID', $placeID);

		// Fetch the catchphrase
		if (!property_exists($respJSON, "catchphrases") OR count($respJSON->catchphrases) == 0)
			$catchphrase = trans('catchphrases.default');
		else
			$catchphrase = trans($respJSON->catchphrases[rand(0, count($respJSON->catchphrases) - 1)]);

		// Fetch the description
		if (!property_exists($respJSON, "description") OR $respJSON->description == null)
			$description = "";
		else
			$description = $respJSON->description;
		
		// Check if we have a background or not
		if (!property_exists($respJSON, "photo") OR $respJSON->photo == null)
			$backgroundURL = 'https://farm9.staticflickr.com/8458/8055958618_5fb048a6b7_b.jpg';
		else {
			$backgroundURL = $respJSON->photo->url;
			if (empty($backgroundURL))
				$backgroundURL = 'https://farm9.staticflickr.com/8458/8055958618_5fb048a6b7_b.jpg';
		}

		// dd($respJSON);

		// Expected data
		$data = array(
			'backgroundURL' => $backgroundURL,
			'catchphrase' => $catchphrase,
			'name' => $respJSON->name,
			'description' => $description,
			'duration' => self::timeToHours($respJSON->travelTime),
			'placeID' => $placeID,
			'latitude' => $respJSON->latitude,
			'longitude' => $respJSON->longitude,
		);

		return View::make('proposition/home', $data);
	}

	public static function timeToHours($time) {
		$hours = floor($time / 3600);
		$minutes = floor(($time / 60) % 60);

		if ($hours >= 1)
			return $hours.'h'.$minutes;
		else
			return $minutes.' mns';
	}

}