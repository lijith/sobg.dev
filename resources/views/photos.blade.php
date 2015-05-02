@extends('layout')

@section('content')

<div class="split_30"></div><!-- /.split_30 -->

		<div class="album-details">
			<div class="row">
				<div class="col-sm-8">
					<div class="cover-photo">
						<img src="{{ asset('images/albums/'.$album->cover_photo) }}" alt="">
					</div><!-- /.cover-photo -->
				</div><!-- /.col-sm-8 -->
				<div class="col-sm-4">
					<div class="album-details">
						<h3>{{ ucwords($album->title) }}</h3>
						<p>{{ $album->description }}</p>
					</div><!-- /.album-details -->
				</div><!-- /.col-sm-4 -->
			</div><!-- /.row -->
		</div><!-- /.album-details -->
	
		<div class="photos-container loading">

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