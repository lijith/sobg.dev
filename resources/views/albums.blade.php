@extends('layout')

@section('content')

<div class="split_30"></div><!-- /.split_30 -->

	@if($albums->count() > 0)
		<?php $item_count = 0; $total_item = 0; ?>

		@foreach($albums as $album)

			@if($item_count == 0)
				<div class="row">
			@endif
			<?php $item_count++; $total_item++;?>
			
				<div class="col-sm-4">
					<div class="shadow">
						
						<div class="album-wrap">
							<div class="album">
									
								<div class="album-preview">
									<img alt="" src="{{ asset('images/albums/'.$album->cover_photo_thumbnail) }}">
									<div class="overlay vcenter">
										{{ $album->description  }}
									</div><!-- /.overlay vcenter -->
								</div><!-- /.album-preview -->

								<div class="album-details clearfix">
									<div class="vcenter">
										<a href="{{ route('photo.album.show',array($album->slug)) }}">{{ ucwords($album->title) }}</a>
									</div><!-- /.vcenter -->
								</div><!-- /.album-details clearfix -->

							</div><!-- /.album -->
						</div><!-- /.album-wrap -->

					</div><!-- /.shadow -->
				</div><!-- /.col-sm-4 -->

			@if($item_count == 3 || $total_item == $albums->count())
				</div><!-- /.row -->
				<?php $item_count = 0; ?>
			@endif


		@endforeach

	@endif

	{!! $albums->render() !!}

							
@stop