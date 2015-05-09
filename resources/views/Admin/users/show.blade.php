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
            $editAction =  action('App\Http\Controllers\Admin\UserController@edit', [$user->hash]);
        }

        $userGroups = $user->getGroups();
    ?>

  <div class="row">
    <div class="col-md-6">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Earning Graph
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
        <!--earning graph end-->
    </div><!--col-md-6-->

    <div class="col-md-6">
	    <section class="panel">
	        <header class="panel-heading">
	            Account Details
	        </header>
	        <div class="panel-body">
	    	    <p><em>Account created: {{ $user->created_at }}</em></p>
						<p><em>Last Updated: {{ $user->updated_at }}</em></p>
						<button class="btn btn-primary" onClick="location.href='{{ $editAction }}'">Edit Profile</button>
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
