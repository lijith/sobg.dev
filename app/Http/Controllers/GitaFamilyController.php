<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GitaFamilyController extends SiteController {

	//

	public function index(){

		$this->page_data['title'] = 'Gita Family, School of Bhagavad Gita, Swami Sandeepananda Giri, Salagramam Ashram';

		return view('gita-family')->with($this->page_data);
	}

}
