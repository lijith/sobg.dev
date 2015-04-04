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
	 * DVD.
	 *
	 * @return View
	 */
	public function dvdList(){
		$this->page_data['title'] = 'DVDs from School of Bhagavat Gita';
		$this->page_data['description'] = 'DVD';
		$this->page_data['sub_page_active'] = 'dvd';
		$this->page_data['video_disks'] = VideoDisk::where('disk_type','=',1)->get();

		return view('eshop-video-disks-list')->with($this->page_data);
	}

	/**
	 * VCD.
	 *
	 * @return View
	 */
	public function vcdList(){
		$this->page_data['title'] = 'VCDs from School of Bhagavat Gita';
		$this->page_data['description'] = 'Video CDs';
		$this->page_data['sub_page_active'] = 'vcd';
		$this->page_data['video_disks'] = VideoDisk::where('disk_type','=',2)->get();

		return view('eshop-video-disks-list')->with($this->page_data);
	}

	/**
	 * mp3.
	 *
	 * @return view
	 */
	public function mp3List(){
		$this->page_data['title'] = 'MP3 CDs from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'mp3';
		$this->page_data['audio_disks'] = AudioDisk::where('disk_type','=',2)->get();

		return view('eshop-audio-disks-list')->with($this->page_data);
	}	

	/**
	 * audio cd.
	 *
	 * @return view
	 */
	public function acdList(){
		$this->page_data['title'] = 'Audio CD from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'acd';
		$this->page_data['audio_disks'] = AudioDisk::where('disk_type','=',1)->get();

		return view('eshop-audio-disks-list')->with($this->page_data);
	}

	/**
	 * books.
	 *
	 * @return view
	 */
	public function bookList(){
		$this->page_data['title'] = 'Books from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'book';
		$this->page_data['books'] = Book::get();

		return view('eshop-books-list')->with($this->page_data);
	}


	/**
	 * Show dvd info.
	 *
	 * @return view
	 */
	public function VideoShow($slug){
		$disk = VideoDisk::where('slug','=',$slug)->first();

		$disk_type = '';

		if($disk->disk_type == 1){
			$disk_type = 'dvd';
		}elseif($disk->disk_type == 2){
			$disk_type = 'vcd';
		}

		$disk->id = Hashids::connection('video')->encode($disk->id);

		$this->page_data['title'] = ucwords($disk->title);
		$this->page_data['description'] = $disk->excerpt;
		$this->page_data['sub_page_active'] = $disk_type;
		$this->page_data['keywords'] = $disk->keywords;
		$this->page_data['disk'] = $disk;

		return view('eshop-item-video-disk')->with($this->page_data);
	}

	/**
	 * Show dvd info.
	 *
	 * @return view
	 */
	public function AudioShow($slug){
		$disk = AudioDisk::where('slug','=',$slug)->first();

		$disk_type = '';

		if($disk->disk_type == 1){
			$disk_type = 'acd';
		}elseif($disk->disk_type == 2){
			$disk_type = 'mp3';
		}


		$disk->id = Hashids::connection('audio')->encode($disk->id);

		$this->page_data['title'] = ucwords($disk->title);
		$this->page_data['description'] = $disk->excerpt;
		$this->page_data['sub_page_active'] = $disk_type;
		$this->page_data['keywords'] = $disk->keywords;
		$this->page_data['disk'] = $disk;

		return view('eshop-item-audio-disk')->with($this->page_data);
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
