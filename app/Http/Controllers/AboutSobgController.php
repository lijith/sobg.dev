<?php namespace App\Http\Controllers;

class AboutSobgController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| About SOBG Controller
	|--------------------------------------------------------------------------
	|
	| for pages under about-sobg link 
	|
	*/


	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function overview(){
		$this->page_data['title'] = 'Overview of Salagramam';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'overview';
		return view('about-sobg.overview')->with($this->page_data);
	}

		/**
	 * Show the salagramam page.
	 *
	 * @return view as response
	 */
	public function salagramam(){
		$this->page_data['title'] = 'Salagramam Ashram';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'salagramam';
		return view('about-sobg.salagramam')->with($this->page_data);
	}


	/**
	 * Show the salagramam/guided tour page
	 *
	 * @return view as response
	 **/
	function guidedTour(){
		$this->page_data['title'] = 'Guided Tour of Salagramam';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'guidedtour';

		return view('about-sobg.guidedtour')->with($this->page_data);
	}

	/**
	 * Show the salagramam/facilities page
	 *
	 * @return view as response
	 **/
	function facilities(){
		$this->page_data['title'] = 'Facilities for Public';
		$this->page_data['description'] = 'salagramam';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'facilities';
		return view('about-sobg.facilities')->with($this->page_data);
	}

	/**
	 * Show the salagramam centers page
	 *
	 * @return view as response
	 **/
	function centers(){
		$this->page_data['title'] = 'Centers of School of Bhagavat Gita';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'centers';

		//return view('about-sobg.overview')->with($this->page_data);
	}


	/**
	 * Show the his vision page
	 *
	 * @return view as response
	 **/
	function hisVision(){
		$this->page_data['title'] = 'His Vision';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'hisvision';

		return view('about-sobg.hisvision')->with($this->page_data);
	}
}
