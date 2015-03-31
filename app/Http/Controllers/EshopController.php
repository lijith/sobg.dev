<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Http\Request;

use App\AudioDisk;
use App\VideoDisk;
use App\Magazine;
use App\Book;

use Cart;


class EshopController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| E-Shop
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
		$this->page_data['sub_page_active'] = 'publications';

		$this->page_data['video_disks'] = VideoDisk::take(4)
		->get();

		$this->page_data['audio_disks'] = AudioDisk::take(4)
		->get();

		$this->page_data['books'] = Book::take(4)
		->get();

		$this->page_data['magazines'] = Magazine::take(4)
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
		$this->page_data['sub_page_active'] = 'dvd';
		return view('home')->with($this->page_data);
	}

	/**
	 * Show dvd info.
	 *
	 * @return Response
	 */
	public function VideoShow($slug){
		$disk = VideoDisk::where('slug','=',$slug)->first();

		$disk->id = Hashids::connection('video')->encode($disk->id);

		$this->page_data['title'] = ucwords($disk->title);
		$this->page_data['description'] = $disk->excerpt;
		$this->page_data['sub_page_active'] = 'dvd';
		$this->page_data['keywords'] = $disk->keywords;
		$this->page_data['disk'] = $disk;
		


		//var_dump(Cart::content()->toArray());


		return view('eshop-item-video-disk')->with($this->page_data);
	}

	/**
	 * mp3.
	 *
	 * @return Response
	 */
	public function mp3List(){
		$this->page_data['title'] = 'VCDs from School of Bhagavat Gita';
		$this->page_data['description'] = '';
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
		$this->page_data['sub_page_active'] = 'piravi';
		return view('home')->with($this->page_data);
	}

}
