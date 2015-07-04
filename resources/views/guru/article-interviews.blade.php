@extends('layout')

@section('content')


<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">{{ ucwords($article->title) }}</h1>
		<div class="split_30"></div><!-- /.split_30 -->

		<div class="article-container">
			{!! $article->details !!}
		</div><!-- /.article-container -->



		<div class="split_30"></div><!-- /.split_30 -->


	</div><!-- /.col-md-8 -->

@include('guru.side-nav-guru')

</div><!-- /.row -->




@stop