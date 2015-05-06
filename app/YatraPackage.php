<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class YatraPackage extends Model{

	//


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'yatra_packages';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'yatra_id',
		'package_name',
		'amount'
	];

	public function yatra(){
    return $this->belongsTo('App\Yatra');
  }

}
