@extends('layout')

@section('content')
<div class="row top-colums">
	<div class="col-sm-12 col-md-4">
		<div class="shadow">
			<h2 class="col-heading">Salagramam Ashram</h2>
			<div class="pic-wrap ashram-pic">
				<img src="{{URL::asset('images/salagramam-front-view.jpg')}}" alt="salagramam" />
			</div><!-- /.pic-wrap -->
			<div class="col-text">
				<p>Envisaged and founded by <strong>Swami Sandeepananda Giri</strong>, is  devoted to the understanding and spread of pure Knowledge.</p>
				<div class="read-more">
					<a href="{{route('salagramam')}}">read more &raquo;</a>
				</div><!-- /.read-more -->
			</div><!-- /.col-text -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
	<div class="col-sm-6 col-md-4">
		<div class="shadow">
			<h2 class="col-heading">Swami Sandeepananda Giri</h2>
			<div class="pic-wrap">
				<img src="{{URL::asset('images/swami-small.jpg')}}" alt="" />
			</div><!-- /.pic-wrap -->
			<div class="col-text">
				<p>Swami Sandeepananda Giri, the founder and Director of Salagramam Public Charitable Trust, is a visionary teacher, greatly revered .</p>
				<div class="read-more">
					<a href="{{route('swami')}}">read more &raquo;</a>
				</div><!-- /.read-more -->
			</div><!-- /.col-text -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
	<div class="col-sm-6 col-md-4">
		<div class="shadow">
			<h2 class="col-heading">Yatras - Spiritual Journeys</h2>
			<div class="pic-wrap">
				<img src="{{URL::asset('images/yatra-small.jpg')}}" alt="" />
			</div><!-- /.pic-wrap -->
			<div class="col-text">
				<p>Yatras to most popular of pilgrimages in India organized under the guidance of Swami Sandeepananda Giri</p>
				<div class="read-more">
					<a href="{{route('yatras')}}">read more &raquo;</a>
				</div><!-- /.read-more -->
			</div><!-- /.col-text -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
</div><!-- /.row -->


<div class="row mid-cols">
	<div class="col-md-8">
		<div class="shadow">
			<h2 class="col-heading">Our Publications</h2>
			<div class="publications-wrap">
				<div class="row">
					<div class="pub-col">
						<div class="item">
							<div class="item-image vcenter">
								<a href="{{route('eshop.audios')}}">
									<img src="{{URL::asset('images/audio-cd.jpg')}}" alt="" />
								</a>	
							</div><!-- /.item-image -->
							<div class="item-label">
								<a href="{{route('eshop.audios')}}">Audio CDs/MP3s</a>
							</div><!-- /.item-label -->
						</div><!-- /.item -->
					</div><!-- /.col-md-3 -->
					<div class="pub-col">
						<div class="item">
							<div class="item-image vcenter">
								<a href="{{route('eshop.videos')}}">
									<img src="{{URL::asset('images/dvd.jpg')}}" alt="" />
								</a>
							</div><!-- /.item-image -->
							<div class="item-label">
								<a href="{{route('eshop.videos')}}">DVDs/VCDs</a>
							</div><!-- /.item-label -->
						</div><!-- /.item -->
					</div><!-- /.col-md-3 -->
					<div class="pub-col">
						<div class="item">
							<div class="item-image vcenter">
								<a href="{{route('books')}}">
									<img src="{{URL::asset('images/books.jpg')}}" alt="" />
								</a>	
							</div><!-- /.item-image -->
							<div class="item-label">
								<a href="{{route('books')}}">Books</a>
							</div><!-- /.item-label -->
						</div><!-- /.item -->
					</div><!-- /.col-md-3 -->
					<div class="pub-col">
						<div class="item">
							<div class="item-image vcenter">
								<a href="{{route('piravi')}}">
									<img src="{{URL::asset('images/piravi.jpg')}}" alt="" />
								</a>	
							</div><!-- /.item-image -->
							<div class="item-label">
								<a href="{{route('piravi')}}">Magazines</a>
							</div><!-- /.item-label -->
						</div><!-- /.item -->
					</div><!-- /.col-md-3 -->
				</div><!-- /.row -->

				<div class="publication-bottom">
					<div class="row vcenter">
						<div class="pub-text">
							Books, Audio ,Video CDs and DVDs of Discourses by Swami Sandeepananda Giri on the Bhagavad Gita, Upanishads and other text are made available for purchase.
						</div><!-- /.text -->
						<div class="cart-button">
							<a href="{{route('eshop')}}" class="btn btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Buy from e-shop</a>

						</div><!-- /.cart-button -->
					</div><!-- /.row -->
				</div><!-- /.publication-bottom -->
			</div><!-- /.publications-wrap -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-8 -->
	<div class="col-md-4">
		<div class="shadow">
			<h2 class="col-heading">Events</h2>
			<div class="events-wrap">
			@if($events->count() > 0)
				<?php $count = 0;?>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
					@foreach($events as $event)
						<?php $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$event->start_date);?>
						<?php $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$event->end_date);?>
						

						<div class="item {{ ($count == 0) ? 'active' : '' }}">
							<div class="event">
								<div class="event-date">
								<div class="day">
									@if($start_date->diffInDays($end_date) > 0 )
										{{$start_date->day}} - {{$end_date->day}}
									@else
										{{$start_date->day}}
									@endif

								</div><!-- /.day -->
								<div class="month">
									@if($start_date->format('M') != $end_date->format('M') )
										{{$start_date->format('M')}} - {{$end_date->format('M')}}
									@else
										{{$start_date->format('M')}}
									@endif
								</div><!-- /.month -->
								<div class="year">
									{{$start_date->year}}
								</div><!-- /.year -->
							</div><!-- /.event-date -->
							<div class="event-image">
								<img src="{{URL::asset('images/events/'.$event->cover_photo_thumbnail)}}" alt="" />
							</div><!-- /.event-image -->

							<div class="event-details">
								<h3 class="event-title">{{ ucwords($event->title) }}</h3>
								<p>{{ \Illuminate\Support\Str::limit($event->excerpt,150) }}</p>
								<p class="read-more"><a href="{{ route('event.show', array($event->slug)) }}">read more &raquo;</a></p>
							</div><!-- /.event-details -->

							</div><!-- /.event -->
						</div><!-- /.item -->
						<?php $count++;?>
					@endforeach
						
					</div><!-- /.carousel-inner -->

					<!-- Controls -->
					<div class="events-control">
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div><!-- /.events-control -->

				</div>
				@endif
			</div><!-- /.events-wrap -->

		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
</div><!-- /.row mid-cols -->

<div class="row top-colums">
	<div class="col-sm-6 col-md-4">
		<div class="shadow">
			<h2 class="col-heading">Coursers and Retreats</h2>
			<div class="pic-wrap">
				<img src="{{URL::asset('images/courses.jpg')}}" alt="" />
			</div><!-- /.pic-wrap -->
			<div class="col-text">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.  eum magnam </p>
				<div class="read-more">
					<a href="{{route('courses')}}">read more &raquo;</a>
				</div><!-- /.read-more -->
			</div><!-- /.col-text -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
	<div class="col-sm-6 col-md-4">
		<div class="shadow">
			<h2 class="col-heading">Bhavishya - The Steiner School</h2>
			<div class="pic-wrap">
				<img src="{{URL::asset('images/steiner-school.jpg')}}" alt="" />
			</div><!-- /.pic-wrap -->
			<div class="col-text">
				<p>Kerala's first <strong>Waldorf-Steiner School</strong>. We believe in age appropriate child centric hands-on experiential learning with emphasis on art and music. </p>
				<div class="read-more">
					<a href="{{route('bhavishya')}}">read more &raquo;</a>
				</div><!-- /.read-more -->
			</div><!-- /.col-text -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
	<div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-0">
		<div class="shadow">
			<h2 class="col-heading">Donate - Support Us</h2>
			<div class="pic-wrap">
				<img src="{{URL::asset('images/helping-hands.jpg')}}" alt="" />
			</div><!-- /.pic-wrap -->
			<div class="col-text">
				<p>Ad explicabo temporibus maiores officiis voluptatum minus in aliquid quo!</p>
				<div class="read-more">
					<a href="{{route('donate')}}">read more &raquo;</a>
				</div><!-- /.read-more -->
			</div><!-- /.col-text -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->
</div><!-- /.row -->

@stop