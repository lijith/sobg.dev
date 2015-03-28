<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\VideoDisksFormRequest;
use App\Http\Requests\Admin\VideoDiskFormUpdateRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;
use Image;
use App\VideoDisk;
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
   * List all the disks in desc order of creation.
   *
   * @param  void
   *
   * @return View
   */
  public function index($type=null) {

  	if($type == 'dvd'){
  		$disks = VideoDisk::orderBy('created_at', 'DESC')
  		->where('disk_type', '=', 1)
  		->get();
  	}elseif ($type == 'vcd') {
  		$disks = VideoDisk::orderBy('created_at', 'DESC')
  		->where('disk_type', '=', 2)
  		->get();
  	}else{
    	$disks = VideoDisk::orderBy('created_at', 'DESC')->get();
  	}

    foreach ($disks as $disk) {
      $disk->id = $this->hashids->encode($disk->id);
      $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$disk->published_at);

      $disk->published_at = $pdate->toFormattedDateString();
    }

    return View::make('Admin.videodisks.index',array('disks'=>$disks));
  }


  /**
   * Create an disk.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {
  	return View::make('Admin.videodisks.create');
  }


  /**
   * save disk to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(VideoDisksFormRequest $request){

  	if (Input::hasFile('disk-cover-photo')){
      $files = $this->handleImages();
		}

		if (!Input::has('disk-type')){
    	$disk_type = 1;
		}else{
			$disk_type = Input::get('disk-type');
		}
    
  	

  	$disk = new VideoDisk(array(
  		'title' => Input::get('disk-title'),
  		'price' => Input::get('disk-price'),
  		'author' => Input::get('author'),
  		'excerpt' => Input::get('excerpt'),
  		'keywords' => Input::get('keywords'),
  		'details' => Input::get('details'),
  		'youtube_link' => Input::get('youtube-link'),
  		'disk_type' => $disk_type,
  		'published_at' => Carbon::createFromFormat('m/d/Y', Input::get('publish-date')),
  		'cover_photo' => $files['filename'],
      'cover_photo_thumbnail' => $files['thumb'],
  	));


  	$disk->save();

    return redirect()->route('videodisks.list')->with('success', 'disk '.ucwords(Input::get('disk-title')).' created');
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

    $disk = VideoDisk::find($id);

    $disk->id = $this->hashids->encode($disk->id);

    $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$disk->published_at);
    $disk->published_at = $pdate->toFormattedDateString();

    return View::make('Admin.videodisks.show',['disk' => $disk]);

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

    $disk = VideoDisk::find($id);

    $disk->id = $this->hashids->encode($disk->id);
    $pdate = Carbon::createFromFormat('Y-m-d H:i:s',$disk->published_at);

    $disk->published_at = $pdate->format('m/d/Y');

    return View::make('Admin.videodisks.edit',['disk' => $disk]);
  }



  /**
   * Update the disk.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update(VideoDiskFormUpdateRequest $request,$hash) { 

    $id = $this->hashids->decode($hash)[0];
    $disk = VideoDisk::find($id);

    $cover_photo = $disk->cover_photo;
    $thumb = $disk->cover_photo_thumbnail;

    if (Input::hasFile('disk-cover-photo')){

      if (File::exists($cover_photo)) {
        File::delete($cover_photo);
      }  

      $files = $this->handleImages();

    }

    $disk->title = Input::get('disk-title');
    $disk->price = Input::get('disk-price');
    $disk->author = Input::get('author');
    $disk->excerpt = Input::get('excerpt');
    $disk->keywords = Input::get('keywords');
    $disk->details = Input::get('details');
    $disk->disk_type = Input::get('disk-type');
    $disk->youtube_link = Input::get('youtube-link');
    $disk->published_at = Carbon::createFromFormat('m/d/Y', Input::get('publish-date'));
    $disk->cover_photo = isset($files['filename']) ? $files['filename'] : $disk->cover_photo;
    $disk->cover_photo_thumbnail = isset($files['thumb']) ? $files['thumb'] : $disk->cover_photo_thumbnail;
    // $disk->attachment = $attachment_name;

    $disk->save();
    return redirect()->route('videodisks.show',array($hash))->with('success', 'disk '.ucwords(Input::get('disk-title')).' updated');



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

      $file_path = public_path().'/images/video-disks/';
      $cover_photo = $disk->cover_photo;

      //remove cover pictures

      if (File::exists($file_path.$cover_photo)) {
        File::delete($cover_photo);
      }  


      $disk->delete();
      return redirect()->route('videodisks.list',array($hash))->with('success', 'disk removed');

      
  }

  /**
   * resize and generate thumb of uploaded image
   *
   * @param  void
   * 
   * @return array
   **/
  private function handleImages(){

    $upload_to_dir = public_path().'/images/video-disks/';
    $files_save_name = Str::slug(Input::get('disk-title')).'-'.time();

    $cover_photo = Input::file('disk-cover-photo');
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
