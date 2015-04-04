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
			'shipping_status',
			'payment_status',
			'shipping_name',
			'shipping_address_1',
			'shipping_address_2',
			'shipping_country',
			'shipping_city',
			'shipping_state',
			'shipping_contact_number_1',
			'shipping_contact_number_2',
			'billing_name',
			'billing_address_1',
			'billing_address_2',
			'billing_country',
			'billing_city',
			'billing_state',
			'billing_contact_number_1',
			'billing_contact_number_2',
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
