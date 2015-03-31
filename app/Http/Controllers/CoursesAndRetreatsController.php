<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CoursesAndRetreatsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| courses and retreats Controller
	|--------------------------------------------------------------------------
	|
	|
	*/


	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function children(){
		$this->page_data['title'] = 'Courses for Children';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'children';
		return view('home')->with($this->page_data);
	}


	/**
	 * for seniors
	 *
	 * @return Response
	 */
	public function seniors(){
		$this->page_data['title'] = 'Courses for Seniors';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'seniors';
		return view('home')->with($this->page_data);
	}

}
