@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">For Children</h1>
		<div class="one-image">
			<div class="pic-wrap">
				<img src="{{ asset('images/salagramam-kids-front.jpg') }}" alt="" />
			</div>
		</div><!-- /.content-pic -->
		
		<h2 class="sub-heading">Vision For The Young</h2>
		
		<blockquote class="quote orange">
			<p>Children are not vessels to be filled; they are lamps to be lit</p>
			<p>The youth are not useless, they are only used less</p>
			<small>Swami Chinmayananda</small>
		</blockquote>	

			<div class="content-pic pull-right">
				<img src="{{ asset('images/swami-kids.jpg') }}" alt="" />
			</div><!-- /.content-pic pull-left -->
		

		<p>Swami Sandeepananda Giri reaffirms this statement. He believes in the natural goodness of children and sees the store of immense potentialities that lie within them. By awakening these talents through creative activities and by applying the values and knowledge of our ancient culture to suit today’s world, Swamiji seeks to bring about individual inner transformation that will lay the foundation for social transformation. </p>

		<div class="clearfix">
			<div class="content-pic pull-left">
				<img src="{{ asset('images/swamiji-and-kids-at-play.jpg') }}" alt="" />
			</div><!-- /.content-pic pull-left -->
			<p>Swami Sandeepananda Giri shares a very special bond with youngsters. He maintains a good rapport with children and has the unique ability to see things from their angle. This has endeared him to youngsters who look forward to his empathetic acquaintance. </p>

			<p>SCHOOL OF BHAGAVAD GITA’s Programmes for Children aims to provide a wholesome learning experience for children in an atmosphere of fun and freedom, love and laughter. </p>
			<div class="content-pic pull-right">
				<img src="{{ asset('images/swamiji-talking-to-kids.jpg') }}" alt="" />
			</div><!-- /.content-pic pull-left -->

			<p>Conceptualised and guided personally by Swami Sandeepananda Giri, Director, School of Bhagavad Gita, the programmes will launch children on a voyage of discovery and awareness.</p>

		</div><!-- /.clearfix -->

		
		<div class="split_30"><div class="groove"></div><!-- /.groove --></div>


		<h2 class="sub-heading">Programmes For Children And Youth</h2>
		<h3 class="sub-heading">Balagramam - A Celebration Of Creativity </h3>
		<div class="one-image">
			<div class="pic-wrap">
				<img src="{{ asset('images/balagramam.jpg') }}" alt="" />
			</div>
		</div><!-- /.content-pic -->
		<p>Balagramam is the Children’s Heritage and Nature Camp that is held during school vacations. The Camp is basically residential and is open to boys and girls from all backgrounds.</p>
		<p>In the relaxed and happy atmosphere of the ashram children learn to care and share with others, accept, adjust and appreciate themselves and the world around them. At the camp, they will be introduced to the richness of our heritage and scriptures. They will be taught to respect values and develop behavioral skills. Games, outdoor activities, yoga and meditation will strengthen them with physical and mental health. Lessons in Sanskrit, dance, music and crafts will enrich their talents. Along with team work, they develop a sense of identity, responsibility, self confidence and efficient time management.</p>
		<p>In short, Balagramam strives to kindle the creative spirit within each child to attain the fullest potential</p>



		<h3 class="sub-heading">Workshops</h3>
		<p>Workshops on specific topics like Art, Personality Development, Life skills, Leadership, etc are held from time to time.</p>
		<p>“Leading with Compassion”, Life skills for children, etc are such projects that have been conducted.</p>

		<h3 class="sub-heading">Weekend Gurukula</h3>
		<p>The Weekend Gurukula organized at School of Bhagavad Gita’s Salagramam Ashram at Thiruvananthapuram, Is a residential programme held over weekends.</p> 
		<p>The Gurukula will uphold the spirit of creativity and give new meaning to the ideals of friendship, parent-child and student-teacher relationships.</p>
		<div class="split_30"><div class="groove"></div><!-- /.groove --></div>

		<div class="two-images">
			<div class="col">
				<div class="pic-wrap">
					<img src="{{ asset('images/adventure sports.jpg') }}" alt="" />
				</div><!-- /.pic-wrap -->
			</div><!-- /.col -->
			<div class="col">
				<div class="pic-wrap">
					<img src="{{ asset('images/kids-dance.jpg') }}" alt="" />
				</div><!-- /.pic-wrap -->
			</div><!-- /.col -->
		</div><!-- /.clearfix -->
		<div class="split_20"></div>
		<div class="two-images">
			<div class="col">
				<div class="pic-wrap">
					<img src="{{ asset('images/kids-pooja.jpg') }}" alt="" />
				</div><!-- /.pic-wrap -->
			</div><!-- /.col -->
			
		</div><!-- /.clearfix -->
	</div><!-- /.col-md-8 -->

@include('side-nav-courses')
	
</div><!-- /.row -->

							
@stop