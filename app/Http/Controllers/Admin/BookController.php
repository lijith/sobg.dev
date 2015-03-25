<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\BookFormRequest;
use App\Http\Requests\Admin\BookFormUpdateRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;
use Image;
use App\Book;
use View, Input, File;

class BookController extends Controller {

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
   * List all the disks in desc order of creation.
   *
   * @param  void
   *
   * @return View
   */
  public function index($type=null) {

  	if($type == 'acd'){
  		$books = BookDisk::orderBy('created_at', 'DESC')
  		->where('disk_type', '=', 1)
  		->get();
  	}elseif ($type == 'mp3') {
  		$books = BookDisk::orderBy('created_at', 'DESC')
  		->where('disk_type', '=', 2)
  		->get();
  	}else{
    	$books = BookDisk::orderBy('created_at', 'DESC')
    	->get();
  	}

    foreach ($books as $book) {
      $book->id = $this->hashids->encode($book->id);
      $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$book->published_at);

      $book->published_at = $pdate->toFormattedDateString();
    }

    return View::make('Admin.books.index',array('books'=>$books));
  }


  /**
   * Create an disk.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {
  	return View::make('Admin.books.create');
  }


  /**
   * save disk to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(booksFormRequest $request){

  	$samle_save_name = '';

  	$upload_dir = public_path().'/images/books/';

  	if (Input::hasFile('book-cover-photo')){
      $files = $this->handleImages();
		}

		if (!Input::has('book-type')){
    	$disk_type = 1;
		}else{
			$disk_type = Input::get('book-type');
		}


  	$disk = new AudioDisk(array(
  		'title' => Input::get('book-title'),
  		'price' => Input::get('book-price'),
  		'author' => Input::get('author'),
  		'excerpt' => Input::get('excerpt'),
  		'keywords' => Input::get('keywords'),
  		'details' => Input::get('details'),
  		'sample-audio' => $samle_save_name,
  		'disk_type' => $disk_type,
  		'published_at' => Carbon::createFromFormat('m/d/Y', Input::get('publish-date')),
  		'cover_photo' => $files['filename'],
      'cover_photo_thumbnail' => $files['thumb'],
  	));


  	$book->save();

    redirect()->route('books.list')->with('success', 'disk '.ucwords(Input::get('book-title')).' created');
  }

  /**
   * Show the disk.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function show($hash) {
    $id = $this->hashids->decode($hash)[0];

    $disk = AudioDisk::find($id);

    $book->id = $this->hashids->encode($book->id);

    $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$book->published_at);
    $book->published_at = $pdate->toFormattedDateString();

    return View::make('Admin.books.show',['disk' => $disk]);

  }

  /**
   * Edit a disk.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function edit($hash) { 
    $id = $this->hashids->decode($hash)[0];

    $disk = AudioDisk::find($id);

    $book->id = $this->hashids->encode($book->id);
    $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$book->published_at);

    $book->published_at = $pdate->format('m/d/Y');

    return View::make('Admin.books.edit',['disk' => $disk]);
  }



  /**
   * Update the disk.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update(AudioDiskFormUpdateRequest $request,$hash) { 

    $id = $this->hashids->decode($hash)[0];
    $disk = AudioDisk::find($id);

    $cover_photo = $book->cover_photo;
    $thumb = $book->cover_photo_thumbnail;

  	$upload_dir = public_path().'/images/audio-samples/';
    $samle_save_name = '';

    if (Input::hasFile('book-cover-photo')){

      if (File::exists($cover_photo)) {
        File::delete($cover_photo);
      }  

      $files = $this->handleImages();

    }

		if (Input::hasFile('sample-audio')){

			$sample = Input::file('sample-audio');

	  	$filename = Str::slug(Input::get('book-title')).'-'.time();
	  	$file_ext = $sample->getClientOriginalExtension();
	    $sample_name = $sample->getClientOriginalName();

	    $samle_save_name = $filename.'.'.$file_ext;

	    $sample->move($upload_dir,$samle_save_name);
		}

    $book->title = Input::get('book-title');
    $book->price = Input::get('book-price');
    $book->author = Input::get('author');
    $book->excerpt = Input::get('excerpt');
    $book->keywords = Input::get('keywords');
    $book->details = Input::get('details');
    $book->disk_type = Input::get('book-type');
    $book->audio_sample = ($samle_save_name == '') ? $book->audio_sample : $samle_save_name;
    $book->published_at = Carbon::createFromFormat('m/d/Y', Input::get('publish-date'));
    $book->cover_photo = isset($files['filename']) ? $files['filename'] : $book->cover_photo;
    $book->cover_photo_thumbnail = isset($files['thumb']) ? $files['thumb'] : $book->cover_photo_thumbnail;

    $book->save();
    return redirect()->route('books.show',array($hash))->with('success', 'disk '.ucwords(Input::get('book-title')).' updated');



  }

  /**
   * Remove the disk.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function destroy($hash){
      // Decode the hashid
      $id = $this->hashids->decode($hash)[0];
      $disk = VideoDisk::find($id);

      $cover_photo = $book->cover_photo;

      //remove cover pictures
      if (Input::hasFile('book-cover-photo')){

        if (File::exists($cover_photo)) {
          File::delete($cover_photo);
        }  

      }

      $book->delete();
      return redirect()->route('books.list',array($hash))->with('success', 'disk removed');

      
  }

  /**
   * resize and generate thumb of uploaded image
   *
   * @param  void
   * 
   * @return array
   **/
  private function handleImages(){

    $upload_to_dir = public_path().'/images/books/';
    $files_save_name = Str::slug(Input::get('book-title')).'-'.time();

    $cover_photo = Input::file('book-cover-photo');
    $file_ext = $cover_photo->getClientOriginalExtension();

    $save_file_name = $files_save_name.'.'.$file_ext;

    $save_file_name_thumb = $files_save_name.'_thumb.'.$file_ext;

    $cover_photo->move($upload_to_dir,$save_file_name);

    $rez_image = Image::make($upload_to_dir.$save_file_name); 
    $rez_image->resize(1280, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });
    $rez_image->save(); 

    $thumb_img = Image::make($upload_to_dir.$save_file_name);

    $thumb_img->resize(450, 290, function ($constraint) {
      $constraint->aspectRatio();
      $constraint->upsize();
    });
    $thumb_img->save($upload_to_dir.$save_file_name_thumb);

    return array(
      'filename' => $save_file_name,
      'thumb' => $save_file_name_thumb
    );

  }

}
