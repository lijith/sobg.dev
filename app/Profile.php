<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

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
			'address_1',
			'address_2',
			'country',
			'city',
			'state',
			'contact_number_1',
			'contact_number_2'
			
	];


	public function user(){
    return $this->belongsTo('User');
  }
}
