<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model {

	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'excerpt',
		'keywords',
		'details'
	];

}
