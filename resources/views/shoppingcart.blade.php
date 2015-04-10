@extends('layout')

@section('content')
<div class="split_50"></div><!-- /.split_30 -->

<div class="row">
	
	@include('side-cart')


	<div class="col-sm-8 main-cart">
	<h1 class="col-heading">Your Cart</h1>
	<div class="split_30"></div><!-- /.split_30 -->
		<div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="cart.html">Cart</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Shipping</a></li>
            <li><a href="#">Payment</a></li>
        </ul>

       		<div class="split_30"></div><!-- /.split_30 -->

                    
        <table class="table table-bordered table-striped">
         <thead>
          <tr>
            <th width="20%">Item</th>
            <th width="35%">Title</th>
            <th width="35%">Qty</th>
            <th width="5%">Price(Rs)</th>
            <th width="5%">Total(Rs)</th>
          </tr>
         </thead>
         <tbody>
         @foreach($side_cart as $item)
          
            <tr>
              <td>
                @if( $item->options->item_type != 'magazine')
                  <img class="img-cart" 
                    @if($item->options->item_type == 'video')
                      src="{{asset('images/video-disks/'.$item->options->item_images)}}"><br />
                    @elseif($item->options->item_type == 'audio')
                      src="{{asset('images/audio-disks/'.$item->options->item_images)}}"><br />
                    @elseif($item->options->item_type == 'book')
                      src="{{asset('images/books/'.$item->options->item_images)}}"><br />
                    @endif

                    <br />
                  {{strtoupper($item->options->item_sub_type)}}
                  @elseif($item->options->item_type == 'magazine')
                    <img src="">
                  @endif

              </td>
              <td>{{ucwords($item->name)}}</td>
              <td>
              @if( $item->options->item_type != 'magazine')
                <div class="clearfix">
                  
                  <form class="form-inline pull-left" action="{{ route('cart.update',$item->rowid) }}" method="POST">
                    <input type="text" value="{{$item->qty}}" class="form-control" name="update-quantity">
                    <input name="_method" value="PUT" type="hidden">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <button class="btn btn-default" title="" rel="tooltip" data-original-title="Update" type="submit"><i class="fa fa-pencil"></i></button>
                  </form>

                  <form class="form-inline pull-right" action="{{ route('cart.update',$item->rowid) }}" method="POST">
                  <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <a title="" rel="tooltip" class="btn btn-primary" href="#" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                  </form>
                  
                </div><!-- /.clearfix -->
                @elseif($item->options->item_type == 'magazine')
                  <div class="clearfix">
                    

                    <form class="form-inline" action="{{ route('cart.update',$item->rowid) }}" method="POST">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                      <a title="" rel="tooltip" class="btn btn-primary" href="#" data-original-title="Delete"><i class="fa fa-trash-o"></i> Remove Subscription</a>
                    </form>
                  </div><!-- /.clearfix -->
                @endif
              </td>
              <td>{{$item->price}}</td>
              <td>{{$item->qty*$item->price}}</td>
            </tr>
         @endforeach

          <tr>
            <td colspan="6">
            <div class="form-group clearfix">
              
              <form method="POST" action="{{action('ShoppingCartController@updateShippingCharges')}}" class="pull-right">
              Shipping : 
                <label class="radio-inline">
                  <input type="radio" name="ship-to" @if(Session::get('shipping_charge') == 80) checked @endif value="IN"> inside India
                </label>
                <label class="radio-inline">
                  <input type="radio" name="ship-to" @if(Session::get('shipping_charge') > 80) checked @endif value="OUT"> out side India
                </label>
                
                   <input name="_token" value="{{ csrf_token() }}" type="hidden">
                   <button type="submit" class="btn">Update</button> 
              </form>
               
              </div></td>
          </tr>
          
          
          <tr>
            <td class="text-right" colspan="4">Product(s) Total</td>
            <td>{{$side_cart_total}}</td>
          </tr>
          <tr>
            <td class="text-right" colspan="4">Shipping</td>
            <td>{{Session::get('shipping_charge')}}</td>
          </tr>
          <tr class="all-total">
            <td class="text-right" colspan="4"><strong>Total</strong></td>
            <td><strong>{{$side_cart_total}}</strong></td>
          </tr>
         </tbody>
        </table>
        <hr />
        <div class="clearfix">
        	<a class="btn btn-primary pull-right" href="{{route('cart.account')}}">Next</a>
        </div><!-- /.clearfix -->
      </div>
    </div>

		<div class="split_40"></div><!-- /.split_40 -->
			
	</div><!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
