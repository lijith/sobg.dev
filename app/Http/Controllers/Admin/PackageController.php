<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\PackageFormRequest;
use App\Http\Requests\Admin\YatrasFormUpdateRequest;
use Carbon\Carbon;

use App\Yatra;
use App\YatraPackage;

use View, Input, File;

class PackageController extends Controller {

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
   * List all the packages in desc order of creation.
   *
   * @param  void
   *
   * @return View
   */
  public function index() {

    $packages = array();

    $yatras = Yatra::get();

    foreach ($yatras as $yatra) {
      $pkg = Yatra::find($yatra->id)->packages;
      $packages[$yatra->name] = $pkg;
    }


    return View::make('Admin.packages.index',['yatras' => $yatras,'packages' => $packages]);
  }


  /**
   * Create an package.
   *
   * @param  void
   *
   * @return View
   */
  public function create() {

    $yatras = Yatra::get();

  	return View::make('Admin.packages.create',['yatras' => $yatras]);
  }


  /**
   * save package to database.
   *
   * @param  none
   *
   * @return Redirect
   */
  public function store(PackageFormRequest $request){

  	$package = new YatraPackage(array(
  		'yatra_id' => Input::get('yatra'),
  		'package_name' => Input::get('package-name'),
  		'amount' => Input::get('package-amount')
  	));

  	$package->save();

    return redirect()->route('package.list')->with('success', 'New Package Created');;
  }


  /**
   * Update the package.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function update($id) { 

    //$id = $this->hashids->decode($hash)[0];
    $package = YatraPackage::find($id);

    $package->package_name = Input::get('package-name');
    $package->yatra_id = Input::get('yatra');
    $package->amount = Input::get('package-amount');

    $package->save();

    return redirect()->route('package.list')->with('success', 'Updated');;

  }

  /**
   * Remove the package.
   *
   * @param  string $hash
   *
   * @return Redirect
   */
  public function destroy($hash){
      // Decode the hashid
    $package = YatraPackage::find($hash);

    $package->delete();

    return redirect()->route('package.list')->with('success', 'Package Removed');;
      
  }



}
