<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\HashidsManager;
use App\Http\Requests\Admin\YatrasFormRequest;
use App\Http\Requests\Admin\YatrasFormUpdateRequest;
use Carbon\Carbon;

use App\Shipping;
use App\AudioDisk;
use App\VideoDisk;
use App\Book;

use View, Input, File;

class ShippingController extends Controller {

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
   * List all new shipping orders.
   *
   * @param  void
   *
   * @return View
   */
  public function newOrders(){

    $new_orders = Shipping::where('admin_viewed', '=', 0)
    ->where('shipping_status', '=', 0)
    ->where('payment_status', '=', 1)
    ->orderBy('updated_at','desc')
    ->get();

    return View::make('Admin.shipping.new-orders',array('new_orders' => $new_orders));

  }


  /**
   * Show Order.
   *
   * @param  void
   *
   * @return View
   */
  public function showOrder($reference_id){

    $order = Shipping::where('reference_id', '=', $reference_id)->first();

    $shipping = Shipping::find($order->id);

    $shipping->admin_viewed = 1;

    $shipping->save();

    $orders = Shipping::find($order->id)->orders;

    $order_list = array();

    foreach ($orders as $item) {

      switch($item->item_type){
        case 'video':{
          $product = VideoDisk::find($item->item_id)->first();
        }
        break;
        case 'audio':{
          $product = AudioDisk::find($item->item_id)->first();

        }
        break;
        case 'book':{
          $product = Book::find($item->item_id)->first();
        }
        break;
        
      }

      $order_row = array(
      'title' => $product->title,
      'quantity' => $item->quantity,
      'type' => $item->item_type
      );

      array_push($order_list, $order_row);
    }

   // dd($order_list);

    return View::make('Admin.shipping.show',array('order' => $order,'orders' => $order_list));
  }

}
