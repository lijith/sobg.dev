<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	//
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'album_id',
		'image_name',
		'image_thumbnail'
	];

	public function album(){
		return $this->belongsTo('App\Album');
	}

}
