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

    return View::make('Admin.shipping.orders-list',array('orders' => $new_orders));

  }

  /**
   * List all confirmed shipping orders.
   *
   * @param  void
   *
   * @return View
   */
  public function confirmedOrders(){
    $orders = Shipping::where('shipping_status', '=', 1)
    ->where('payment_status', '=', 1)
    ->orderBy('updated_at','desc')
    ->get();

    return View::make('Admin.shipping.orders-list',array('orders' => $orders));
  }



  /**
   * List all unconfirmed shipping orders.
   *
   * @param  void
   *
   * @return View
   */
  public function unconfirmedOrders(){
    $orders = Shipping::where('shipping_status', '=', 0)
    ->where('payment_status', '=', 1)
    ->orderBy('updated_at','desc')
    ->get();

    return View::make('Admin.shipping.orders-list',array('orders' => $orders));
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
          if($product->disk_type == 1){
            $type = 'DVD';
          }elseif($product->disk_type == 2){
            $type = 'VCD';
          }
        }
        break;
        case 'audio':{
          $product = AudioDisk::find($item->item_id)->first();
          if($product->disk_type == 1){
            $type = 'Audio CD';
          }elseif($product->disk_type == 2){
            $type = 'MP3';
          }

        }
        break;
        case 'book':{
          $product = Book::find($item->item_id)->first();
          $type = 'Book';
        }
        break;
        
      }

      $order_row = array(
      'title' => $product->title,
      'quantity' => $item->quantity,
      'type' => $type
      );

      array_push($order_list, $order_row);
    }

   // dd($order_list);

    return View::make('Admin.shipping.show',array('order' => $order,'orders' => $order_list));
  }

}
