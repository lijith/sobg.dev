@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row contact">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Contact Us</h1>

		<div class="split_30"></div><!-- /.split_30 -->

		<h2 class="sub-heading">Salagramam Office</h2>
		<hr />
		<p>SALAGRAMAM is based in Thiruvananthapuram, the capital city of KERALA, the beautiful South Indian state of India. At a serene location along the banks of the Karamana river, the ambience is rustic, yet close enough to the city and is easily accessible by road. Situated in beautifully landscaped and verdant environs, the ashram will feature ethnic and eco-friendly architecture.</p>
		<div class="split_30"></div><!-- /.split_30 -->
		<div class="row">
			<div class="col-md-4 office-address">
				<h3 class="sub-heading"><i class="fa fa-home"></i> Address</h3>
				<p>
					SALAGRAMAM,<br />
					Kundamonkadavu,<br />
					Thirumala,<br />
					Thiruvananthapuram 695006<br />
					Kerala, India.<br />
				</p>
				<h3 class="sub-heading"><i class="fa fa-phone"></i> Phone</h3>
				<p>
					+91 471 2367299 
				</p>
				<h3 class="sub-heading"><i class="fa fa-envelope"></i> Email</h3>
					<a href="">email@sobg.org</a>
				
			</div><!-- /.col-md-5 -->
			<div class="col-md-8 office-map">
				<div id="gMap">

					<div id="map-canvas"></div>

				</div><!--gMap-->
				<div class="split_30"></div><!-- /.split_30 -->
				<h3 class="sub-heading">How to reach</h3>	
				<p>
					<strong>By air</strong>: Trivandrum International airport, about 12 Kms. <br />
					<strong>Other airports in Kerala</strong>: Cochin & Kozhikode.<br />

					<strong>By rail</strong>: Trivandrum railway station, about 5 Kms.<br />

					<strong>By road</strong>: Well connected to National highways, State highways, etc.
				</p>

			</div><!-- /.col-md-7 -->
		</div><!-- /.row -->

		<div class="split_50"></div><!-- /.split_50 -->
		
		<h2 class="sub-heading">Send a message</h2>
		<hr />
		<div id="form-holder">

			<form action="sent_mail.php" id="contact-form" method="post" class="form-horizontal">
				<div class="form-group">
          <label class="col-sm-4 control-label">Name</label>
          <div class="col-sm-8">
            <input type="text" placeholder="Name" class="form-control">
          </div>
        </div>
				<div class="form-group">
          <label class="col-sm-4 control-label">Email</label>
          <div class="col-sm-8">
            <input type="text" placeholder="Email" class="form-control">
          </div>
        </div>
				<div class="form-group">
          <label class="col-sm-4 control-label">Contact Number</label>
          <div class="col-sm-8">
            <input type="text" placeholder="Contact Number" class="form-control">
          </div>
        </div>
				<div class="form-group">
          <label class="col-sm-4 control-label">Message</label>
          <div class="col-sm-8">
            <textarea placeholder="Message" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8 col-sm-offset-4">
            <button type="submit" class="btn btn-primary">
						  <i class="fa fa-envelope"></i> Send
						</button>
          </div>
        </div>
        

			</form>

			<div id="output-contact"></div>

		</div>

				



	</div><!-- /.col-md-8 -->

	<div class="col-md-4 col-md-pull-8">
		<div class="shadow">
			<div class="side-nav">
				<div class="heading">

				</div><!-- /.heading -->
				<h3 class="sec-title">Centers</h3><!-- /.sec-title -->
				<ul>
					<li><a href="http://creativequb.com/projects/sobg.dev/">In India</a></li>
					<li><a href="http://creativequb.com/projects/sobg.dev/">Overseas</a></li>
				</ul>
			</div><!-- /.side-nav -->
		</div><!-- /.shadow -->
	</div><!-- /.col-md-4 -->

</div><!-- /.row -->

							
@stop

							
