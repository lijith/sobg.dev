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

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop