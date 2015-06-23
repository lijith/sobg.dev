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
use App\Magazine;
use App\SubscriptionRates;

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

    return View::make('Admin.shipping.orders-list',array('orders' => $new_orders, 'title' => 'New Orders'));

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

    return View::make('Admin.shipping.orders-list',array('orders' => $orders, 'title' => 'Unconfirmed Orders'));
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

    return View::make('Admin.shipping.orders-list',array('orders' => $orders, 'title' => 'Confirmed Orders','search'=>''));
  }

  /**
   * List all shipping orders.
   *
   * @param  void
   *
   * @return View
   */
  public function allOrders(){
    $orders = Shipping::orderBy('updated_at','desc')
    ->simplePaginate(50);

    return View::make('Admin.shipping.orders-list',array('orders' => $orders, 'title' => 'All Orders','search'=>''));
  }


  /**
   * Show Order.
   *
   * @param  void
   *
   * @return View
   */
  public function SearchOrder(){
    $order_id = Input::get('order-id');

    $result = Shipping::search($order_id)->get();

    return View::make('Admin.shipping.orders-list',array('orders' => $result, 'title' => 'Search for '.$order_id,'search'=>$order_id));
  }

  /**
   * Show Order.
   *
   * @param  void
   *
   * @return View
   */
  public function ConfirmShipment($reference_id){

    $order_id = Input::get('order_id');

    if($reference_id == $order_id){
      $info = Input::get('info');
      $shipment_information = Input::get('shipment-information');
      //send mails to ship email, admin

    }else{
      return redirect()->route('reference.order',array($reference_id))->with('failure', 'Order ID not found');
    }


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
          $product_title = $product->title;
          $item_quantity = $item->quantity;
        }
        break;
        case 'audio':{
          $product = AudioDisk::find($item->item_id)->first();
          if($product->disk_type == 1){
            $type = 'Audio CD';
          }elseif($product->disk_type == 2){
            $type = 'MP3';
          }
          $product_title = $product->title;
          $item_quantity = $item->quantity;
        }
        break;
        case 'book':{
          $product = Book::find($item->item_id)->first();
          $type = 'Book';
          $product_title = $product->title;
          $item_quantity = $item->quantity;
        }
        break;
        case 'magazine':{
          $product = Magazine::find($item->item_id)->first();
          $type = 'Piravi';
          $product_title = $product->title;
          $item_quantity = $item->quantity;
        }
        break;
        case 'magazine-subscription':{
          $product = SubscriptionRates::find($item->item_id)->first();
          $type = 'Subscription';

          $product_title = $product->type.' '.$product->key;
          $item_quantity = 1;
        }
        break;
        
      }

      $order_row = array(
      'title' => $product_title,
      'quantity' => $item_quantity,
      'type' => $type
      );

      array_push($order_list, $order_row);
    }

   // dd($order_list);

    return View::make('Admin.shipping.show',array('order' => $order,'orders' => $order_list));
  }

}
