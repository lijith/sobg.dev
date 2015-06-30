@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Home
@stop


@section('content')

		<?php
// Determine the edit profile route
if (($user->email == Sentry::getUser()->email)) {
	$editAction = route('sentinel.profile.edit');
} else {
	// $editAction =  action('App\Http\Controllers\Admin\UserController@edit', [$user->hash]);
	$editAction = route('sentinel.users.edit', array($user->hash));
}

$userGroups = $user->getGroups();
?>

  <div class="row">
    <div class="col-md-6">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                User
            </header>
            <div class="panel-body">
        	    @if ($user->first_name)
					    	<p><strong>First Name:</strong> {{ $user->first_name }} </p>
							@endif
							@if ($user->last_name)
					    	<p><strong>Last Name:</strong> {{ $user->last_name }} </p>
							@endif
						    <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>

        </section>
        @if ($subscription != 'Admin')

        <section class="panel">
            <header class="panel-heading">
                Subscription
            </header>
            <div class="panel-body">

            	@if ($subscription != null)
            		@if ($subscription->active == 1)
            			@if ($subscription->print == 1)
            					<p>
            					Print subscription <span class="badge bg-important">on</span> End in {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subscription->print_ending_at)->format('d M, Y') }}
            					</p>
            			@else
            					<p>Print subscription <span class="badge bg-important">Off</span></p>
            			@endif
            			@if ($subscription->digital == 1)
            					<p>
            					Digital subscription <span class="badge bg-important">on</span> End in {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subscription->digital_ending_at)->format('d M, Y') }}
            					</p>

            			@else
		            			<p>Digital subscription <span class="badge bg-important">Off</span></p>
            			@endif
            		@endif
            		<hr />
            		<h4>Update Subscription</h4>
            		<form method="post" action="{{ route('sentinel.users.update.subscription', array($user->hash)) }}">
	            		<div class="row">

	            			<div class="col-md-6">
	            				<div class="checkbox">
			                    <label>
			                        <input type="checkbox" name="digital" {{ ($subscription->digital)? 'checked':'' }}> Digital
			                    </label>
			                </div>

	                		<div class="form-group {{ ($errors->has('digital-end-date')) ? 'has-error' : '' }}">
                         <label>Ending Date</label>
                        <input class="form-control" placeholder="" name="digital-end-date" type="text"  value="{{ Input::old('digital-end-date') ?  Input::old('digital-end-date') : \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subscription->digital_ending_at)->format('m/d/Y') }}" id="digital-end-date">
                        {{ ($errors->has('digital-end-date') ? $errors->first('digital-end-date') : '') }}
                    	</div>
	            			</div><!-- /.col-md-6 -->

	            			<div class="col-md-6">
	            				<div class="checkbox">
			                    <label>
			                        <input type="checkbox" name="print" {{ ($subscription->print)? 'checked':'' }}> Print
			                    </label>
			                </div>

                    	<div class="form-group {{ ($errors->has('print-end-date')) ? 'has-error' : '' }}">
                         <label>Ending Date</label>
                        <input class="form-control" placeholder="" name="print-end-date" type="text"  value="{{ Input::old('print-end-date') ?  Input::old('print-end-date') : \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subscription->print_ending_at)->format('m/d/Y') }}" id="print-end-date">
                        {{ ($errors->has('print-end-date') ? $errors->first('print-end-date') : '') }}
                    	</div>
	            			</div><!-- /.col-md-6 -->

	            		</div><!-- /.row -->
	            		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	            		<button class="btn btn-primary">Update Subscription</button>
            		</form>
            	@else
            		<p>Not subscribed</p>
            		<form method="post" action="{{ route('sentinel.users.create.subscription', array($user->hash)) }}">
	            		<div class="row">

	            			<div class="col-md-6">
	            				<div class="checkbox">
			                    <label>
			                        <input type="checkbox" name="digital"> Digital
			                    </label>
			                </div>
			                <div class="form-group {{ ($errors->has('digital-end-date')) ? 'has-error' : '' }}">
                         <label>Ending Date</label>
                        <input class="form-control" placeholder="" name="digital-end-date" type="text"  value="{{ Input::old('digital-end-date') }}" id="digital-end-date">
                        {{ ($errors->has('digital-end-date') ? $errors->first('digital-end-date') : '') }}
                    	</div>

	            			</div><!-- /.col-md-6 -->

	            			<div class="col-md-6">
	            				<div class="checkbox">
			                    <label>
			                        <input type="checkbox" name="print"> Print
			                    </label>
			                </div>
	                		<div class="form-group {{ ($errors->has('print-end-date')) ? 'has-error' : '' }}">
                         <label>Ending Date</label>
                        <input class="form-control" placeholder="" name="print-end-date" type="text"  value="{{ Input::old('print-end-date') }}" id="print-end-date">
                        {{ ($errors->has('print-end-date') ? $errors->first('print-end-date') : '') }}
                    	</div>
	            			</div><!-- /.col-md-6 -->

	            		</div><!-- /.row -->
	            		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	            		<button class="btn btn-primary">Make Subscription for this user</button>
            		</form>
            	@endif
            </div>

        </section>

        @endif

    </div><!--col-md-6-->

    <div class="col-md-6">
	    <section class="panel">
	        <header class="panel-heading">
	            Account Details
	        </header>
	        <div class="panel-body">

	    	    <p><em>Account created: {{ $user->created_at }}</em></p>
						<p><em>Last Updated: {{ $user->updated_at }}</em></p>
						<button class="btn btn-primary" onClick="location.href='{{ $editAction }}'">Edit Account</button>
						<a href="{{ route('sentinel.users.edit.profile', array($user->hash)) }}" class="btn btn-primary">Edit Profile</a>
	        </div>

	    </section>

    	<section class="panel">
	        <header class="panel-heading">
	            User Groups
	        </header>
	        <div class="panel-body">

						<ul>
				    	@if (count($userGroups) >= 1)
					    	@foreach ($userGroups as $group)
								<li>{{ $group['name'] }}</li>
							@endforeach
						@else
							<li>No Group Memberships.</li>
						@endif
				    </ul>
	        </div>

	    </section>
    </div><!-- /.col-md-6 -->

	</div><!--row-->

@stop
