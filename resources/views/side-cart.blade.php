<!--side-cart-->
<div class="col-sm-4 side-cart">
	<div class="shadow">
		<div class="cart-wrap">
			<h3 class="sec-title"><i class="fa fa-shopping-cart"></i> Cart</h3><!-- /.sec-title -->

			<?php $count = 0; ?>

			@foreach($side_cart as $item)
			<div class="items-wrap clearfix">

				<div class="sl-no">
					{{$count}}
				</div><!-- /.sl-no -->
				<div class="item-name">
					<a href="#">{{$item['']}}</a>
				</div><!-- /.item-name -->
				<div class="price">
					Rs 250/-
				</div><!-- /.price -->
				<div class="cart-action">
					<button><i class="fa fa-trash-can"></i></button>
				</div><!-- /.cart-action -->
			</div><!-- /.items-wrap -->
			<?php $count++; ?>
			@endforeach

			<div class="items-wrap clearfix">

				<div class="sl-no">
					2
				</div><!-- /.sl-no -->
				<div class="item-name">
					<a href="#">Daiva Dashakam</a>
				</div><!-- /.item-name -->
				<div class="price">
					Rs 250/-
				</div><!-- /.price -->
				<div class="cart-action">
					<button><i class="fa fa-trash-can"></i></button>
				</div><!-- /.cart-action -->
			</div><!-- /.items-wrap -->

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
							Total
						</div><!-- /.item-label -->
						<div class="amount">
							Rs 500/-
						</div><!-- /.amount -->
					</div><!-- /.total -->
				</div><!-- /.wrap -->
				
			</div><!-- /.cart-total -->
			<div class="split_40"></div><!-- /.split_40 -->	
			<div class="clearfix">
				<a href="" class="btn btn-primary pull-right">Check Out</a>
			</div><!-- /.clearfix -->
		</div><!-- /.wrap -->
	</div><!-- /.shadow -->
</div><!-- /.col-md-3 col-sm-4 side-cart -->