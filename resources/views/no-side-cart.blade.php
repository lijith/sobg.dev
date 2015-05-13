<!--side-cart-->
<div class="col-sm-4 side-cart">
	<div class="shadow">
		<div class="cart-wrap">
			<h3 class="sec-title"><i class="fa fa-shopping-cart"></i> Cart</h3><!-- /.sec-title -->

			@if($side_cart->count() > 0)




			<div class="split_40">
				<div class="groove"></div><!-- /.groove -->
			</div><!-- /.split_40 -->

			<div class="cart-total clearfix">
				<div class="wrap">
					<div class="shipping">
						<div class="item-label">
							Shipping
						</div><!-- /.item-label -->
						<div class="amount">
							Rs 80/-
						</div><!-- /.amount -->
					</div><!-- /.shipping -->
				</div><!-- /.wrap -->
				<div class="wrap">
					<div class="total">
						<div class="item-label">
							Total(excluding shipping)
						</div><!-- /.item-label -->
						<div class="amount">
							Rs {{$side_cart_total}}/-
						</div><!-- /.amount -->
					</div><!-- /.total -->
				</div><!-- /.wrap -->
				
			</div><!-- /.cart-total -->
			<div class="split_40"></div><!-- /.split_40 -->	
			<div class="clearfix">
				<a href="{{route('cart')}}" class="btn btn-primary pull-right">Show Cart</a>
			</div><!-- /.clearfix -->
			<div class="split_20"></div><!-- /.split-30 -->

			@else
			<p>Books, Audio ,Video CDs and DVDs of Discourses by Swami Sandeepananda Giri on the Bhagavad Gita, Upanishads and other text are made available for purchase. </p>
			@endif

			<div class="eshop-items">
				<ul>
					<li><a href="{{route('dvd')}}">Dvds</a></li>
					<li><a href="{{route('vcd')}}">VCDs</a></li>
					<li><a href="{{route('acd')}}">Audio CDs</a></li>
					<li><a href="{{route('mp3')}}">MP3s</a></li>
					<li><a href="{{route('books')}}">Books</a></li>
				</ul>
			</div><!-- /.eshop-items -->

		</div><!-- /.cart-wrap -->
	</div><!-- /.shadow -->
</div><!-- /.col-md-3 col-sm-4 side-cart -->