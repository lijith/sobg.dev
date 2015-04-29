<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GuruController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Guru Controller
	|--------------------------------------------------------------------------
	|
	| for pages under guru link 
	|
	*/


	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function swami(){
		$this->page_data['title'] = 'Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'swami';
		return view('guru.swami')->with($this->page_data);
	}

	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function milestones(){
		$this->page_data['title'] = 'Milestones in Spiritual Journey of Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'milestones';
		return view('guru.milestones')->with($this->page_data);
	}
	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function kashikananda(){
		$this->page_data['title'] = 'Swami Kashikananda Giri Maharaj';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'kashikananda';
		return view('guru.kashikananda')->with($this->page_data);
	}
	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function articlesAndInterviews(){
		$this->page_data['title'] = '';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'articles';
		//return view('home')->with($this->page_data);
		return 'articles';
	}
			/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function itinerary(){
		$this->page_data['title'] = 'Itinerary Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'itinerary';
		//return view('home')->with($this->page_data);
		return 'itinerary';
	}
	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function messageFromSwami(){
		$this->page_data['title'] = 'Messages from Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'swami-message';
		//return view('home')->with($this->page_data);
		return 'message';
	}
			/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function writeToSwami(){
		$this->page_data['title'] = 'Write to Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'write-to-swami';
		//return view('home')->with($this->page_data);
		return 'write to swami';
	}

}
