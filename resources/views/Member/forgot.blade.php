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
								<a href="#" class="active" id="login-form-link">Forgot Password</a>
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

					        <form id="login-form" method="POST" action="{{ route('member.reset.request') }}" accept-charset="UTF-8" role="form" style="display: block;">
									 <input name="_token" value="{{ csrf_token() }}" type="hidden">

									<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                    <input class="form-control" placeholder="E-mail" autofocus="autofocus" name="email" type="text" value="{{ Input::old('name') }}">
                    {{ ($errors->has('email') ? $errors->first('email') : '') }}
                    <p><i>Give the email you used to register. Instructions will be send to this email address.</i></p>
                </div>


									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Send">
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