<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Http\Request;

use App\AudioDisk;
use App\VideoDisk;
use App\Magazine;
use App\Book;

use Cart;


class EshopController extends Controller {

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
		'top_level_page' => 'publications',
		'sub_page_active' => ''
	);



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
	public function dvdShow($slug){
		$disk = VideoDisk::where('slug','=',$slug)->first();

		$disk->id = Hashids::connection('video')->encode($disk->id);

		$this->page_data['title'] = ucwords($disk->title);
		$this->page_data['description'] = $disk->excerpt;
		$this->page_data['sub_page_active'] = 'dvd';
		$this->page_data['keywords'] = $disk->keywords;
		$this->page_data['disk'] = $disk;
		$this->page_data['side_cart'] = Cart::content()->toArray();


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
