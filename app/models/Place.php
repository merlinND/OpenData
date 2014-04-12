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
	protected $hidden = array();

	public function type()
	{
		return $this->hasOne('Type', 'idType');
	}

	public function getTime($id) {

		if ($this->idTime == null)
			return $this->type()->time();
		else
			return $this->time();
	}
}