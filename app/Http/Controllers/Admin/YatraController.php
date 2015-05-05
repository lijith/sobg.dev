<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\YatrasFormRequest;
use App\Http\Requests\Admin\YatrasFormUpdateRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;

use App\Yatra;

use View, Input, File;

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
   * List all the events in desc order of creation.
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

    return View::make('Admin.yatras.index',['yatras' => $yatras]);
  }


  /**
   * Create an event.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {
  	return View::make('Admin.yatras.create');
  }


  /**
   * save event to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(YatrasFormRequest $request){

  	$yatra = new Yatra(array(
  		'name' => Input::get('name'),
  		'highlights' => Input::get('hightlights'),
  		'itenary_cost' => Input::get('itenary')
  	));

  	$yatra->save();

    return redirect()->route('yatra.list');
  }

  /**
   * Show the event.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function show($part, $hash) {
    $id = $this->hashids->decode($hash)[0];

    $yatra = Yatra::find($id);

    $yatra->id = $this->hashids->encode($yatra->id);

      return View::make('Admin.yatras.show',['part' => $part,'yatra' => $yatra]);

  }

  /**
   * Edit a event.
   *
   * @param  string $hash
   *
   * @return View
   */
  public function edit($part, $hash) { 
    $id = $this->hashids->decode($hash)[0];

    $yatra = Yatra::find($id);

    $yatra->id = $this->hashids->encode($yatra->id);    

    return View::make('Admin.yatras.edit',['part' => $part,'yatra' => $yatra]);
  }



  /**
   * Update the event.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update($part, $hash) { 

    $id = $this->hashids->decode($hash)[0];
    $yatra = Yatra::find($id);

    if($part == 'highlights'){
      $yatra->highlights = Input::get('highlights');
    }elseif ($part == 'itenary') {
      $yatra->itenary_cost = Input::get('itenary');
    }

    $yatra->save();

    $yatra->id = $this->hashids->encode($yatra->id);

    return View::make('Admin.yatras.edit',['part' => $part,'yatra' => $yatra]);

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

        if (File::exists($thumb)) {
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
