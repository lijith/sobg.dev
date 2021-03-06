<?php namespace App;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Database\Eloquent\Model;

class Book extends Model implements SluggableInterface{

	//
	use SluggableTrait;
		use SearchableTrait;


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

	/**
   * Searchable rules.
   *
   * @var array
   */
  protected $searchable = [
	  'columns' => [
	      'title' => 10,
	      'details' => 10,
	      'keywords' => 10
	  ]
  ];


	protected $sluggable = array(
		  'build_from' => 'title',
		  'save_to'    => 'slug'
   );


}
