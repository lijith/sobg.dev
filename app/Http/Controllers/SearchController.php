<?php namespace App\Http\Controllers;

use GCSE\Gcse;

class SearchController extends SiteController {

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
	public function index() {

		$engine = new Gcse(env('SEARCH_ID'));
		$result = $engine->getResults('vision');
		dd($result);
	}

}
