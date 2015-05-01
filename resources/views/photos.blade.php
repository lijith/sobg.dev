@extends('layout')

@section('content')

<div class="split_30"></div><!-- /.split_30 -->

	<div class="photos-container">

		@foreach($photos as $photo)

			<div class="photo">
				<div class="photo-wrap">
					<a href="{{ asset('images/albums/'.$photo->image_name) }}" class="image-link">
						<img src="{{ asset('images/albums/'.$photo->image_thumbnail) }}" alt="" /> 
					</a>
				</div><!-- /.photo-wrap -->
			</div><!-- /.col-md-3 -->

		@endforeach

	</div><!-- /.photos-container -->


							
@stop