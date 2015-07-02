<?php namespace App\Http\Controllers;

use App\AudioDisk;
use App\Book;
use App\Http\Controllers\SiteController;
use App\Magazine;
use App\SubscriptionRates;
use App\VideoDisk;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Input;
use Vinkla\Hashids\Facades\Hashids;

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
	public function index() {

		$this->page_data['title'] = 'Publications from School of Bhagavad Gita';
		$this->page_data['description'] = 'Books, Audio ,Video CDs and DVDs of Discourses by Swami Sandeepananda Giri on the Bhagavad Gita, Upanishads and other text are made available for purchase. ';
		$this->page_data['keywords'] = 'Books, Audio ,Video CDs, DVDs, Discourses, Upanishads, vedas, magazine, e-shop, online shopping, cart, sale';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['sub_page_active'] = 'publications';

		$this->page_data['video_disks'] = VideoDisk::take(4)
		     ->orderBy('published_at', 'desc')
		     ->get();

		$this->page_data['audio_disks'] = AudioDisk::take(4)
		     ->orderBy('published_at', 'desc')
		     ->get();

		$this->page_data['books'] = Book::take(4)
		     ->orderBy('published_at', 'desc')
		     ->get();

		$this->page_data['magazines'] = Magazine::take(4)
		     ->orderBy('published_at', 'desc')
		     ->get();

		return view('eshop')->with($this->page_data);

	}

	/**
	 * videos.
	 *
	 * @return View
	 */
	public function videoList() {
		$this->page_data['title'] = 'VCDs and DVDs from School of Bhagavad Gita';
		$this->page_data['description'] = 'VCDs and DVDs from School of Bhagavad Gita';
		$this->page_data['keywords'] = 'VCD, DVD, Video CD, digital, gita, upanishad, veda';
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['video_disks'] = VideoDisk::orderBy('title', 'asc')->paginate(12);

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
	public function audioList() {
		$this->page_data['title'] = 'Audio Cds and Mp3s from School of Bhagavad Gita';
		$this->page_data['description'] = 'Audio CD and MP3 from School of Bhagavad Gita';
		$this->page_data['keywords'] = 'audio disk, mp3, gita, upanishad, veda';
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['audio_disks'] = AudioDisk::orderBy('title', 'asc')->paginate(12);

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
	public function dvdList() {
		$this->page_data['title'] = 'DVDs from School of Bhagavad Gita';
		$this->page_data['description'] = 'DVDs from School of Bhagavad Gita';
		$this->page_data['keywords'] = 'video, dvd, gita, upanishad, veda';
		$this->page_data['sub_page_active'] = 'dvd';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['video_disks'] = VideoDisk::where('disk_type', '=', 1)
		     ->orderBy('title', 'asc')
		     ->paginate(12);

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
	public function vcdList() {
		$this->page_data['title'] = 'VCDs from School of Bhagavad Gita';
		$this->page_data['description'] = 'Video CDs from School of Bhagavad Gita';
		$this->page_data['keywords'] = 'video, disks, gita, upanishad, veda';
		$this->page_data['sub_page_active'] = 'vcd';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['video_disks'] = VideoDisk::where('disk_type', '=', 2)
		     ->orderBy('title', 'asc')
		     ->paginate(12);
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
	public function mp3List() {
		$this->page_data['title'] = 'MP3 CDs from School of Bhagavad Gita';
		$this->page_data['description'] = 'MP3 from School of Bhagavad Gita';
		$this->page_data['keywords'] = 'mp3, disk, audio, gita, upanishad, veda';
		$this->page_data['sub_page_active'] = 'mp3';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['audio_disks'] = AudioDisk::where('disk_type', '=', 2)
		     ->orderBy('title', 'asc')
		     ->paginate(12);

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
	public function acdList() {
		$this->page_data['title'] = 'Audio CD from School of Bhagavad Gita';
		$this->page_data['description'] = 'Audio CD from School of Bhagavad Gita';
		$this->page_data['keywords'] = 'ACD, audio, audio cd, disk, audio, gita, upanishad, veda';
		$this->page_data['sub_page_active'] = 'acd';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['audio_disks'] = AudioDisk::where('disk_type', '=', 1)
		     ->orderBy('title', 'asc')
		     ->paginate(12);

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
	public function bookList() {
		$this->page_data['title'] = 'Books from School of Bhagavad Gita';
		$this->page_data['description'] = 'Books from School of Bhagavad Gita';
		$this->page_data['keywords'] = 'books, gita, upanishad, veda';
		$this->page_data['sub_page_active'] = 'book';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['books'] = Book::orderBy('title', 'asc')
		     ->paginate(12);

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
	public function piravi() {
		$this->page_data['title'] = 'Piravi Magazine';
		$this->page_data['description'] = 'Piravi Monthly Magazine';
		$this->page_data['keywords'] = 'piravi, magazine, monthly';
		$this->page_data['sub_page_active'] = 'piravi';
		$this->page_data['top_level_page'] = 'publications';

		//$this->page_data['magazines'] = Magazine::where('magazine_file', '<>', 'NO-ATTACHMENT')->get();

		$this->page_data['magazines'] = Magazine::orderBy('published_at', 'desc')
		     ->paginate(12);

		$this->page_data['digital_subs'] = SubscriptionRates::where('type', '=', 'digital')
		     ->orderBy('period', 'ASC')
		     ->get();
		$this->page_data['print_subs'] = SubscriptionRates::where('type', '=', 'print')
		     ->orderBy('period', 'ASC')
		     ->get();

		foreach ($this->page_data['magazines'] as $magazine) {
			$mag_pub_date = Carbon::createFromFormat('Y-m-d H:i:s', $magazine->published_at);
			$magazine->published_at = $mag_pub_date->format('d M, Y');
			$magazine->id = Hashids::connection('magazine')->encode($magazine->id);
		}

		return view('eshop-magazines-list')->with($this->page_data);
	}

	/**
	 * Show dvd info.
	 *
	 * @return view
	 */
	public function VideoShow($slug) {
		$disk = VideoDisk::where('slug', '=', $slug)->first();

		$disk_type = '';

		if ($disk->disk_type == 1) {
			$disk_type = 'dvd';
		} elseif ($disk->disk_type == 2) {
			$disk_type = 'vcd';
		}

		$disk->id = Hashids::connection('video')->encode($disk->id);

		$this->page_data['title'] = ucwords($disk->title);
		$this->page_data['description'] = $disk->excerpt;
		$this->page_data['sub_page_active'] = $disk_type;
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['keywords'] = $disk->keywords;
		$this->page_data['disk'] = $disk;

		return view('eshop-item-video-disk')->with($this->page_data);
	}

	/**
	 * Show dvd info.
	 *
	 * @return view
	 */
	public function AudioShow($slug) {
		$disk = AudioDisk::where('slug', '=', $slug)->first();

		$disk_type = '';

		if ($disk->disk_type == 1) {
			$disk_type = 'acd';
		} elseif ($disk->disk_type == 2) {
			$disk_type = 'mp3';
		}

		$disk->id = Hashids::connection('audio')->encode($disk->id);

		$this->page_data['title'] = ucwords($disk->title);
		$this->page_data['description'] = $disk->excerpt;
		$this->page_data['sub_page_active'] = $disk_type;
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['keywords'] = $disk->keywords;
		$this->page_data['disk'] = $disk;

		return view('eshop-item-audio-disk')->with($this->page_data);
	}

	/**
	 * Show a book detail.
	 *
	 * @return view
	 */
	public function BookShow($slug) {
		$book = Book::where('slug', '=', $slug)->first();

		$book->id = Hashids::connection('book')->encode($book->id);

		$this->page_data['title'] = ucwords($book->title);
		$this->page_data['description'] = $book->excerpt;
		$this->page_data['sub_page_active'] = 'book';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['keywords'] = $book->keywords;
		$this->page_data['book'] = $book;

		return view('eshop-item-book')->with($this->page_data);
	}

	/**
	 * Show a book detail.
	 *
	 * @return view
	 */
	public function piraviShow($slug) {
		$magazine = Magazine::where('slug', '=', $slug)->first();

		$magazine->id = Hashids::connection('magazine')->encode($magazine->id);

		$this->page_data['title'] = ucwords($magazine->title);
		$this->page_data['description'] = $magazine->excerpt;
		$this->page_data['sub_page_active'] = 'magazine';
		$this->page_data['top_level_page'] = 'publications';
		$this->page_data['keywords'] = $magazine->keywords;
		$this->page_data['magazine'] = $magazine;

		return view('eshop-item-magazine')->with($this->page_data);
	}

	/**
	 * books by swami.
	 *
	 * @return Response
	 */
	public function booksBySwami() {
		$this->page_data['title'] = 'Books by Swami Sandeepananda Giri';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'swami-books';
		$this->page_data['top_level_page'] = 'publications';
		return view('home')->with($this->page_data);
	}

	/**
	 * other titles.
	 *
	 * @return Response
	 */
	public function otherTitles() {
		$this->page_data['title'] = 'Book Titles available';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'other-books';
		$this->page_data['top_level_page'] = 'publications';
		return view('home')->with($this->page_data);
	}

	/**
	 * Search all shop items.
	 * @param Collection
	 * @return collection
	 */

	function search() {

		$query = Input::get('for');

		$this->page_data['search'] = $query;

		if (strlen($query) < 4) {
			$this->page_data['search'] = $query;

		} else {

			$this->page_data['video_result'] = VideoDisk::search($query)->get();
			$this->page_data['audio_result'] = AudioDisk::search($query)->get();
			$this->page_data['book_result'] = Book::search($query)->get();

			$this->page_data['result_count'] = $this->page_data['book_result']->count() + $this->page_data['video_result']->count() + $this->page_data['audio_result']->count();
			//$this->page_data['magazine_result'] = Magazine::search($query)->get();

		}

		return view('eshop-search')->with($this->page_data);
	}

	/**
	 * limit title characters in item lists.
	 * @param Collection
	 * @return collection
	 */

	function titleLimit($items) {
		foreach ($items as $item) {
			$item->title = Str::limit($item->title, 15);
		}
		return $items;
	}

}
