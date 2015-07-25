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
								<a href="#" class="active" id="register-form-link">Reset Password</a>
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


								<form method="POST" action="{{ route('member.reset.password', [$hash, $code]) }}" accept-charset="UTF-8">

			            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
			                <input class="form-control" placeholder="New Password" name="password" type="password" />
			                {{ ($errors->has('password') ? $errors->first('password') : '') }}
			            </div>

			            <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
			                <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password" />
			                {{ ($errors->has('password_confirmation') ? $errors->first('password_confirmation') : '') }}
			            </div>

			            <input name="_token" value="{{ csrf_token() }}" type="hidden">


									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Reset Password">
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