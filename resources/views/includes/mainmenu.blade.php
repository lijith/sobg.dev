<nav class="vcenter">
	<ul class="clean_list vcenter">
		<li class="vcenter @if($top_level_page == 'home') select @endif">
			<a class="vcenter" href="{{route('home')}}"><span>Home</span></a>
		</li>
		<span class="separator">|</span>
		<li class="vcenter @if($top_level_page == 'about-sobg') select @endif">
			<a class="vcenter" href="{{route('overview')}}"><span>About SOBG</span></a>
			<ul>
				<li><a href="{{route('overview')}}">Overview</a></li>
				<li><a href="{{route('salagramam')}}">Salagramam Ashram</a>
					<ul>
						<li><a href="{{route('guidedTour')}}">Guided tour of Ashram</a></li>
						<li><a href="{{route('facilities')}}">Facilities for public</a></li>
					</ul>
				</li>
				<li><a href="{{route('centers')}}">Centers</a></li>
				<li><a href="{{route('hisVision')}}">His Vision</a></li>
			</ul>
		</li>
		<span class="separator">|</span>
		<li class="vcenter @if($top_level_page == 'guru') select @endif">
			<a class="vcenter" href="#"><span>Guru</span></a>
			<ul>
				<li><a href="{{route('swami')}}">Swami Sandeepananda Giri</a></li>
				<li><a href="{{route('milestones')}}">Milestones in the spiritual journey</a></li>
				<li><a href="{{route('kashikananda')}}">Swami Kashikananda Giri Maharaj</a></li>
				<li><a href="{{route('articles')}}">Articles and Interviews</a></li>
				<!--<li><a href="{{route('itinerary')}}">Swamiji’s Itinerary</a></li>
				<li><a href="{{route('messageFromSwami')}}">Message from Swamiji</a></li>-->
				<li><a href="{{route('writeToSwami')}}">Write to Swamiji</a></li>

			</ul>
		</li>
		<span class="separator">|</span>
		<li class="vcenter @if($top_level_page == 'courses') select @endif">
			<a class="vcenter" href="{{route('courses')}}"><span>Courses &amp; Retreats</span></a>
			<ul>
				<li>
					<a href="{{route('children')}}">For Children</a>
				</li>
				<li>
					<a href="{{route('seniors')}}">For Seniors</a>
				</li>
			</ul>
		</li>
		<span class="separator">|</span>
		<li class="vcenter @if($top_level_page == 'publications') select @endif">
			<a class="vcenter" href="#"><span>Publications</span></a>
			<ul>
				<li>
					<a href="#">CDs/DVDs</a>
					<ul>
						<li><a href="{{route('dvd')}}">DVDs</a></li>
						<li><a href="{{route('mp3')}}">MP3s</a></li>
						<li><a href="{{route('acd')}}">Audio CDs</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Books</a>
					<ul>
						<li><a href="{{route('swamibooks')}}">Books by Swamiji</a></li>
						<li><a href="{{route('otherbooks')}}">Other Titles</a></li>
					</ul>
				</li>
				<li><a href="{{route('piravi')}}">Piravi Magazine</a></li>
			</ul>
		</li>
		<span class="separator">|</span>
		<li class="vcenter @if($top_level_page == 'yatras') select @endif">
			<a class="vcenter" href="{{route('school.yatras')}}"><span>Spiritual Journeys</span></a>
			<ul>
				@foreach ($school_yatras as $yatra)
				<li>
					<a href="{{route('school.yatras.intro',array($yatra->slug))}}">{{ ucwords($yatra->name) }}</a>
					<ul>
						<li><a href="{{route('school.yatras.highlights',array($yatra->slug))}}">Highlights</a></li>
						<li><a href="{{route('school.yatras.itinerary',array($yatra->slug))}}">Itinerary &amp; Costs</a></li>
						<li><a href="{{route('school.yatras.registration',array($yatra->slug))}}">Registration</a></li>
							<li><a href="{{route('school.yatras.tips',array($yatra->slug))}}">Tips for yatris</a></li>
						</ul><!-- /.dl-submenu -->
				</li>

				@endforeach

				<li><a href="{{route('testimonials')}}">Yatris’ Speak</a></li>
			</ul>

		</li>
		<span class="separator">|</span>
		<li class="vcenter @if($top_level_page == 'bhavishya') select @endif">
			<a class="vcenter" href="{{route('bhavishya')}}"><span>Bhavishya - The Steiner School</span></a>
		</li>

		<span class="separator">|</span>
		<li class="vcenter @if($top_level_page == 'donate') select @endif">
			<a class="vcenter" href="{{route('donate')}}"><span>Donate - Support Us</span></a>
			<ul>
				<li><a href="{{route('donate')}}#sponsors">Sponsor</a></li>
				<li><a href="{{route('donate')}}#advertise">Advertise</a></li>
				<li><a href="{{route('donate')}}#gita-bandu">Become a Gita Bandhu</a></li>
				<li><a href="{{route('donate')}}#how-to-donate">How to Send Donations</a></li>
			</ul>
		</li>

	</ul>
</nav>