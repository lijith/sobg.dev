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
	            <li class="active"><a href="#">Account</a></li>
	            <li><a href="#">Shipping</a></li>
	            <li><a href="#">Payment</a></li>
	        </ul>

	       	<div class="split_30"></div><!-- /.split_30 -->

	       	<div class="row">

	       		<div class="col-md-6 col-sm-6">
	       			<h3>Login to your account</h3>
	       			<hr>
	       			<form  method="POST" action="{{ route('member.cart.login') }}"  accept-charset="UTF-8">
	       				<input name="_token" value="{{ csrf_token() }}" type="hidden">
	       				<div class="form-group {{ ($errors->has('cart_email')) ? 'has-error' : '' }}">
			            <label class="control-label">Email</label>
			            <input type="email" placeholder="Email" class="form-control" value="{{ Input::old('cart_email') }}" name="cart_email">
			            {{ ($errors->has('cart_email') ? $errors->first('cart_email') : '') }}
			          </div>
			          <div class="form-group {{ ($errors->has('cart_password')) ? 'has-error' : '' }}">
			            <label class="control-label">Password</label>
			            <input type="password" placeholder="password" class="form-control" name="cart_password">
			            {{ ($errors->has('cart_password') ?  $errors->first('cart_password') : '') }}
			          </div>
			          
			          <div class="form-group">
			              <button class="btn btn-default">Login</button>
			          </div>
			          <a href="#">Forgot your password ?</a> <br />
			          <a href="{{ route('member.register.user') }}">Register New Account</a>
	       			</form>
	       		</div><!-- /.col-md-6 col-sm-6 -->
	       	</div><!-- /.row -->


	      </div><!-- /.col-md-12 -->
	    </div><!-- /.row -->

			<div class="split_40"></div><!-- /.split_40 -->

		</div><!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
