<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\SobgEvent;

use Carbon\Carbon;

class EventController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Yastras Controller
	|--------------------------------------------------------------------------
	|
	|
	*/


	/**
	 * List paged events in desc order.
	 *
	 * @return view
	 */
	public function index(){

		$this->page_data['events'] = SobgEvent::where('end_date', '<', Carbon::now())
		->orderBy('end_date','DESC')
		->get();

		$this->page_data['upcoming_events'] = SobgEvent::where('end_date', '>', Carbon::now())
		->orderBy('end_date','ASC')
		->get();

		return view('events-list')->with($this->page_data);
	}


	/**
	 * Show a event detail
	 *
	 * @return view
	 */
	public function show($slug){
		
		$this->page_data['event'] = SobgEvent::where('slug', '=', $slug)->first();

		$this->page_data['past_events'] = SobgEvent::where('end_date', '<', Carbon::now())
		->where('slug', '<>', $slug)
		->orderBy('end_date','DESC')
		->take(10)
		->get();

		$this->page_data['upcoming_events'] = SobgEvent::where('end_date', '>', Carbon::now())
		->where('slug', '<>', $slug)
		->orderBy('end_date','ASC')
		->take(10)
		->get();

		return view('event')->with($this->page_data);
	}



}
