@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">"{{ ucwords($search) }}" search results</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="search-titles clearfix">
			<form method="GET" action="{{ route('search.eshop') }}">
        <div class="clearfix">
          <input type="text" placeholder="" name="for" value="{{ $search }}">
          <button type="submit" class="submit">
						<i class="fa fa-search"></i> search
					</button>
     		</div>
			</form>
		</div><!-- /.search-titles -->
		<div class="split_30"></div><!-- /.split_30 -->
		
		@if($video_result->count() > 0)

		<div class="items-category">
			<?php $item_count = 0; $total_item = 0; ?>
			<h2>Video Disks</h2>
			@foreach($video_result as $video)

				@if($item_count == 0)
					<div class="pub-items-row">
				@endif
				<?php $item_count++; $total_item++;?>

				<div class="pub-item">
					<div class="wrap">
						<div class="pub-image">
							<img src="{{asset('images/video-disks/'.$video->cover_photo_thumbnail)}}" alt="{{ucwords($video->title)}}" />
						</div><!-- /.pub-image -->
						<div class="pub-title">
							@if($video->disk_type == 1)
								<a href="{{route('dvd.show',array($video->slug))}}">{{ucwords($video->title)}}</a>
								<br /><span class="disk-type">DVD</span>
							@elseif($video->disk_type == 2)
								<a href="{{route('vcd.show',array($video->slug))}}">{{ucwords($video->title)}}</a>
								<br /><span class="disk-type">VCD</span>
							@endif
						</div><!-- /.pub-title -->
						
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->

					@if($item_count == 4 || $total_item == $video_result->count())
					</div><!-- /.pub-items-row -->
					<?php $item_count = 0; ?>
					@endif

				@endforeach

		</div><!-- /.items-category -->

		@endif


		<!-- Audio Disks -->

		@if($audio_result->count() > 0)

		<div class="items-category">
			<?php $item_count = 0; $total_item = 0; ?>
			<h2>Audio Disks</h2>
			@foreach($audio_result as $audio)

				@if($item_count == 0)
					<div class="pub-items-row">
				@endif
				<?php $item_count++; $total_item++;?>

				<div class="pub-item">
					<div class="wrap">
						<div class="pub-image">
							<img src="{{asset('images/audio-disks/'.$audio->cover_photo_thumbnail)}}" alt="{{ucwords($audio->title)}}" />
						</div><!-- /.pub-image -->
						<div class="pub-title">
							@if($audio->disk_type == 1)
								<a href="{{route('acd.show',array($audio->slug))}}">{{ucwords($audio->title)}}</a>
								<br /><span class="disk-type">Audio CD</span>
							@elseif($audio->disk_type == 2)
								<a href="{{route('mp3.show',array($audio->slug))}}">{{ucwords($audio->title)}}</a>
								<br /><span class="disk-type">MP3</span>
							@endif
						</div><!-- /.pub-title -->
						
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->

					@if($item_count == 4 || $total_item == $audio_result->count())
					</div><!-- /.pub-items-row -->
					<?php $item_count = 0; ?>
					@endif

				@endforeach

			</div><!-- /.items-category -->

		@endif


		<!-- Books -->

		@if($book_result->count() > 0)

		<div class="items-category">
			<?php $item_count = 0; $total_item = 0; ?>
			<h2>Books</h2>
			@foreach($book_result as $book)

				@if($item_count == 0)
					<div class="pub-items-row">
				@endif
				<?php $item_count++; $total_item++;?>

				<div class="pub-item">
					<div class="wrap">
						<div class="pub-image">
							<img src="{{asset('images/books/'.$book->cover_photo_thumbnail)}}" alt="{{ucwords($book->title)}}" />
						</div><!-- /.pub-image -->
						<div class="pub-title">
							<a href="{{route('book.show',array($book->slug))}}">{{ucwords($book->title)}}</a>
						</div><!-- /.pub-title -->
						
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->

					@if($item_count == 4 || $total_item == $book_result->count())
					</div><!-- /.pub-items-row -->
					<?php $item_count = 0; ?>
					@endif

				@endforeach

			</div><!-- /.items-category -->

		@endif


		<div class="split_30"></div><!-- /.split_30 -->
	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
							
@stop
