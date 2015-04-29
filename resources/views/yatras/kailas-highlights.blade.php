@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Kailas - Manasarovar Yatra Highlights</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="shadow">
			<div class="one-image">
				<div class="pic-wrap">
					<img src="{{ asset('images/kailas-yatra-mountain.jpg') }}" alt="" />
				</div><!-- /.pic-wrap -->
			</div><!-- /.one-image -->
		</div><!-- /.shadow -->
		

		<blockquote class="quote orange">
			There are no mountains like the Himalaya, 
			for in them are Kailas and Manasarovar.<small>Skanda Purana</small>
		</blockquote>

		<div class="clearfix">
			<p>Yatras or spiritual journeys that help one to appreciate the country’s culture and provide the opportunity to elevate mind and body, are part of School of Bhagavad Gita’s agenda. Carrying the message of environmental protection and responsible tourism, they also help one see and realise the Divine in Nature.</p>

			<p>The Kailas-Mansarovar, Himalaya Darsan and Amarnath yatras are annual features and generate extensive participation from home and abroad. Organised and personally guided by Swami Sandeepananda Giri, these yatras add a new dimension to spiritual journeys.</p>

		<div class="split_30"></div><!-- /.split_30 -->
		<div class="shadow">
			<div class="one-image">
				<div class="pic-wrap">
					<img src="{{ asset('images/masasarovar.jpg') }}" alt="" />
				</div><!-- /.pic-wrap -->
			</div><!-- /.one-image -->
		</div><!-- /.shadow -->

			<p><strong>A journey to Kailas – Manasarovar is the sublimation of all spiritual journeys.</strong></p> 

			<p>The ethereal sights of  Mount Kailas, the serene Manasarovar, Gauri Kund, the Rakshasa Tal, uninhabited by any living forms, the experience to do the parikrama, a dip in the holy waters of the Manasarovar, perhaps happen but once in a life time. Here, one can be part of the divine dance of Nature and feel the union of the Self with the Supreme.</p>

			<p>This spiritual journey organized annually by Swami Sandeepananda Giri is bound to elevate one to higher realms of experience.</p>

			<div class="two-images">
				<div class="col">
					<div class="pic-wrap">
						<img src="{{ asset('images/kailas-1_450.jpg') }}" alt="" />
					</div><!-- /.pic-wrap -->
				</div><!-- /.col -->
				<div class="col">
					<div class="pic-wrap">
						<img src="{{ asset('images/kailas-4_450.jpg') }}" alt="" />
					</div><!-- /.pic-wrap -->
				</div><!-- /.col -->
			</div><!-- /.two-images -->


		</div><!-- /.clearfix -->

		




	</div><!-- /.col-md-8 -->

	@include('yatras.side-yatras')
</div><!-- /.row -->

							
@stop
