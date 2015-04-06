@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">E-Shop</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="search-titles clearfix">
			<form action="">
        <div class="clearfix">
          <input type="text" placeholder="search title...">
          <button type="submit" class="submit">
						<i class="fa fa-search"></i> search
					</button>
     		</div>
			</form>
		</div><!-- /.search-titles -->
		<div class="split_30"></div><!-- /.split_30 -->

		<div class="items-category">
			<h2 class="col-heading">Latest DVDs/VCDs</h2>
			<div class="pub-items-row">

				@foreach($video_disks as $vdisk)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<img src="{{asset('images/video-disks/'.$vdisk->cover_photo_thumbnail)}}" alt="{{ucwords($vdisk->title)}}" />
							</div><!-- /.pub-image -->
							<div class="pub-title">
								@if($vdisk->disk_type == 1)
									<a href="{{route('dvd.show',array($vdisk->slug))}}">{{ucwords($vdisk->title)}}</a>
									DVD
								@elseif($vdisk->disk_type == 2)
									<a href="{{route('vcd.show',array($vdisk->slug))}}">{{ucwords($vdisk->title)}}</a>
									VCD
								@endif
							</div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-ebook-items">more</div><!-- /.more-ebook-items -->
		</div><!-- /.items-category -->


		<div class="items-category">
			<h2 class="col-heading">Latest Audio CDs/MP3s</h2>
			<div class="pub-items-row">

				@foreach($audio_disks as $adisk)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<img src="{{asset('images/audio-disks/'.$adisk->cover_photo_thumbnail)}}" alt="" />
							</div><!-- /.pub-image -->
							<div class="pub-title"><a href="">{{$adisk->title}}</a></div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-ebook-items">more</div><!-- /.more-ebook-items -->
		</div><!-- /.items-category -->

		<div class="items-category">
			<h2 class="col-heading">Books</h2>
			<div class="pub-items-row">

				@foreach($books as $book)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<img src="{{asset('images/books/'.$book->cover_photo_thumbnail)}}" alt="" />
							</div><!-- /.pub-image -->
							<div class="pub-title"><a href="">{{$book->title}}</a></div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-ebook-items">more</div><!-- /.more-ebook-items -->
		</div><!-- /.items-category -->


		<div class="items-category">
			<h2 class="col-heading">Magazines</h2>
			<div class="pub-items-row">

				@foreach($magazines as $magazine)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<img src="{{asset('images/magazines/'.$magazine->cover_photo_thumbnail)}}" alt="" />
							</div><!-- /.pub-image -->
							<div class="pub-title"><a href="">{{$magazine->title}}</a></div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-ebook-items">more</div><!-- /.more-ebook-items -->
		</div><!-- /.items-category -->

		<div class="split_30"></div><!-- /.split_30 -->
		
	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
							
@stop
