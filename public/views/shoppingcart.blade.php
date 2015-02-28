@extends('layout')

@section('content')
<div class="split_50"></div><!-- /.split_30 -->

<div class="row">
	
	@include('side-cart')


	<div class="col-sm-8 main-cart">
	<h1 class="col-heading">Your Cart</h1>
	<div class="split_30"></div><!-- /.split_30 -->
		<div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="cart.html">Cart</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Shipping</a></li>
            <li><a href="#">Payment</a></li>
        </ul>

       		<div class="split_30"></div><!-- /.split_30 -->
          
        <table class="table table-bordered table-striped">
         <thead>
          <tr>
            <th width="20%">Item</th>
            <th width="35%">Title</th>
            <th width="35%">Qty</th>
            <th width="5%">Price(Rs)</th>
            <th width="5%">Total(Rs)</th>
          </tr>
         </thead>
         <tbody>
          <tr>
            <td><img class="img-cart" src="images/bhramanjanavalimala.jpg"><br /></td>
            <td>Bhraman Janavalimala</td>
            <td>
              <form class="form-inline">
                <input type="text" value="1" class="form-control">
                <button class="btn btn-default" title="" rel="tooltip" data-original-title="Update"><i class="fa fa-pencil"></i></button>
                <a title="" rel="tooltip" class="btn btn-primary" href="#" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
              </form>
            </td>
            <td>54.00</td>
            <td>54.00</td>
          </tr>
          <tr>
            <td><img class="img-cart" src="images/mandookkyam_dvd-200.jpg"></td>
            <td>Mandookkyam</td>
            <td>
              <form class="form-inline">
                <input type="text" value="2" class="form-control">
                <button class="btn btn-default" title="" rel="tooltip" data-original-title="Update"><i class="fa fa-pencil"></i></button>
                <a title="" rel="tooltip" class="btn btn-primary" href="#" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
              </form>
            </td>
            <td>16.00</td>
            <td>32.00</td>
          </tr>
          <tr>
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr>
            <td class="text-right" colspan="4">Total Product(s)</td>
            <td>86.00</td>
          </tr>
          <tr>
            <td class="text-right" colspan="4">Total Shipping</td>
            <td>2.00</td>
          </tr>
          <tr class="all-total">
            <td class="text-right" colspan="4"><strong>Total</strong></td>
            <td><strong>88.00</strong></td>
          </tr>
         </tbody>
        </table>
        <hr />
        <div class="clearfix">
        	<a class="btn btn-primary pull-right" href="login.html">Next</a>
        </div><!-- /.clearfix -->
      </div>
    </div>

		<div class="split_30"></div><!-- /.split_30 -->
		<div class="shadow">
			<div class="continue-shopping">
				<h3 class="sec-title">Continue Shopping</h3>
				<div class="categories-buttons clearfix">
					<a href="">DVDs/VCDs</a>
					<a href="">Audio Cds/MP3s</a>
					<a href="">Books</a>
					<a href="">Magazine</a>
				</div><!-- /.categories-buttons -->
			</div><!-- /.continue-shopping -->
		</div><!-- /.shadow -->
		<div class="split_40"></div><!-- /.split_40 -->
			
	</div><!-- /.col-md-9 col-sm-8 main-cart -->
</div><!-- /.row -->


@stop
