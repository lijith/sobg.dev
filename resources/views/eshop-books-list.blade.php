@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Books</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="search-titles clearfix">
			@include('eshop-search-form')

		</div><!-- /.search-titles -->
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="items-category">
			<?php $item_count = 0;
$total_item = 0;?>

			@foreach($books as $book)

				@if($item_count == 0)
					<div class="pub-items-row">
				@endif
				<?php $item_count++;
$total_item++;?>

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



					<div class="pub-item">
						<div class="wrap">
							<div class="pub-image">
								<a href="{{ route('book.show',array($book->slug)) }}" title="{{ucwords($book->title)}}">
									<img src="{{asset('images/books/'.$book->cover_photo_thumbnail)}}" alt="{{ucwords($book->title)}}" />
								</a>
							</div><!-- /.pub-image -->
							<div class="pub-title">
									<a href="{{ route('book.show',array($book->slug)) }}" data-toggle="tooltip" data-placement="bottom" title="{{ ucwords($book->title) }}" class="red-tooltip">
									{{ucwords($book->title)}}
									</a>
									<p>by : {{ ucwords(\Illuminate\Support\Str::limit($book->author,15)) }}</p>
									<p>Rs {{$book->price}} <br />{{ucwords($book->language)}}
									</p>


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
					@if($item_count == 4 || $total_item == $books->count())
					</div><!-- /.pub-items-row -->
					<?php $item_count = 0;?>
					@endif



				@endforeach

		</div><!-- /.items-category -->
		<hr />
		<div class="pub-paginate">
		{!! $books->render() !!}
		</div><!-- /.pub-paginate -->


		<div class="split_30"></div><!-- /.split_30 -->
	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->

@stop
