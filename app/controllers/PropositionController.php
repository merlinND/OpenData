<?php

class PropositionController extends Controller {
	
	public function showPlace()
	{
		// if (Session::has('latitude')) {
		// 	$latitude = Session::get('latitude');
		// 	$longitude = Session::get('longitude');
		// 	$duration = Session::get('duration');
		// }	
		// else	 {
		// 	$latitude = Input::get('latitude');
		// 	$longitude = Input::get('longitude');
		// 	$duration = (int) Input::get('duration') * 60;
		// 	Session::put('latitude', $latitude);
		// 	Session::put('longitude', $longitude);
		// 	Session::put('duration', $duration);
		// }


		// $curl = curl_init();
		// curl_setopt_array($curl, array(
		// 	CURLOPT_RETURNTRANSFER => 1,
		// 	CURLOPT_URL => '/api/place?from='.$latitude.','.$longitude.'&time=.'.$duration,
		// ));
		// $resp = curl_exec($curl);
		// curl_close($curl);

		// Expected data
		$data = array(
			'backgroundURL' => 'https://farm3.staticflickr.com/2211/2495499504_78eed392dd_b.jpg',
			'catchphrase' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio augue, adipiscing sit amet ante vel, varius euismod odio.',
			'name' => 'Fake Name',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio augue, adipiscing sit amet ante vel, varius euismod odio. Sed tincidunt et diam vitae placerat. Nam laoreet elementum elit, adipiscing sagittis dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed id erat congue, fermentum quam eget, dignissim turpis. Nam dignissim faucibus sagittis. Proin vitae dapibus sapien.',
			'duration' => '2h20'
		);

		return View::make('proposition/home', $data);
	}

}