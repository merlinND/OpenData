<?php
class Type extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'types';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public function places()
	{
		return $this->hasMany('Place', 'idType');
	}

	public function time()
	{
		return $this->hasOne('Time', 'idTime');
	}

}
