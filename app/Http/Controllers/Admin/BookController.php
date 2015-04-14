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
   * List all the books in desc order of creation.
   *
   * @param  void
   *
   * @return View
   */
  public function index($type=null) {

  	if($type == 'sobg'){
  		$books = Book::orderBy('created_at', 'DESC')
  		->where('published_by', '=', 1)
  		->get();
  	}elseif ($type == 'other') {
  		$books = Book::orderBy('created_at', 'DESC')
  		->where('published_by', '=', 2)
  		->get();
  	}else{
    	$books = Book::orderBy('created_at', 'DESC')
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
   * Create an book.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {
  	return View::make('Admin.books.create');
  }


  /**
   * save book to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(BookFormRequest $request){


  	if (Input::hasFile('book-cover-photo')){
      $files = $this->handleImages();
		}

		if (!Input::has('published-by')){
    	$published_by = 1;
		}else{
			$published_by = Input::get('published-by');
		}


  	$book = new Book(array(
  		'title' => Input::get('book-title'),
  		'price' => Input::get('book-price'),
  		'author' => Input::get('author'),
  		'excerpt' => Input::get('excerpt'),
  		'keywords' => Input::get('keywords'),
  		'details' => Input::get('details'),
      'language' => Input::get('language'),
  		'published_by' => $published_by,
  		'published_at' => Carbon::createFromFormat('m/d/Y', Input::get('publish-date')),
  		'cover_photo' => $files['filename'],
      'cover_photo_thumbnail' => $files['thumb']
  	));


  	$book->save();

    return redirect()->route('books.list')->with('success', 'book '.ucwords(Input::get('book-title')).' created');
  }

  /**
   * Show the book.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function show($hash) {
    $id = $this->hashids->decode($hash)[0];

    $book = Book::find($id);

    $book->id = $this->hashids->encode($book->id);

    $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$book->published_at);
    $book->published_at = $pdate->toFormattedDateString();

    return View::make('Admin.books.show',['book' => $book]);

  }

  /**
   * Edit a book.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function edit($hash) { 
    $id = $this->hashids->decode($hash)[0];

    $book = Book::find($id);

    $book->id = $this->hashids->encode($book->id);
    $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$book->published_at);

    $book->published_at = $pdate->format('m/d/Y');

    return View::make('Admin.books.edit',['book' => $book]);
  }



  /**
   * Update the book.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update(BookFormUpdateRequest $request,$hash) { 

    $id = $this->hashids->decode($hash)[0];
    $book = Book::find($id);

    $cover_photo = $book->cover_photo;
    $thumb = $book->cover_photo_thumbnail;

    if (Input::hasFile('book-cover-photo')){

      if (File::exists($cover_photo)) {
        File::delete($cover_photo);
      }  

      $files = $this->handleImages();

    }

    $book->title = Input::get('book-title');
    $book->price = Input::get('book-price');
    $book->author = Input::get('author');
    $book->excerpt = Input::get('excerpt');
    $book->keywords = Input::get('keywords');
    $book->details = Input::get('details');
    $book->published_by = Input::get('published-by');
    $book->published_at = Carbon::createFromFormat('m/d/Y', Input::get('publish-date'));
    $book->cover_photo = isset($files['filename']) ? $files['filename'] : $book->cover_photo;
    $book->cover_photo_thumbnail = isset($files['thumb']) ? $files['thumb'] : $book->cover_photo_thumbnail;

    $book->save();
    return redirect()->route('books.show',array($hash))->with('success', 'book '.ucwords(Input::get('book-title')).' updated');



  }

  /**
   * Remove the book.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function destroy($hash){
      // Decode the hashid
      $id = $this->hashids->decode($hash)[0];
      $book = Book::find($id);

      $file_path = public_path().'/images/books/';

      $cover_photo = $file_path.$book->cover_photo;


        if (File::exists($cover_photo)) {
          File::delete($cover_photo);
        }  


      $book->delete();
      return redirect()->route('books.list',array($hash))->with('success', 'book removed');

      
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

        //fit thumbnail
    $thumb_img = Image::make($upload_to_dir.$save_file_name_thumb);

    $thumb_img->fit(350, 290, function ($constraint) {
    });
    $thumb_img->save($upload_to_dir.$save_file_name_thumb);


    return array(
      'filename' => $save_file_name,
      'thumb' => $save_file_name_thumb
    );

  }

}
