<?php namespace App;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class Yatra extends Model implements SluggableInterface{

	//
	use SluggableTrait;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'yatras';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'slug',
		'highlights',
		'itenary_cost',

	];

	protected $sluggable = array(
		  'build_from' => 'name',
		  'save_to'    => 'slug',
		  'on_update'  => true
   );


}
