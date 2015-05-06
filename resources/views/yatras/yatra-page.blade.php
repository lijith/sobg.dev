@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
	
		{!! $page !!}



	</div><!-- /.col-md-8 -->

	@include('yatras.side-yatras')
</div><!-- /.row -->

							
@stop
