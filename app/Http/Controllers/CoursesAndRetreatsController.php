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
	 * page meta data
	 *
	 */
	private $page_data = array(
		'title' => 'School of Bhagavat Gita',
		'description' => 'SALAGRAMAM Ashram, envisaged and founded by Swami Sandeepananda Giri, is devoted to the understanding and spread of pure Knowledge.The School of Bhagavad Gita is the nucleus of the Ashram.',
		'keywords' => 'Bhagavad Gita, School of Bhagavad Gita, Swami Sandeepananda Giri, Salagram, Chinmayananda, Indian heritage, spiritual,culture, vedas, upanishad, tradition, philosophy, ashram, non-sectarian, camps, retreats, discourses, lectures, satsang, yagnam, gita yagnam, jnana, yatra, sadhana, Kailas - Manasarovar Yatra, Himalaya Darsan',
		'top_level_page' => 'courses'
		'sub_page_active' => '';
	);

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function children(){
		$this->page_data['title'] = 'Courses for Children';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'children'
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
		$this->page_data['sub_page_active'] = 'seniors'
		return view('home')->with($this->page_data);
	}

}
