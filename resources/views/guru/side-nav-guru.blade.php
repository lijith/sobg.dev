<div class="col-md-4 col-md-pull-8">
	<div class="shadow">
		<div class="side-nav">
			<div class="heading">

			</div><!-- /.heading -->
			<h3 class="sec-title">About SOBG</h3><!-- /.sec-title -->
			<ul>
				<li><a href="{{ route('swami') }}" class="{{ ($sub_page_active == 'swami') ? 'select' : '' }}">Swami Sandeepananda Giri</a></li>
				<li><a href="{{ route('milestones') }}" class="{{ ($sub_page_active == 'milestones') ? 'select' : '' }}">Milestones in the spiritual journey</a></li>
				<li><a href="{{ route('kashikananda') }}" class="{{ ($sub_page_active == 'kashikananda') ? 'select' : '' }}">Swami Kashikananda Giri Maharaj</a></li>
				<li><a href="{{ route('articles') }}" class="{{ ($sub_page_active == 'articles') ? 'select' : '' }}">Articles and Interviews</a></li>
				<!-- <li><a href="itinerary">Swamiji’s Itinerary</a></li> -->
				<li><a href="{{ route('messageFromSwami') }}" class="{{ ($sub_page_active == 'swami-message') ? 'select' : '' }}">Message from Swamiji</a></li>
				<li><a href="{{ route('writeToSwami') }}" class="{{ ($sub_page_active == 'write-to-swami') ? 'select' : '' }}">Write to Swamiji</a></li>
			</ul>
		</div><!-- /.side-nav -->
	</div><!-- /.shadow -->
</div><!-- /.col-md-4 -->