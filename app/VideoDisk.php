<?php namespace App;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class VideoDisk extends Model implements SluggableInterface{

	//
	use SluggableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'video_disks';

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
		'disk_type',
    'cover_photo',
    'cover_photo_thumbnail',
    'youtube_link',
    'published_at',
    'price',
    'author'
	];


	protected $sluggable = array(
		  'build_from' => 'title',
		  'save_to'    => 'slug'
   );


}