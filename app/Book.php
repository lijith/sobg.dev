<?php namespace App;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class Book extends Model implements SluggableInterface{

	//
	use SluggableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'books';

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
		'language',
    'cover_photo',
    'cover_photo_thumbnail',
    'published_at',
    'published_by',
    'price',
    'author'
	];


	protected $sluggable = array(
		  'build_from' => 'title',
		  'save_to'    => 'slug'
   );


}
