@extends('layout')

@section('content')


<div class="split_30"></div><!-- /.split_30 -->

  <h1 class="page-header">Your Profile</h1>
	<!-- Notifications -->
	  @include('notifications')
	<!-- ./ notifications -->
  <div class="row">
    <!-- left column -->
    <div class="col-sm-5 col-xs-12">
      
      <div class="panel panel-default">
	      <div class="panel-body">

		      <!--<div class="text-center">
		        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
		      </div>-->
	          	
	            <h2>{{ucwords($profile->name)}}</h2>
	            <p><strong>{{$user->email}}</strong></p>
	            <p><strong>Contact Address: </strong>
	            	<br /> 
	            	{{ucwords($profile->contact_address_1)}} 
	            	<br />
	            	{{ucwords($profile->contact_address_2)}} 
	            	<br />
	            	{{ucwords($profile->contact_city)}}
	            	<br />
	            	{{ucwords($profile->contact_state)}}
	            	<br />
	            	{{ucwords($profile->contact_country)}}

	            </p>
	            <p><strong>Contact Numbers</strong>
								<br />
								{{$profile->contact_number_1}}
								<br />
								{{$profile->contact_number_2}}
	            </p>
	            <hr />
	            <a href="{{ route('member.session.destroy') }}"> LOGOUT</a>

	      </div><!--/panel-body-->
	    </div><!--/panel-->

	    <div class="well panel panel-default">
			    <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
	    	<form class="form-horizontal" role="form" method="POST" action="{{ route('member.profile.password') }}">
	    	<input name="_token" value="{{ csrf_token() }}" type="hidden">
	      <div class="panel-body">
	      	<div class="form-group {{ ($errors->has('oldPassword')) ? 'has-error' : '' }}">
	          <label class="col-md-3 control-label">Old Password:</label>
	          <div class="col-md-8">
	            <input class="form-control" value="" type="password" name="oldPassword">
	            {{ ($errors->has('oldPassword') ? $errors->first('oldPassword') : '') }}
	          </div>
	        </div>
	        <div class="form-group {{ ($errors->has('newPassword')) ? 'has-error' : '' }}">
	          <label class="col-md-3 control-label">New Password:</label>
	          <div class="col-md-8">
	            <input class="form-control" value="" type="password" name="newPassword">
	            {{ ($errors->has('newPassword') ? $errors->first('newPassword') : '') }}
	          </div>
	        </div>
	        <div class="form-group {{ ($errors->has('newPassword_confirmation')) ? 'has-error' : '' }}">
	          <label class="col-md-3 control-label">Confirm password:</label>
	          <div class="col-md-8">
	            <input class="form-control" value="" type="password" name="newPassword_confirmation">
	            {{ ($errors->has('newPassword_confirmation') ? $errors->first('newPassword_confirmation') : '') }}
	          </div>
	        </div>
	        <div class="form-group">
	          <label class="col-md-3 control-label"></label>
	          <div class="col-md-8">
	            <button class="btn btn-primary" type="submit">Change Password</button>
	            
	          </div>
	        </div>
	      </div><!--/panel-body-->
	      </form>
	    </div>

    </div>
    <!-- edit form column -->
    <div class="col-sm-7 col-xs-12 personal-info">
	    <div class="well panel panel-default">
	      <div class="panel-body">
	      <h3>Personal info</h3>
		      <form class="form-horizontal" role="form" method="POST" action="{{ route('member.profile.personalupdate')}}">
            <input name="_method" value="PUT" type="hidden">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input name="form" value="personal" type="hidden">

            @if(Input::old('form') == 'personal')
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
            @endif
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
		          	<div class="input-group date">
								  <input type="text" class="form-control" name="dob" value="{{ Input::old('dob') ? Input::old('dob') : $profile->dob }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
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
		        <div class="form-group">
	          <div class="col-lg-offset-3 col-md-8">
	            <button class="btn btn-primary" value="Save Changes" type="submit">Save Changes</button>
	          </div>
	        </div>
		        </form>
		      </div><!--panel-body-->
		    </div><!--panel panel-default-->
        <hr />

		    <div class="well panel panel-default">
		      <div class="panel-body">
		      <h3>Address</h3>
            @if(Input::old('form') == 'address')
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
            @endif

		      <form class="form-horizontal" role="form" method="POST" action="{{ route('member.profile.addressupdate') }}">
            <input name="_method" value="PUT" type="hidden">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input name="form" value="address" type="hidden">



		      <div class="row">
		      	<div class="col-sm-6">
			      	<h4>Permanent Address</h4>
			        <hr />
  		        <div class="checkbox">
                <label>
                    
                </label>
	            </div>

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

		      	</div><!-- /.col-sm-6 -->


		      	<div class="col-sm-6">
		      		<h4>Contact Address</h4>
			        <hr />

			        <div class="checkbox">
		            <label>
		                <input type="checkbox" value="yes" name="address_same" {{ (Input::old('address_same') == 'yes') ? 'checked' : '' }}>
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
		      	</div><!-- /.col-sm-6 -->
		      	<div class="col-md-12">
	            <button class="btn btn-primary" value="Save Changes" type="submit">Save Changes</button>
	          </div>
		      </div><!-- /.row -->
		      </form>
		      </div><!--panel-body-->
		    </div><!--panel panel-default-->

    </div>
  </div>

<div class="split_60"></div><!-- /.split_60 -->


							
@stop
