@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-offset-2">
		<h1 class="col-heading">{{ ucwords($archive->title) }}</h1>
		
		<div class="split_30"></div><!-- /.split_30 -->

		@if($type == 'event')
			<?php 
				$start = \Carbon\Carbon::CreateFromFormat('Y-m-d H:i:s',$archive->start_date);
				$end = \Carbon\Carbon::CreateFromFormat('Y-m-d H:i:s',$archive->end_date);
			?>
		<div>
			<img class="img-responsive" src="{{ asset('images/events/'.$archive->cover_photo) }}" />
		</div>
		<div class="split_10"></div><!-- /.split_30 -->
			<p>
				Date : 
				@if($start->diffInDays($end) > 0 )
					{{$start->format('d/M/Y')}} - {{$end->format('d/M/Y')}}
				@else
					{{$start->format('d/M/Y')}}
				@endif

			</p>

			<p>
				{!! $archive->details !!}
			</p>

		@elseif($type == 'news')
			<?php 
				$date = \Carbon\Carbon::CreateFromFormat('Y-m-d H:i:s',$archive->date);
			?>

			<p>{{$date->format('d/M/Y')}}</p>

			<div class="archive">
				{!! $archive->details !!}
			</div><!-- /.archive -->


		@endif
		

	</div><!-- /.col-md-8 -->


	
</div><!-- /.row -->

							
@stop