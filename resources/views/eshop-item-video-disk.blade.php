@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
	<div class="row">
		
		@include('side-cart')


		<div class="col-sm-8 publication-item-display">
			<h1 class="col-heading">{{ucwords($disk->title)}}</h1>
			<div class="split_30"></div><!-- /.split_30 -->
				
				<div class="row">
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-12 col-xs-4">
								<div class="img-wrap">
									<img src="{{asset('images/video-disks/'.$disk->cover_photo)}}" alt="{{ucwords($disk->title)}}" />
								</div><!-- /.img-wrap -->
							</div><!-- /.col-md-12 col-sm-8 -->
							<div class="col-sm-12 col-xs-8">
								<p class="price">
									Price : Rs {{$disk->price}}/-<br />
									<small><sup>*</sup>shipping extra</small>
								</p><!-- /.price -->
							</div><!-- /.col-md-12 col-sm-4 -->
						</div><!-- /.row -->
					</div><!-- /.col-sm-4 -->
					<div class="col-sm-8">
						<p class="description">
							{{$disk->details}}
						</p><!-- /.description -->
						<div class="split_30"></div><!-- /.split_30 -->
						<div class="media-player">
							<div class="wrap">
								<img src="images/video-placeholder.jpg" alt="" class="placeholder" />
							</div><!-- /.wrap -->
						</div><!-- /.media-player -->
						<div class="split_30"></div><!-- /.split_30 -->
						<div class="add-to-cart">
							<form method="POST" action="{{route('cart.add')}}">
								<input type="hidden" name="item-type" value="video" />
								<input type="hidden" name="item-id" value="{{$disk->id}}" />
								<input name="_token" value="{{ csrf_token() }}" type="hidden">
								
								<button class="btn btn-primary" type="submit">
								<i class="fa fa-shopping-cart"></i> Add to Cart
								</button>
							</form>
						</div><!-- /.add-to-cart -->
					</div><!-- /.col-sm-8 -->
				</div><!-- /.row -->





		</div><!-- /.col-md-9 col-sm-8 publication-item-display-->
	</div><!-- /.row -->

							
							
@stop
