<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DonateController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Donate
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
		$this->page_data['title'] = 'Donate And Support';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'donate';
		return view('donations')->with($this->page_data);
	}
}
