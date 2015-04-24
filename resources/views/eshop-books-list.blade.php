@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Books</h1>
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
				@if($books->count() < 1)
					<div class="alert alert-warning ">
	            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
	            <div class="notification-info">
	                <p>
	                   Sorry we will be updating soon. Kindly check back later.
	                </p>
	            </div>
	        </div>
				@endif

				@foreach($books as $book)
					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<img src="{{asset('images/books/'.$book->cover_photo_thumbnail)}}" alt="{{ucwords($book->title)}}" />
							</div><!-- /.pub-image -->
							<div class="pub-title">
									<a href="{{route('book.show',array($book->slug))}}">{{ucwords($book->title)}}</a>
									
								<p>Rs {{$book->price}}</p>
								<p>by : {{ucwords($book->author)}}</p>
							</div><!-- /.pub-title -->
							<div class="item-add-to-cart">
								<form method="POST" action="{{route('cart.add')}}">
									<input type="hidden" name="item-sub-type" value="book" />
									<input type="hidden" name="item-type" value="book" />
									<input type="hidden" name="item-id" value="{{$book->id}}" />
									<input name="_token" value="{{ csrf_token() }}" type="hidden">
									
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</button>
								</form>
							</div><!-- /.item-add-to-cart -->
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
