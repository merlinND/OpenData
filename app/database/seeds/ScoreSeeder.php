<?php
class ScoreSeeder extends Seeder {

	/**
	 * Generate random scores for each place
	 */
	public function run()
	{
		$places = Place::all();
		$places->each(function($p) {
			$p->counters->display = rand(0, 50);
			$p->counters->go = rand(0, 30);
			$p->counters->skip = rand(0, 50);
			$p->counters->save();
		});
	}
}
?>