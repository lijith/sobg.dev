<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Http\Request;

use View, Input, File, Cart;

use App\AudioDisk;
use App\VideoDisk;
use App\Book;

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


}
