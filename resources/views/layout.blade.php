<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="user-scalable=no,width=device-width, initial-scale=1, minimal-ui, maximum-scale=1, minimum-scale=1">
		
		<title>{{$title}}</title>
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

			<link href='http://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans:400,600' rel='stylesheet' type='text/css'>
			
			<link href='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
			<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
			<link href="//cdnjs.cloudflare.com/ajax/libs/superfish/1.7.4/superfish.min.css" rel="stylesheet" type='text/css'>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet" type='text/css'>
			
		<link rel="stylesheet" href="{{URL::asset('styles/focuspoint.css')}}">
		<link rel="stylesheet" href="{{URL::asset('styles/component.css')}}">
		<link rel="stylesheet" href="{{URL::asset('styles/layerslider.css')}}">
		<link rel="stylesheet" href="{{URL::asset('styles/main.css')}}">

		<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	</head>
	<body class="clearfix " data-smooth-scrolling="1">
		<div id="page_loading_bar"></div>
		<!--[if lt IE 10]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<div class="shadow-wrap">
			<div class="left-shadow">
				<div class="right-shadow">
					<header>

					<div class="header-top">
						<div class="content clearfix">
							<div class="logo">
								<a href="{{URL::to('/')}}" title="School Of Bhagavt Gita">
									<img src="{{URL::asset('images/sobg-logo.png')}}" alt="Logo" />
								</a>
							</div><!-- /.logo -->
							<div class="header-right clearfix vcenter">
								<div class="contact-num">
									<span><i class="fa fa-phone"></i> +91 471 2367299 </span>
								</div><!-- /.contact-num -->
								<div class="header-top-links">
									<ul class="clean_list vcenter">
										<li class="">
											<a href="{{route('eshop')}}">
											<i class="fa fa-shopping-cart"></i> e-shop
											</a>
										</li><!-- /. -->
										<span class="separator">|</span>
										<li class="">
											<a href="#gita-family">
											<i class="fa fa-users"></i> Gita Family</a>
										</li><!-- /.vcenter -->
										<span class="separator">|</span>
										<li class="">
											<a href="#contact">
											<i class="fa fa-envelope"></i> Contact Us</a>
										</li><!-- /. -->
									</ul><!-- /.clean_list  -->
								</div><!-- /.header-top-links -->
								<div class="header_search transition">
									<div class="search-form-wrap">
										<form method="get" action="?">
											<input type="text" class="header_search_term" name="SearchTerm" placeholder="Search...." />
											<button type="submit" class="submit">
												<i class="fa fa-search"></i>
											</button>
										</form>
									</div><!-- /.search-form-wrap -->
								</div><!-- /.header_search -->
							</div><!-- /.header-right -->
						</div><!-- /.content -->
					</div><!-- /.header-top -->

						<div class="header-bottom">

							<div class="content clearfix">
								<div class="header-right">
									<div class="header_1">
										@include('includes.mainmenu')
									</div>

								</div><!-- /.header-right -->

								<div id="dl-menu" class="dl-menuwrapper">
									<button class="dl-trigger">MENU</button>
									@include('includes.dlmenu')
								</div><!-- /#dl-menu.dl-menuwrapper -->
							</div><!-- /.content -->

						</div><!-- /.header-bottom -->


					</header>


						<div id="layerslider-container-fw">
							<div id="layerslider" style="width: 100%; height: 318px; margin: 0 auto; ">
								<div class="ls-layer" style="slidedirection: right; transition2d: 73,21,33,55,75,77,79,101,94,88,80,82,84;">
									<img src="{{URL::asset('images/slider/banner-1.jpg')}}" class="ls-bg" alt="Slide background">
								</div><!-- /.ls-layer -->
								<div class="ls-layer" style="slidedirection: bottom;  transition2d: 73,21,33,55,75,77,79,101,94,88,80,82,84;">
									<img src="{{URL::asset('images/slider/banner-2.jpg')}}" class="ls-bg" alt="Slide background">
								</div><!-- /.ls-layer -->
								<div class="ls-layer" style="slidedirection: bottom;  transition2d: 73,21,33,55,75,77,79,101,94,88,80,82,84;">
									<img src="{{URL::asset('images/slider/banner-3.jpg')}}" class="ls-bg" alt="Slide background">
								</div><!-- /.ls-layer -->

							</div><!-- /#layerslider -->
						</div><!-- /.layerslider-container-fw -->

						<div class="verse-shadow">
							<div class="verse-wrap">
							<blockquote class="verse">
								Let a man lift himself by his own self alone, and let him not lower himself; for, this self alone is the friend of oneself, and this self is the enemy of oneself.
							</blockquote><!-- /.verse -->
							</div><!-- /.verse-wrap -->
						</div><!-- /.verse-shadow -->


						<div class="main-content-wrap">

							<div class="content">

								


								<!-- /.Main content Starts -->
								@yield('content')
								<!-- /.Main content Ends -->

								


								<div class="split_60"></div><!-- /.split_60 -->
							</div><!-- /.content -->


						</div><!-- /.main-content-wrap -->




				</div><!-- /.right-shadow -->
			</div><!-- /.left-shadow -->

		</div><!-- /.shadow-wrap -->

		<div class="footer-wrap">

			<footer class="footer">
				<div class="social-links">
					<span class="connect">Connect with us</span>
					<a class="footer_social" target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i> facebook</a>
					<a class="footer_social" target="_blank" href="http://www.facebook.com"><i class="fa fa-twitter"></i> twitter</a>
					<a class="footer_social" target="_blank" href="http://www.facebook.com"><i class="fa fa-google-plus"></i> google plus</a>
					<a class="footer_social" target="_blank" href="http://www.facebook.com"><i class="fa fa-youtube"></i> youtube</a>
				</div><!-- /.social-links -->
				<div class="split_10"></div><!-- /.split_10 -->
				<div class="footer-bottom">
					<div class="split_20"></div><!-- /.split_20 -->
					<div class="row">
						<div class="link-col">
							<h4 class="footer-link-title">Contact Us</h4><!-- /.footer-link-title -->
							<div class="address">
								SALAGRAMAM, <br />
								Kundamonkadavu, <br />
								Thirumala, <br />
								Thiruvananthapuram 695006 <br />
								Kerala, India.
							</div><!-- /.address -->
							<div class="contacts">
								Phone : +91 471 2367299 <br />
								E-mail : <a href="mailto:admin@sobg.com">admin@sobg.com</a> <br />
								website : <a href="http://sobg.org">sobg.org</a>
							</div><!-- /.contacts -->
						</div><!-- /.col-md-4 -->
						<div class="link-col">
							<h4 class="footer-link-title">Quick Links</h4><!-- /.footer-link-title -->
							<ul class="clean_list">
								<li><i class="fa fa-circle"></i> <a href="">Salagramam Ashram</a></li>
								<li><i class="fa fa-circle"></i> <a href="#">Swami Sandeepananda Giri</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Our Publications</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Yatras - Spiritual Journeys</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Courses and Retreats</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Donate - Support Us</a></li>
								<li><i class="fa fa-circle"></i> <a href="">News Archives</a></li>
							</ul>
						</div><!-- /.col-md-4 -->
						<div class="link-col">
							<h4 class="footer-link-title">Ashram</h4><!-- /.footer-link-title -->
							<ul class="clean_list">
								<li><i class="fa fa-circle"></i> <a href="">Guided tour of Ashram</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Homestay at Salagramam</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Facilities for public</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Geetha Kshethram</a></li>
								<li><i class="fa fa-circle"></i> <a href="">Weekend Gurukula for Children</a></li>
							</ul>
						</div><!-- /.col-md-4 -->
					</div><!-- /.row -->
					<div class="split_30"></div><!-- /.split_30 -->
					<div class="copyright">
						COPYRIGHT &copy; SCHOOL OF BHAGAVAT GITA 2014 - ALL RIGHTS RESERVED
						<br /> Designed by <a href="http://creativequb.com" target="_blank">Creative Qub</a>
					</div><!-- /.copyright -->
				</div><!-- /.footer-bottom -->
			</footer><!-- /.footer -->

		</div><!-- /.footer-wrap -->


		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!--[if lte IE 8]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
		<script src="plugins/excanvas.compiled.js"></script>
		<![endif]-->

		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


		<script src="//cdnjs.cloudflare.com/ajax/libs/superfish/1.7.4/superfish.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.hoverintent/2013.03.11/hoverintent.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

		
		<script src="//cdnjs.cloudflare.com/ajax/libs/nicescroll/3.5.4/jquery.nicescroll.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>

		<script src="{{URL::asset('scripts/jquery.dlmenu.js')}}"></script>
		<script src="{{URL::asset('scripts/page-loading.js')}}"></script>
		<script src="{{URL::asset('scripts/equal-height.js')}}')}}"></script>
		<script src="{{URL::asset('scripts/jquery-easing-1.3.js')}}"></script>
		<script src="{{URL::asset('scripts/jquery-transit-modified.js')}}"></script>
		<script src="{{URL::asset('scripts/jquery.flexverticalcenter.js')}}"></script>
		<script src="{{URL::asset('scripts/layerslider.kreaturamedia.jquery.js')}}"></script>
		<script src="{{URL::asset('scripts/jquery.focuspoint.min.js')}}"></script>
		<script src="{{URL::asset('scripts/layerslider.transitions.js')}}"></script>

		<script src="{{URL::asset('scripts/main.js')}}"></script>
	</body>
</html>
