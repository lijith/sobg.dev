<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class YatrasController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Yastras Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	/**
	 * spiritual journey.
	 *
	 * @return view
	 */
	public function index(){
		$this->page_data['title'] = 'Spiritual Journeys';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = '';
		return view('yatras.yatras')->with($this->page_data);
	}


	/**
	 * kailas yatra highlights.
	 *
	 * @return view
	 */
	public function kailasHighlights(){
		$this->page_data['title'] = 'Kailas - Manasarovar Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'kailas-highlight';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = 'kailas';
		return view('yatras.kailas-highlights')->with($this->page_data);
	}

	/**
	 * kailas yatra details.
	 *
	 * @return view
	 */
	public function kailasDetails(){
		$this->page_data['title'] = 'Kailas - Manasarovar Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'kailas-details';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = 'kailas';
		return view('yatras.kailas-cost')->with($this->page_data);
	}

	/**
	 * kailas tips.
	 *
	 * @return view
	 */
	public function kailasTips(){
		$this->page_data['title'] = 'Kailas - Manasarovar Tips';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'kailas-tips';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = 'kailas';

		return view('yatras.kailas-tips')->with($this->page_data);
	}


	/**
	 * himalaya highlights
	 *
	 * @return view
	 */
	public function himalayaHighlights(){
		$this->page_data['title'] = 'Himalaya Darsan';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'himalaya-highlight';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = 'himalaya';
		return view('yatras.himalaya-highlights')->with($this->page_data);
	}


	/**
	 * himalaya details.
	 *
	 * @return view
	 */
	public function himalayaDetails(){
		$this->page_data['title'] = 'Himalaya Darsan';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'himalaya-details';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = 'himalaya';
		return view('yatras.himalaya-highlights')->with($this->page_data);
	}
	/**
	 * amarnath yatra highlights
	 *
	 * @return view
	 */
	public function amarnathHighlights(){
		$this->page_data['title'] = 'Amarnath Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'amarnath-highlight';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = 'amarnath';
		return view('yatras.amarnath-highlights')->with($this->page_data);
	}
	/**
	 * amarnath yatra details
	 *
	 * @return view
	 */
	public function amarnathDetails(){
		$this->page_data['title'] = 'Amarnath Yatra';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'amarnath-details';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = 'amarnath';
		return view('yatras.amarnath-highlights')->with($this->page_data);
	}
	/**
	 * other yatras.
	 *
	 * @return view
	 */
	public function otherYatras(){
		$this->page_data['title'] = 'Spiritual Journeys';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'other-yatra';
		$this->page_data['top_level_page'] = 'yatras';
		//return view('yatras.home')->with($this->page_data);
	}


	/**
	 * testimonials.
	 *
	 * @return view
	 */
	public function testimonials(){
		$this->page_data['title'] = 'Yatri\'s Speak';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'testimonial';
		$this->page_data['top_level_page'] = 'yatras';
		//return view('yatras.home')->with($this->page_data);

	}


	/**
	 * registration.
	 *
	 * @return view
	 */
	public function registration(){
		$this->page_data['title'] = 'Register for Spiritual Journey';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'registration';
		$this->page_data['top_level_page'] = 'yatras';
		return view('yatras.kailas-registration')->with($this->page_data);
	}




}
