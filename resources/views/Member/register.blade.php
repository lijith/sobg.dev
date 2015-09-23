@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->


<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">

							<div class="col-xs-6">
								<a href="#" class="active" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">

							<div class="col-lg-12">
                @foreach($errors->all() as $error)
                @endforeach
                <!-- Notifications -->
                  @include('notifications')
                <!-- ./ notifications -->


								<form id="register-form" action="{{ route('member.register.user') }}" accept-charset="UTF-8" method="POST" role="form">
								<input name="_token" value="{{ csrf_token() }}" type="hidden">

									<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
										<label class="control-label">Name</label>
										<input type="name" placeholder="Name" class="form-control" value="{{ Input::old('name') }}" name="name">
									{{ ($errors->has('name') ? $errors->first('name') : '') }}

									</div>
									<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
										<label class="control-label">Email</label>
										<input type="email" placeholder="Email" class="form-control" value="{{ Input::old('email') }}" name="email">
									{{ ($errors->has('email') ? $errors->first('email') : '') }}

									</div>
									<div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
										<label class="control-label">Password</label>
										<input type="password" placeholder="Password" class="form-control" name="password">
										{{ ($errors->has('password') ?  $errors->first('password') : '') }}
									</div>
									<div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
										<input class="form-control" placeholder="Confirm Password" name="password_confirmation" value="" type="password">
										{{ ($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '') }}
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>

										</div>
									</div>
                  <a href="{{ route('member.login') }}" class="forgot-password">Already a member? Login</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop