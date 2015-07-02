<?php namespace App\Http\Controllers;

class BhavishyaController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Show home page
	|
	 */

	/**
	 * Show bhavishya page.
	 *
	 * @return Response
	 */
	public function index() {
		$this->page_data['title'] = 'Bhavishya - Kerala\'s First Steiner inspired school';
		$this->page_data['description'] = 'Kerala\'s first Waldorf-Steiner School. Aims to instil an infinite love for learning in every child.';
		$this->page_data['keywords'] = 'Bhavishya, Steiner, Waldord, School, Childred, Child, Environment, ' . $this->page_data['keywords'];
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'bhavishya';
		$this->page_data['toggle_active'] = '';
		return view('bhavishya')->with($this->page_data);
	}

}
