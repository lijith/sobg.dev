@extends('layout')

@section('content')
<div class="split_50"></div><!-- /.split_30 -->

<div class="row">

	@include('no-side-cart')

	<div class="col-sm-8 main-cart">
		<h1 class="col-heading">Your Cart</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs">
					<li><a href="">Cart</a></li>
					<li><a href="#">Account</a></li>
					<li><a href="#">Shipping</a></li>
					<li class="active"><a href="#">Payment</a></li>
				</ul>

				<div class="split_30"></div><!-- /.split_30 -->

				<h3>Payment Status</h3>
				<hr />

				<!-- Notifications -->
				@if ($message = Session::get('success'))
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{!! $message !!}</strong>
				</div>
				{{ Session::forget('success') }}
				@endif

				@if ($message = Session::get('error'))
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{!! $message !!}</strong>
				</div>
				{{ Session::forget('error') }}
				@endif

				@if ($message = Session::get('warning'))
				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{!! $message !!}</strong>
				</div>
				{{ Session::forget('warning') }}
				@endif

				@if ($message = Session::get('info'))
				<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{!! $message !!}</strong>
				</div>
				{{ Session::forget('info') }}
				@endif

				<!-- ./ notifications -->
				<hr />

				<!-- /.clearfix -->
			</div>
		</div>

		<div class="split_40"></div><!-- /.split_40 -->

	</div>
	<!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
