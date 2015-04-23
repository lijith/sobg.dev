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
          <li><a href="#">Account</a></li>
          <li class="active"><a href="#">Shipping</a></li>
          <li><a href="#">Payment</a></li>
      </ul>

     	<div class="split_30"></div><!-- /.split_30 -->

      <form class="form-horizontal" method="POST" action="{{route('cart.shipping.update')}}">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input name="_method" value="PUT" type="hidden">

      <div class="row">
        <div class="col-md-9">
          <h3>Billing Address</h3>
          <hr />

          <div class="form-group {{ ($errors->has('billing-name')) ? 'has-error' : '' }}">

            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" placeholder="full name" class="form-control" name="billing-name" value="{{ Input::old('billing-name') ? Input::old('billing-name') : $shipping->billing_name }}">
              <span class="help-block">Full name of person to which we ship item(s)</span>
              {{ ($errors->has('billing-name') ? $errors->first('billing-name') : '') }}
            </div>
          </div>
          

          <div class="form-group {{ ($errors->has('billing-address_1')) ? 'has-error' : '' }}">

            <label class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address" class="form-control" name="billing-address_1" value="{{ Input::old('billing-address_1') ? Input::old('billing-address_1') : $shipping->billing_address_1 }}">
              {{ ($errors->has('billing-address_1') ? $errors->first('billing-address_1') : '') }}
              <span class="help-block">Street address</span>
            </div>
          </div>
          <div class="form-group {{ ($errors->has('billing-address_2')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Address<br />(Line 2)</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address (Line 2)" class="form-control" name="billing-address_2" value="{{ Input::old('billing-address_2') ? Input::old('billing-address_2') : $shipping->billing_address_2 }}">
              {{ ($errors->has('billing-address_2') ? $errors->first('billing-address_2') : '') }}
              <span class="help-block">Apartment, suite, unit, building, floor, etc.</span>
            </div>
          </div>
          <div class="form-group {{ ($errors->has('billing-city')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">City</label>
            <div class="col-sm-9">
              <input type="text" placeholder="City" class="form-control" name="billing-city" value="{{ Input::old('billing-city') ? Input::old('billing-city') : $shipping->billing_city }}">
              {{ ($errors->has('billing-city') ? $errors->first('billing-city') : '') }}
            </div>
          </div>

          <div class="form-group {{ ($errors->has('billing-state')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">State</label>
            <div class="col-sm-9" >
              <input type="text" placeholder="State" class="form-control" name="billing-state" value="{{ Input::old('billing-state') ? Input::old('billing-state') : $shipping->billing_state }}">
              {{ ($errors->has('billing-state') ? $errors->first('billing-state') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('billing-country')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Country</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Country" class="form-control" name="billing-country" value="{{ Input::old('billing-country') ? Input::old('billing-country') : $shipping->billing_country }}">
              {{ ($errors->has('billing-country') ? $errors->first('billing-country') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('billing-contact_number_1')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Contact Number(s)</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Mobile" class="form-control" name="billing-contact_number_1" value="{{ Input::old('billing-contact_number_1') ? Input::old('billing-contact_number_1') : $shipping->billing_contact_number_1 }}">
              <div class="split_10"></div>
              <input type="text" placeholder="landline or secondary mobile" class="form-control" name="billing-contact_number_2" value="{{ Input::old('billing-contact_number_2') ? Input::old('billing-contact_number_2') : $shipping->billing_contact_number_2 }}">
              {{ ($errors->has('billing-contact_number_1') ? $errors->first('billing-contact_number_1') : '') }}
            </div>
          </div>

        </div><!-- /.col-md-6 -->
        <div class="col-md-9">
          <h3>Shipping Address</h3>
          <hr />

          <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="address-same" class="address-same"> Same as billing address
                      </label>
                  </div>
              </div>
          </div>
          
          <div class="form-group {{ ($errors->has('shipping-name')) ? 'has-error' : '' }}">

            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" placeholder="full name" class="form-control" name="shipping-name" value="{{ Input::old('shipping-address_1') ? Input::old('shipping-address_1') : $shipping->shipping_address_1 }}">
              <span class="help-block">Full name of person to which we ship item(s)</span>
              {{ ($errors->has('shipping-name') ? $errors->first('shipping-name') : '') }}
            </div>
          </div>
          
          <div class="form-group {{ ($errors->has('shipping-address_1')) ? 'has-error' : '' }}">

            <label class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address" class="form-control" name="shipping-address_1" value="{{ Input::old('shipping-address_1') ? Input::old('shipping-address_1') : $shipping->shipping_address_1 }}">
              {{ ($errors->has('shipping-address_1') ? $errors->first('shipping-address_1') : '') }}
              <span class="help-block">Street address</span>
            </div>
          </div>
          <div class="form-group {{ ($errors->has('shipping-address_2')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Address<br />(Line 2)</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Address (Line 2)" class="form-control" name="shipping-address_2" value="{{ Input::old('shipping-address_2') ? Input::old('shipping-address_2') : $shipping->shipping_address_2 }}">
              {{ ($errors->has('shipping-address_2') ? $errors->first('shipping-address_2') : '') }}
              <span class="help-block">Apartment, suite, unit, building, floor, etc.</span>
            </div>
          </div>
          <div class="form-group {{ ($errors->has('shipping-city')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">City</label>
            <div class="col-sm-9">
              <input type="text" placeholder="City" class="form-control" name="shipping-city" value="{{ Input::old('shipping-city') ? Input::old('shipping-city') : $shipping->shipping_city }}">
              {{ ($errors->has('shipping-city') ? $errors->first('shipping-city') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('shipping-state')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">State</label>
            <div class="col-sm-9">
              <input type="text" placeholder="State" class="form-control" name="shipping-state" value="{{ Input::old('shipping-state') ? Input::old('shipping-state') : $shipping->shipping_state }}">
              {{ ($errors->has('shipping-state') ? $errors->first('shipping-state') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('shipping-country')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Country</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Country" class="form-control" name="shipping-country" value="{{ Input::old('shipping-country') ? Input::old('shipping-country') : $shipping->shipping_country }}">
              {{ ($errors->has('shipping-country') ? $errors->first('shipping-country') : '') }}
            </div>
          </div>
          <div class="form-group {{ ($errors->has('shipping-contact_number_1')) ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Contact Number(s)</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Mobile" class="form-control" name="shipping-contact_number_1" value="{{ Input::old('shipping-contact_number_1') ? Input::old('shipping-contact_number_1') : $shipping->shipping_contact_number_1 }}">
              <div class="split_10"></div>
              <input type="text" placeholder="landline or secondary mobile" class="form-control" name="shipping-contact_number_2" value="{{ Input::old('shipping-contact_number_2') ? Input::old('shipping-contact_number_2') : $shipping->shipping_contact_number_2 }}">
              {{ ($errors->has('shipping-contact_number_1') ? $errors->first('shipping-contact_number_1') : '') }}
            </div>
          </div>



          <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn">Save and continue</button>
          </div><!-- /.col-sm-offset-3 col-sm-9 -->
        </div>        
        </div><!-- /.col-md-6 -->
      </div><!-- /.row -->
        
     </form>
    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->

	<div class="split_40"></div><!-- /.split_40 -->

</div><!-- /.col-sm-8 main-cart -->


@stop
