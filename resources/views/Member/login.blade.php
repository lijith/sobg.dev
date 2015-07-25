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
								<a href="#" class="active" id="login-form-link">Member Login</a>
							</div>

						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                <ul>
                  @foreach($errors->all() as $error)
                  @endforeach
                </ul>
                <!-- Notifications -->
                  @include('notifications')
                <!-- ./ notifications -->

								<form id="login-form" method="POST" action="{{ route('member.session.store') }}" accept-charset="UTF-8" role="form" style="display: block;">
									 <input name="_token" value="{{ csrf_token() }}" type="hidden">
                   <input name="form" value="login" type="hidden">

									<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
										<input class="form-control" placeholder="Email" autofocus="autofocus" name="email" type="text" value="{{ Input::old('email') }}">
										{{ ($errors->has('email') ? $errors->first('email') : '') }}
									</div>
									<div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
										<input class="form-control" placeholder="Password" name="password" value="" type="password">
										{{ ($errors->has('password') ?  $errors->first('password') : '') }}
									</div>
									<div class="form-group text-center">
										<input name="rememberMe" value="rememberMe" type="checkbox">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="{{ route('member.forgot.form') }}" class="forgot-password">Forgot Password?</a><br />
													<a href="{{ route('member.register.user') }}" class="forgot-password">Register</a>
												</div>
											</div>
										</div>
									</div>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop