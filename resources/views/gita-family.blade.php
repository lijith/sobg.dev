@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row gita-family">
	<div class="col-md-6">
		<h1 class="col-heading">We Stand As One Family</h1>
		<div class="split_30"></div><!-- /.split_30 -->
		<p>Gita Family is the volunteers wing of School of Bhagavad Gita. If you believe in the ideals of the School of Bhagavad Gita - If you would like to be part of a selfless venture for the common good - You are welcome to join the Gita Family- the world-wide family of the School of Bhagavad Gita.</p>

		<p>You will receive updates about SOBG programmes and about the opportunities to volunteer at the ashram or at other programs of SOBG. Also you can share your suggestions regarding new programmes that can be taken up and how we can improve the way the organisation is working at present.</p>
	</div><!-- /.col-md-4 -->
	<div class="col-md-6">
			<h2 class="sub-heading">Join the family</h2>
			<hr />
			<div id="form-holder">
				
				<form action="" id="gita-family-form" method="post" class="form-horizontal">

					<div class="form-group">
	          <label class="col-sm-4 control-label">Full Name</label>
	          <div class="col-sm-8">
	            <input type="text" placeholder="Name" class="form-control">
	          </div>
	        </div>
	        <div class="form-group">
            <label class="col-sm-4 control-label">Gender</label>
            <div class="col-sm-8">
              <label class="radio-inline">
							  <input type="radio" name="gender" id="gender_male" value="Male"> Male
							</label>
							<label class="radio-inline">
							  <input type="radio" name="gender" id="gender_female" value="Female"> Female
							</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Date of birth</label>
            <div class="col-sm-8">
	            <input type="text" placeholder="dd/mm/yy" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Profession</label>
            <div class="col-sm-8">
	            <input type="text" placeholder="profession" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
	            <input type="text" placeholder="profession" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Phone - Landline</label>
            <div class="col-sm-8">
	            <input type="text" placeholder="Phone - Landline" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Phone - mobile</label>
            <div class="col-sm-8">
	            <input type="text" placeholder="Phone - mobile" class="form-control">
            </div>
          </div>
	        <div class="form-group">
            <label class="col-sm-4 control-label">Marital Status</label>
            <div class="col-sm-8">
              <label class="radio-inline">
							  <input type="radio" name="marital_status" value="single"> Single
							</label>
							<label class="radio-inline">
							  <input type="radio" name="marital_status" value="married"> Married
							</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Nationality</label>
            <div class="col-sm-8">
	            <input type="text" placeholder="Nationality" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Country of Residence</label>
            <div class="col-sm-8">
	            <input type="text" placeholder="Country of Residence" class="form-control">
            </div>
          </div>
          <h3>Permanent Address</h3>
          <hr />
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Address</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Address" class="form-control">
	              <span class="help-block">Street address</span>
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Address (Line 2)</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Address (Line 2)" class="form-control">
	              <span class="help-block">Apartment, suite, unit, building, floor, etc.</span>
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Postal Code</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Postal Code" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">City</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="City" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">State</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="State" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Country</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="State" class="form-control">
	            </div>
	          </div>
          <h3>Contact Address</h3>
          <label class="checkbox-inline"><input type="checkbox" /> <i>same as above</i></label>
          <hr />
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Address</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Address" class="form-control">
	              <span class="help-block">Street address</span>
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Address (Line 2)</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Address (Line 2)" class="form-control">
	              <span class="help-block">Apartment, suite, unit, building, floor, etc.</span>
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Postal Code</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Postal Code" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">City</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="City" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">State</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="State" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Country</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="State" class="form-control">
	            </div>
	          </div>	 

	          <div class="form-group">
	          	<label class="col-sm-4 control-label">Correspondance by</label>
	          	<div class="col-sm-8">
	          		<label class="checkbox-inline">
	          			<input type="checkbox" /> Email
	          		</label>
	          		<label class="checkbox-inline">
	          			<input type="checkbox" /> SMS
	          		</label>

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
			</div><!-- /#form-holder -->

	</div><!-- /.col-md-8 col-md-push-4 -->
</div><!-- /row gita-family	 -->
								
@stop
