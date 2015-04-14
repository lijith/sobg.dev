<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionRates extends Model {

	//
	protected $fillable = [
			'type',
			'key',
			'value',
			'title'
	];


}
