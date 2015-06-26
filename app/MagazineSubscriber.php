<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MagazineSubscriber extends Model {

	//
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'magazine_subscribers';
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
		'digital_ending_at',
		'print_ending_at',
	];

	public function subscriber() {
		return $this->belongsTo('App\User', 'user_id');
	}

}
