<?php namespace App\Http\Controllers;

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
	public function index() {

		$this->page_data['events'] = SobgEvent::where('end_date', '<', Carbon::now())
		     ->orderBy('end_date', 'DESC')
		     ->get();

		$this->page_data['upcoming_events'] = SobgEvent::where('end_date', '>', Carbon::now())
		     ->orderBy('end_date', 'ASC')
		     ->get();

		return view('events-list')->with($this->page_data);
	}

	/**
	 * Show a event detail
	 *
	 * @return view
	 */
	public function show($slug) {

		$event = SobgEvent::where('slug', '=', $slug)->first();

		$this->page_data['past_events'] = SobgEvent::where('end_date', '<', Carbon::now())
		     ->where('slug', '<>', $slug)
		     ->orderBy('end_date', 'DESC')
		     ->take(10)
		     ->get();

		$this->page_data['upcoming_events'] = SobgEvent::where('end_date', '>', Carbon::now())
		     ->where('slug', '<>', $slug)
		     ->orderBy('end_date', 'ASC')
		     ->take(10)
		     ->get();

		$this->page_data['title'] = ucwords($event->title);
		$this->page_data['description'] = $event->excerpt;
		$this->page_data['keywords'] = $event->keywords;
		$this->page_data['event'] = $event;
		return view('event')->with($this->page_data);
	}

}
