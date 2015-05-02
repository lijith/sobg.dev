<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Album;
use App\Photo;

use Carbon\Carbon;

class PhotoAlbumsController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| contact us Controller
	|--------------------------------------------------------------------------
	|
	|
	*/


	/**
	 * Contact us page.
	 *
	 * @return View
	 */
	public function index(){
		$this->page_data['title'] = 'Photo Albums';
		$this->page_data['albums'] = Album::paginate(2);


		return view('albums')->with($this->page_data);
	}


	/*
	*
	* Show archive page
	* 
	 */
	public function show($slug){

		$album = Album::where('slug', '=', $slug)->first();

		$this->page_data['title'] = ucwords($album->title);
		$this->page_data['description'] = ucwords($album->description);

		$this->page_data['album'] = $album;

		$this->page_data['photos'] = Album::find($album->id)->photos;

		return view('photos')->with($this->page_data);
	}

}
