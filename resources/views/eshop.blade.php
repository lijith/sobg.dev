@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Audio CDs/MP3s</h1>
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

		<div class="pub-items-row">
			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/bhramanjanavalimala.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Bhraman Janavalimala</a></div><!-- /.pub-title -->
				</div><!-- /.wrap -->
			</div><!-- /.pub-item -->

			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/mandookkyam_dvd-200.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Mandookkyam</a></div><!-- /.pub-title -->
					</div><!-- /.wrap -->
			</div><!-- /.pub-item -->
			

			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/bhramanjanavalimala.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Bhraman Janavalimala</a></div><!-- /.pub-title -->
				</div><!-- /.wrap -->
			</div><!-- /.pub-item -->

			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/mandookkyam_dvd-200.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Mandookkyam</a></div><!-- /.pub-title -->
					</div><!-- /.wrap -->
			</div><!-- /.pub-item -->
		
		
		</div><!-- /.pub-items-row -->

		<div class="pub-items-row">
			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/bhramanjanavalimala.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Bhraman Janavalimala</a></div><!-- /.pub-title -->
				</div><!-- /.wrap -->
			</div><!-- /.pub-item -->

			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/mandookkyam_dvd-200.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Mandookkyam</a></div><!-- /.pub-title -->
					</div><!-- /.wrap -->
			</div><!-- /.pub-item -->
			

			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/bhramanjanavalimala.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Bhraman Janavalimala</a></div><!-- /.pub-title -->
				</div><!-- /.wrap -->
			</div><!-- /.pub-item -->

			<div class="pub-item">
				<div class="wrap">
					<div class="pub-image">
						<img src="images/publications/mandookkyam_dvd-200.jpg" alt="" />
					</div><!-- /.pub-image -->
					<div class="pub-title"><a href="">Mandookkyam</a></div><!-- /.pub-title -->
					</div><!-- /.wrap -->
			</div><!-- /.pub-item -->
		
		
		</div><!-- /.pub-items-row -->

		<div class="split_30"></div><!-- /.split_30 -->
		<div class="pub-paginate">
			<nav>
			  <ul class="pagination">
			    <li class="disabled">
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div><!-- /.pub-paginate -->
	</div><!-- /.col-md-8 -->

	@include('eshop_side_bar')
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
							
@stop
