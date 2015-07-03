<?php namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements SluggableInterface {

	//
	use SluggableTrait;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'excerpt',
		'date',
		'keywords',
		'details',
	];

	protected $sluggable = array(
		'build_from' => 'title',
		'save_to' => 'slug',
		'on_update' => true,
	);

}
