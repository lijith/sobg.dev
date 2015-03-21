<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\EventsFormUpdateRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;
use Image;
use App\SobgEvent;
use View, Input, File;

class VideoDiskController extends Controller {

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
   * List all the events in desc order of creation.
   *
   * @param  void
   *
   * @return View
   */
  public function index() {

    $events = SobgEvent::orderBy('created_at', 'DESC')->get();

    foreach ($events as $event) {
      $event->id = $this->hashids->encode($event->id);
      $sdate = Carbon::createFromFormat('Y-m-d H:i:s',$event->start_date);
      $edate = Carbon::createFromFormat('Y-m-d H:i:s',$event->end_date);

      $event->start_date = $sdate->toFormattedDateString();
      $event->end_date = $edate->toFormattedDateString();
    }

    return View::make('Admin.events.index',array('events'=>$events));
  }


  /**
   * Create an event.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {
  	return View::make('Admin.events.create');
  }


  /**
   * save event to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(EventsFormRequest $request){

  	$upload_to_dir = public_path().'/images/events/';

  	$filename = '';
  	$attachment_name = '';

  	$files_save_name = Str::slug(Input::get('event-title')).'-'.time();

    //var_dump(Input::file('event-cover-photo'));


  	if (Input::hasFile('event-cover-photo')){
      $files = $this->handleImages();
		}

		if (Input::hasFile('event-attachment')){

			$attachment = Input::file('event-attachment');

	    $attachment_name = $attachment->getClientOriginalName();

	    $attachment->move($upload_to_dir,$attachment_name);
		}
    
  	

  	$sobg_event = new SobgEvent(array(
  		'title' => Input::get('event-title'),
  		'excerpt' => Input::get('excerpt'),
  		'keywords' => Input::get('keywords'),
  		'details' => Input::get('details'),
  		'start_date' => Carbon::createFromFormat('m/d/Y', Input::get('event-start-date')),
  		'end_date' => Carbon::createFromFormat('m/d/Y', Input::get('event-end-date')),
  		'cover_photo' => $files['filename'],
      'cover_photo_thumbnail' => $files['thumb'],
  		'attachment' => $attachment_name
  	));

  	$sobg_event->save();

    return redirect()->route('events.list')->with('success', 'Event '.ucwords(Input::get('event-title')).' created');
  }

  /**
   * Show the event.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function show($hash) {
    $id = $this->hashids->decode($hash)[0];

    $event = SobgEvent::find($id);

    $event->id = $this->hashids->encode($event->id);
    $sdate = Carbon::createFromFormat('Y-m-d H:i:s',$event->start_date);
    $edate = Carbon::createFromFormat('Y-m-d H:i:s',$event->end_date);

    $event->start_date = $sdate->toFormattedDateString();
    $event->end_date = $edate->toFormattedDateString();

    return View::make('Admin.events.show',['event' => $event]);

  }

  /**
   * Edit a event.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function edit($hash) { 
    $id = $this->hashids->decode($hash)[0];

    $event = SobgEvent::find($id);

    $event->id = $this->hashids->encode($event->id);
    $sdate = Carbon::createFromFormat('Y-m-d H:i:s',$event->start_date);
    $edate = Carbon::createFromFormat('Y-m-d H:i:s',$event->end_date);

    $event->start_date = $sdate->format('m/d/Y');
    $event->end_date = $edate->format('m/d/Y');

    return View::make('Admin.events.edit',['event' => $event]);
  }



  /**
   * Update the event.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update(EventsFormUpdateRequest $request,$hash) { 

    $id = $this->hashids->decode($hash)[0];
    $event = SobgEvent::find($id);

    $cover_photo = $event->cover_photo;
    $thumb = $event->cover_photo_thumbnail;

    if (Input::hasFile('event-cover-photo')){

      if (File::exists($cover_photo)) {
        File::delete($cover_photo);
      }  

      if (File::exists($cover_photo)) {
        File::delete($thumb);
      } 

      $files = $this->handleImages();
    }


    $event->title = Input::get('event-title');
    $event->excerpt = Input::get('excerpt');
    $event->keywords = Input::get('keywords');
    $event->details = Input::get('details');
    $event->start_date = Carbon::createFromFormat('m/d/Y', Input::get('event-start-date'));
    $event->end_date = Carbon::createFromFormat('m/d/Y', Input::get('event-end-date'));
    $event->cover_photo = isset($files['filename']) ? $files['filename'] : $event->cover_photo;
    $event->cover_photo_thumbnail = isset($files['thumb']) ? $files['thumb'] : $event->cover_photo_thumbnail;
    // $event->attachment = $attachment_name;

    $event->save();
    return redirect()->route('events.show',array($hash))->with('success', 'Event '.ucwords(Input::get('event-title')).' updated');



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
      $id = $this->hashids->decode($hash)[0];
      $event = SobgEvent::find($id);

      $cover_photo = $event->cover_photo;
      $thumb = $event->cover_photo_thumbnail;

      //remove cover pictures
      if (Input::hasFile('event-cover-photo')){

        if (File::exists($cover_photo)) {
          File::delete($cover_photo);
        }  

        if (File::exists($cover_photo)) {
          File::delete($thumb);
        } 

      }

      $event->delete();
      return redirect()->route('events.list',array($hash))->with('success', 'Event removed');

      
  }

  /**
   * resize and generate thumb of uploaded image
   *
   * @param  void
   * 
   * @return array
   **/
  private function handleImages(){

    $upload_to_dir = public_path().'/images/events/';
    $files_save_name = Str::slug(Input::get('event-title')).'-'.time();

    $cover_photo = Input::file('event-cover-photo');
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
