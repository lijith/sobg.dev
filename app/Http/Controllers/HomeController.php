<?php namespace App\Http\Controllers;

class HomeController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Show home page
	|
	*/

	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */
	public function index(){
		return view('home')->with($this->page_data);
	}

}
