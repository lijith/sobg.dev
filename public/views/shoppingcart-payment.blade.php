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
		          <li><a href="">Cart</a></li>
		          <li><a href="#">Login</a></li>
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
			                      <strong>Lorem Ipsum</strong><br>
			                      Lorem ipsum dolor sit amet, 
			                      Velit modi molestias
			                      Adipisci.<br>
			                      <abbr title="Phone">Mobile :</abbr> +628995001222
			                  </address>
			              </div>
			          </div>
			      </div>
			      <div class="col-md-6 col-sm-6">
			          <div class="panel panel-default">
			              <div class="panel-heading">Delivery Address</div>
			              <div class="panel-body">
			                  <address>
			                      <strong>Lorem Ipsum</strong><br>
			                      Lorem ipsum dolor sit amet, 
			                      Velit modi molestias
			                      Adipisci.<br>
			                      <abbr title="Phone">Mobile :</abbr> +628995001222
			                  </address>
			              </div>
			          </div>
			      </div>
			    </div>					              
		      <hr />
		      <div class="clearfix">
		      	<a class="btn btn-primary pull-right" href="login.html">Proceed To Checkout</a>
		      </div><!-- /.clearfix -->
		    </div>
		  </div>

			<div class="split_40"></div><!-- /.split_40 -->

	</div>
<!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
