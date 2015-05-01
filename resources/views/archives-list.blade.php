@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-offset-2">
		<h1 class="col-heading">Archives</h1>
		
		<div class="split_30"></div><!-- /.split_30 -->
		@foreach($archives as $archive)
			<?php $dt = \Carbon\Carbon::createFromTimeStamp($archive['date']);?>
			<p><a href="{{ route('archive.showdetails', array($archive['type'], $archive['slug'])) }}">{{ $dt->format('d-M-Y') }} | {{ ucwords($archive['title']) }}</a> </p>
		@endforeach

	</div><!-- /.col-md-8 -->


	
</div><!-- /.row -->

							
@stop