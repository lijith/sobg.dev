<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\YatrasFormRequest;
use App\Yatra;
use Illuminate\Support\Str;
use Input;
use View;
use Vinkla\Hashids\HashidsManager;

class YatraController extends Controller {

	/**
	 * constructor.
	 *
	 * @param  void
	 *
	 * @return void
	 */
	public function __construct(HashidsManager $hashids) {

		$this->hashids = $hashids;
		// You must have admin access to proceed
		$this->middleware('sentry.admin');
	}

	/**
	 * List all the yatras in desc order of creation.
	 *
	 * @param  void
	 *
	 * @return View
	 */
	public function index() {

		$yatras = Yatra::get();

		foreach ($yatras as $yatra) {
			$yatra->id = $this->hashids->encode($yatra->id);
		}

		return View::make('Admin.yatras.index', ['yatras' => $yatras]);
	}

	/**
	 * Create an yatra.
	 *
	 * @param  void
	 *
	 * @return View
	 */
	public function create() {
		return View::make('Admin.yatras.create');
	}

	/**
	 * save yatra to database.
	 *
	 * @param  none
	 *
	 * @return Redirect
	 */
	public function store(YatrasFormRequest $request) {

		$yatra = new Yatra(array(
			'name' => Input::get('name'),
			'highlights' => Input::get('highlights'),
			'itenary_cost' => Input::get('itenary'),
			'keywords' => Input::get('keywords'),
			'excerpt' => Input::get('excerpt'),
			'tips' => Input::get('tips'),
		));

		$yatra->save();

		return redirect()->route('yatra.list');
	}

	/**
	 * Show the yatra.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function show($part, $hash) {
		$id = $this->hashids->decode($hash)[0];

		$yatra = Yatra::find($id);

		$yatra->id = $this->hashids->encode($yatra->id);

		return View::make('Admin.yatras.show', ['part' => $part, 'yatra' => $yatra]);

	}

	/**
	 * Edit a yatra.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function edit($part, $hash) {
		$id = $this->hashids->decode($hash)[0];

		$yatra = Yatra::find($id);

		$yatra->id = $this->hashids->encode($yatra->id);

		return View::make('Admin.yatras.edit', ['part' => $part, 'yatra' => $yatra]);
	}

	/**
	 * Update the yatra.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function update($part, $hash) {

		$id = $this->hashids->decode($hash)[0];
		$yatra = Yatra::find($id);

		if ($part == 'highlights') {
			$yatra->highlights = Input::get('highlights');
		} elseif ($part == 'itenarary') {
			$yatra->itenary_cost = Input::get('itenary');
		} elseif ($part == 'tips') {
			$yatra->itenary_cost = Input::get('tips');
		}

		$yatra->save();

		$yatra->id = $this->hashids->encode($yatra->id);

		return View::make('Admin.yatras.edit', ['part' => $part, 'yatra' => $yatra]);

	}

	/**
	 * Remove the yatra.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function destroy($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];
		$yatra = Yatra::find($id);

		$yatra->delete();
		return redirect()->route('yatra.list')->with('success', 'yatra removed');

	}

}
