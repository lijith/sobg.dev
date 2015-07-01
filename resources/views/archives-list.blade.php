@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-offset-2">
		<h1 class="col-heading">Archives</h1>

		<div class="split_30"></div><!-- /.split_30 -->
<?php
$count = 0;
$current_row = 1;
$total_count = 0;
$per_col_rows = 1;
?>
		<div class="row">



		@foreach($archives as $archive)
			@if ($count == 0)
				<div class="col-sm-6">
			@endif
			<?php $dt = \Carbon\Carbon::createFromTimeStamp($archive['date']);?>
			<p>{{$total_count+1}}. <a href="{{ route('archive.showdetails', array($archive['type'], $archive['slug'])) }}">{{ $dt->format('d-M-Y') }} | {{ ucwords($archive['title']) }}</a> </p>

<?php
$count++;
$total_count++;

?>
		@if ($count == $per_col_rows || $total_count >= count($archives))
			</div><!-- /.col-md-6 -->
			<?php $count = 0;?>
		@endif

		@endforeach

		</div><!-- /.row -->


	</div><!-- /.col-md-8 -->



</div><!-- /.row -->


@stop