<?php
class PlaceCounters extends Eloquent {

	const DISPLAY_VALUE = 1;
	const GO_VALUE = 3;
	const SKIP_VALUE = -1;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'places_counters';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('id', 'created_at', 'updated_at');
	protected $fillable = array('id');

	/**
	 * Compute the score based on views and skips.
	 */
	public function getScore() {
		$score = 0;
		$score += self::DISPLAY_VALUE * $this->display;
		$score += self::GO_VALUE * $this->go;
		$score += self::SKIP_VALUE * $this->skip;
		return $score;
	}

}
