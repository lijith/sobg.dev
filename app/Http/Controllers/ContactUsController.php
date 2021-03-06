<?php namespace App\Http\Controllers;

use Mailgun\Mailgun;

class ContactUsController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| contact us Controller
	|--------------------------------------------------------------------------
	|
	|
	 */

	/**
	 * Contact us page.
	 *
	 * @return View
	 */
	public function index() {
		$this->page_data['title'] = 'Contact School of Bhagavat Gita';
		$this->page_data['description'] = 'Salagramam Kundamonkadavu Thirumala Thiruvananthapuram Kerala India';
		$this->page_data['keywords'] = 'Kundamonkadavu, Thirumala, Thiruvananthapuram, Kerala, India, Centers, Abroad, ' . $this->page_data['keywords'];
		return view('contact')->with($this->page_data);
	}

	/**
	 * Send Message.
	 *
	 * @return View
	 */
	public function sendMessage() {

		$data = array(
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'subject' => Input::get('subject'),
			'contact_number' => Input::get('contact-number'),
			'message' => Input::get('message'),
			'mail_message' => strip_tags(Input::get('message')),
		);

		// Mail::send('mail', $data, function($message) {
		//   		 $message->to('mail@desianconstruction.com', 'Jon Doe')->subject(ucwords(Input::get('subject')));
		// });

		// if(count(Mail::failures()) > 0){
		//     echo 0;
		// }else{
		// 	echo 1;
		// }

		/*
		 *
		 * Sending with mailgun api
		 *
		 */

		//now send mails
		$mGun = new Mailgun(env('MAILGUN_KEY'));
		$domain = env('MAILGUN_DOMAIN');

		//send message to admin
		$mGun->sendMessage($domain, array(
			'from' => 'info@sobg.com',
			'to' => env('MAILGUN_ADMIN_LIST'),
			'subject' => 'New Order',
			'text' => 'New order(s)',
			'html' => View::make('emails.contact-us', $data)
				->render(),
		));

		return response()->json(1);
	}

}
