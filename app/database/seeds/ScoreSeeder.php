<?php
class ScoreSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		$places = Place::all();
		$places->each(function($p) {
			$counters = PlaceCounters::firstOrCreate(array(
				'id' => $p->id
			));

			$counters->display = rand(0, 50);
			$counters->go = rand(0, 30);
			$counters->skip = rand(0, 50);
			$counters->save();
		});
	}
}
?>