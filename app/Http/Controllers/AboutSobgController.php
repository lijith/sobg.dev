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
	public function overview() {
		$this->page_data['title'] = 'Overview of Salagramam';
		$this->page_data['description'] = 'Envisioned and founded by Swami Sandeepananda Giri, a not-for-profit public trust exploring Indian philosophy as a living tradition';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'overview';
		return view('about-sobg.overview')->with($this->page_data);
	}

	/**
	 * Show the salagramam page.
	 *
	 * @return view as response
	 */
	public function salagramam() {
		$this->page_data['title'] = 'Salagramam Ashram';
		$this->page_data['description'] = 'The Temple of Knowledge is headquarters of the School of Bhagavad Gita. For universality of the Bhagavad Gita, the spiritual heritage of India and the non-sectarian values';
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'salagramam';
		return view('about-sobg.salagramam')->with($this->page_data);
	}

	/**
	 * Show the salagramam/guided tour page
	 *
	 * @return view as response
	 **/
	function guidedTour() {
		$this->page_data['title'] = 'Guided Tour of Salagramam';
		$this->page_data['description'] = 'A walkthrough of the ashram';
		$this->page_data['keywords'] = 'Poomukham, Gita Kshethram, Veda Bhagavan, Naimisharanyam – Hall, Guests Rooms and Dormitories, Nalanda- Takshasila – Library Complex, Sapta Bhumika – The Labyrinth, ' . $this->page_data['keywords'];
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'guidedtour';

		return view('about-sobg.guidedtour')->with($this->page_data);
	}

	/**
	 * Show the salagramam/facilities page
	 *
	 * @return view as response
	 **/
	function facilities() {
		$this->page_data['title'] = 'Facilities for Public';
		$this->page_data['description'] = 'Gold House category rooms classified by the Department of Tourism, Government of Kerala. With WiFi, Garden, Food, Home stay';
		$this->page_data['keywords'] = 'Gold House category, Karamana River, River View, Home stay, WiFi, Garden, Food, KTDC, Kerala' . $this->page_data['keywords'];
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'facilities';
		return view('about-sobg.facilities')->with($this->page_data);
	}

	/**
	 * Show the salagramam centers page
	 *
	 * @return view as response
	 **/
	function centers() {
		$this->page_data['title'] = 'Centers of School of Bhagavat Gita';
		$this->page_data['description'] = 'Centers of School of Bhagavat Gita in India and across the world';
		$this->page_data['keywords'] = 'Centers, ' . $this->page_data['keywords'];
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'centers';

		//return view('about-sobg.overview')->with($this->page_data);
	}

	/**
	 * Show the his vision page
	 *
	 * @return view as response
	 **/
	function hisVision() {
		$this->page_data['title'] = 'His Vision';
		$this->page_data['description'] = 'Visual production department dedicated to the memory of Swami Chinmayananda';
		$this->page_data['keywords'] = 'Swami Chinmayananda,Sampoorna Gita Jnana Yajnam, Doordarshan, Art Of Man Making, Upanishad Dhaara, Kailasam, ' . $this->page_data['keywords'];
		$this->page_data['top_level_page'] = 'about-sobg';
		$this->page_data['sub_page_active'] = 'hisvision';

		return view('about-sobg.hisvision')->with($this->page_data);
	}
}
