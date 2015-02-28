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

	       	<h3>Personal Information</h3>
	        <hr>
	        <form class="form-horizontal">
	        	<div class="form-group">
	            <label class="col-sm-3 control-label">Title</label>
	            <div class="col-sm-9">
	              <div class="radio">
	                <label>
	                  <input type="radio" name="optionsRadios" value="Mr." checked="">
	                    Mr.
	                </label>
	              </div>
	              <div class="radio">
	                <label>
	                  <input type="radio" name="optionsRadios" value="Ms.">
	                    Ms.
	                </label>
	              </div>
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-3 control-label">First Name</label>
	            <div class="col-sm-9">
	              <input type="text" placeholder="First Name" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-3 control-label">Last Name</label>
	            <div class="col-sm-9">
	              <input type="text" placeholder="Last Name" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-3 control-label">Email</label>
	            <div class="col-sm-9">
	              <input type="email" placeholder="Email" class="form-control" value="">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-3 control-label">Password</label>
	            <div class="col-sm-9">
	              <input type="password" placeholder="Email" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-3 control-label">Date of birth</label>
	            <div class="col-sm-9">
	              <div class="form-inline">
	                <select class="form-control">
	                  <option>-</option>
	                  <option>1</option>
	                  <option>2</option>
	                  <option>3</option>
	                  <option>4</option>
	                </select>&nbsp;
	                <select class="form-control">
	                  <option>January</option>
	                  <option>February</option>
	                  <option>March</option>
	                  <option>April</option>
	                </select>&nbsp;
	                <select class="form-control">
	                  <option>2012</option>
	                  <option>1991</option>
	                  <option>1990</option>
	                  <option>1989</option>
	                </select>
	              </div>
	            </div>
	          </div>
	          

	          <h3>Address Information</h3>
	          <hr>

	          
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
