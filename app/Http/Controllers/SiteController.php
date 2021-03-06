<?php namespace App\Http\Controllers;

use App\Yatra;
use Cart;
use Session;

class SiteController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Show home page
	|
	 */

	/**
	 * page meta data
	 *
	 */
	public $page_data = array(
		'title' => 'School of Bhagavad Gita, Swami Sandeepananda Giri, Salagram Ashram',
		'description' => 'SALAGRAMAM Ashram, envisaged and founded by Swami Sandeepananda Giri, is devoted to the understanding and spread of pure Knowledge.The School of Bhagavad Gita is the nucleus of the Ashram.',
		'keywords' => 'Bhagavad Gita, School of Bhagavad Gita, Swami Sandeepananda Giri, Salagram, Saalagram,Saalagramam,Salagramam, Chinmayananda, Indian heritage, spiritual,culture, vedas, upanishad, tradition, philosophy, ashram, non-sectarian, camps, retreats, discourses, lectures, satsang, yagnam, gita yagnam, jnana, yatra, sadhana, Kailas - Manasarovar Yatra, Himalaya Darsan',
		'top_level_page' => '',
		'sub_page_active' => '',

	);

	public function __construct() {

		if (!Session::has('shipping_charge')) {
			Session::put('shipping_charge', 80);
		}

		$cart_content = Cart::content();

		//get the yatras
		$yatras = Yatra::select('slug', 'name')
			->get();

		//dd($cart_content);

		$this->page_data['side_cart'] = $cart_content;
		$this->page_data['side_cart_total'] = Cart::total();
		$this->page_data['grand_cart_total'] = Cart::total() + Session::get('shipping_charge');
		$this->page_data['cart_count'] = $this->cartCount();
		$this->page_data['school_yatras'] = $yatras;

		// foreach ($yatras as $k) {
		// 	echo $k->name . '<br/>';
		// }

		//dd($yatras);

		if ($this->cartCount() == 1) {

			if ($cart_content->first()->options->item_sub_type == 'digital') {
				$this->page_data['grand_cart_total'] = Cart::total();
			}
		}
	}

	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */
	public function cartCount() {
		return Cart::count();
	}

	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */

}
