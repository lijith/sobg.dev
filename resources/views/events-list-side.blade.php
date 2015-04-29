<div class="col-md-4 col-md-pull-8">
	<div class="shadow">
		<div class="side-nav">
			
			<h3 class="sec-title">Upcoming Events</h3><!-- /.sec-title -->
			<ul>
				@foreach($upcoming_events as $event)
				<?php $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$event->start_date); ?>
				<li>
					<a href="{{ route('event.show', array($event->slug)) }}">{{ $date->format('d/M/Y') }} | {{ucwords($event->title)}}</a>
				</li>
				@endforeach
			</ul>
		</div><!-- /.side-nav -->
	</div><!-- /.shadow -->

	
</div><!-- /.col-md-4 -->