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
  			$id = Hashids::connection('video')->decode(Input::get('item-id'));
  			$item = VideoDisk::find($id)->first();
  		}
  		break;
  		case 'audio':{
  			$id = Hashids::connection('audio')->decode(Input::get('item-id'));
  			$item = AudioDisk::find($id)->first();
  		}
  		break;
  		case 'book':{
  			$id = Hashids::connection('book')->decode(Input::get('item-id'));
  			$item = Book::find($id)->first();
  		}
  	}

  	$cart_item = array(
  		'id' => Input::get('item-id'),
  		'name' => ucwords($item->title),
  		'qty' => 1,
  		'price' => $item->price,
      'options' => array(
        'item_type' => Input::get('item-type'),
        'item_slug' => $item->slug,
        'item_sub_type' => Input::get('item-sub-type'),
        'item_images' => $item->cover_photo_thumbnail,
        'shipping' => ''
       )
  	);
  	Cart::add($cart_item);

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
    // Is this user already signed in?
    // if (!Sentry::check()) {
    //   // No - they are not signed in.  redirect to account login/create form.
    //   return $this->redirectTo('cart_account');
    // }

    // if(Cart::count() < 1){
    //   //if cart is empty redirect to eshop
    //   return $this->redirectTo('eshop');
    // }


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
      $insert_data = array();

      $shipping = new Shipping(array(
        'user_id' => Session::get('userId'),
        'billing_name' => Input::get('billing-name'),
        'billing_address_1' => Input::get('billing-address_1'),
        'billing_address_2' => Input::get('billing-address_2'),
        'billing_country' => Input::get('billing-country'),
        'billing_city' => Input::get('billing-city'),
        'billing_state' => Input::get('billing-state'),
        'billing_contact_number_1' => Input::get('billing-contact_number_1'),
        'billing_contact_number_2' => Input::get('billing-contact_number_2'),
        'billing_name' => Input::get('billing-name'),
        'billing_address_1' => Input::get('billing-address_1'),
        'billing_address_2' => Input::get('billing-address_2'),
        'billing_country' => Input::get('billing-country'),
        'billing_city' => Input::get('billing-city'),
        'billing_state' => Input::get('billing-state'),
        'billing_contact_number_1' => Input::get('billing-contact_number_1'),
        'billing_contact_number_2' => Input::get('billing-contact_number_2'),
        'quantity' => Cart::count(),
        'amount' => Cart::total()
      ));

      $shipping->save();


      foreach ($items as $item) {
        

        switch($item['options']['item_type']){
          case 'video':{
            $item['id'] = Hashids::connection('video')->decode($item['id'])[0];
          }
          break;
          case 'audio':{
            $item['id'] = Hashids::connection('video')->decode($item['id'])[0];
          }
          break;
          case 'book':{
            $item['id'] = Hashids::connection('book')->decode($item['id'])[0];
          }
        }


        $row = array(
          'shipping_id' => $shipping->id,
          'item_id' => $item['id'],
          'item_type' => $item['options']['item_type'],
          'quantity' => $item['qty'],
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        );

        array_push($insert_data, $row);
      }

      Order::insert($insert_data);

      Session::put('shipping_id',$shipping->id);

      //Cart::destroy();

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

    $this->page_data['shipping'] = Shipping::find($shipping_id)->first();

    return View::make('shoppingcart-payment')->with($this->page_data);

  }

}
