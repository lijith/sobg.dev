<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PublicationsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| publications
	|--------------------------------------------------------------------------
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
		'top_level_page' => 'publications'
		'sub_page_active' => '';
	);



	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function index(){
		$this->page_data['title'] = 'Courses for Children';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'publications'
		return view('home')->with($this->page_data);
	}

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function dvdList(){
		$this->page_data['title'] = 'DVDs from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'dvd'
		return view('home')->with($this->page_data);
	}

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function vcdList(){
		$this->page_data['title'] = 'VCDs from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'vcd'
		return view('home')->with($this->page_data);
	}	

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function audioList(){
		$this->page_data['title'] = 'Audio CD and MP3s from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'audio'
		return view('home')->with($this->page_data);
	}

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function booksBySwami(){
		$this->page_data['title'] = 'Books by Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'swami-books'
		return view('home')->with($this->page_data);
	}

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function otherTitles(){
		$this->page_data['title'] = 'Book Titles available';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'other-books'
		return view('home')->with($this->page_data);
	}

	/**
	 * for children.
	 *
	 * @return Response
	 */
	public function piravi(){
		$this->page_data['title'] = 'Piravi Magazine';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'piravi'
		return view('home')->with($this->page_data);
	}

}
