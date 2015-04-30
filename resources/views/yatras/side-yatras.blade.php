<div class="col-md-4 col-md-pull-8">
	<div class="shadow">
		<div class="side-nav">
			<div class="heading">

			</div><!-- /.heading -->
			<a href="{{ route('yatras') }}"><h3 class="sec-title">Spiritual Journey(Yatras)</h3></a><!-- /.sec-title -->
			<ul>
				<li><a data-toggle="collapse" href="#kailas" aria-expanded="false" aria-controls="kailas">Kailas - Manasarovar Yatra</a>
				<div id="kailas" class="collapse {{ ($toggle_active == 'kailas') ? 'in' : '' }}">
					<ul>
						<li><a href="{{ route('kailasHighlights') }}" class="{{ ($sub_page_active == 'kailas-highlight') ? 'select' : '' }}">Highlights</a></li>
						<li><a href="{{ route('kailasDetails') }}" class="{{ ($sub_page_active == 'kailas-details') ? 'select' : '' }}">Itinerary &amp; Cost</a></li>
						<li><a href="{{ route('Registration') }}" class="{{ ($sub_page_active == 'registration') ? 'select' : '' }}">Registration</a></li>
						<li><a href="{{ route('kailastips') }}" class="{{ ($sub_page_active == 'kailas-tips') ? 'select' : '' }}">Tips for Yatris</a></li>
					</ul>
				</div><!-- /#kailas -->
				</li>
				<li><a data-toggle="collapse" href="#amarnath" aria-expanded="false" aria-controls="amarnath">Sri Amarnath – Vaishno Devi Yatra</a>
				<div id="amarnath" class="collapse {{ ($toggle_active == 'amarnath') ? 'in' : '' }}">
					<ul>
						<li><a href="{{ route('amarnathHighlights') }}" class="{{ ($sub_page_active == 'amarnath-highlight') ? 'select' : '' }}">Highlights</a></li>
						<li><a href="{{ route('amarnathDetails') }}" class="{{ ($sub_page_active == 'amarnath-details') ? 'select' : '' }}">Itinerary &amp; Cost</a></li>
						<li><a href="{{ route('amarnathHighlights') }}" class="{{ ($sub_page_active == 'amarnath-registration') ? 'select' : '' }}">Registration</a></li>
					</ul>
				</div><!-- /#amarnath.collapse -->
				</li>
				<li><a data-toggle="collapse" href="#himalaya" aria-expanded="false" aria-controls="himalaya">Himalaya Darshan</a>
				<div id="himalaya" class="collapse {{ ($toggle_active == 'himalaya') ? 'in' : '' }}">
					<ul>
						<li><a href="{{ route('himalayaHighlights') }}" class="{{ ($sub_page_active == 'himalaya-highlight') ? 'select' : '' }}">Highlights</a></li>
						<li><a href="{{ route('himalayaDetails') }}" class="{{ ($sub_page_active == 'himalaya-details') ? 'select' : '' }}">Itinerary &amp; Cost</a></li>
						<li><a href="{{ route('Registration') }}" class="{{ ($sub_page_active == 'himalaya-registration') ? 'select' : '' }}">Registration</a></li>
					</ul>
				</div><!-- /#himalaya.collapse -->
				</li>
			</ul>
		</div><!-- /.side-nav -->
	</div><!-- /.shadow -->
</div><!-- /.col-md-4 -->