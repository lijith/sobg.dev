@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row gita-family">
	<div class="col-md-6">
		<h1 class="col-heading">We Stand As One Family</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<p>Gita Family is the volunteers wing of School of Bhagavad Gita. If you believe in the ideals of the School of Bhagavad Gita - If you would like to be part of a selfless venture for the common good - You are welcome to join the Gita Family- the world-wide family of the School of Bhagavad Gita.</p>

		<p>You will receive updates about SOBG programmes and about the opportunities to volunteer at the ashram or at other programs of SOBG. Also you can share your suggestions regarding new programmes that can be taken up and how we can improve the way the organisation is working at present.</p>

		<p>Registration is free. You can <a href="{{ route('member.register.form') }}">register here</a>.</p>

		<p>Already a member? <a href="{{ route('member.login') }}">Log in here</a>.</p>
	</div><!-- /.col-md-4 -->

	<div class="col-md-6">
		<div class="gita-family shadow">
			<img src="{{ asset('images/gita-family.jpg') }}" alt="gita family" class="img-responsive">
		</div><!-- /.gita-family -->
	</div><!-- /.col-md-6 -->

	<!-- /.col-md-8 col-md-push-4 -->
</div><!-- /row gita-family	 -->
								
@stop
