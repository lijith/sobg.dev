<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactUsController extends SiteController {

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
		$this->page_data['title'] = 'Contact School of Bhagavat Gita';
		$this->page_data['description'] = '';
		return view('contact')->with($this->page_data);
	}
}
