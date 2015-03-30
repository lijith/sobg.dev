<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Http\Request;

use View, Input, File, Cart;

use App\AudioDisk;
use App\VideoDisk;
use App\Book;

class ShoppingCartController extends Controller {

	/**
   * cart.
   *
   * @param  void
   *
   * @return redirect
   */
  public function index() {

  	
  }	

	/**
   * Add item to cart.
   *
   * @param  void
   *
   * @return redirect
   */
  public function add() {

  	//if(Input::get('item-type') == 'audio')


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
  		'price' => $item->price
  	);
  	Cart::add($cart_item);

  	return redirect()->back();



  	//Cart::add(Input::get('item-id'), 'Product 1', 1, 9.99, array('size' => 'large'));

  	//var_dump(Cart::content()->toArray());

  	//Cart::destroy();

  }	

}
