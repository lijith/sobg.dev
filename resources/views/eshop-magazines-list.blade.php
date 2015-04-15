@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Magazines</h1>
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

				@foreach($magazines as $magazine)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<img src="{{asset('images/magazines/'.$magazine->cover_photo_thumbnail)}}" alt="{{ucwords($magazine->title)}}" />
							</div><!-- /.pub-image -->
							<div class="pub-title">
									<a href="{{route('magazine.show',array($magazine->slug))}}">{{ucwords($magazine->title)}}</a>
									
							</div><!-- /.pub-title -->
						</div><!-- /.wrap -->
					</div><!-- /.pub-item -->
				@endforeach

			</div><!-- /.pub-items-row -->
		</div><!-- /.items-category -->

		<div class="split_30"></div><!-- /.split_30 -->
		<h2 class="col-heading">Subscribe for Magazine</h2>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<form class="form-horizontal" method="POST" action="{{ route('cart.add') }}">
						<label> I want to subscribe digital version </label>
            <br />

            @foreach($digital_subs as $sub)
            	<div class="radio">
                <label>
	                <input type="radio" checked="" value="{{$sub->id}}" id="" name="magazine-sub">
	                    {{ $sub->key }} - Rs {{$sub->value}}/-
	                </label>
	            </div>
            @endforeach
						<input type="hidden" name="item-sub-type" value="digital" />
						<input type="hidden" name="item-type" value="magazine" />
						<input name="_token" value="{{ csrf_token() }}" type="hidden">
            <button type="submit" class="btn">Subscribe Digital Version</button>
					</form>
				</div><!-- /.form-group -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="form-group">
					<form class="form-horizontal" method="POST" action="{{ route('cart.add') }}">
						<label> I want to subscribe print version </label>

            <br />
            @foreach($print_subs as $sub)
            	<div class="radio">
                <label>
	                <input type="radio" checked="" value="{{$sub->id}}" id="" name="magazine-sub">
	                    {{ $sub->key }} - Rs {{$sub->value}}/-
	                </label>
	            </div>
            @endforeach
						<input type="hidden" name="item-sub-type" value="print" />
						<input type="hidden" name="item-type" value="magazine" />
						<input name="_token" value="{{ csrf_token() }}" type="hidden">
            <button type="submit" class="btn">Subscribe Print Version</button>
					</form>
				</div><!-- /.form-group -->
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->



		
	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
							
@stop
