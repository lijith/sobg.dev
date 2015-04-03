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
            <li><a href="#">Login</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Shipping</a></li>
            <li><a href="#">Payment</a></li>
        </ul>

       		<div class="split_30"></div><!-- /.split_30 -->

          <div class="row">
            <div class="col-md-offset-6 col-md-6">
              <div class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="radio"> Hello
                </label>
                <label class="radio-inline">
                  <input type="radio" name="radio"> Other
                </label>
                <button type="submit" class="btn">Update</button> 
              </div>
            </div><!-- /.col-md-offset-6 col-md-6 -->
          </div><!-- /.row -->
          
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
              <img class="img-cart" 
                @if($item->options->item_type == 'video')
                  src="{{asset('images/video-disks/'.$item->options->item_images)}}"><br />
                @elseif($item->options->item_type == 'audio')
                  src="{{asset('images/audio-disks/'.$item->options->item_images)}}"><br />
                @elseif($item->options->item_type == 'book')
                  src="{{asset('images/books/'.$item->options->item_images)}}"><br />
                @endif
                
              </td>
              <td>{{ucwords($item->name)}}</td>
              <td>
                <div class="row">
                  <div class="col-xs-10">
                    <form class="form-inline" action="{{ route('cart.update',$item->rowid) }}" method="POST">
                      <input type="text" value="{{$item->qty}}" class="form-control" name="update-quantity">
                      <input name="_method" value="PUT" type="hidden">
                      <input name="_token" value="{{ csrf_token() }}" type="hidden">
                      <button class="btn btn-default" title="" rel="tooltip" data-original-title="Update" type="submit"><i class="fa fa-pencil"></i></button>
                      
                    </form>
                  </div><!-- /.col-xs-8 -->
                  <div class="col-xs-2">
                    <form class="form-inline" action="{{ route('cart.update',$item->rowid) }}" method="POST">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                      <a title="" rel="tooltip" class="btn btn-primary" href="#" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                    </form>
                  </div><!-- /.col-xs-4 -->
                </div><!-- /.row -->
                
                
              </td>
              <td>{{$item->price}}</td>
              <td>{{$item->qty*$item->price}}</td>
            </tr>
         @endforeach
          
          
          <tr>
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr>
            <td class="text-right" colspan="4">Total Product(s)</td>
            <td>{{$side_cart_total}}</td>
          </tr>
          <tr>
            <td class="text-right" colspan="4">Total Shipping</td>
            <td>180</td>
          </tr>
          <tr class="all-total">
            <td class="text-right" colspan="4"><strong>Total</strong></td>
            <td><strong>{{$side_cart_total+(180*$cart_count)}}</strong></td>
          </tr>
         </tbody>
        </table>
        <hr />
        <div class="clearfix">
        	<a class="btn btn-primary pull-right" href="{{route('cart.account')}}">Next</a>
        </div><!-- /.clearfix -->
      </div>
    </div>

		<div class="split_30"></div><!-- /.split_30 -->
		<div class="shadow">
			<div class="continue-shopping">
				<h3 class="sec-title">Continue Shopping</h3>
				<div class="categories-buttons clearfix">
					<a href="">DVDs/VCDs</a>
					<a href="">Audio Cds/MP3s</a>
					<a href="">Books</a>
					<a href="">Magazine</a>
				</div><!-- /.categories-buttons -->
			</div><!-- /.continue-shopping -->
		</div><!-- /.shadow -->
		<div class="split_40"></div><!-- /.split_40 -->
			
	</div><!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
