@extends('layout')

@section('content')

<div class="split_30"></div><!-- /.split_30 -->

	<div class="photos-container">

		@foreach($photos as $photo)

			<div class="photo">
				<div class="photo-wrap">
					<img src="{{ asset('images/albums/'.$photo->image_thumbnail) }}" alt="" /> 
				</div><!-- /.photo-wrap -->
			</div><!-- /.col-md-3 -->

		@endforeach

	</div><!-- /.photos-container -->


							
@stop