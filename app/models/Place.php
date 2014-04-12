<?php

class Place extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'places';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at', 'updated_at', 'idType', 'idTime');
	protected $fillable = array('description');

	public function type()
	{
		return $this->hasOne('Type', 'id', 'idType');
	}

	public function time()
	{
		return $this->hasOne('Time', 'id', 'idTime');
	}

	public function counters()
	{
		$counters = PlaceCounters::firstOrCreate(array(
			'id' => $this->id
		));
		return $this->hasOne('PlaceCounters', 'id');
	}

	public function getTime() {

		if ($this->idTime == null)
			return $this->type->time;
		else
			return $this->time;
	}

	/**
	 * Add 1 to the view counter
	 * Call each time this Place is displayed.
	 */
	public function bumpViews() {
		$this->counters->display++;
		$this->counters->save();
	}
	/**
	 * Add 1 to the go counter
	 * Call each time this Place is selected by a user.
	 */
	public function bumpGo() {
		$this->counters->go++;
		$this->counters->save();
	}
	/**
	 * Add 1 to the skip counter
	 * Call each time a user decides not to go to this place.
	 */
	public function bumpSkip() {
		$this->counters->skip++;
		$this->counters->save();
	}

}