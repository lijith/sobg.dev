<ul class="dl-menu">
	<li><a href="{{route('home')}}">Home</a></li>
	<li>
		<a href="#">About SOBG</a>
		<ul class="dl-submenu">
			<li><a href="{{route('overview')}}">Overview</a></li>
			<li><a href="{{route('salagramam')}}">Salagramam Ashram</a>
				<ul class="dl-submenu">
					<li><a href="{{route('guidedTour')}}">Guided tour of Ashram</a></li>
					<li><a href="{{route('facilities')}}">Facilities for public</a></li>
				</ul>
			</li>
			<li><a href="{{route('centers')}}">Centers</a></li>
			<li><a href="{{route('hisVision')}}">His Vision</a></li>
		</ul>
	</li>
	<li>
		<a href="#">Guru</a>
		<ul class="dl-submenu">
			<li><a href="{{route('swami')}}">Swami Sandeepananda Giri</a></li>
			<li><a href="{{route('milestones')}}">Milestones in the spiritual journey</a></li>
			<li><a href="{{route('kashikananda')}}">Swami Kashikananda Giri Maharaj</a></li>
			<li><a href="{{route('articles')}}">Articles and Interviews</a></li>
			<!--<li><a href="{{route('itinerary')}}">Swamiji’s Itinerary</a></li>
			<li><a href="{{route('messageFromSwami')}}">Message from Swamiji</a></li>-->
			<li><a href="{{route('writeToSwami')}}">Write to Swamiji</a></li>

		</ul>
	</li>
	<li>
		<a href="{{route('courses')}}">Courses &amp; Retreats</a>
		<ul class="dl-submenu">
			<li>
				<a href="{{route('children')}}">For Children</a>
			</li>
			<li>
				<a href="{{route('seniors')}}">For Seniors</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="#">Publications</a>
		<ul class="dl-submenu">
			<li>
				<a href="#">CDs/DVDs</a>
				<ul class="dl-submenu">
					<li><a href="{{route('dvd')}}">DVDs</a></li>
					<li><a href="{{route('mp3')}}">MP3s</a></li>
					<li><a href="{{route('acd')}}">Audio CDs</a></li>
				</ul>
			</li>
			<li>
				<a href="#">Books</a>
				<ul class="dl-submenu">
					<li><a href="{{route('swamibooks')}}">Books by Swamiji</a></li>
					<li><a href="{{route('otherbooks')}}">Other Titles</a></li>
				</ul>
			</li>
			<li><a href="{{route('piravi')}}">Piravi Magazine</a></li>
		</ul>

	</li>
	<li>
		<a href="#">Spiritual Journeys (Yatras)</a>
		<ul class="dl-submenu">
			@foreach ($school_yatras as $yatra)
				<li>
					<a href="{{route('school.yatras.intro',array($yatra->slug))}}">{{ ucwords($yatra->name) }}</a>
					<ul class="dl-submenu">
						<li><a href="{{route('school.yatras.highlights',array($yatra->slug))}}">Highlights</a></li>
						<li><a href="{{route('school.yatras.itinerary',array($yatra->slug))}}">Itinerary &amp; Costs</a></li>
						<li><a href="{{route('school.yatras.registration',array($yatra->slug))}}">Registration</a></li>
							<li><a href="{{route('school.yatras.tips',array($yatra->slug))}}">Tips for yatris</a></li>
						</ul><!-- /.dl-submenu -->
				</li>

				@endforeach
			<li><a href="{{route('otherYatras')}}">Other yatras</a></li>
			<li><a href="{{route('testimonials')}}">Yatris’ Speak</a></li>
		</ul><!-- /.dl-submenu -->
	</li>

	<li><a href="{{route('bhavishya')}}">Bhavishya - The Steiner School</a></li>

	<li><a href="">Donate - Support Us</a>
		<ul class="dl-submenu">
			<li><a href="{{route('donate')}}#sponsors">Sponsor</a></li>
			<li><a href="{{route('donate')}}#advertise">Advertise</a></li>
			<li><a href="{{route('donate')}}#gita-bandu">Become a Gita Bandhu</a></li>
			<li><a href="{{route('donate')}}#how-to-donate">How to Send Donations</a></li>
		</ul><!-- /.dl-submenu -->
	</li>


</ul>