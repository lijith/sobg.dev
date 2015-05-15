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

								
								<form id="register-form" action="{{ route('member.reactivate.send') }}" accept-charset="UTF-8" method="POST" role="form">
								<input name="_token" value="{{ csrf_token() }}" type="hidden">
									
									<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                    <input class="form-control" placeholder="E-mail" autofocus="autofocus" name="email" type="text" value="{{ Input::old('name') }}">
                    {{ ($errors->has('email') ? $errors->first('email') : '') }}
                </div>
									
                  <input class="btn btn-primary" value="Resend" type="submit">  
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	  
@stop