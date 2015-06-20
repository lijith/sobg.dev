<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MagazineFormRequest;
use App\Http\Requests\Admin\MagazineFormUpdateRequest;
use App\Magazine;
use App\MagazineSubscriber;
use App\SubscriptionRates;
use Carbon\Carbon;
use File;
use Illuminate\Support\Str;
use Image;
use Input;
use Validator;
use View;
use Vinkla\Hashids\HashidsManager;

class MagazineController extends Controller {

	//cover files directory

	private $_cover_file_path;
	private $_magazine_file_path;

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

		$this->_cover_file_path = public_path() . '/images/magazines/';
		$this->_magazine_file_path = public_path() . '/magazines-pdf/';
	}

	/**
	 * List all the magazines in desc order of creation.
	 *
	 * @param  void
	 *
	 * @return View
	 */
	public function index() {

		$magazines = Magazine::orderBy('created_at', 'DESC')
			->paginate(3);

		foreach ($magazines as $magazine) {
			$magazine->id = $this->hashids->connection('magazine')->encode($magazine->id);
			$pdate = Carbon::createFromFormat('Y-m-d H:i:s', $magazine->published_at);

			$magazine->published_at = $pdate->toFormattedDateString();
		}

		return View::make('Admin.magazines.index', array('magazines' => $magazines));
	}

	/**
	 * Create an magazine.
	 *
	 * @param  void
	 *
	 * @return View
	 */
	public function create() {
		return View::make('Admin.magazines.create');
	}

	/**
	 * save magazine to database.
	 *
	 * @param  none
	 *
	 * @return Redirect
	 */
	public function store(MagazineFormRequest $request) {

		if (Input::hasFile('magazine-cover-photo')) {
			$files = $this->handleImages();
		}

		$magazine = new Magazine(array(
			'title' => Input::get('magazine-title'),
			'price' => Input::get('magazine-price'),
			'excerpt' => Input::get('excerpt'),
			'magazine_file' => 'NO-ATTACHMENT',
			'mail_list' => 'NO-LIST',
			'keywords' => Input::get('keywords'),
			'details' => Input::get('details'),
			'published_at' => Carbon::createFromFormat('m/d/Y', Input::get('publish-date')),
			'cover_photo' => $files['filename'],
			'cover_photo_thumbnail' => $files['thumb'],
		));

		$magazine->save();

		$magazine_id = $this->hashids->connection('magazine')->encode($magazine->id);

		return redirect()->route('magazines.show', array($magazine_id))->with('success', 'Magazine ' . ucwords(Input::get('magazine-title')) . ' created,<br />Please attach digital version(pdf)');
	}

	/**
	 * Show the magazine.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function show($hash) {
		$id = $this->hashids->connection('magazine')->decode($hash)[0];

		$magazine = Magazine::find($id);

		$magazine->id = $this->hashids->connection('magazine')->encode($magazine->id);

		$pdate = Carbon::createFromFormat('Y-m-d H:i:s', $magazine->published_at);
		$magazine->published_at = $pdate->toFormattedDateString();

		return View::make('Admin.magazines.show', ['magazine' => $magazine]);

	}

	/**
	 * Edit a magazine.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function edit($hash) {
		$id = $this->hashids->connection('magazine')->decode($hash)[0];

		$magazine = Magazine::find($id);

		$magazine->id = $this->hashids->connection('magazine')->encode($magazine->id);
		$pdate = Carbon::createFromFormat('Y-m-d H:i:s', $magazine->published_at);

		$magazine->published_at = $pdate->format('m/d/Y');

		//echo $magazine->published_at;

		return View::make('Admin.magazines.edit', ['magazine' => $magazine]);
	}

	/**
	 * Update the magazine.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function update(MagazineFormUpdateRequest $request, $hash) {

		$id = $this->hashids->connection('magazine')->decode($hash)[0];
		$magazine = Magazine::find($id);

		$cover_photo = $magazine->cover_photo;
		$thumb = $magazine->cover_photo_thumbnail;

		if (Input::hasFile('magazine-cover-photo')) {

			if (File::exists($cover_photo)) {
				File::delete($cover_photo);
			}

			$files = $this->handleImages();

		}

		$magazine->title = Input::get('magazine-title');
		$magazine->price = Input::get('magazine-price');
		$magazine->excerpt = Input::get('excerpt');
		$magazine->keywords = Input::get('keywords');
		$magazine->details = Input::get('details');
		$magazine->published_at = Carbon::createFromFormat('m/d/Y', Input::get('publish-date'));
		$magazine->cover_photo = isset($files['filename']) ? $files['filename'] : $magazine->cover_photo;
		$magazine->cover_photo_thumbnail = isset($files['thumb']) ? $files['thumb'] : $magazine->cover_photo_thumbnail;

		$magazine->save();
		return redirect()->route('magazines.show', array($hash))->with('success', 'magazine ' . ucwords(Input::get('magazine-title')) . ' updated');

	}

	/**
	 * Remove the magazine.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function destroy($hash) {
		// Decode the hashid
		$id = $this->hashids->connection('magazine')->decode($hash)[0];
		$magazine = Magazine::find($id);

		//del attached magazine
		if ($magazine->magazine_file != 'NO-ATTACHMENT') {
			$del_mag_file = $this->_magazine_file_path . $magazine->magazine_file;

			if (File::exists($del_mag_file)) {
				File::delete($del_mag_file);
			}
		}

		//del cover and thumbnail
		$del_cover = $this->_cover_file_path . $magazine->cover_photo;
		$del_thumbnail = $this->_cover_file_path . $magazine->cover_photo_thumbnail;

		if (File::exists($del_cover)) {
			File::delete($del_cover);
		}

		if (File::exists($del_thumbnail)) {
			File::delete($del_thumbnail);
		}

		$magazine->delete();
		return redirect()->route('magazines.list', array($hash))->with('success', 'magazine removed');

	}

	/**
	 * resize and generate thumb of uploaded image
	 *
	 * @param  void
	 *
	 * @return array
	 **/
	public function attach($hash) {

		$id = $this->hashids->connection('magazine')->decode($hash)[0];

		$magazine = Magazine::find($id);

		$slug = $magazine->slug;

		if (Input::hasFile('magazine-file')) {

			$file = Input::file('magazine-file');
			$file_ext = $file->getClientOriginalExtension();

			$save_file_name = $slug . '.' . $file_ext;

			$validator = Validator::make(
				array('file' => $file),
				array('file' => 'required|mimes:pdf|max:2000')
			);

			if ($validator->passes()) {
				if ($magazine->magazine_file != 'NO-ATTACHMENT') {
					//remove old attached file
					$del_file = $this->_magazine_file_path . $magazine->magazine_file;

					if (File::exists($del_file)) {
						File::delete($del_file);
					}
				}

				$file->move($this->_magazine_file_path, $save_file_name);

				$magazine->magazine_file = $save_file_name;

				$magazine->save();
			} else {
				return redirect()->route('magazines.show', array($hash))->with('error', 'Invalid file or file size too big');
			}

			return redirect()->route('magazines.show', array($hash))->with('success', 'File added to ' . ucwords(Input::get('magazine-title')));

		}
	}

	/**
	 * Show rates
	 *
	 * @param  void
	 *
	 * @return view
	 **/
	public function subscription() {

		$digitals = SubscriptionRates::where('type', '=', 'digital')->get();
		$prints = SubscriptionRates::where('type', '=', 'print')->get();

		return View::make('Admin.magazines.subscriptions', ['digitals' => $digitals, 'prints' => $prints]);
	}

	/**
	 * Update rates
	 *
	 * @param  void
	 *
	 * @return redirect
	 **/
	public function updateSubscription() {

		$sub = SubscriptionRates::find(Input::get('id'));

		$sub->value = Input::get('rate');
		$sub->key = Input::get('title');
		$sub->period = Input::get('period');

		$sub->save();

		return redirect()->route('magazines.subscription.rates');
	}

	/**
	 * ADD rates
	 *
	 * @param  void
	 *
	 * @return redirect
	 **/
	public function addsubscription() {
		$title = Input::get('title');
		$rate = Input::get('rate');
		$period = Input::get('period');

		$type = Input::get('type');

		$subscription = new SubscriptionRates(array(
			'type' => $type,
			'key' => $title,
			'value' => $rate,
			'period' => $period,
		));

		$subscription->save();

		//var_dump(Input::all());
		return redirect()->route('magazines.subscription.rates');

	}
	/**
	 * send mails
	 *
	 * @param  void
	 *
	 * @return array
	 **/
	public function SendMail($hash) {

		$id = $this->hashids->connection('magazine')->decode($hash)[0];

		$magazine = Magazine::find($id);
		//send mail to mail list

		$mGun = new \Mailgun\Mailgun(env('MAILGUN_KEY'));
		$domain = env('MAILGUN_DOMAIN');

		$email_data = array(
			'heading' => ucwords($magazine->title),
			'magazine' => $magazine,
		);

		$mGun->sendMessage('creativequb.com', array(
			'from' => 'bob@example.com',
			'to' => env('MAILGUN_ALL_MAIL_LIST'),
			'subject' => 'Edition of Piravi',
			'text' => $magazine->excerpt,
			'html' => View::make('emails.new-magazine', $email_data)->render(),
		));
	}

	/**
	 * send mails
	 *
	 * @param  void
	 *
	 * @return array
	 **/
	public function PrepareSubscribersMailList($hash) {

		$id = $this->hashids->connection('magazine')->decode($hash)[0];
		$magazine = Magazine::find($id);

		$mGun = new \Mailgun\Mailgun(env('MAILGUN_KEY'));
		$domain = env('MAILGUN_DOMAIN');

		$mail_list_id = $magazine->slug . '@' . $domain;

		$mGunResponse = $mGun->get('lists');
		$current_mail_list = array();
		$current_list = $mGunResponse->http_response_body->items;

		foreach ($current_list as $ls) {
			array_push($current_mail_list, $ls->address);
		}
		if (!in_array($mail_list_id, $current_mail_list)) {
			$mail_list = array(
				'address' => $mail_list_id,
				'name' => $magazine->title,
				'access_level' => 'readonly');

			$response = $mGun->post('lists', $mail_list);

			$created = $response->http_response_body->list->address;
		}

		// $magazine->mail_list = $created;
		// $magazine->save();
		//

		$active_susbscribers = MagazineSubscriber::with('subscriber')
			->where('active', '=', '1')
			->where('digital', '=', '1')
			->get();

		$list = array();

		//$sub = MagazineSubscriber::find(2)->subscriber;
		foreach ($active_susbscribers as $sub) {
			array_push($list, array(
				'address' => $sub->subscriber->email,
			));
		}

		$mGunResponse = $mGun->post('lists/piravi-july-2015@creativequb.com/members.json', array(
			'members' => json_encode($list),
			'upsert' => 'yes',
		));
		die;

		return redirect()->route('magazines.show', array($hash))->with('success', 'Subscribers list prepared successfully');

	}
	/**
	 * send mails
	 *
	 * @param  void
	 *
	 * @return array
	 **/
	public function SendMailSubscribers($hash) {

		$id = $this->hashids->connection('magazine')->decode($hash)[0];

		$magazine = Magazine::find($id);
		//send mail to mail list

		$mGun = new \Mailgun\Mailgun(env('MAILGUN_KEY'));
		$domain = env('MAILGUN_DOMAIN');

		$email_data = array(
			'heading' => ucwords($magazine->title),
			'magazine' => $magazine,
		);

		$mGun->sendMessage('creativequb.com', array(
			'from' => 'bob@example.com',
			'to' => env('MAILGUN_ALL_MAIL_LIST'),
			'subject' => 'Edition of Piravi',
			'text' => $magazine->excerpt,
			'html' => View::make('emails.new-magazine', $email_data)->render(),
		));
	}

	/**
	 * resize and generate thumb of uploaded image
	 *
	 * @param  void
	 *
	 * @return array
	 **/
	private function handleImages() {

		$files_save_name = Str::slug(Input::get('magazine-title')) . '-' . time();

		$cover_photo = Input::file('magazine-cover-photo');
		$file_ext = $cover_photo->getClientOriginalExtension();

		$save_file_name = $files_save_name . '.' . $file_ext;

		$save_file_name_thumb = $files_save_name . '_thumb.' . $file_ext;

		$cover_photo->move($this->_cover_file_path, $save_file_name);

		$rez_image = Image::make($this->_cover_file_path . $save_file_name);
		$rez_image->resize(500, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		$rez_image->save();

		$thumb_img = Image::make($this->_cover_file_path . $save_file_name);

		$thumb_img->resize(165, 150, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		$thumb_img->save($this->_cover_file_path . $save_file_name_thumb);

		return array(
			'filename' => $save_file_name,
			'thumb' => $save_file_name_thumb,
		);

	}

}
