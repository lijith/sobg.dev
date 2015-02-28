<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Show home page
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
		'top_level_page' => 'home',
		'sub_page_active' => ''
	);
	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */
	public function index(){
		return view('home')->with($this->page_data);
	}

}
