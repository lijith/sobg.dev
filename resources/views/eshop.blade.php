@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">E-Shop</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="search-titles clearfix">
			<form method="GET" action="{{ route('search.eshop') }}">
        <div class="clearfix">
          <input type="text" placeholder="search title..." name="for">
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

								@if($vdisk->disk_type == 1)
									<a href="{{route('dvd.show',array($vdisk->slug))}}">
										<img src="{{asset('images/video-disks/'.$vdisk->cover_photo_thumbnail)}}" alt="{{ ucwords($vdisk->title) }}" />
									</a>
								@elseif($vdisk->disk_type == 2)
									<a href="{{route('vcd.show',array($vdisk->slug))}}">
										<img src="{{asset('images/video-disks/'.$vdisk->cover_photo_thumbnail)}}" alt="{{ ucwords($vdisk->title) }}" />
									</a>
								@endif
								
							</div><!-- /.pub-image -->

							<div class="pub-title">
								@if($vdisk->disk_type == 1)
									<a href="{{route('dvd.show',array($vdisk->slug))}}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($vdisk->title) }}" class="red-tooltip">
									{{ ucwords(\Illuminate\Support\Str::limit($vdisk->title,15)) }}
									</a>
									<br /><span class="disk-type">DVD</span>
								@elseif($vdisk->disk_type == 2)
									<a href="{{route('vcd.show',array($vdisk->slug))}}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($vdisk->title) }}" class="red-tooltip">
									{{ ucwords(\Illuminate\Support\Str::limit($vdisk->title,15)) }}
									</a>
									<br /><span class="disk-type">VCD</span>
								@endif
							</div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-items"> 
				<a href="{{ route('eshop.videos') }}">more <i class="fa fa-angle-double-right"></i></a>
			</div><!-- /.more-items -->
		</div><!-- /.items-category -->


		<div class="items-category">
			<h2 class="col-heading">Latest Audio CDs/MP3s</h2>
			<div class="pub-items-row">

				@foreach($audio_disks as $adisk)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								@if($adisk->disk_type == 1)
									<a href="{{route('dvd.show',array($adisk->slug))}}">
										<img src="{{asset('images/audio-disks/'.$adisk->cover_photo_thumbnail)}}" alt="{{ ucwords($adisk->title) }}" />
									</a>
								@elseif($adisk->disk_type == 2)
									<a href="{{route('vcd.show',array($adisk->slug))}}">
										<img src="{{asset('images/audio-disks/'.$adisk->cover_photo_thumbnail)}}" alt="{{ ucwords($adisk->title) }}" />
									</a>
								@endif
							</div><!-- /.pub-image -->

							<div class="pub-title">
								@if($adisk->disk_type == 1)
									<a href="{{route('dvd.show',array($adisk->slug))}}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($adisk->title) }}" class="red-tooltip">
									{{ ucwords(\Illuminate\Support\Str::limit($adisk->title,15)) }}
									</a>
									<br /><span class="disk-type">Audio CD</span>
								@elseif($adisk->disk_type == 2)
									<a href="{{route('vcd.show',array($adisk->slug))}}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($adisk->title) }}" class="red-tooltip">
									{{ ucwords(\Illuminate\Support\Str::limit($adisk->title,15)) }}
									</a>
									<br /><span class="disk-type">MP3</span>
								@endif
							</div><!-- /.pub-title -->

						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-items">
				<a href="{{ route('eshop.audios') }}">more <i class="fa fa-angle-double-right"></i></a>
			</div><!-- /.more-items -->
		</div><!-- /.items-category -->

		<div class="items-category">
			<h2 class="col-heading">Books</h2>
			<div class="pub-items-row">

				@foreach($books as $book)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<a href="{{route('book.show',array($book->slug))}}">
									<img src="{{asset('images/books/'.$book->cover_photo_thumbnail)}}" alt="{{ ucwords($book->title) }}" />
								</a>
							</div><!-- /.pub-image -->
							<div class="pub-title">
								<a href="{{route('book.show',array($book->slug))}}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($book->title) }}" class="red-tooltip">
								{{ ucwords(\Illuminate\Support\Str::limit($book->title)) }}
								</a>
							</div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-items">
				<a href="{{ route('books') }}">more <i class="fa fa-angle-double-right"></i></a>
			</div><!-- /.more-items -->
		</div><!-- /.items-category -->


		<div class="items-category">
			<h2 class="col-heading">Magazines</h2>
			<div class="pub-items-row">

				@foreach($magazines as $magazine)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
							<a href="{{ route('magazine.show', array($magazine->slug)) }}">
								<img src="{{asset('images/magazines/'.$magazine->cover_photo_thumbnail)}}" alt="" />
							</a>	
							</div><!-- /.pub-image -->
							<div class="pub-title">
								<a href="{{ route('magazine.show', array($magazine->slug)) }}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($magazine->title) }}" class="red-tooltip">
								{{ ucwords(\Illuminate\Support\Str::limit($magazine->title)) }}
								</a>
							</div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
			<div class="more-items">
				<a href="{{ route('piravi') }}">more <i class="fa fa-angle-double-right"></i></a>
			</div><!-- /.more-items -->
		</div><!-- /.items-category -->

		<div class="split_30"></div><!-- /.split_30 -->
		
	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
							
@stop
