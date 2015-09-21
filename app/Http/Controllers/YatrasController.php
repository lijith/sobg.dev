<?php namespace App\Http\Controllers;

use App\Http\Requests\YatraRegisterRequest;
use App\Yatra;
use Input;
use View;

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

	public $common_keywords = 'Divine in Nature, pilgrimages, Culture, tourism, darsans, spiritual journeys, Puja, Holy Bath, India, Kerala, School of Bhagavad Gita, Sandeepananda giri, Salagramam, tour, tour package';

	public $kailas_description = '';

	public $kailas_keywords = '';

	public $himalaya_description = '';

	public $himalaya_keywords = '';

	public $amarnath_description = '';

	public $amarnath_keywords = '';

	public function index() {
		$this->page_data['title'] = 'Spiritual Journeys';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = '';
		return view('yatras.yatras')->with($this->page_data);
	}

	/**
	 * Show highlights of yatra.
	 *
	 * @return view
	 */
	public function highlights($slug) {

		$yatra = Yatra::where('slug', '=', $slug)->first();

		$this->page_data['title'] = ucwords('Highlights of ' . $yatra->name);
		$this->page_data['description'] = $yatra->excerpt;
		$this->page_data['keywords'] = $yatra->keywords . ', ' . $this->common_keywords;
		$this->page_data['page'] = $yatra->highlights;
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = $slug;
		return view('yatras.yatra-page')->with($this->page_data);
	}

	/**
	 * Show highlights of yatra.
	 *
	 * @return view
	 */
	public function itinerary($slug) {

		$yatra = Yatra::where('slug', '=', $slug)->first();

		$this->page_data['title'] = ucwords('Itinerary &amp; Costs for ' . $yatra->name);
		$this->page_data['description'] = $yatra->excerpt;
		$this->page_data['keywords'] = $yatra->keywords . ', ' . $this->common_keywords;
		$this->page_data['page'] = $yatra->itenary_cost;
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = $slug;
		return view('yatras.yatra-page')->with($this->page_data);
	}

	/**
	 * tips for yatris.
	 *
	 * @return view
	 */
	public function tips($slug) {

		$yatra = Yatra::where('slug', '=', $slug)->first();

		$this->page_data['title'] = ucwords('Instructions And Tips For ' . $yatra->name);
		$this->page_data['description'] = $yatra->excerpt;
		$this->page_data['keywords'] = $yatra->keywords . ', ' . $this->common_keywords;
		$this->page_data['page'] = $yatra->tips;
		$this->page_data['sub_page_active'] = '';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = $slug;
		return view('yatras.yatra-page')->with($this->page_data);
	}

	/**
	 * registration.
	 *
	 * @return view
	 */
	public function registration($slug) {

		$yatra = Yatra::where('slug', '=', $slug)->first();
		$packages = Yatra::find($yatra->id)->packages;

		foreach ($packages as $package) {
			$package->amount = $this->moneyFormatIndia($package->amount);
		}

		$this->page_data['packages'] = $packages;
		$this->page_data['slug'] = $slug;
		$this->page_data['title'] = ucwords($yatra->name . ' registration');
		$this->page_data['description'] = $yatra->name . ' registration';
		$this->page_data['sub_page_active'] = 'registration';
		$this->page_data['top_level_page'] = 'yatras';
		$this->page_data['toggle_active'] = $slug;

		return view('yatras.yatra-registration')->with($this->page_data);

	}

	/**
	 * registration store.
	 *
	 * @return view
	 */
	public function RegistrationStore(YatraRegisterRequest $request) {

		$data = array();

		$data['title'] = Input::get('title');
		$data['name'] = Input::get('first-name') . ' ' . Input::get('last-name');
		$data['gender'] = Input::get('gender');
		$data['dob'] = Input::get('dob-day') . '-' . Input::get('dob-month') . '-' . Input::get('dob-year');
		$data['nationality'] = Input::get('nationality');
		$data['blood_group'] = Input::get('blood-group');
		$data['passport_name'] = Input::get('passport-name');
		$data['passport_number'] = Input::get('passport-number');
		$data['accompanying_persons'] = Input::get('accompanying-persons');
		$data['address_line_1'] = Input::get('address-line-1');
		$data['address_line_2'] = Input::get('address-line-2');
		$data['city'] = Input::get('city');
		$data['state'] = Input::get('state');
		$data['country'] = Input::get('country');
		$data['contact_mobile'] = Input::get('contact-mobile');
		$data['contact_landline'] = Input::get('contact-landline');
		$data['email'] = Input::get('email');
		$data['special_requirement'] = Input::get('special-requirement');
		$data['yatra_package'] = Input::get('yatra-package');
		$data['payment_mode'] = Input::get('payment-mode');
		$data['dd_number'] = Input::get('dd-number');
		$data['dd_date'] = Input::get('dd-date-day') . '-' . Input::get('dd-date-month') . '-' . Input::get('dd-date-year');
		$data['dd_bank'] = Input::get('dd-bank');
		$data['dd_amount'] = Input::get('dd-amount');
		$data['bank_transfer_date'] = Input::get('bank-transfer-date-day') . '-' . Input::get('bank-transfer-date-month') . '-' . Input::get('bank-transfer-date-year');
		$data['bank_transfer_bank'] = Input::get('bank_transfer_bank');
		$data['bank_transfer_amount'] = Input::get('bank_transfer_amount');

		//dd(Input::all());

		$mGun = new \Mailgun\Mailgun(env('MAILGUN_KEY'));
		$domain = env('MAILGUN_DOMAIN');

		$response = $mGun->sendMessage('schoolofbhagavadgita.org', array(
			'from' => 'register@sobg.com',
			'to' => env('MAILGUN_ADMIN_LIST'),
			'subject' => 'Yatra Registration',
			'text' => 'Yatra Registration',
			'html' => View::make('emails.yatra-register', ['yatra' => $data])->render(),
		));

		return redirect()->route('Registration', array(Input::get('slug')))->with('success', 'Your Application is send');

	}
	/**
	 * testimonials.
	 *
	 * @return view
	 */
	public function testimonials() {
		$this->page_data['title'] = 'Yatri\'s Speak';
		$this->page_data['description'] = '';
		$this->page_data['sub_page_active'] = 'testimonial';
		$this->page_data['top_level_page'] = 'yatras';
		//return view('yatras.home')->with($this->page_data);

	}

	function moneyFormatIndia($num) {

		$explrestunits = "";
		if (strlen($num) > 3) {
			$lastthree = substr($num, strlen($num) - 3, strlen($num));
			$restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
			$restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
			$expunit = str_split($restunits, 2);
			for ($i = 0; $i < sizeof($expunit); $i++) {
				// creates each of the 2's group and adds a comma to the end
				if ($i == 0) {
					$explrestunits .= (int) $expunit[$i] . ","; // if is first value , convert into integer
				} else {
					$explrestunits .= $expunit[$i] . ",";
				}
			}
			$thecash = $explrestunits . $lastthree;
		} else {
			$thecash = $num;
		}
		return $thecash; // writes the final format where $currency is the currency symbol.
	}

}
