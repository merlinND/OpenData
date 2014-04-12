<?php
class Catchphrase extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'catchphrases';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('id', 'created_at', 'updated_at');
	protected $fillable = array('key', 'table', 'idTable');

	public function scopeFromType($query) {
		return $query->where('table', '=', 'types');
	}
	public function scopeFromPlace($query) {
		return $query->where('table', '=', 'places');
	}

	public function toArray() {
		return trans($this->key);
	}
}
