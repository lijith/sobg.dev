@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
	<div class="row">
		
		@include('side-cart')


		<div class="col-sm-8 publication-item-display">
			<h1 class="col-heading">Ishavasya Upanishad</h1>
			<div class="split_30"></div><!-- /.split_30 -->
				
				<div class="row">
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-12 col-xs-4">
								<div class="img-wrap">
									<img src="images/publications/ishava-upanishad.jpg" alt="" />
								</div><!-- /.img-wrap -->
							</div><!-- /.col-md-12 col-sm-8 -->
							<div class="col-sm-12 col-xs-8">
								<p class="price">
									Price : Rs 500/-<br />
									<small><sup>*</sup>shipping extra</small>
								</p><!-- /.price -->
							</div><!-- /.col-md-12 col-sm-4 -->
						</div><!-- /.row -->
					</div><!-- /.col-sm-4 -->
					<div class="col-sm-8">
						<p class="description">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam consectetur voluptates, provident necessitatibus facilis cupiditate quod id similique molestiae culpa libero dolorem accusantium eum repellat nostrum eius repudiandae neque dolores?
						</p><!-- /.description -->
						<div class="split_30"></div><!-- /.split_30 -->
						<div class="media-player">
							<div class="wrap">
								<img src="images/video-placeholder.jpg" alt="" class="placeholder" />
							</div><!-- /.wrap -->
						</div><!-- /.media-player -->
						<div class="split_30"></div><!-- /.split_30 -->
						<div class="add-to-cart">
							<button class="btn btn-primary">
							<i class="fa fa-shopping-cart"></i> Add to Cart
							</button>
						</div><!-- /.add-to-cart -->
					</div><!-- /.col-sm-8 -->
				</div><!-- /.row -->





		</div><!-- /.col-md-9 col-sm-8 publication-item-display-->
	</div><!-- /.row -->

							
							
@stop
