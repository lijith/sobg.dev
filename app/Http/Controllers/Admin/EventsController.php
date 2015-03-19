<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\EventsFromRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;

use App\SobgEvent;

use View, Input;

class EventsController extends Controller {

	/**
   * Constructor
   */
  public function __construct(HashidsManager $hashids) {
  	// You must have admin access to proceed
    $this->middleware('sentry.admin');
  }


  /**
   * create
   */
  public function create() {
  	return View::make('Admin.events.create');
  }


	/**
   * save events
  */
  public function store(EventsFromRequest $request){

  	$upload_to_dir = public_path().'/images/events/';

  	$filename = '';
  	$attachment_name = '';

  	

  	if (Input::hasFile('event-cover-photo')){

  		$cover_photo = Input::file('event-cover-photo');
  		$filename = $cover_photo->getClientOriginalName();

	  	$cover_photo->move($upload_to_dir,$filename);

	  	$rez_image = Image::make($this->upload_to_dir.$filename);	
	 		$rez_image->resize(1280, null, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();
			});
			$rez_image->save();	

			$path_parts = pathinfo($upload_to_dir.$filename);
	 		$thumb_name = $path_parts['filename'].'_thumb.'.$path_parts['extension'];
	 		$thumb_img = Image::make($upload_to_dir.$filename);

	 		//echo $thumb_img->filesize();

	 		$thumb_img->resize(450, 290, function ($constraint) {
		    $constraint->aspectRatio();
		    $constraint->upsize();
	    });
	    $thumb_img->save($upload_to_dir.$thumb_name);

	    
    	
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
  		'cover_photo' => $filename,
  		'attachment' => $attachment_name
  	));

  	$sobg_event->save();
  }





}
