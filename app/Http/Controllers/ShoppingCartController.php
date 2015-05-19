<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;

use App\Http\Requests\ShippingFormRequest;
use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Http\Request;

use Sentinel\Repositories\Session\SentinelSessionRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Sentry, View, Input, Event, Redirect, Session, Config;

use Carbon\Carbon;

use App\AudioDisk;
use App\VideoDisk;
use App\Magazine;
use App\Book;
use App\User;
use App\Profile;
use App\Shipping;
use App\Order;
use App\SubscriptionRates;
use App\MagazineSubscriber;

use Cart;

class ShoppingCartController extends SiteController {

  /**
   * Traits
   */
  use SentinelRedirectionTrait;
  use SentinelViewfinderTrait;

  

	/**
   * cart.
   *
   * @param  void
   *
   * @return response
   */
  public function showCart() {

    $this->page_data['digitals'] = SubscriptionRates::where('type', '=', 'digital')->get();
    $this->page_data['prints'] = SubscriptionRates::where('type', '=', 'print')->get();

    return View::make('shoppingcart')->with($this->page_data);

  }	

	/**
   * Add item to cart.
   *
   * @param  void
   *
   * @return redirect
   */
  public function add() {

    //Cart::destroy();
  	switch(Input::get('item-type')){
  		case 'video':{
  			$id = Hashids::connection('video')->decode(Input::get('item-id'))[0];
  			$item = VideoDisk::find($id);
  		}
  		break;
  		case 'audio':{
  			$id = Hashids::connection('audio')->decode(Input::get('item-id'))[0];
  			$item = AudioDisk::find($id);
  		}
  		break;
  		case 'book':{
  			$id = Hashids::connection('book')->decode(Input::get('item-id'))[0];
  			$item = Book::find($id);
  		}
      break;
      case 'magazine-print':{
        $id = Hashids::connection('magazine')->decode(Input::get('item-id'))[0];
        $item = Magazine::find($id);
      }
  	}

    if(Input::has('magazine-sub')){

      //var_dump(Input::all());



      $id = Input::get('magazine-sub');

      $search = Cart::search(array('id' => $id));



      if($search){
         return redirect()->back();
      }

      $sub = SubscriptionRates::find($id);
      $price = $sub->value;
      $item_sub_type = Input::get('item-sub-type');
      $item_images = '';
      $item_slug = '';

      if($item_sub_type == 'digital'){

        $name = $sub->key.' Magazine Subscription Digital' ;

      }elseif($item_sub_type == 'print'){

        $name = $sub->key.' Magazine Subscription Print' ;

      }
    }else{

      $id = Input::get('item-id');
      $name = ucwords($item->title);
      $price = $item->price;
      $item_slug = $item->slug;
      $item_sub_type = Input::get('item-sub-type');
      $item_images = $item->cover_photo_thumbnail;
    }



  	$cart_item = array(
  		'id' => $id,
  		'name' => $name,
  		'qty' => 1,
  		'price' => $price,
      'options' => array(
        'item_type' => Input::get('item-type'),
        'item_slug' => $item_slug,
        'item_sub_type' => $item_sub_type,
        'item_images' => $item_images,
        'shipping' => ''
       )
  	);

   // var_dump($cart_item);
  	Cart::add($cart_item);

    //update shipping and order list
    $this->updateShippingOnCartChange();

  	return redirect()->back();

  }	


  /**
   * update cart.
   *
   * @param  hash
   *
   * @return redirect
   */
  public function update($hash) {

    $nos = Input::get('update-quantity');

    if($nos !=''){
      if($nos < 1){
        Cart::remove($hash);
      }else{
        Cart::update($hash, $nos);
      }
    }

    //update shipping and order list
    $this->updateShippingOnCartChange();

    return redirect()->back();
  }



  /**
   * remove row of item from cart.
   *
   * @param  hash
   *
   * @return redirect
   */
  public function removeItem($hash) {

    Cart::remove($hash);

    //if updating a cart then reflect removal in shipping and order
    if(Session::has('shipping_id')){

      //adjust current amount to updated cart

      $shipping_id = Session::get('shipping_id');

      $shipping = Shipping::find($shipping_id);

      $shipping->amount = ( Cart::count() < 1 ) ? 0 : $this->totalAmount();

      $shipping->save();

      // remake orders list
      Order::where('shipping_id', '=', $shipping_id)->delete();

      $items = Cart::content()->toArray();

      $this->makeOrders($shipping_id, $items);

    }

    //update shipping and order list
    $this->updateShippingOnCartChange();

    return redirect()->back();
  }


  /**
   * show the shipping address form cart.
   *
   * @param  void
   *
   * @return view
   */
  public function showShipping() {

    if(Cart::count() < 1){
      //if cart is empty redirect to eshop
      return $this->redirectTo('eshop');
    }

    //Is this user already signed in?
    if (!Sentry::check()) {
      // No - they are not signed in.  redirect to account login/create form.
      return $this->redirectTo('cart_account');
    }


    $user_id = Session::get('userId');

    $profile = User::find($user_id)->profile;

    $items = Cart::content()->toArray();

    $this->page_data['profile'] = $profile;

    if(Session::has('shipping_id')){

      return $this->redirectTo('shipping_edit');
    }

    


    return View::make('shoppingcart-shipping')->with($this->page_data);
  }


  /**
   * Store shipping address.
   *
   * @param  void
   *
   * @return redirect
   */
  public function storeShipping(ShippingFormRequest $request) {

    // Is this user already signed in?
    if (!Sentry::check()) {
      // No - they are not signed in.  redirect to account login/create form.
      return $this->redirectTo('cart_account');
    }

    if(Cart::count() > 0){

      //save the shipping
      //some issue with accessing id value from collection, so using as array
      $items = Cart::content()->toArray();

      $shipping = new Shipping(array(
        'user_id' => Session::get('userId'),
        'reference_id' => $this->generateReference(),
        'admin_viewed' => 0,
        'billing_name' => Input::get('billing-name'),
        'billing_address_1' => Input::get('billing-address_1'),
        'billing_address_2' => Input::get('billing-address_2'),
        'billing_country' => Input::get('billing-country'),
        'billing_city' => Input::get('billing-city'),
        'billing_state' => Input::get('billing-state'),
        'billing_contact_number_1' => Input::get('billing-contact_number_1'),
        'billing_contact_number_2' => Input::get('billing-contact_number_2'),
        'shipping_name' => Input::get('shipping-name'),
        'shipping_address_1' => Input::get('shipping-address_1'),
        'shipping_address_2' => Input::get('shipping-address_2'),
        'shipping_country' => Input::get('shipping-country'),
        'shipping_city' => Input::get('shipping-city'),
        'shipping_state' => Input::get('shipping-state'),
        'shipping_contact_number_1' => Input::get('shipping-contact_number_1'),
        'shipping_contact_number_2' => Input::get('shipping-contact_number_2'),
        'quantity' => Cart::count(),
        'amount' => $this->totalAmount()
      ));

      $shipping->save();

      $shipping_id = $shipping->id;

      $user_id = Session::get('userId');

      Session::put('shipping_id',$shipping->id);

      $this->makeOrders($shipping_id, $items);
      $this->makeSubscription($items);
      //Cart::destroy();

      //redirect to payment page
      return $this->redirectTo('payment');

    }else{
      return $this->redirectTo('eshop');
    }


    //
  }  

  /**
   * Edit shipping and billing address.
   *
   * @param  void
   *
   * @return view
   */
  public function editShipping() {

     if(Cart::count() < 1){
      //if cart is empty redirect to eshop
      return $this->redirectTo('eshop');
    }

    //Is this user already signed in?
    if (!Sentry::check()) {
      // No - they are not signed in.  redirect to account login/create form.
      return $this->redirectTo('cart_account');
    }

   

    $shipping_id = Session::get('shipping_id');

    $this->page_data['shipping'] = Shipping::find($shipping_id);


    return View::make('shoppingcart-shipping-edit')->with($this->page_data);
  }



  /**
   * Update shipping address.
   *
   * @param  void
   *
   * @return redirect
   */
  public function updateShipping(ShippingFormRequest $request) {
    // Is this user already signed in?
    if (!Sentry::check()) {
      // No - they are not signed in.  redirect to account login/create form.
      return $this->redirectTo('cart_account');
    }

    $shipping_id = Session::get('shipping_id');

    $shipping = Shipping::find($shipping_id);

    $items = Cart::content()->toArray();


    if(Cart::count() > 0){

      //save the shipping
      //some issue with accessing id value from collection, so using as array
      $shipping->billing_name = Input::get('billing-name');
      $shipping->billing_address_1 = Input::get('billing-address_1');
      $shipping->billing_address_2 = Input::get('billing-address_2');
      $shipping->billing_country = Input::get('billing-country');
      $shipping->billing_city = Input::get('billing-city');
      $shipping->billing_state = Input::get('billing-state');
      $shipping->billing_contact_number_1 = Input::get('billing-contact_number_1');
      $shipping->billing_contact_number_2 = Input::get('billing-contact_number_2');
      $shipping->shipping_name = Input::get('shipping-name');
      $shipping->shipping_address_1 = Input::get('shipping-address_1');
      $shipping->shipping_address_2 = Input::get('shipping-address_2');
      $shipping->shipping_country = Input::get('shipping-country');
      $shipping->shipping_city = Input::get('shipping-city');
      $shipping->shipping_state = Input::get('shipping-state');
      $shipping->shipping_contact_number_1 = Input::get('shipping-contact_number_1');
      $shipping->shipping_contact_number_2 = Input::get('shipping-contact_number_2');
      $shipping->quantity = Cart::count();
      $shipping->amount = $this->totalAmount();

      $shipping->save();

      $this->makeOrders($shipping_id, $items);
      $this->makeSubscription($items);


      //redirect to payment page
      return $this->redirectTo('payment');

    }else{
      return $this->redirectTo('eshop');
    }


    //
  }  

  /**
   * Show payment.
   *
   * @param  void
   *
   * @return view
   */
  public function showPayment() {
    // Is this user already signed in?
    if (!Sentry::check()) {
      // No - they are not signed in.  redirect to account login/create form.
      return $this->redirectTo('cart_account');
    }

    $shipping_id = Session::get('shipping_id');

    $orders = array();

    $items = Order::where('shipping_id', '=',$shipping_id)->get();


    foreach ($items as $item) {

      if($item->item_type == 'magazine'){

        $product = SubscriptionRates::find($item->item_id);

        $order = array(
          'title' => ucwords($product->key.' '.$product->type.' Subscription'),
          'quantity' => 1,
        );

      }else{

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
          case 'magazine':{
            $product = Subscription::find($item->item_id)->first();
          }
           
        }

        $order = array(
        'title' => $product->title,
        'quantity' => $item->quantity,
        );
      }

      array_push($orders, $order);

    }

    $this->page_data['shipping'] = Shipping::find($shipping_id);
    $this->page_data['orders'] = $orders;

    return View::make('shoppingcart-payment')->with($this->page_data);

  }

  /**
   * Update shipping charges.
   *
   * @param  void
   *
   * @return redirect
   */
  public function updateShippingCharges() {

    if(Input::get('ship-to') == 'IN'){
      Session::put('shipping_charge', 80);
    }elseif(Input::get('ship-to') == 'OUT'){
      Session::put('shipping_charge', 400);
    }


    return $this->redirectTo('cart');
  }


  /**
   * Make subscription.
   *
   * @param curent cart items
   *
   * @return void
   */
  public function makeSubscription($cart_items){

    $shipping_id = Session::get('shipping_id');
    $user_id = Session::get('userId');

    //remove orders of shipping id if any
    MagazineSubscriber::where('shipping_id', '=', $shipping_id)->delete();

    foreach ($cart_items as $item) {
      # code...
      //handle subscription from cart
      if($item['options']['item_sub_type'] == 'digital' || $item['options']['item_sub_type'] == 'print'){

        if($item['options']['item_sub_type'] == 'digital'){
          $digital = 1;
          $print = 0;
        }elseif ($item['options']['item_sub_type'] == 'digital') {
           $digital = 0;
          $print = 1;
        }

        $subscription = SubscriptionRates::find($item['id']);

        $date = Carbon::now();
        $date->addYears($subscription->period);

        $subscribers = new MagazineSubscriber(array(
          'user_id' => $user_id,
          'shipping_id' => $shipping_id,
          'digital' => $digital,
          'print' => $print,
          'active' => 0,
          'ending_at' => $date,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()

        ));

        $subscribers->save();

      }
    }  

  }



  /**
   * Make orders.
   *
   * @param  shipping id, curent cart items
   *
   * @return void
   */
  public function makeOrders($shipping_id, $items) {

    //remove orders of shipping id if any
    Order::where('shipping_id', '=', $shipping_id)->delete();

    //re-populate orders

    $insert_data = array();
    $user_id = Session::get('userId');

    foreach ($items as $item) {


      
      //handle eshop items
      switch($item['options']['item_type']){
        case 'video':{
          $item['id'] = Hashids::connection('video')->decode($item['id'])[0];
        }
        break;
        case 'audio':{
          $item['id'] = Hashids::connection('audio')->decode($item['id'])[0];
        }
        break;
        case 'book':{
          $item['id'] = Hashids::connection('book')->decode($item['id'])[0];
        }
      }


      $row = array(
        'shipping_id' => $shipping_id,
        'item_id' => $item['id'],
        'item_type' => $item['options']['item_type'],
        'quantity' => $item['qty'],
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      );

      array_push($insert_data, $row);
    }

    Order::insert($insert_data);

  }

  /**
   * update shipping details.
   *
   * @param  void
   *
   * @return string
   */
  public function updateShippingOnCartChange(){

    if(Session::has('shipping_id')){
      
      $shipping_id = Session::get('shipping_id');

      $amount = $this->totalAmount();

      $shipping = Shipping::find($shipping_id);

      $shipping->amount = $amount;

      $shipping->save();

      if(Cart::count() > 0){
        $this->makeOrders($shipping_id, Cart::content()->toArray());
      }
    }

  }


  /**
   * make shipping reference number.
   *
   * @param  void
   *
   * @return string
   */
  public function generateReference(){

    $ship_rate = Session::get('shipping_charge');

    $ship_rate = substr("000".$ship_rate,-4);

    $newID = rand(1000, 9999);

    $date1 = date('ymd');

    $ref_id = $newID.$ship_rate.(date('s')).$date1;
    
    return $ref_id;
  }


  /**
   * total amount.
   *
   * @param  void
   *
   * @return integer
   */

  public function totalAmount(){

    $amount = 0;

    if(Cart::count() == 0){
      return $amount;
    }

    if(Cart::count() == 1){

      $items = Cart::content()->toArray();

      foreach ($items as $item) {
        if($item['options']['item_sub_type'] == 'digital'){
          $amount = Cart::total();
        }else{
           $amount = Cart::total() + Session::get('shipping_charge');
        }
      }

    }else{

      $amount = Cart::total() + Session::get('shipping_charge');

    }

    return $amount;

  }




}
