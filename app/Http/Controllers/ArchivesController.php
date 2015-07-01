<?php namespace App\Http\Controllers;

use App\Archive;
use App\SobgEvent;
use Carbon\Carbon;

class ArchivesController extends SiteController {

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
		$this->page_data['title'] = 'News Archives';
		$this->page_data['description'] = 'Archives of events and news of School of Bhagavat Gita';
		$this->page_data['keywords'] = 'Archives, News, Events, Salagramam, School of Bhagavat Gita';

		$archives = Archive::where('date', '<', Carbon::now())
			->orderBy('date', 'DESC')
			->get();

		$events = SobgEvent::where('end_date', '<', Carbon::now())
			->orderBy('end_date', 'DESC')
			->get();

		$dates = array();

		foreach ($archives as $archive) {
			$dt = Carbon::createFromFormat('Y-m-d H:i:s', $archive->date);
			$t = array(
				'date' => $dt->timestamp,
				'id' => $archive->id,
				'type' => 'news',
				'title' => $archive->title,
				'slug' => $archive->slug,
			);

			array_push($dates, $t);

		}

		foreach ($events as $event) {
			$dt = Carbon::createFromFormat('Y-m-d H:i:s', $event->end_date);
			$t = array(
				'date' => $dt->timestamp,
				'id' => $event->id,
				'type' => 'event',
				'title' => $event->title,
				'slug' => $event->slug,
			);

			array_push($dates, $t);

		}

		array_multisort($dates, SORT_DESC, $dates);

		$this->page_data['archives'] = $dates;

		return view('archives-list')->with($this->page_data);
	}

	/*
	 *
	 * Show archive page
	 *
	 */
	public function show($type, $slug) {

		if ($type == 'event') {

			$archive = SobgEvent::where('slug', '=', $slug)->first();

		} elseif ($type == 'news') {

			$archive = Archive::where('slug', '=', $slug)->first();

		}

		$this->page_data['type'] = $type;
		$this->page_data['archive'] = $archive;

		$this->page_data['title'] = 'Archive | ' . ucwords($archive['title']);
		$this->page_data['description'] = $archive['excerpt'];
		$this->page_data['keywords'] = $archive['keywords'];

		return view('archive-show')->with($this->page_data);
	}

}
