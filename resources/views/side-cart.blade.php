<!--side-cart-->
<div class="col-sm-4 side-cart">
	<div class="shadow">
		<div class="cart-wrap">
			<h3 class="sec-title"><i class="fa fa-shopping-cart"></i> Cart</h3><!-- /.sec-title -->

			<?php $count = 1; ?>

			@foreach($side_cart as $item)
			
				<div class="items-wrap clearfix">

					<div class="sl-no">
						{{$count}}
					</div><!-- /.sl-no -->
					<div class="item-name">

						@if($item->options->item_sub_type == 'dvd')
							<a href="{{route('dvd.show',array($item->options->item_slug))}}">
						@elseif($item->options->item_sub_type == 'vcd')	
							<a href="{{route('vcd.show',array($item->options->item_slug))}}">
						@elseif($item->options->item_sub_type == 'acd')	
							<a href="{{route('acd.show',array($item->options->item_slug))}}">
						@elseif($item->options->item_sub_type == 'mp3')	
							<a href="{{route('acd.show',array($item->options->item_slug))}}">
						@elseif($item->options->item_sub_type == 'book')	
							<a href="{{route('book.show',array($item->options->item_slug))}}">
						@endif
						{{$item['name']}}</a>({{$item->qty}})
					</div><!-- /.item-name -->
					<div class="price">
						Rs {{$item->price*$item->qty}}/-
					</div><!-- /.price -->
					<div class="cart-action">
						<form method="POST" action="{{action('\App\Http\Controllers\ShoppingCartController@removeItem', array($item->rowid)) }}">

							<input name="_token" value="{{ csrf_token() }}" type="hidden">
              <input name="_method" value="DELETE" type="hidden">
							<button type="submit" class=""><i class="fa fa-times-circle"></i></button>
							
						</form>
					</div><!-- /.cart-action -->
					
				</div><!-- /.items-wrap -->

			<?php $count++; ?>
			@endforeach


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
				<a href="" class="btn btn-primary pull-right">Check Out</a>
			</div><!-- /.clearfix -->
		</div><!-- /.wrap -->
	</div><!-- /.shadow -->
</div><!-- /.col-md-3 col-sm-4 side-cart -->