<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;


use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Http\Request;

use Sentinel\Repositories\Session\SentinelSessionRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Sentry, View, Input, Event, Redirect, Session, Config;

use App\AudioDisk;
use App\VideoDisk;
use App\Magazine;
use App\Book;
use App\User;
use App\Profile;

use Cart;

class ShoppingCartController extends SiteController {

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
  			$id = Hashids::connection('audio')->decode(Input::get('item-id'));
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
        'item_images' => $item->cover_photo_thumbnail
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
    if (!Sentry::check()) {
      // No - they are not signed in.  redirect to account login/create form.
      return $this->redirectTo('cart_account');
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
  public function storeShipping() {
    // Is this user already signed in?
    if (!Sentry::check()) {
      // No - they are not signed in.  redirect to account login/create form.
      return $this->redirectTo('cart_account');
    }


    return View::make('shoppingcart-shipping')->with($this->page_data);
  }


}
