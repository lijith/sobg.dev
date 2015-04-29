<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use AudioDisk;
use VideoDisk;
use Magazine;
use Book;


class PublicationsController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| publications
	|--------------------------------------------------------------------------
	|
	*/



	/**
	 * Publications.
	 *
	 * @return Response
	 */
	public function index(){
		$this->page_data['title'] = 'Publications from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'publications';

		$video_disks = VideoDisk::take(4)
		->get();

		$audio_disks = AudioDisk::take(4)
		->get();

		$books = Book::take(4)
		->get();

		$magazines = Magazine::take(4)
		->get();

		return view('eshop')->with($this->page_data);
	}

	/**
	 * DVD/VCD.
	 *
	 * @return Response
	 */
	public function dvdList(){
		$this->page_data['title'] = 'DVDs from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'dvd';
		return view('home')->with($this->page_data);
	}

	/**
	 * mp3.
	 *
	 * @return Response
	 */
	public function mp3List(){
		$this->page_data['title'] = 'VCDs from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'vcd';
		return view('home')->with($this->page_data);
	}	

	/**
	 * audio cd.
	 *
	 * @return Response
	 */
	public function audioList(){
		$this->page_data['title'] = 'Audio CD and MP3s from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'audio';
		return view('home')->with($this->page_data);
	}

	/**
	 * books by swami.
	 *
	 * @return Response
	 */
	public function booksBySwami(){
		$this->page_data['title'] = 'Books by Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'swami-books';
		return view('home')->with($this->page_data);
	}

	/**
	 * other titles.
	 *
	 * @return Response
	 */
	public function otherTitles(){
		$this->page_data['title'] = 'Book Titles available';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'other-books';
		return view('home')->with($this->page_data);
	}

	/**
	 * piravi.
	 *
	 * @return Response
	 */
	public function piravi(){
		$this->page_data['title'] = 'Piravi Magazine';
		$this->page_data['description'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'piravi';
		return view('home')->with($this->page_data);
	}

}
