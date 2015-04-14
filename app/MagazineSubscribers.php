<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MagazineSubscribers extends Model {

	//
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'shipping_id',
		'digital',
		'print',
		'active',
		'ending_at'
	];



}
