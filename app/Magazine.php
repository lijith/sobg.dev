<?php namespace App;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model implements SluggableInterface{

	//
	use SluggableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'magazines';

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
    'magazine_file',
    'published_at',
    'price',
    'author'
	];


	protected $sluggable = array(
		  'build_from' => 'title',
		  'save_to'    => 'slug'
   );


}
