<?php namespace App\Http\Controllers;

use App\SobgEvent;

use Carbon\Carbon;

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
	public function index(){

		$this->page_data['top_level_page'] = 'home';

		$this->page_data['events'] = SobgEvent::where('end_date', '>', Carbon::now())->get();

		return view('home')->with($this->page_data);
	}

	public function mail(){

		\Mail::send('emails.welcome', ['heading' => 'Welcome','data' => 'hello'], function($message){
	    $message->to('creativequb@gmail.com', 'Lijith')->subject('Welcome!');
		});

	}


}
