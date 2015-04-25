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
	public function index(){
		$this->page_data['title'] = 'Courses in School of Bhagavad Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'courses';
		return view('courses')->with($this->page_data);
	}

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function children(){
		$this->page_data['title'] = 'Courses for Children';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'children';
		return view('for-children')->with($this->page_data);
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
		return view('for-seniors')->with($this->page_data);
	}

}
