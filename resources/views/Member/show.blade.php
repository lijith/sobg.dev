@extends('layout')

@section('content')



<div class="split_30"></div><!-- /.split_30 -->

  <h1 class="page-header">Your Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-sm-6 col-xs-12">
      
      <div class="well panel panel-default">
	      <div class="panel-body">

		      <div class="text-center">
		        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
		      </div>
	          	
	          <!--/col--> 
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
	            <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>

	      </div><!--/panel-body-->
	    </div><!--/panel-->
    </div>
    <!-- edit form column -->
    <div class="col-sm-6 col-xs-12 personal-info">
      
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            {{ucwords($user->email)}}
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="Bishop" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Company:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
        
        <hr />
        
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>

<div class="split_60"></div><!-- /.split_60 -->


							
@stop
