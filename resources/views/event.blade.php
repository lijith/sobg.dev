@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">{{ ucwords($event->title) }}</h1>
		
		<div class="split_30"></div><!-- /.split_30 -->
		<div>
			<img class="img-responsive" src="{{ asset('images/events/'.$event->cover_photo) }}" />
		</div>
		<div class="split_11"></div><!-- /.split_30 -->

		<p>{!! $event->details !!}</p>

	</div><!-- /.col-md-8 -->

@include('events-side-nav')
	
</div><!-- /.row -->

							
@stop