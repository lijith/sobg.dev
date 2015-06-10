@extends('layout')

@section('content')
<div class="split_50"></div><!-- /.split_30 -->

<div class="row">

@include('no-side-cart')

	<div class="col-sm-8 main-cart">
		<h1 class="col-heading">Your Cart</h1>
		<div class="split_30"></div><!-- /.split_30 -->
			<div class="row">
		    <div class="col-md-12">
		      <ul class="nav nav-tabs">
		          <li><a href="">Cart</a></li>
		          <li><a href="#">Account</a></li>
		          <li><a href="#">Shipping</a></li>
		          <li class="active"><a href="#">Payment</a></li>
		      </ul>

		     	<div class="split_30"></div><!-- /.split_30 -->

		     	<h3>Payment</h3>
		     	<hr />
			    <div class="row">
			      <div class="col-md-6 col-sm-6">
			          <div class="panel panel-default">
			              <div class="panel-heading">Billing Address</div>
			              <div class="panel-body">
			                  <address>
			                      <strong>{{ucwords($shipping->billing_name)}}</strong><br /><br />
			                      <p>{{$shipping->billing_address_1}}
			                      <br />{{$shipping->billing_address_2}}</p>
			                      <p>{{ucwords($shipping->billing_city)}},
			                      {{ucwords($shipping->billing_state)}}, 
			                      {{ucwords($shipping->billing_country)}}</p>
			                      <abbr title="Phone">Phone :</abbr> {{$shipping->billing_contact_number_1}}, {{$shipping->billing_contact_number_2}}
			                  </address>
			              </div>
			          </div>
			      </div>
			      <div class="col-md-6 col-sm-6">
			          <div class="panel panel-default">
			              <div class="panel-heading">Shipping Address</div>
			              <div class="panel-body">
			                  <address>
			                      <strong>{{ucwords($shipping->shipping_name)}}</strong><br /><br />
			                      <p>{{$shipping->shipping_address_1}}
			                      <br />{{$shipping->shipping_address_2}}</p>
			                      <p>{{ucwords($shipping->shipping_city)}},
			                      {{ucwords($shipping->shipping_state)}}, 
			                      {{ucwords($shipping->shipping_country)}}</p>
			                      <abbr title="Phone">Phone :</abbr> {{$shipping->shipping_contact_number_1}}, {{$shipping->shipping_contact_number_2}}
			                  </address>
			              </div>
			          </div>
			      </div>
			    </div>
			    <div class="row">
			    	<div class="col-md-6">
			    		<div class="panel panel-default">
		              <div class="panel-heading">Chosen Items</div>
		              <div class="panel-body">
		              	<table class="table table-bordered">
		              		<tr>
		              			<th>Title</th>
		              			<th>Quantity</th>
		              		</tr>
		              		@foreach($orders as $order)
		              		<tr>
		              			<td>{{ ucwords($order['title']) }}</td>
		              			<td>{{ $order['quantity'] }}</td>
		              		</tr>
		              		@endforeach
		              	</table>
		              </div>
		          </div>
			    	</div><!-- /.col-md-6 -->
			    	<div class="col-md-6">
			    		<div class="panel panel-default">
		              <div class="panel-heading">Amount</div>
		              <div class="panel-body">
		              	<table class="table table-bordered">
		              		
		              		<tr>
		              			<td>Total Amount</td>
		              			<td>{{ $shipping->amount }}
		              			 </td>
		              		</tr>
		              	</table>
		              	<i>includes shipping charges if any</i>
		              </div>
		          </div>
			    	</div><!-- /.col-md-6 -->
			    </div><!-- /.row -->					              
		      <hr />

		      <div class="clearfix">
	      	 @if($shipping->amount == 0)
		      	<a class="btn btn-primary pull-right" href="login.html">Check E-Shop for items</a>
			      @else
			      <form method="post" name="redirect" action="http://www.ccavenue.com/shopzone/cc_details.jsp">

								<input type="hidden" name="encRequest" value="{{ $encrypted }}">
								<input type="hidden" name="Merchant_Id" value="{{ $merchant_id }}">

								<button type="submit" class="btn btn-primary pull-right">Make Payment</button>
						</form>
		      	
		      	@endif
		      </div><!-- /.clearfix -->
		    </div>
		  </div>

			<div class="split_40"></div><!-- /.split_40 -->

	</div>
<!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
