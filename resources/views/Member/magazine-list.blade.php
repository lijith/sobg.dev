@extends('layout')

@section('content')


<div class="split_30"></div><!-- /.split_30 -->

  <h1 class="page-header">Magazines</h1>
	<!-- Notifications -->
	  @include('notifications')
	<!-- ./ notifications -->

  <div class="row">
    <!-- left column -->
    <div class="col-sm-3 col-xs-12">
      
      <div class="panel panel-default">
	      <div class="panel-body">
	      	<h2>Year</h2>
	      		<hr />
	      	<ul>
	      		@foreach($magazines as $year => $magazine)
							<li>
								<a href="{{ route('member.list.magazines', array($year)) }}">{{ $year }}</a>
							</li>
	      		@endforeach
	      	</ul>
	      </div><!--/panel-body-->
	    </div><!--/panel-->


    </div>

    <!-- edit form column -->
    <div class="col-sm-9 col-xs-12">
	    <div class="well panel panel-default">
		      <div class="panel-body">
		      	@foreach($current_year_magazines as $magazine)
		      		{{ $magazine->title }}
		      		<a href="{{ asset('viewerjs') }}/#magazines-pdf/magaznie-title-2015.pdf">pdf</a>
		      		<iframe src = "viewerjs/#magazines-pdf/magaznie-title-2015.pdf" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe> 
		      	@endforeach
		      </div><!--panel-body-->
		    </div><!--panel panel-default-->

    </div>
  </div>

<div class="split_60"></div><!-- /.split_60 -->


							
@stop
