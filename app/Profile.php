<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Profile extends Model {

	use SearchableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profiles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'name',
		'gender',
		'dob',
		'nationality',
		'profession',
		'marital_status',
		'permanent_address_1',
		'permanent_address_2',
		'permanent_country',
		'permanent_city',
		'permanent_state',
		'contact_address_1',
		'contact_address_2',
		'contact_country',
		'contact_city',
		'contact_state',
		'contact_number_1',
		'contact_number_2',

	];

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		'columns' => [
			'name' => 10,
			'permanent_address_1' => 5,
			'permanent_address_2' => 5,
		],
	];

	public function user() {
		return $this->belongsTo('App\User');
	}
}
