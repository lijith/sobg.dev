@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">
			@if($sub_page_active == 'dvd')
			DVDs
			@elseif($sub_page_active == 'vcd')
			Video CDs
			@endif
		</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="search-titles clearfix">
			@include('eshop-search-form')

		</div><!-- /.search-titles -->
		<div class="split_30"></div><!-- /.split_30 -->

		<div class="items-category">
			<?php $item_count = 0;
$total_item = 0;?>


			@if($video_disks->count() < 1)
					<div class="alert alert-warning ">
	            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
	            <div class="notification-info">
	                <p>
	                   Sorry we will be updating soon. Kindly check back later.
	                </p>
	            </div>
	        </div>
				@endif

				@foreach($video_disks as $vdisk)
					@if($item_count == 0)
						<div class="pub-items-row">
					@endif

					<?php $item_count++;
$total_item++;?>

					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								@if($vdisk->disk_type == 1)
									<a href="{{route('dvd.show',array($vdisk->slug))}}" title="{{ ucwords($vdisk->title) }}">
										<img src="{{asset('images/video-disks/'.$vdisk->cover_photo_thumbnail)}}" alt="{{ucwords($vdisk->title)}}" />
									</a>
								@elseif($vdisk->disk_type == 2)
									<a href="{{route('vcd.show',array($vdisk->slug))}}" title="{{ ucwords($vdisk->title) }}">
										<img src="{{asset('images/video-disks/'.$vdisk->cover_photo_thumbnail)}}" alt="{{ucwords($vdisk->title)}}" />
									</a>
								@endif

							</div><!-- /.pub-image -->
							<div class="pub-title">
								@if($vdisk->disk_type == 1)
									<a href="{{route('dvd.show',array($vdisk->slug))}}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($vdisk->title) }}" class="red-tooltip">
									{{ ucwords(\Illuminate\Support\Str::limit($vdisk->title,15)) }}</a> <br />
									DVD
								@elseif($vdisk->disk_type == 2)
									<a href="{{route('vcd.show',array($vdisk->slug))}}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($vdisk->title) }}" class="red-tooltip">
									{{ ucwords(\Illuminate\Support\Str::limit($vdisk->title,15)) }}</a> <br />
									VCD
								@endif
								<p>Rs {{$vdisk->price}}</p>
							</div><!-- /.pub-title -->
							<div class="item-add-to-cart">
								<form method="POST" action="{{route('cart.add')}}">
									@if($vdisk->disk_type == 1)
										<input type="hidden" name="item-sub-type" value="dvd" />
									@elseif($vdisk->disk_type == 2)
										<input type="hidden" name="item-sub-type" value="vcd" />
									@endif
									<input type="hidden" name="item-type" value="video" />
									<input type="hidden" name="item-id" value="{{$vdisk->id}}" />
									<input name="_token" value="{{ csrf_token() }}" type="hidden">

									<button class="btn btn-primary" type="submit">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</button>
								</form>
							</div><!-- /.item-add-to-cart -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->

					@if($item_count == 4 || $total_item == $video_disks->count())
					</div><!-- /.pub-items-row -->
					<?php $item_count = 0;?>
					@endif

				@endforeach

		</div><!-- /.items-category -->
		<hr />
		<div class="pub-paginate">
		{!! $video_disks->render() !!}
		</div><!-- /.pub-paginate -->



		<div class="split_30"></div><!-- /.split_30 -->

	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->

@stop
