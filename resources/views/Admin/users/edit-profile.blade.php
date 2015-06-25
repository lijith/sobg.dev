@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	User Profile
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Edit Profile
      </header>
      <div class="panel-body">
	        <form method="POST" action="{{ route('sentinel.users.store.profile', array($hash)) }}" accept-charset="UTF-8" class="form-horizontal">

            <h2>Profile</h2>
            <hr />

                <div class="form-group">
                  <label class="col-lg-3 control-label">Name:</label>
                  <div class="col-lg-8">
                    <input class="form-control" name="name" value="{{ Input::old('name') ? Input::old('name') : $profile->name }}" type="text">
                  </div>
                </div>
                <div class="form-group">
                <label class="col-lg-3 control-label">Gender</label>
                  <div class="col-lg-8">
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="1" id="" {{$profile->gender == 1 ? 'checked' : ''}}> Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="2" id="" {{$profile->gender == 2 ? 'checked' : ''}}> Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-lg-3 control-label">Date of Birth</label>
                  <div class="col-lg-8">
                    <div class="input-group date form_datetime-component">
                      <input type="text" class="form-control" name="dob" value="{{ Input::old('dob') ? Input::old('dob') : $profile->dob }}" readonly=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Nationality:</label>
                  <div class="col-lg-8">
                    <input class="form-control" name="nationality" value="{{ Input::old('nationality') ? Input::old('nationality') : $profile->nationality }}" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Profession:</label>
                  <div class="col-lg-8">
                    <input class="form-control" name="profession" value="{{ Input::old('profession') ? Input::old('profession') : $profile->profession }}" type="text">
                  </div>
                </div>
                        <div class="form-group">
                  <label class="col-lg-3 control-label">Marital Status</label>
                  <div class="col-lg-8">
                    <label class="radio-inline">
                        <input type="radio" name="marital-status" value="1" id="" {{$profile->marital_status == 1 ? 'checked' : ''}}> Single
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="marital-status" value="2" id="" {{$profile->marital_status == 2 ? 'checked' : ''}}> Married
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Contact Numbers</label>
                  <div class="col-lg-8">
                    <input class="form-control" name="contact-number-1" value="{{ Input::old('contact-number-1') ? Input::old('contact-number-1') : $profile->contact_number_1 }}" type="text">
                    <br />
                    <input class="form-control" name="contact-number-2" value="{{ Input::old('contact-number-2') ? Input::old('contact-number-2') : $profile->contact_number_2 }}" type="text">
                  </div>
                </div>


                <hr />
                <h4>Permanent Address</h4>
                <hr />

                <div class="form-group">
                  <label class="col-xs-12">Address Line 1:</label>
                  <div class="col-xs-12">
                    <input class="form-control" name="permanent-address-line-1" value="{{ Input::old('permanent-address-line-1') ? Input::old('permanent-address-line-1') : $profile->permanent_address_1 }}" type="text">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12">Address Line 2:</label>
                  <div class="col-xs-12">
                    <input class="form-control" name="permanent-address-line-2" value="{{ Input::old('permanent-address-line-2') ? Input::old('permanent-address-line-2') : $profile->permanent_address_2 }}" type="text">
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-xs-12">City:</label>
                  <div class="col-xs-12">
                    <input class="form-control" name="permanent-city" value="{{ Input::old('permanent-city') ? Input::old('permanent-city') : $profile->permanent_city }}" type="text">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12">State:</label>
                  <div class="col-xs-12">
                    <input class="form-control" name="permanent-state" value="{{ Input::old('permanent-state') ? Input::old('permanent-state') : $profile->permanent_state }}" type="text">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12">Country:</label>
                  <div class="col-xs-12">
                    <input class="form-control" name="permanent-country" value="{{ Input::old('permanent-country') ? Input::old('permanent-country') : $profile->permanent_country }}" type="text">
                    </div>
                </div>
                <hr />
                <h4>Contact Address</h4>
                <hr />
                    <div class="checkbox">
                    <label>
                        <input type="checkbox" value="yes" name="address_same" {{ (Input::old('address_same') == 'yes') ? 'checked' : '' }} class="address-same" >
                        Same as Permanent Address
                    </label>
                </div>
                    <div class="form-group">
                      <label class="col-xs-12">Address Line 1:</label>
                      <div class="col-xs-12">
                        <input class="form-control" name="contact-address-line-1" value="{{ Input::old('contact-address-line-1') ? Input::old('contact-address-line-1') : $profile->contact_address_1 }}" type="text">
                      </div>
                    </div>
                <div class="form-group">
                      <label class="col-xs-12">Address Line 2:</label>
                      <div class="col-xs-12">
                        <input class="form-control" name="contact-address-line-2" value="{{ Input::old('contact-address-line-2') ? Input::old('contact-address-line-2') : $profile->contact_address_2 }}" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-12">City:</label>
                      <div class="col-xs-12">
                        <input class="form-control" name="contact-city" value="{{ Input::old('contact-city') ? Input::old('contact-city') : $profile->contact_city }}" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-12">State:</label>
                      <div class="col-xs-12">
                        <input class="form-control" name="contact-state" value="{{ Input::old('contact-state') ? Input::old('contact-state') : $profile->contact_state }}" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-12">Country:</label>
                      <div class="col-xs-12">
                        <input class="form-control" name="contact-country" value="{{ Input::old('contact-country') ? Input::old('contact-country') : $profile->contact_country }}" type="text">
                      </div>
                    </div>
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <div class="form-group">
              <div class="col-lg-offset-3 col-md-8">
                <button class="btn btn-primary" value="Save Details" type="submit">Save Details</button>
              </div>
            </div>

        </form>
      </div>
    </section>
	</div>
</div>
@stop
