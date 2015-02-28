<?php namespace App\Http\Controllers;

class AboutSobgController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| About SOBG Controller
	|--------------------------------------------------------------------------
	|
	| for pages under about-sobg link 
	|
	*/

	/**
	 * page meta data
	 *
	 */
	private $page_data = array(
		'title' => 'School of Bhagavat Gita',
		'description' => 'SALAGRAMAM Ashram, envisaged and founded by Swami Sandeepananda Giri, is devoted to the understanding and spread of pure Knowledge.The School of Bhagavad Gita is the nucleus of the Ashram.',
		'keywords' => 'Bhagavad Gita, School of Bhagavad Gita, Swami Sandeepananda Giri, Salagram, Chinmayananda, Indian heritage, spiritual,culture, vedas, upanishad, tradition, philosophy, ashram, non-sectarian, camps, retreats, discourses, lectures, satsang, yagnam, gita yagnam, jnana, yatra, sadhana, Kailas - Manasarovar Yatra, Himalaya Darsan',
		'top_level_page' => 'about-sobg',
		'sub_page_active' => ''
	);

	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function overview(){
		$this->page_data['title'] = 'Overview of Salagramam';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'overview';
		return view('home')->with($this->page_data);
	}

		/**
	 * Show the salagramam page.
	 *
	 * @return view as response
	 */
	public function salagramam(){
		$this->page_data['title'] = 'Salagramam Ashram';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'salagramam';
		return view('home')->with($this->page_data);
	}


	/**
	 * Show the salagramam/guided tour page
	 *
	 * @return view as response
	 **/
	function guidedTour(){
		$this->page_data['title'] = 'Guided Tour of Salagramam';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'salagramam';

		return view('home')->with($this->page_data);
	}

	/**
	 * Show the salagramam/facilities page
	 *
	 * @return view as response
	 **/
	function facilities(){
		$this->page_data['title'] = 'Facilities for Public';
		$this->page_data['description'] = 'salagramam';

		return view('home')->with($this->page_data);
	}

	/**
	 * Show the salagramam centers page
	 *
	 * @return view as response
	 **/
	function centers(){
		$this->page_data['title'] = 'Centers of School of Bhagavat Gita';
		$this->page_data['description'] = 'centers';
	}


	/**
	 * Show the his vision page
	 *
	 * @return view as response
	 **/
	function hisVision(){
		$this->page_data['title'] = 'His Vision';
		$this->page_data['description'] = 'his-vision';
	}
}
