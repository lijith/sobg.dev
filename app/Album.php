<?php namespace App;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class Album extends Model implements SluggableInterface {

	//
	use SluggableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'albums';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'slug',
		'keywords',
		'description',
    'cover_photo',
    'cover_photo_thumbnail'
	];


	protected $sluggable = array(
		  'build_from' => 'title',
		  'save_to'    => 'slug',
		  'on_update'  => true
   );


	public function photos(){
		return $this->hasMany('App\Photo');
	}

	public function delete(){
      // delete all associated photos 
      $this->photos()->delete();
      
      // delete the user
      return parent::delete();
  }


}
