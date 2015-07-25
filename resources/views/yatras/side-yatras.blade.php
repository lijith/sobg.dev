<div class="col-md-4 col-md-pull-8">
	<div class="shadow">
		<div class="side-nav">
			<div class="heading">

			</div><!-- /.heading -->
			<a href="{{ route('school.yatras') }}"><h3 class="sec-title">Spiritual Journey(Yatras)</h3></a><!-- /.sec-title -->
			<ul>
				@foreach ($school_yatras as $yatra)
				<li>
					<a data-toggle="collapse" href="#{{$yatra->slug}}" aria-expanded="false" aria-controls="kailas" href="{{route('school.yatras',array($yatra->slug))}}">{{ ucwords($yatra->name) }}</a>
					<div id="{{$yatra->slug}}" class="collapse {{ ($toggle_active == $yatra->slug) ? 'in' : '' }}">
					<ul>
						<li><a href="{{route('school.yatras.highlights',array($yatra->slug))}}">Highlights</a></li>
						<li><a href="{{route('school.yatras.itinerary',array($yatra->slug))}}">Itinerary &amp; Costs</a></li>
						<li><a href="{{route('school.yatras.registration',array($yatra->slug))}}">Registration</a></li>
							<li><a href="{{route('school.yatras.tips',array($yatra->slug))}}">Tips for yatris</a></li>
						</ul><!-- /.dl-submenu -->
					</div>
				</li>

				@endforeach

			</ul>

		</div><!-- /.side-nav -->
	</div><!-- /.shadow -->
</div><!-- /.col-md-4 -->