<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\AudioDisk;
use App\VideoDisk;
use App\Magazine;
use App\Book;
use App\SubscriptionRates;

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
	 * videos.
	 *
	 * @return View
	 */
	public function videoList(){
		$this->page_data['title'] = 'VCDs and DVDs from School of Bhagavat Gita';
		$this->page_data['description'] = 'VCD and DVD';
		$this->page_data['sub_page_active'] = '';
		$this->page_data['video_disks'] = $this->titleLimit(VideoDisk::get());

		//encode id
		foreach ($this->page_data['video_disks'] as $disk) {
			$disk->id = Hashids::connection('video')->encode($disk->id);
		}

		return view('eshop-video-disks-list')->with($this->page_data);
	}

	/**
	 * audios.
	 *
	 * @return View
	 */
	public function audioList(){
		$this->page_data['title'] = 'Audio Cds and Mp3s from School of Bhagavat Gita';
		$this->page_data['description'] = 'Audio CD and MP3';
		$this->page_data['sub_page_active'] = '';
		$this->page_data['audio_disks'] = $this->titleLimit(AudioDisk::get());

		//encode id
		foreach ($this->page_data['audio_disks'] as $disk) {
			$disk->id = Hashids::connection('audio')->encode($disk->id);
		}


		return view('eshop-audio-disks-list')->with($this->page_data);
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
		$this->page_data['video_disks'] = $this->titleLimit(VideoDisk::where('disk_type','=',1)->get());

		//encode id
		foreach ($this->page_data['video_disks'] as $disk) {
			$disk->id = Hashids::connection('video')->encode($disk->id);
		}

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
		$this->page_data['video_disks'] = $this->titleLimit(VideoDisk::where('disk_type','=',2)->get());

		//encode id
		foreach ($this->page_data['video_disks'] as $disk) {
			$disk->id = Hashids::connection('video')->encode($disk->id);
		}

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
		$this->page_data['audio_disks'] = $this->titleLimit(AudioDisk::where('disk_type','=',2)->get());

		//encode id
		foreach ($this->page_data['audio_disks'] as $disk) {
			$disk->id = Hashids::connection('audio')->encode($disk->id);
		}
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
		$this->page_data['audio_disks'] = $this->titleLimit(AudioDisk::where('disk_type','=',1)->get());

		//encode id
		foreach ($this->page_data['audio_disks'] as $disk) {
			$disk->id = Hashids::connection('audio')->encode($disk->id);
		}

		return view('eshop-audio-disks-list')->with($this->page_data);
	}

	/**
	 * List books.
	 *
	 * @return view
	 */
	public function bookList(){
		$this->page_data['title'] = 'Books from School of Bhagavat Gita';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'book';
		$this->page_data['books'] = $this->titleLimit(Book::get());

		//encode id
		foreach ($this->page_data['books'] as $book) {
			$book->id = Hashids::connection('book')->encode($book->id);
		}

		return view('eshop-books-list')->with($this->page_data);
	}

	/**
	 * piravi.
	 *
	 * @return view
	 */
	public function piravi(){
		$this->page_data['title'] = 'Piravi Magazine';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'piravi';

		$this->page_data['magazines'] = Magazine::where('magazine_file', '<>', 'NO-ATTACHMENT	')->get();
		$this->page_data['digital_subs'] = SubscriptionRates::where('type', '=', 'digital')->get();
		$this->page_data['print_subs'] = SubscriptionRates::where('type', '=', 'print')->get();

		return view('eshop-magazines-list')->with($this->page_data);
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
	 * Show a book detail.
	 *
	 * @return view
	 */
	public function BookShow($slug){
		$book = Book::where('slug','=',$slug)->first();

		$book->id = Hashids::connection('book')->encode($book->id);

		$this->page_data['title'] = ucwords($book->title);
		$this->page_data['description'] = $book->excerpt;
		$this->page_data['sub_page_active'] = 'book';
		$this->page_data['keywords'] = $book->keywords;
		$this->page_data['book'] = $book;

		return view('eshop-item-book')->with($this->page_data);
	}

	/**
	 * Show a book detail.
	 *
	 * @return view
	 */
	public function piraviShow($slug){
		$magazine = Magazine::where('slug','=',$slug)->first();

		$magazine->id = Hashids::connection('magazine')->encode($magazine->id);

		$this->page_data['title'] = ucwords($magazine->title);
		$this->page_data['description'] = $magazine->excerpt;
		$this->page_data['sub_page_active'] = 'magazine';
		$this->page_data['keywords'] = $magazine->keywords;
		$this->page_data['magazine'] = $magazine;

		return view('eshop-item-magazine')->with($this->page_data);
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
	 * limit title characters in item lists.
	 * @param Collection
	 * @return collection
	 */

	function titleLimit($items){
		foreach ($items as $item) {
			$item->title = Str::limit($item->title,15);
		}
		return $items;
	}

}
