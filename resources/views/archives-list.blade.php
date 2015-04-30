@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Events</h1>
		
		<div class="split_30"></div><!-- /.split_30 -->
		@foreach($events as $event)
			<p>{{  }} | {{ ucwords($event->title) }}</p>
		@endforeach

	</div><!-- /.col-md-8 -->

@include('events-list-side')
	
</div><!-- /.row -->

							
@stop