<?php namespace App\Http\Controllers;

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
	public function swami() {
		$this->page_data['title'] = 'Swami Sandeepananda Giri';
		$this->page_data['description'] = 'Founder and Director of School of Bhagavad Gita and Salagramam Public Charitable Trust';
		$this->page_data['keywords'] = 'Founder, scholar, spiritual teacher, speaker, swamiji, Swami Chinmayananda, Chinmaya Mission, sandeep Chaitanya';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'swami';
		return view('guru.swami')->with($this->page_data);
	}

	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function milestones() {
		$this->page_data['title'] = 'Milestones in Spiritual Journey of Swami Sandeepananda Giri';
		$this->page_data['description'] = 'Milestones in the spiritual journey of swamiji';
		$this->page_data['keywords'] = 'Milestones, spiritual journey, Chinmaya Mission, Swamiji, Sandeep Chaitanya, sannyasam, Gita Kshetram, Bharatheeyam, Kashikananda Giriji Maharaj, Bhagavad Gita Jnana Yajnam, Gita Malayalam Braille, piravi, Parliament of the World’s Religions, Chatur Gakaara Vichara Yajnam, Ganga Darsan, salagramam,';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'milestones';
		return view('guru.milestones')->with($this->page_data);
	}
	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function kashikananda() {
		$this->page_data['title'] = 'Swami Kashikananda Giri Maharaj';
		$this->page_data['description'] = 'The third Shankara H.H Acharya Mahamandaleswar Kashikananda Giri Maharaj strengthened the indisputable nature of the Advaitha philosophy.';
		$this->page_data['keywords'] = 'Acharya Mahamandaleswar Kashikananda Giri Maharaj, Dwadashadarshaacharya Maha Mandaleswar, born, South Malabar, Vedanta Acharya, author, slokas, Maha Samaadhi ';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'kashikananda';
		return view('guru.kashikananda')->with($this->page_data);
	}
	/**
	 * Show the about overview page.
	 *
	 * @return view as response
	 */
	public function articlesAndInterviews() {
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
	public function itinerary() {
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
	public function messageFromSwami() {
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
	public function writeToSwami() {
		$this->page_data['title'] = 'Write to Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'guru';
		$this->page_data['sub_page_active'] = 'write-to-swami';
		//return view('home')->with($this->page_data);
		return 'write to swami';
	}

}
