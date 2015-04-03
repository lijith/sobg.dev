<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shippings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'user_id',
			'name',
			'shipping_status',
			'payment_status',
			'address_1',
			'address_2',
			'country',
			'city',
			'state',
			'contact_number_1',
			'contact_number_2',
			'quantity',
			'amount'

			
	];


	public function user(){
    return $this->belongsTo('App\User');
  }
  public function orders(){
    return $this->hasMany('App\Order');
  }
}
