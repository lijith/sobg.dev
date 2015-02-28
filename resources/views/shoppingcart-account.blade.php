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
            <h3>Create An Account</h3>
            <hr>
            <form role="form">
              <div class="form-group">
                <label for="email">Enter your email address</label>
                <input type="email" placeholder="Email" class="form-control" value="">
              </div>
              <a class="btn btn-default" href="account.html">Register</a>
            </form>
          </div>

          <div class="col-md-6 col-sm-6">
            <h3>Already Registered ?</h3>
            <hr>
            <form role="form">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" placeholder="Username" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password">Password Address</label>
                <input type="password" placeholder="Password" class="form-control" autocomplete="off">
              </div>
              <a href="#">Forgot your password ?</a><br><br>
              <a class="btn btn-primary" href="shipping.html">Log in</a>
            </form>
          </div>
					</div>
          
        <hr />
        <div class="clearfix">
        	<a class="btn btn-primary pull-right" href="login.html">Next</a>
        </div><!-- /.clearfix -->
      </div>
    </div>

		<div class="split_40"></div><!-- /.split_40 -->
			
	</div><!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
