<?php

class PropositionController extends Controller {

	public function showPlace()
	{
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

		if (!Session::has('exceptedPlaces'))
			$url = '/api/place?from='.$latitude.','.$longitude.'&time=.'.$duration;
		else
			$url = '/api/place?from='.$latitude.','.$longitude.'&time=.'.$duration.'&except='.implode(",", Session::get("exceptedPlaces"));

		// $curl = curl_init();
		// curl_setopt_array($curl, array(
		// 	CURLOPT_RETURNTRANSFER => 1,
		// 	CURLOPT_URL => $url,
		// ));
		// $resp = curl_exec($curl);
		// curl_close($curl);

		// TODO, change $placeID
		$placeID = 42;
		Session::put('previousPlaceID', $placeID);

		// Expected data
		$data = array(
			'backgroundURL' => 'https://farm3.staticflickr.com/2211/2495499504_78eed392dd_b.jpg',
			'catchphrase' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio augue, adipiscing sit amet ante vel, varius euismod odio.',
			'name' => 'Fake Name',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio augue, adipiscing sit amet ante vel, varius euismod odio. Sed tincidunt et diam vitae placerat. Nam laoreet elementum elit, adipiscing sagittis dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed id erat congue, fermentum quam eget, dignissim turpis. Nam dignissim faucibus sagittis. Proin vitae dapibus sapien.',
			'duration' => '2h20',
			'placeID' => $placeID,
		);

		return View::make('proposition/home', $data);
	}

}