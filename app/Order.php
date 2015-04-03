<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'shipping_id',
		'item_id',
		'item_type',
		'quantity'
	];


	public function user(){
    return $this->belongsTo('App\Shipping');
  }
}
