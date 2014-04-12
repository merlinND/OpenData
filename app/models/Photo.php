<?php
class Photo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('id', 'idPlace', 'created_at', 'updated_at');
	protected $fillable = array('idPlace', 'url');
}
