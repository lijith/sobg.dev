@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Find a user
@stop


@section('content')

  <div class="row">
    <div class="col-md-8">
    	<div class="row">
    		<div class="col-md-6">
    			<section class="panel">
            <header class="panel-heading">
                Search by email
            </header>
            <div class="panel-body">
            <form method="post" action="{{ route('sentinel.users.search') }}">

            		<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
	                <input class="form-control" placeholder="E-mail" autofocus="autofocus" name="email" type="text" value="{{ Input::old('email') }}">
	                {{ ($errors->has('email') ? $errors->first('email') : '') }}
	           	 </div>

		            <input name="_token" value="{{ csrf_token() }}" type="hidden">
		            <input type="hidden" name="search-type" value="email" />
		            <input class="btn btn-primary" value="Find User" type="submit">
	            </form>

            </div>

        </section>
    		</div><!-- /.col-md-6 -->
    		<div class="col-md-6">
    			<section class="panel">
            <header class="panel-heading">
                Search Profile
            </header>
            <div class="panel-body">
            <form method="post" action="{{ route('sentinel.users.search') }}">

	            <div class="form-group {{ ($errors->has('search-profile')) ? 'has-error' : '' }}">
	                <input class="form-control" placeholder="search" autofocus="autofocus" name="search-profile" type="text" value="{{ Input::old('search-profile') }}">
	                {{ ($errors->has('search-profile') ? $errors->first('search-profile') : '') }}
	            </div>

	            <input name="_token" value="{{ csrf_token() }}" type="hidden">
		            <input type="hidden" name="search-type" value="profile" />
	            <input class="btn btn-primary" value="Find User" type="submit">
	          </form>


            </div>

        </section>
    		</div><!-- /.col-md-6 -->
    	</div><!-- /.row -->


        @if (!empty($result))

	        <section class="panel">
	            <header class="panel-heading">
	                Search Result
	            </header>
	            <div class="panel-body">
	            	 <table class="table table-striped table-hover">
				         	<thead>
			              <th>Email</th>
			              <th>Profile</th>
				          </thead>
			            <tbody>
			            @foreach ($result as $user)
										<td>
											<a href="{{ route('sentinel.users.show', array($user->id)) }}">{{$user->email}}</a>

										</td>
										<td>
										@if($user->profile != null)
											{{ucwords($user->profile->name)}} <br />
											{{ucwords($user->profile->permanent_address_1)}}
											{{ucwords($user->profile->permanent_address_1)}}
											{{ucwords($user->profile->permanent_city)}} <br />
											{{$user->profile->contact_number_1}} {{$user->profile->contact_number_2}}
										@else
										<p>Profile not updated</p>
										@endif
										</td>
			            @endforeach
			            </tbody>
		            </table>
	            </div>
	        </section>

        @endif




    </div><!--col-md-6-->

    <!-- /.panel -->


	</div><!--row-->

@stop



