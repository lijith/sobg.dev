<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class YatrasController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Yastras Controller
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
		'top_level_page' => 'yatras'
		'sub_page_active' => '';
	);

	/**
	 * kailas yatra highlights.
	 *
	 * @return Response
	 */
	public function kailasHighlights(){
		$this->page_data['title'] = 'Kailas - Manasarovar Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'kailas'
		return view('home')->with($this->page_data);
	}

	/**
	 * kailas yatra details.
	 *
	 * @return Response
	 */
	public function kailasDetails(){
		$this->page_data['title'] = 'Kailas - Manasarovar Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'kailas'
		return view('home')->with($this->page_data);
	}


	/**
	 * himalaya highlights
	 *
	 * @return Response
	 */
	public function himalayaHighlights(){
		$this->page_data['title'] = 'Himalaya Darsan';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'himalaya'
		return view('home')->with($this->page_data);
	}


	/**
	 * himalaya details.
	 *
	 * @return Response
	 */
	public function himalayaDetails(){
		$this->page_data['title'] = 'Himalaya Darsan';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'himalaya'
		return view('home')->with($this->page_data);
	}
	/**
	 * amarnath yatra highlights
	 *
	 * @return Response
	 */
	public function amarnathHighlights(){
		$this->page_data['title'] = 'Amarnath Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'amarnath'
		return view('home')->with($this->page_data);
	}
	/**
	 * amarnath yatra details
	 *
	 * @return Response
	 */
	public function amarnathDetails(){
		$this->page_data['title'] = 'Amarnath Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'amarnath'
		return view('home')->with($this->page_data);
	}
	/**
	 * other yatras.
	 *
	 * @return Response
	 */
	public function otherYatras(){
		$this->page_data['title'] = 'Spiritual Journeys';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'children'
		return view('home')->with($this->page_data);
	}


	/**
	 * testimonials.
	 *
	 * @return Response
	 */
	public function testimonials(){
		$this->page_data['title'] = 'Yatri\'s Speak';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'children'
		return view('home')->with($this->page_data);
	}


	/**
	 * registration.
	 *
	 * @return Response
	 */
	public function registration(){
		$this->page_data['title'] = 'Register for Spiritual Journey';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'children'
		return view('home')->with($this->page_data);
	}




}
