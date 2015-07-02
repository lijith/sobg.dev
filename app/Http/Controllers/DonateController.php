<?php namespace App\Http\Controllers;

class DonateController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Donate
	|--------------------------------------------------------------------------
	|
	|
	 */

	/**
	 * kailas yatra highlights.
	 *
	 * @return Response
	 */
	public function index() {
		$this->page_data['title'] = 'Donate And Support';
		$this->page_data['description'] = 'For helping the less fortunate in society, especially children, by providing nutrition and education.';
		$this->page_data['keywords'] = 'charity, Donate, Sponsor, advertise, anna daanam, vidya daanam,  , ' . $this->page_data['keywords'];
		$this->page_data['sub_page_active'] = 'donate';
		return view('donations')->with($this->page_data);
	}
}
