<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;

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
	public function index(){
		$this->page_data['title'] = 'Contact School of Bhagavat Gita';
		$this->page_data['description'] = '';
		return view('contact')->with($this->page_data);
	}

	/**
	 * Send Message.
	 *
	 * @return View
	 */
	public function sendMessage(){

			// $data = array(
			// 	'name' => Input::get('name'),
			// 	'email' => Input::get('email'),
			// 	'subject' => Input::get('subject'),
			// 	'contact_number' => Input::get('contact-number'),
			// 	'message' => Input::get('message'),
			// 	'mail_message' => strip_tags(Input::get('message'))
			// );
			// Mail::send('mail', $data, function($message) {
		 //   		 $message->to('mail@desianconstruction.com', 'Jon Doe')->subject(ucwords(Input::get('subject')));
			// });

			// if(count(Mail::failures()) > 0){
			//     echo 0;
			// }else{
			// 	echo 1;
			// }
			return response()->json(1);
	}

}
