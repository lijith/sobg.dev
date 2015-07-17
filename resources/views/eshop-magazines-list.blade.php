@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Magazines</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="search-titles clearfix">
			@include('eshop-search-form')

		</div><!-- /.search-titles -->
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="items-category">

				<?php $item_count = 0;
$total_item = 0;?>

				@foreach($magazines as $magazine)

				@if($item_count == 0)
					<div class="pub-items-row">
				@endif

				<?php $item_count++;
$total_item++;?>

				@if($magazines->count() < 1)
					<div class="alert alert-warning ">
	            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
	            <div class="notification-info">
	                <p>
	                   Sorry we will be updating soon. Kindly check back later.
	                </p>
	            </div>
	        </div>
				@endif

					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<a href="{{ route('magazine.show',array($magazine->slug)) }}">
									<img src="{{asset('images/magazines/'.$magazine->cover_photo_thumbnail)}}" alt="{{ucwords($magazine->title)}}" />
								</a>
							</div><!-- /.pub-image -->
							<div class="pub-title">
									<a href="{{ route('magazine.show',array($magazine->slug)) }}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($magazine->title) }}" class="red-tooltip">
										{{ ucwords(\Illuminate\Support\Str::limit($magazine->title,15)) }}</a>
									<p>Issue : {{$magazine->published_at}}</p>

							</div><!-- /.pub-title -->

							<div class="item-add-to-cart">
								<form method="POST" action="{{route('cart.add')}}">
									<input type="hidden" name="item-sub-type" value="piravi" />
									<input type="hidden" name="item-type" value="magazine" />
									<input type="hidden" name="item-id" value="{{$magazine->id}}" />
									<input name="_token" value="{{ csrf_token() }}" type="hidden">

									<button class="btn btn-primary" type="submit">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</button>
								</form>
							</div><!-- /.item-add-to-cart -->

						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->

					@if($item_count == 4 || $total_item == $magazines->count())
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
		<h2 class="col-heading">Subscribe for Magazine</h2>
		<div class="row magazine-subscription">
			<div class="col-md-6">
				<div class="shadow">
					<div class="subs">

						<h3>I want to subscribe digital version</h3>

						<div class="form-group">
							<form class="form-horizontal" method="POST" action="{{ route('cart.add') }}">
		            @foreach($digital_subs as $sub)
		            	<div class="radio">
		                <label>
			                <input type="radio" checked="" value="{{$sub->id}}" id="" name="magazine-sub">
			                    {{ $sub->key }} - Rs {{$sub->value}}/-
		                </label>
			            </div>
		            @endforeach
								<input type="hidden" name="item-sub-type" value="digital" />
								<input type="hidden" name="item-type" value="magazine-subscription" />
								<input name="_token" value="{{ csrf_token() }}" type="hidden">
		            <button type="submit" class="btn">Subscribe Digital Version</button>
							</form>
						</div><!-- /.form-group -->

					</div><!-- /.subs -->
				</div><!-- /.shadow -->

			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="shadow">
					<div class="subs">
						<h3>I want to subscribe print version</h3>

						<div class="form-group">
							<form class="form-horizontal" method="POST" action="{{ route('cart.add') }}">

		            @foreach($print_subs as $sub)
		            	<div class="radio">
		                <label>
			                <input type="radio" checked="" value="{{$sub->id}}" id="" name="magazine-sub">
			                    {{ $sub->key }} - Rs {{$sub->value}}/-
			                </label>
			            </div>
		            @endforeach
								<input type="hidden" name="item-sub-type" value="print" />
								<input type="hidden" name="item-type" value="magazine-subscription" />
								<input name="_token" value="{{ csrf_token() }}" type="hidden">
		            <button type="submit" class="btn">Subscribe Print Version</button>
							</form>
						</div><!-- /.form-group -->

					</div><!-- /.subs -->
				</div><!-- /.shadows -->

			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->




	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->

@stop
