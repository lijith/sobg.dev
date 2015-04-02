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
       	
       	<div class="col-md-9">
       		
       		<form class="form-horizontal" method="POST" action="{{route('cart.shipping.store')}}">
          <input name="_token" value="{{ csrf_token() }}" type="hidden">

          <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">

            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" placeholder="full name" class="form-control" name="name" value="{{ Input::old('name') }}">
              <span class="help-block">Full name of person to which we ship item(s)</span>
              {{ ($errors->has('name') ? $errors->first('name') : '') }}
            </div>
          </div>
       		

          <div class="form-group {{ ($errors->has('address_1')) ? 'has-error' : '' }}">

            <label class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address" class="form-control" name="address_1" value="{{ Input::old('address_1') }}">
              {{ ($errors->has('address_1') ? $errors->first('address_1') : '') }}
              <span class="help-block">Street address</span>
            </div>
          </div>
          <div class="form-group {{ ($errors->has('address_2')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Address<br />(Line 2)</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address (Line 2)" class="form-control" name="address_2" value="{{ Input::old('address_2') }}">
              {{ ($errors->has('address_2') ? $errors->first('address_2') : '') }}
              <span class="help-block">Apartment, suite, unit, building, floor, etc.</span>
            </div>
          </div>
          <div class="form-group {{ ($errors->has('city')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">City</label>
            <div class="col-sm-9">
              <input type="text" placeholder="City" class="form-control" name="city" value="{{ Input::old('city') }}">
              {{ ($errors->has('city') ? $errors->first('city') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('state')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">State</label>
            <div class="col-sm-9" value="{{ Input::old('state') }}">
              <input type="text" placeholder="State" class="form-control" name="state">
              {{ ($errors->has('state') ? $errors->first('state') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('country')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Country</label>
            <div class="col-sm-9" value="{{ Input::old('country') }}">
              <input type="text" placeholder="Country" class="form-control" name="country">
              {{ ($errors->has('country') ? $errors->first('country') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('contact_number_1contact_number_1')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Contact Number(s)</label>
            <div class="col-sm-9" value="{{ Input::old('name') }}">
              <input type="text" placeholder="Mobile" class="form-control" name="contact_number_1">
              <div class="split_10"></div>
              <input type="text" placeholder="landline or secondary mobile" class="form-control" name="contact_number_2" value="{{ Input::old('name') }}">
              {{ ($errors->has('contact_number_1') ? $errors->first('contact_number_1') : '') }}
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button class="btn btn-default" type="submit">Save Shipping Details</button>
            </div>
          </div>
        </form>
       	</div><!-- /.col-md-6 -->

    </div>

		<div class="split_40"></div><!-- /.split_40 -->

	</div><!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
