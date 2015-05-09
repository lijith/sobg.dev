@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">{{ ucwords($event->title) }}</h1>

		<div class="clearfix">
			<div class="event-dates">
				<?php $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$event->start_date);?>

				<?php $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$event->end_date);?>

				@if($start_date->diffInDays($end_date) > 0 )
					From 
					<strong>{{$start_date->format('M d, Y')}}</strong> to 
					<strong>{{$end_date->format('M d, Y')}}</strong>
				@else
					<strong>{{ $start_date->format('M d, Y') }}</strong>
				@endif
			</div><!-- /.event-date -->
		</div><!-- /.clearfix -->
			
		<div class="shadow">
			<div class="event-cover-photo">
				<img src="{{ asset('images/events/'.$event->cover_photo) }}" />
			</div><!-- /.event-cover-photo -->
		</div><!-- /.shadow -->

		<p>{!! $event->details !!}</p>

	</div><!-- /.col-md-8 -->

@include('event-side-nav')
	
</div><!-- /.row -->

							
@stop