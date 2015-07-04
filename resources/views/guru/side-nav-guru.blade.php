<div class="col-md-4 col-md-pull-8">
	<div class="shadow">
		<div class="side-nav">
			<div class="heading">

			</div><!-- /.heading -->
			<h3 class="sec-title">Guru</h3><!-- /.sec-title -->
			<ul>
				<li><a href="{{ route('swami') }}" class="{{ ($sub_page_active == 'swami') ? 'select' : '' }}">Swami Sandeepananda Giri</a></li>
				<li><a href="{{ route('milestones') }}" class="{{ ($sub_page_active == 'milestones') ? 'select' : '' }}">Milestones in the spiritual journey</a></li>
				<li><a href="{{ route('kashikananda') }}" class="{{ ($sub_page_active == 'kashikananda') ? 'select' : '' }}">Swami Kashikananda Giri Maharaj</a></li>
				<li><a href="{{ route('articles') }}" class="{{ ($sub_page_active == 'articles') ? 'select' : '' }}">Articles and Interviews</a></li>
				<li><a href="{{ route('writeToSwami') }}" class="{{ ($sub_page_active == 'write-to-swami') ? 'select' : '' }}">Write to Swamiji</a>
				<!-- <li><a href="itinerary">Swamiji’s Itinerary</a></li>
				<li><a href="{{ route('messageFromSwami') }}" class="{{ ($sub_page_active == 'swami-message') ? 'select' : '' }}">Message from Swamiji</a></li>
				</li>-->
			</ul>
		</div><!-- /.side-nav -->
	</div><!-- /.shadow -->
	@if (isset($articles))
		@if ($articles != null)
			{{-- expr --}}
			<div class="shadow">
				<div class="side-nav">
					<div class="heading">

					</div><!-- /.heading -->
					<h4 class="sec-title">More Article &amp Interviews</h4><!-- /.sec-title -->
					<ul>
					@foreach ($articles as $year => $article)
						<li><a data-toggle="collapse" href="#{{$year}}" aria-expanded="false" aria-controls="kailas">{{ $year }}</a>
						<div id="{{ $year }}" class="collapse">
							<ul>
								@foreach ($article as $data)
									<li>
										<a href="{{ route('articles', array($data->slug)) }}" title="{{ucwords($data->title)}}">
										<span class="orange-text">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->date)->format('M, d') }}</span> : {{ucwords($data->title)}}
										</a>
									</li>
								@endforeach


							</ul>
						</div><!-- /#kailas -->
						</li>
						@endforeach

					</ul>

				</div><!-- /.side-nav -->
			</div>
		@endif

	@endif
</div><!-- /.col-md-4 -->