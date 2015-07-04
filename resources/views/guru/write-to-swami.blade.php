@extends('layout')

@section('content')


<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4">
		<h1 class="col-heading">Write to Swami Sandeepananda Giri</h1>
		<div class="split_30"></div><!-- /.split_30 -->

		<div id="form-holder">

			<form action="{{ route('contact-post') }}" id="contact-form" method="post" class="contact-form form-horizontal">
			<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<div class="form-group">
          <label class="col-sm-4 control-label">Name</label>
          <div class="col-sm-8">
            <input type="text" placeholder="Name" class="form-control" required="" name="name">
          </div>
        </div>
				<div class="form-group">
          <label class="col-sm-4 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" placeholder="Email" class="form-control" required="" name="email">
          </div>
        </div>
				<div class="form-group">
          <label class="col-sm-4 control-label">Contact Number</label>
          <div class="col-sm-8">
            <input type="text" placeholder="Contact Number" class="form-control" required="" name="contact-number">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-4 control-label">Subject</label>
          <div class="col-sm-8">
            <input type="text" placeholder="message subject" class="form-control" required="" name="subject">
          </div>
        </div>

				<div class="form-group">
          <label class="col-sm-4 control-label">Message</label>
          <div class="col-sm-8">
            <textarea placeholder="Message" class="form-control" required="" name="message"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8 col-sm-offset-4">
            <button type="submit" class="btn btn-primary">
						  <i class="fa fa-envelope"></i> Send
						</button>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8 col-sm-offset-4">
            <div class="output-contact"></div>
          </div>
        </div>


			</form>



		</div><!-- /.#form-holder -->



		<div class="split_30"></div><!-- /.split_30 -->


	</div><!-- /.col-md-8 -->

@include('guru.side-nav-guru')

</div><!-- /.row -->




@stop