<?php namespace App\Http\Controllers;

class CoursesAndRetreatsController extends SiteController {

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
	public function index() {
		$this->page_data['title'] = 'Courses in School of Bhagavad Gita';
		$this->page_data['description'] = 'The courses and other activities to open up personalities and full potential';
		$this->page_data['keywords'] = 'Children, Adults, Activities, Balagramam, Workshops, Gurukula, Creativity, ' . $this->page_data['keywords'];
		$this->page_data['top_level_page'] = 'courses';
		$this->page_data['sub_page_active'] = 'courses';
		return view('courses')->with($this->page_data);
	}

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function children() {
		$this->page_data['title'] = 'Courses for Children';
		$this->page_data['description'] = 'Awakening immense potentials through creative activities and applying the values and knowledge of our ancient culture to suit today’s world,';
		$this->page_data['keywords'] = 'Children, Activities, Balagramam, Workshops, Gurukula, Creativity, Art, Personality Development, Life skills, Leadership,  ' . $this->page_data['keywords'];
		$this->page_data['top_level_page'] = 'courses';
		$this->page_data['sub_page_active'] = 'children';
		return view('for-children')->with($this->page_data);
	}

	/**
	 * for seniors
	 *
	 * @return Response
	 */
	public function seniors() {
		$this->page_data['title'] = 'Courses for Seniors';
		$this->page_data['description'] = 'A spiritual retreat for seniors, it provides the time to reflect, reconnect and reawaken.';
		$this->page_data['keywords'] = 'Seniors, Adults, Activities, Yoga, Meditation, Retreats, Sukhino Bhavanthu Camp, Private Classes, Weekley Classes, ';
		$this->page_data['top_level_page'] = 'courses';
		$this->page_data['sub_page_active'] = 'seniors';
		return view('for-seniors')->with($this->page_data);
	}

}
