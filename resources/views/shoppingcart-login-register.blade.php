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
	            <li class="active"><a href="#">Login</a></li>
	            <li><a href="#">Account</a></li>
	            <li><a href="#">Shipping</a></li>
	            <li><a href="#">Payment</a></li>
	        </ul>

	       	<div class="split_30"></div><!-- /.split_30 -->

	       	<div class="row">
	       		<div class="col-md-6 col-sm-6">
	       			<h3>Create Account</h3>
	       			<hr>
	       			<form>
	       				<div class="form-group">
			            <label class="control-label">Email</label>
			            <input type="email" placeholder="Email" class="form-control" value="">
			           
			          </div>
			          <div class="form-group">
			            <label class="control-label">Password</label>
			            <input type="password" class="form-control">
			          </div>
			          <div class="form-group">
			              <button class="btn btn-default">Register</button>
			          </div>
			          
	       			</form>
	       		</div><!-- /.col-md-6 col-sm-6 -->
	       		<div class="col-md-6 col-sm-6">
	       			<h3>Already Registered ?</h3>
	       			<hr>
	       			<form  method="POST" action="{{ route('member.session.store') }}"  accept-charset="UTF-8">
	       				<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
			            <label class="control-label">Email</label>
			            <input type="email" placeholder="Email" class="form-control" value="{{ Input::old('email') }}" name="email">
			            {{ ($errors->has('email') ? $errors->first('email') : '') }}
			          </div>
			          <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
			            <label class="control-label">Password</label>
			            <input type="password" class="form-control" name="password">
			            {{ ($errors->has('password') ?  $errors->first('password') : '') }}
			          </div>
			          <a href="#">Forgot your password ?</a>
			          <div class="split_20"></div><!-- /.split_20 -->
			          <div class="form-group">
			              <button class="btn btn-default">Login</button>
			          </div>
	       			</form>
	       		</div><!-- /.col-md-6 col-sm-6 -->
	       	</div><!-- /.row -->


	      </div><!-- /.col-md-12 -->
	    </div><!-- /.row -->

			<div class="split_40"></div><!-- /.split_40 -->

		</div><!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
