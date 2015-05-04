<?php namespace App;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model implements SluggableInterface{

	//
	use SluggableTrait;
		use SearchableTrait;


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
