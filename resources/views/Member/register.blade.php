@extends('layout')

@section('content')



<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8">
		<h1 class="col-heading">Register as member</h1>
		
		<div class="split_20"></div><!-- /.split_30 -->
		<div class="shadow">	
			
			<form method="POST" action="{{ route('member.register.user') }}" accept-charset="UTF-8" id="register-form">

        <div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
            <input class="form-control" placeholder="Username" name="username" type="text" value="{{ Input::old('username') }}">
            {{ ($errors->has('username') ? $errors->first('username') : '') }}
        </div>

        <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
            <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ Input::old('email') }}">
            {{ ($errors->has('email') ? $errors->first('email') : '') }}
        </div>

        <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
            <input class="form-control" placeholder="Password" name="password" value="" type="password">
            {{ ($errors->has('password') ?  $errors->first('password') : '') }}
        </div>

        <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
            <input class="form-control" placeholder="Confirm Password" name="password_confirmation" value="" type="password">
            {{ ($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '') }}
        </div>

        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input class="btn btn-primary" value="Register" type="submit">

    </form>

    <div class="split_40"></div><!-- /.split_40 -->


		</div><!-- /.shadow -->
		<div class="split_30"></div><!-- /.split_30 -->


	</div><!-- /.col-md-8 -->

	<div class="col-md-4">
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="shadow">
			<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			
			</p>
			<p>
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>	
		</div><!-- /.shadow -->

		
		
	</div><!-- /.col-md-4 -->
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
							
@stop
