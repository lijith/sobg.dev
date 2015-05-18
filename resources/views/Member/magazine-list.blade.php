@extends('layout')

@section('content')


<div class="split_30"></div><!-- /.split_30 -->

  <h1 class="page-header col-heading">Magazines({{ $current_year }})</h1>
	<!-- Notifications -->
	  @include('notifications')
	<!-- ./ notifications -->

  <div class="row">
    <!-- left column -->
    <div class="col-sm-3 col-xs-12">

    <div class="shadow">
    	<div class="publication-years">
    		<h2>Year(s)</h2>
    			<ul>
	      		@foreach($magazines as $year => $magazine)
							<li>
								<a href="{{ route('member.list.magazines', array($year)) }}" class="{{ ($current_year == $year) ? 'select' : '' }}">{{ $year }}</a>
							</li>
	      		@endforeach
	      	</ul>

	      	<div class="split_30"><div class="groove"></div><!-- /.groove --></div>

	      	<a href="{{ route('member.profile.show') }}" class="btn btn-default"><i class="fa fa-user"></i> Profile Page</a>
    	</div><!-- /.publication-years -->


    </div><!-- /.shadow -->


    </div><!-- col-sm-3 -->


    <div class="col-sm-9 col-xs-12">
	    <div class="well panel panel-default">
		      <div class="panel-body">
						
						<?php $count = 0;?>

						@foreach($current_year_magazines as $magazine)

							@if($count ==0)
								<div class="row magazines">
									
							@endif
							<?php $count++; ?>

								<div class="cols">
									<div class="magazine-wrap">
										<div class="cover-wrap">
											<img src="{{ asset('images/magazines/'.$magazine->cover_photo_thumbnail) }}" alt="" />
										</div><!-- /.cover-wrap -->
										<div class="details">
											<p>Issue : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$magazine->published_at)->format('M d, Y') }}</p>
											<a href="{{ asset('magazines-pdf/magaznie-title-2015.pdf') }}" data-ob="lightbox" class="btn"><i class="fa fa-file-text"></i> Read Magazine</a>
										</div><!-- /.details -->
									</div><!-- /.magazine-wrap -->
								</div><!-- /.col-sm-3 -->


							@if($count == 4 || $count == $current_year_magazines->count())
								</div><!-- /.row -->
								<?php $count = 0; ?>
							@endif


						@endforeach

		      	
		      		
		      		
		      	
		      </div><!--panel-body-->
		    </div><!--panel panel-default-->

    </div>
  </div>

<div class="split_60"></div><!-- /.split_60 -->


							
@stop
