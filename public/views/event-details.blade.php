@extends('layout')

@section('content')



<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8">
		<h1 class="col-heading">Event Title</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="event-date">
			<span class="day">23 Feb - 27 Feb</span><br />
			<span class="year">2015</span>
		</div><!-- /.date -->
		<span class="clearfix"></span>

		<div class="event-details">
			
			<div class="details clearfix">
				<div class="content-pic pull-left">
					<img src="images/vidya3.jpg" alt=""/>
				</div><!-- /.content-pic -->
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				 
			</div><!-- /.details -->
		</div><!-- /.event-details -->


	</div><!-- /.col-md-8 -->

	<div class="col-md-4">
		<div class="shadow">
			<div class="side-nav">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingUpcoming">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseUpcoming" aria-expanded="true" aria-controls="collapseUpcoming"><i class="fa fa-calendar-o"></i> Upcoming Events
				        </a>
				      </h4>
				    </div>
				    <div id="collapseUpcoming" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingUpcoming">
				     <div class="event-items">
				     	<ul>
				     		<li><a href="">03-Feb | Lorem ipsum dolor sit amet</a></li>
				     		<li><a href="">23-Mar | Impedit id temporibus</a></li>
				     		<li><a href="">24-May | Ipsa vero consequuntur</a></li>
				     		<li><a href="">09-Jul | Numquam possimus sequi</a></li>
				     		<li><a href="">15-Dec | placeat rerumadipisicing</a></li>
				     	</ul>
				     </div><!-- /.event-items -->
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingPast">
				      <h4 class="panel-title">
				        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsePast" aria-expanded="false" aria-controls="collapsePast">
				        <i class="fa fa-calendar-o"></i> Past Events
				        </a>
				      </h4>
				    </div>
				    <div id="collapsePast" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPast">
				    	<div class="past-year">
				    		<a class="" data-toggle="collapse" href="#collapse2015" aria-expanded="false" aria-controls="collapseExample">2015</a>
						     <div class="collapse" id="collapse2015">
								  
								    <ul>
								    	<li><a href="">Lorem ipsum dolor sit amet</a></li>
								    	<li><a href="">Perspiciatis obcaecati</a></li>
								    	<li><a href="">suscipit quo magnam magni</a></li>
								    </ul>
								  
								</div>
				    	</div><!-- /.past-year -->
				     	 

							<div class="past-year">
				    		<a class="" data-toggle="collapse" href="#collapse2014" aria-expanded="false" aria-controls="collapseExample">2014</a>
						     <div class="collapse" id="collapse2014">
								  
								    <ul>
								    	<li><a href="">consectetur adipisicing elit</a></li>
								    	<li><a href="">natus culpa molestiae nobis</a></li>
								    	<li><a href="">optio tenetur, voluptates nemo</a></li>
								    </ul>
								  
								</div>
				    	</div><!-- /.past-year -->

				    </div>
				  </div>
				  
				</div>
				
			</div><!-- /.side-nav -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
</div><!-- /.row -->

<div class="split_60"></div><!-- /.split_60 -->
@stop
