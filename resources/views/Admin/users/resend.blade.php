@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Resend Activation
@stop


@section('content')


  <div class="row">
    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Resend Activation
            </header>
            <div class="panel-body">
            	<form method="POST" action="{{ route('sentinel.reset.password', [$hash, $code]) }}" accept-charset="UTF-8">

			            <h2>Resend Activation Email</h2>

			            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
			                <input class="form-control" placeholder="E-mail" autofocus="autofocus" name="email" type="text" value="{{ Input::old('name') }}">
			                {{ ($errors->has('email') ? $errors->first('email') : '') }}
			            </div>

			            <input name="_token" value="{{ csrf_token() }}" type="hidden">
			            <input class="btn btn-primary" value="Resend" type="submit">

			        </form>
            </div>

        </section>
        
    </div><!--col-md-6-->

    <!-- /.panel -->

    
	</div><!--row-->

@stop



