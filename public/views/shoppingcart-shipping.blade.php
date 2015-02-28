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
            <li class="active"><a href="#">Shipping</a></li>
            <li><a href="#">Payment</a></li>
        </ul>

       	<div class="split_30"></div><!-- /.split_30 -->

       	<h3>Shipping Address</h3>
       	<hr>
       	<div class="col-md-4">
       		<div class="">

            <label class="control-label">Use this Address</label>
            
              <input type="radio">
              
          </div>
          <hr />
       		<div class="form-group">
          	<label class="control-label">Your Address</label>
            <div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam dolores adipisci est quod iure quasi accusantium maxime quidem amet labore omnis, facilis, culpa pariatur sit aliquam cupiditate laudantium enim itaque!</p>
            </div>

          </div>
       	</div><!-- /.col-md-6 -->
       	<div class="col-md-8">
       		<div class="">

            <label class="control-label">or this Address</label>
            
              <input type="radio">
              
          </div>
          <hr />
       		<form class="form-horizontal">
       		

          <div class="form-group">

            <label class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address" class="form-control">
              <span class="help-block">Street address</span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Address (Line 2)</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address (Line 2)" class="form-control">
              <span class="help-block">Apartment, suite, unit, building, floor, etc.</span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">City</label>
            <div class="col-sm-9">
              <input type="text" placeholder="City" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Country</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Country" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">State</label>
            <div class="col-sm-9">
              <input type="text" placeholder="State" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Contact Number</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Landline, Mobile" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <a class="btn btn-primary" href="shipping.html">Register</a>
              <button class="btn btn-default">Cancel</button>
            </div>
          </div>
        </form>
       	</div><!-- /.col-md-6 -->
        
        
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
