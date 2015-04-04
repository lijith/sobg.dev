@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">
			@if($sub_page_active == 'mp3')
			MP3s
			@elseif($sub_page_active == 'acd')
			Audio CDs
			@endif
		</h1>
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
			<div class="pub-items-row">
				@if($audio_disks->count() < 1)
					<div class="alert alert-warning ">
	            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
	            <div class="notification-info">
	                <p>
	                   Sorry we will be updating soon. Kindly check back later.
	                </p>
	            </div>
	        </div>
				@endif

				@foreach($audio_disks as $adisk)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<img src="{{asset('images/audio-disks/'.$adisk->cover_photo_thumbnail)}}" alt="{{ucwords($adisk->title)}}" />
							</div><!-- /.pub-image -->
							<div class="pub-title">
								@if($adisk->disk_type == 1)
									<a href="{{route('acd.show',array($adisk->slug))}}">{{ucwords($adisk->title)}}</a>
									Audio CD
								@elseif($adisk->disk_type == 2)
									<a href="{{route('mp3.show',array($adisk->slug))}}">{{ucwords($adisk->title)}}</a>
									MP3
								@endif
								<p>Rs {{$adisk->price}}</p>
							</div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
		</div><!-- /.items-category -->



		<div class="split_30"></div><!-- /.split_30 -->
	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
							
@stop
