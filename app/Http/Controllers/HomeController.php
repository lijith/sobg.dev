<?php namespace App\Http\Controllers;

use App\SobgEvent;
use Carbon\Carbon;
use View;

class HomeController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Show home page
	|
	 */

	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */
	public function index() {

		$this->page_data['top_level_page'] = 'home';

		$this->page_data['events'] = SobgEvent::where('end_date', '>', Carbon::now())->get();

		return view('home')->with($this->page_data);
	}

	public function mail() {

		// $mGun = new \Mailgun\Mailgun(env('MAILGUN_KEY'));
		// $domain = env('MAILGUN_DOMAIN');
		// $sobg_mail_list = env('MAILGUN_ALL_MAIL_LIST');
		// $sobg_admin_list = env('MAILGUN_ADMIN_LIST');
		// $sobg_mag_sub_list = env('MAILGUN_MAG_SUB_LIST');

		// $mGun->sendMessage($domain, array(
		// 	'from' => 'info@sobg.com',
		// 	'to' => $sobg_admin_list,
		// 	'subject' => 'New Order',
		// 	'text' => 'New order(s)',
		// 	'html' => View::make('emails.hello')
		// 		->render(),
		// ));
		return view('emails.hello');
	}

}
