<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactUsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| contact us Controller
	|--------------------------------------------------------------------------
	|
	|
	*/


	/**
	 * kailas yatra highlights.
	 *
	 * @return Response
	 */
	public function index(){
		$this->page_data['title'] = 'Contact School of Bhagavat Gita';
		$this->page_data['description'] = '';
		return view('home')->with($this->page_data);
	}
}
