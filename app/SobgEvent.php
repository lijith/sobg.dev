<?php namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class SobgEvent extends Model implements SluggableInterface{

	//
	use SluggableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sobg_events';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'slug',
		'excerpt',
		'keywords',
		'details',
    'cover_photo',
    'cover_photo_thumbnail',
    'attachment',
    'start_date',
    'end_date'
	];


	protected $sluggable = array(
		  'build_from' => 'title',
		  'save_to'    => 'slug'
   );

}
