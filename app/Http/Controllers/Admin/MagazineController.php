<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\MagazineFormRequest;
use App\Http\Requests\Admin\MagazineFormUpdateRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;
use Image;
use App\Magazine;
use View, Input, File;

class MagazineController extends Controller {


	//cover files directory

	private  $_cover_file_path; 
	private  $_magazine_file_path; 

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

		$this->_cover_file_path = public_path().'/images/magazines/';
		$this->_magazine_file_path = public_path().'/magazines-pdf/';
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
			$magazine->id = $this->hashids->encode($magazine->id);
			$pdate = Carbon::createFromFormat('Y-m-d H:i:s',$magazine->published_at);

			$magazine->published_at = $pdate->toFormattedDateString();
		}

		return View::make('Admin.magazines.index',array('magazines'=>$magazines));
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
	public function store(MagazineFormRequest $request){


		if (Input::hasFile('magazine-cover-photo')){
			$files = $this->handleImages();
		}

		if (Input::hasFile('magazine-file')){

			$upload_file = Input::file('magazine-file');

			$files_save_name = Str::slug(Input::get('magazine-title')).'-'.time().'.'.$upload_file->getClientOriginalExtension();

			$upload_file->move($this->_magazine_file_path,$this->_magazine_file_path.$files_save_name);

		}

		$magazine = new Magazine(array(
			'title' => Input::get('magazine-title'),
			'price' => Input::get('magazine-price'),
			'excerpt' => Input::get('excerpt'),
			'keywords' => Input::get('keywords'),
			'details' => Input::get('details'),
			'magazine_file' => $files_save_name,
			'published_at' => Carbon::createFromFormat('m/d/Y', Input::get('publish-date')),
			'cover_photo' => $files['filename'],
			'cover_photo_thumbnail' => $files['thumb']
		));


		$magazine->save();

		return redirect()->route('magazines.list')->with('success', 'Magazine '.ucwords(Input::get('magazine-title')).' created');
	}

	/**
	 * Show the magazine.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function show($hash) {
		$id = $this->hashids->decode($hash)[0];

		$magazine = Magazine::find($id);

		$magazine->id = $this->hashids->encode($magazine->id);

		$pdate = Carbon::createFromFormat('Y-m-d H:i:s',$magazine->published_at);
		$magazine->published_at = $pdate->toFormattedDateString();

		return View::make('Admin.magazines.show',['magazine' => $magazine]);

	}

	/**
	 * Edit a magazine.
	 *
	 * @param  string $hash
	 *
	 * @return View
	 */
	public function edit($hash) { 
		$id = $this->hashids->decode($hash)[0];

		$magazine = Magazine::find($id);

		$magazine->id = $this->hashids->encode($magazine->id);
		$pdate = Carbon::createFromFormat('Y-m-d H:i:s',$magazine->published_at);

		$magazine->published_at = $pdate->format('m/d/Y');

		return View::make('Admin.magazines.edit',['magazine' => $magazine]);
	}



	/**
	 * Update the magazine.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function update(MagazineFormUpdateRequest $request,$hash) { 

		$id = $this->hashids->decode($hash)[0];
		$magazine = Magazine::find($id);

		$cover_photo = $magazine->cover_photo;
		$thumb = $magazine->cover_photo_thumbnail;

		if (Input::hasFile('magazine-cover-photo')){

			if (File::exists($cover_photo)) {
				File::delete($cover_photo);
			}  

			$files = $this->handleImages();

		}

		$magazine->title = Input::get('magazine-title');
		$magazine->price = Input::get('magazine-price');
		$magazine->author = Input::get('author');
		$magazine->excerpt = Input::get('excerpt');
		$magazine->keywords = Input::get('keywords');
		$magazine->details = Input::get('details');
		$magazine->published_by = Input::get('published-by');
		$magazine->published_at = Carbon::createFromFormat('m/d/Y', Input::get('publish-date'));
		$magazine->cover_photo = isset($files['filename']) ? $files['filename'] : $magazine->cover_photo;
		$magazine->cover_photo_thumbnail = isset($files['thumb']) ? $files['thumb'] : $magazine->cover_photo_thumbnail;

		$magazine->save();
		return redirect()->route('magazines.show',array($hash))->with('success', 'magazine '.ucwords(Input::get('magazine-title')).' updated');



	}

	/**
	 * Remove the magazine.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function destroy($hash){
			// Decode the hashid
			$id = $this->hashids->decode($hash)[0];
			$magazine = Magazine::find($id);

			$file_path = public_path().'/images/magazines/';

			$cover_photo = $file_path.$magazine->cover_photo;


				if (File::exists($cover_photo)) {
					File::delete($cover_photo);
				}  


			$magazine->delete();
			return redirect()->route('magazines.list',array($hash))->with('success', 'magazine removed');

			
	}

	/**
	 * resize and generate thumb of uploaded image
	 *
	 * @param  void
	 * 
	 * @return array
	 **/
	private function handleImages(){

		$files_save_name = Str::slug(Input::get('magazine-title')).'-'.time();

		$cover_photo = Input::file('magazine-cover-photo');
		$file_ext = $cover_photo->getClientOriginalExtension();

		$save_file_name = $files_save_name.'.'.$file_ext;

		$save_file_name_thumb = $files_save_name.'_thumb.'.$file_ext;

		$cover_photo->move($this->_cover_file_path,$save_file_name);

		$rez_image = Image::make($this->_cover_file_path.$save_file_name); 
		$rez_image->resize(500, null, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
		});
		$rez_image->save(); 

		$thumb_img = Image::make($this->_cover_file_path.$save_file_name);

		$thumb_img->resize(250, 250, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		$thumb_img->save($this->_cover_file_path.$save_file_name_thumb);

		return array(
			'filename' => $save_file_name,
			'thumb' => $save_file_name_thumb
		);

	}

}
