@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
<div class="row">

	<div class="col-md-8 col-md-push-4 yatra-registration">
		<h1 class="col-heading">Kailas - Manasarovar Yatra Registration</h1>
		<p><i>(Please fill up a separate form for each individual in your team)</i></p>
		<div class="split_30"></div><!-- /.split_30 -->
			<div class="row">
	      <div class="col-md-12">
	        
	        <form class="form-horizontal">
	          <div class="form-group">
	            <label class="col-sm-4 control-label">First Name</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="First Name" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Last Name</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Last Name" class="form-control">
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
	            <label class="col-sm-4 control-label">Nationality</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Nationality" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Date of birth</label>
	            <div class="col-sm-8">
	              <div class="form-inline">
	                <select class="form-control">
	                  <option>-</option>
	                  <option>1</option>
	                  <option>2</option>
	                  <option>3</option>
	                  <option>4</option>
	                </select>&nbsp;
	                <select class="form-control">
	                  <option>January</option>
	                  <option>February</option>
	                  <option>March</option>
	                  <option>April</option>
	                </select>&nbsp;
	                <select class="form-control">
	                  <option>2012</option>
	                  <option>1991</option>
	                  <option>1990</option>
	                  <option>1989</option>
	                </select>
	              </div>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Blood Group</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Blood Group" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Name as in Passport</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Name as in Passport" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Passport Number</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Passport Number" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Persons Accompanying You</label>
	            <div class="col-sm-8">
	              <textarea placeholder="Persons Accompanying You" class="form-control"></textarea>
	            </div>
	          </div>

	          <h3>Address</h3>
	          <hr>
          
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
	            <label class="col-sm-4 control-label">City</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="City" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Country</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Country" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">State</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="State" class="form-control">
	            </div>
	          </div>
	          <h3>Contacts</h3>
	          <hr>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Mobile Number</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Mobile Number" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Landline Number</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Landline Number" class="form-control">
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Email</label>
	            <div class="col-sm-8">
	              <input type="text" placeholder="Email" class="form-control">
	            </div>
	          </div>
	          
	          <hr />
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Special Requirements</label>
	            <div class="col-sm-8">
	              <textarea placeholder="Nationality" class="form-control"></textarea>
	            </div>
	          </div>

		        <h3>Package</h3>
		        <hr />
		        <div class="form-group">
	            <label class="col-sm-4 control-label">Yatra Package</label>
	            <div class="col-sm-8">
	            	<div class="radio">
			            <label>
								    <input type="radio" name="yatra_package" id="package-1" value="package1" checked>
								    Package 1 (90,000/- Special Package)
								  </label>
	            	</div><!-- /.radio -->
	            	<div class="radio">
								  <label>
								    <input type="radio" name="yatra_package" id="package-2" value="package2" checked>
								    Package 2 (1,15,000/-)
								  </label>
	            	</div><!-- /.radio -->
	            	<div class="radio">
								  <label>
								    <input type="radio" name="yatra_package" id="package-3" value="package3" checked>
								    Package 3 (1,30,000/-)
								  </label>
	            	</div><!-- /.radio -->
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-4 control-label">Payment Mode</label>
	            <div class="col-sm-8">
	              <label class="radio-inline">
								  <input type="radio" name="payment_mode" id="payment_dd" value="dd"> DD
								</label>
								<label class="radio-inline">
								  <input type="radio" name="payment_mode" id="payment_transfer" value="transfer"> Bank Transfer
								</label>
								<label class="radio-inline">
								  <input type="radio" name="payment_mode" id="payment_online" value="online"> Online
								</label>
	            </div>
	            <div class="payment-dd">
			          <div class="form-group">
			            <label class="col-sm-4 control-label">DD Number</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="DD Number" class="form-control">
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Date</label>
			            <div class="col-sm-8">
			              <div class="form-inline">
			                <select class="form-control">
			                  <option>-</option>
			                  <option>1</option>
			                  <option>2</option>
			                  <option>3</option>
			                  <option>4</option>
			                </select>&nbsp;
			                <select class="form-control">
			                  <option>January</option>
			                  <option>February</option>
			                  <option>March</option>
			                  <option>April</option>
			                </select>&nbsp;
			                <select class="form-control">
			                  <option>2012</option>
			                  <option>1991</option>
			                  <option>1990</option>
			                  <option>1989</option>
			                </select>
			              </div>
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Name and branch of Bank</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Bank" class="form-control">
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Amount</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Amount" class="form-control">
			            </div>
			          </div>
	            </div><!-- /.payment-dd -->

	            <div class="payment-bank-transfer">
	            	
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Date</label>
			            <div class="col-sm-8">
			              <div class="form-inline">
			                <select class="form-control">
			                  <option>-</option>
			                  <option>1</option>
			                  <option>2</option>
			                  <option>3</option>
			                  <option>4</option>
			                </select>&nbsp;
			                <select class="form-control">
			                  <option>January</option>
			                  <option>February</option>
			                  <option>March</option>
			                  <option>April</option>
			                </select>&nbsp;
			                <select class="form-control">
			                  <option>2012</option>
			                  <option>1991</option>
			                  <option>1990</option>
			                  <option>1989</option>
			                </select>
			              </div>
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Name and branch of Bank</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Bank" class="form-control">
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Amount</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Amount" class="form-control">
			            </div>
			          </div>
	            
	            </div><!-- /.payment-bank-transfer -->
	          </div>

	        </form>

	        <div class="clearfix">
	        	<a class="btn btn-primary pull-right" href="login.html">Next</a>
	        </div><!-- /.clearfix -->
	      </div>
	    </div>

			<div class="split_40"></div><!-- /.split_40 -->

		


	</div><!-- /.col-md-8 -->

	@include('yatras.side-yatras')
</div><!-- /.row -->

							
@stop
