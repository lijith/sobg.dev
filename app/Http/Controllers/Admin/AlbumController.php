<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;


use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\AlbumFormRequest;
use App\Http\Requests\Admin\AudioDiskFormUpdateRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;
use Image;
use App\Album;
use App\Photo;
use View, Input, File, Validator;

class AlbumController extends Controller {



   private  $_album_upload_dir; 
   

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

    $this->_album_upload_dir = public_path().'/images/albums/';
  }

  /**
   * List all the the albums.
   *
   * @param  void
   *
   * @return View
   */
  public function index() {

    $albums = Album::orderBy('created_at', 'DESC')
    ->paginate(3);

    foreach ($albums as $album) {
      $album->id = $this->hashids->connection('album')->encode($album->id);
    }

    return View::make('Admin.albums.index',array('albums'=>$albums));
  }

  /**
   * Show Create Album Form.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {
  	return View::make('Admin.albums.create');
  }


  /**
   * Save album to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(AlbumFormRequest $request){


  	$upload_dir = $this->_album_upload_dir;

  	if (Input::hasFile('album-cover-photo')){
      $files = $this->handleImages();
		}

  	$album = new Album(array(
  		'title' => Input::get('album-title'),
  		'keywords' => Input::get('keywords'),
  		'description' => Input::get('description'),
  		'cover_photo' => $files['filename'],
      'cover_photo_thumbnail' => $files['thumb'],
  	));


  	$album->save();

    return redirect()->route('album.list')->with('success', 'album '.ucwords(Input::get('disk-title')).' created');
  }

  /**
   * Show Album.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function show($hash) {

    $id = $this->hashids->connection('album')->decode($hash)[0];

    $album = Album::find($id);
    $photos = Album::find($id)->photos;

    //var_dump($photos);

    $album->id = $this->hashids->connection('album')->encode($album->id);

    return View::make('Admin.albums.show',['album' => $album,'photos' => $photos]);

  }

  /**
   * Edit a album.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function edit($hash) { 
    $id = $this->hashids->decode($hash)[0];

    $disk = Album::find($id);

    $disk->id = $this->hashids->encode($disk->id);
    $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$disk->published_at);

    $disk->published_at = $pdate->format('m/d/Y');

    return View::make('Admin.audiodisks.edit',['disk' => $disk]);
  }



  /**
   * Update album.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update(AlbumFormUpdateRequest $request,$hash) { 

    $id = $this->hashids->decode($hash)[0];
    $disk = Album::find($id);

    $cover_photo = $disk->cover_photo;
    $thumb = $disk->cover_photo_thumbnail;

  	$upload_dir = $this->_album_upload_dir;

    if (Input::hasFile('disk-cover-photo')){

      if (File::exists($cover_photo)) {
        File::delete($cover_photo);
      }  

      $files = $this->handleImages();

    }

    $album->title = Input::get('album-title');
    $album->keywords = Input::get('keywords');
    $album->description = Input::get('description');
    $album->cover_photo = isset($files['filename']) ? $files['filename'] : $album->cover_photo;
    $album->cover_photo_thumbnail = isset($files['thumb']) ? $files['thumb'] : $album->cover_photo_thumbnail;

    $album->save();
    return redirect()->route('albums.show',array($hash))->with('success', 'disk '.ucwords(Input::get('disk-title')).' updated');



  }

  /**
   * Remove the disk.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function destroy( $hash){

      $file_path = $this->_album_upload_dir;
      // Decode the hashid
      $id = $this->hashids->decode($hash)[0];
      $disk = Album::find($id);

      $cover_photo = $disk->cover_photo;


      if (File::exists($file_path.$cover_photo)) {
        File::delete($cover_photo);
      }  


      $disk->delete();
      return redirect()->route('audiodisks.list',array($hash))->with('success', 'disk removed');

      
  }

  /**
   * Add photos in album.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function addPhotos($hash){

    if (Input::hasFile('album-photo')){
      foreach (Input::file('album-photo') as $photo) {
        # code...
        $validator = Validator::make(
            array('file' => $photo),
            array('file' => 'required|mimes:jpeg,png|image|max:1000')
        );

        $photo_files = array();

        if ($validator->passes()) {

          $filename = Str::slug(pathinfo($photo->getClientOriginalName(),PATHINFO_FILENAME)).'-'.time();
          $file_ext = $photo->getClientOriginalExtension();

          $save_file_name = $filename.'.'.$file_ext;
          $save_file_name_thumb = $filename.'_thumb.'.$file_ext;

          $photo->move($this->_album_upload_dir,$save_file_name);

          $rez_image = Image::make($this->_album_upload_dir.$save_file_name);
          $rez_image->resize(1280, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $rez_image->save(); 

          $thumb_img = Image::make($this->_album_upload_dir.$save_file_name);

          $thumb_img->resize(450, 290, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          });
          $thumb_img->save($this->_album_upload_dir.$save_file_name_thumb);

          array_push($photo_files, array(
            'album_id' => $this->hashids->connection('album')->decode($hash)[0],
            'image_name' => $save_file_name,
            'image_thumbnail' => $save_file_name_thumb
          ));

        }

      }

      Photo::insert($photo_files);
    }

    return redirect()->route('album.show',array($hash))->with('success', 'disk removed');
   

  }


  /**
   * resize and generate thumb of uploaded image
   *
   * @param  void
   * 
   * @return array
   **/
  private function handleImages(){

    $upload_to_dir = $this->_album_upload_dir;
    $files_save_name = Str::slug(Input::get('album-title')).'-'.time();

    $cover_photo = Input::file('album-cover-photo');
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
