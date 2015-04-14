<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\ArchivesFormRequest;
use Carbon\Carbon;
use Image;
use App\Archive;
use View, Input, File;

class ArchiveController extends Controller {

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
   * List all the archives in desc order of creation.
   *
   * @param  void
   *
   * @return View
   */
  public function index() {

    $archives = Archive::orderBy('created_at', 'DESC')->get();

    foreach ($archives as $archive) {
      $archive->id = $this->hashids->connection('archive')->encode($archive->id);

    }

    return View::make('Admin.archives.index',array('archives'=>$archives));
  }


  /**
   * Create an event.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {
  	return View::make('Admin.archives.create');
  }


  /**
   * save event to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(ArchivesFormRequest $request){


  	$archive = new Archive(array(
  		'title' => Input::get('archive-title'),
  		'excerpt' => Input::get('excerpt'),
  		'keywords' => Input::get('keywords'),
  		'details' => Input::get('details'),
  	));

  	$archive->save();

    $archive_id = $this->hashids->connection('archive')->encode($archive->id);


    return redirect()->route('archives.show',array($archive_id))->with('success', 'Archive added');
  }

  /**
   * Show the event.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function show($hash) {
    $id = $this->hashids->connection('archive')->decode($hash)[0];

    $archive = Archive::find($id);

    $archive->id = $this->hashids->connection('archive')->encode($archive->id);


    return View::make('Admin.archives.show',['archive' => $archive]);

  }

  /**
   * Edit a event.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function edit($hash) { 

    $id = $this->hashids->connection('archive')->decode($hash)[0];

    $archive = Archive::find($id);

    $archive->id = $this->hashids->connection('archive')->encode($archive->id);

    return View::make('Admin.archives.edit',['archive' => $archive]);
  }



  /**
   * Update the event.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update(ArchivesFormRequest $request,$hash) { 

    $id = $this->hashids->connection('archive')->decode($hash)[0];
    $archive = Archive::find($id);

    $archive->title = Input::get('archive-title');
    $archive->excerpt = Input::get('excerpt');
    $archive->keywords = Input::get('keywords');
    $archive->details = Input::get('details');
    $archive->save();

    return redirect()->route('archives.show',array($hash))->with('success', 'Archive updated');



  }

  /**
   * Remove the event.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function destroy($hash){
      // Decode the hashid
      $id = $this->hashids->connection('archive')->decode($hash)[0];
      $archive = Archive::find($id);

      $archive->delete();
      return redirect()->route('archives.list',array($hash))->with('success', 'Event removed');

      
  }

  /**
   * resize and generate thumb of uploaded image
   *
   * @param  void
   * 
   * @return array
   **/
  private function handleImages(){

    $upload_to_dir = public_path().'/images/archives/';
    $files_save_name = Str::slug(Input::get('archive-title')).'-'.time();

    $cover_photo = Input::file('archive-cover-photo');
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
