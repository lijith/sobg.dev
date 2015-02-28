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
	 * page meta data
	 *
	 */
	private $page_data = array(
		'title' => 'School of Bhagavat Gita',
		'description' => 'SALAGRAMAM Ashram, envisaged and founded by Swami Sandeepananda Giri, is devoted to the understanding and spread of pure Knowledge.The School of Bhagavad Gita is the nucleus of the Ashram.',
		'keywords' => 'Bhagavad Gita, School of Bhagavad Gita, Swami Sandeepananda Giri, Salagram, Chinmayananda, Indian heritage, spiritual,culture, vedas, upanishad, tradition, philosophy, ashram, non-sectarian, camps, retreats, discourses, lectures, satsang, yagnam, gita yagnam, jnana, yatra, sadhana, Kailas - Manasarovar Yatra, Himalaya Darsan',
		'top_level_page' => 'donate',
		'sub_page_active' => ''
	);

	/**
	 * kailas yatra highlights.
	 *
	 * @return Response
	 */
	public function index(){
		$this->page_data['title'] = 'Donate And Support';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'kailas';
		return view('home')->with($this->page_data);
	}
}
