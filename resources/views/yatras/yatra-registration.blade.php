@extends('layout')

@section('content')

<div class="split_50"></div><!-- /.split_30 -->
	<div class="row">

		<div class="col-md-8 col-md-push-4 yatra-registration">
			<h1 class="col-heading">{{ $title }}</h1>
			@if($packages->count() > 0)
			<p><i>(Please fill up a separate form for each individual in your team)</i></p>
			<div class="split_30"></div><!-- /.split_30 -->
				<div class="row">
		      <div class="col-md-12">
		        
		        <form class="form-horizontal" method="POST" action="{{ route('Registration.store') }}">
		        	<input name="_token" value="{{ csrf_token() }}" type="hidden">
		          <div class="form-group {{ ($errors->has('first-name')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">First Name</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="First Name" class="form-control" name="first-name" value="{{ Input::old('first-name') ? Input::old('first-name') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('last-name')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Last Name</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Last Name" class="form-control" name="last-name" value="{{ Input::old('last-name') ? Input::old('last-name') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('gender')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Gender</label>
		            <div class="col-sm-8">
		              <label class="radio-inline">
									  <input type="radio" name="gender" id="gender_male" value="Male" {{ (Input::old('gender') == 'Male') ? 'checked' : '' }}> Male
									</label>
									<label class="radio-inline">
									  <input type="radio" name="gender" id="gender_female" value="Female" {{ (Input::old('gender') == 'Female') ? 'checked' : '' }}> Female
									</label>
		            </div>
		          </div>

		          
		          <div class="form-group {{ ($errors->has('nationality')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Nationality</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Nationality" class="form-control" name="nationality" value="{{ Input::old('nationality') ? Input::old('nationality') : '' }}">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-4 control-label">Date of birth</label>
		            <div class="col-sm-8">
		              <div class="form-inline">
		                <select class="form-control" name="dob-day">
		                	@for ($i = 1; $i < 32; $i++)
											    <option>{{ $i }}</option>{{ $i }}
											@endfor
		                </select>&nbsp;
		                <select class="form-control" name="dob-month">
		                  <option value="jan">January</option>
		                  <option value="feb">February</option>
		                  <option value="mar">March</option>
		                  <option value="apr">April</option>
		                  <option value="may">May</option>
		                  <option value="jun">June</option>
		                  <option value="jul">July</option>
		                  <option value="aug">August</option>
		                  <option value="sep">September</option>
		                  <option value="oct">October</option>
		                  <option value="nov">November</option>
		                  <option value="dec">December</option>
		                </select>&nbsp;
		                <select class="form-control" name="dob-year">
		                	@for ($i = 2000; $i > 1940; $i--)
											    <option>{{ $i }}</option>{{ $i }}
											@endfor
		                </select>
		              </div>
		            </div>
		          </div>
		          
		          <div class="form-group {{ ($errors->has('blood-group')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Blood Group</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Blood Group" class="form-control" name="blood-group" value="{{ Input::old('blood-group') ? Input::old('blood-group') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('passport-name')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Name as in Passport</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Name as in Passport" class="form-control" name="passport-name" value="{{ Input::old('passport-name') ? Input::old('passport-name') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('passport-number')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Passport Number</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Passport Number" class="form-control" name="passport-number" value="{{ Input::old('passport-number') ? Input::old('passport-number') : '' }}">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-sm-4 control-label">Persons Accompanying You</label>
		            <div class="col-sm-8">
		              <textarea placeholder="Persons Accompanying You" class="form-control" name="accompanying-persons">{{ Input::old('accompanying-persons') ? Input::old('accompanying-persons') : '' }}</textarea>
		            </div>
		          </div>

		          <h3>Address</h3>
		          <hr>
	          
		          <div class="form-group {{ ($errors->has('address-line-1')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Address</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Address" class="form-control" name="address-line-1" value="{{ Input::old('address-line-1') ? Input::old('address-line-1') : '' }}">
		              <span class="help-block">Street address</span>
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('address-line-2')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Address (Line 2)</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Address (Line 2)" class="form-control" name="address-line-2" value="{{ Input::old('address-line-2') ? Input::old('address-line-2') : '' }}">
		              <span class="help-block">Apartment, suite, unit, building, floor, etc.</span>
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('city')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">City</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="City" class="form-control" name="city" value="{{ Input::old('city') ? Input::old('city') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('country')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Country</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Country" class="form-control" name="country" value="{{ Input::old('country') ? Input::old('country') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('state')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">State</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="State" class="form-control" name="state" value="{{ Input::old('state') ? Input::old('state') : '' }}">
		            </div>
		          </div>
		          <h3>Contacts</h3>
		          <hr>
		          <div class="form-group {{ ($errors->has('contact-mobile')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Mobile Number</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Mobile Number" class="form-control" name="contact-mobile" value="{{ Input::old('contact-mobile') ? Input::old('contact-mobile') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('contact-landline')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Landline Number</label>
		            <div class="col-sm-8">
		              <input type="text" placeholder="Landline Number" class="form-control" name="contact-landline" value="{{ Input::old('contact-landline') ? Input::old('contact-landline') : '' }}">
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Email</label>
		            <div class="col-sm-8">
		              <input type="email" placeholder="Email" class="form-control" name="email" value="{{ Input::old('email') ? Input::old('email') : '' }}">
		            </div>
		          </div>
		          
		          <hr />
		          <div class="form-group">
		            <label class="col-sm-4 control-label">Special Requirements</label>
		            <div class="col-sm-8">
		              <textarea placeholder="Special Requirements" class="form-control" name="special-requirement">{{ Input::old('special-requirement') ? Input::old('special-requirement') : '' }}</textarea>
		            </div>
		          </div>

			        <h3>Package</h3>
			        <hr />
			        <div class="form-group {{ ($errors->has('yatra-package')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Yatra Package</label>
		            <div class="col-sm-8">
			            @foreach($packages as $package)
										
										<div class="radio">
					            <label>
										    <input type="radio" name="yatra-package" value="{{$package->package_name}}" >
										    {{ $package->package_name }} ( {{ $package->amount }}/- )
										  </label>
			            	</div><!-- /.radio -->
			            @endforeach
		            	
		            </div>
		          </div>
		          <div class="form-group {{ ($errors->has('payment-mode')) ? 'has-error' : '' }}">
		            <label class="col-sm-4 control-label">Payment Mode</label>
		            <div class="col-sm-8">
		              <label class="radio-inline">
									  <input type="radio" name="payment-mode" class="payment-mode" value="dd" {{ (Input::old('payment-mode') == 'dd') ? 'checked' : '' }}> DD
									</label>
									<label class="radio-inline">
									  <input type="radio" name="payment-mode" class="payment-mode" value="transfer" {{ (Input::old('payment-mode') == 'transfer') ? 'checked' : '' }}> Bank Transfer
									</label>
		            </div>
	            </div>
	            <div class="payment dd collapse">
			          <div class="form-group {{ ($errors->has('dd-number')) ? 'has-error' : '' }}">
			            <label class="col-sm-4 control-label">DD Number</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="DD Number" class="form-control" name="dd-number" value="{{ Input::old('dd-number') ? Input::old('dd-number') : '' }}">
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Date</label>
			            <div class="col-sm-8">
			              <div class="form-inline">
			                <select class="form-control" name="dd-date-day">
			                	@for ($i = 1; $i < 32; $i++)
												    <option>{{ $i }}</option>{{ $i }}
												@endfor
			                </select>&nbsp;
			                <select class="form-control" name="dd-date-month">
			                  <option value="jan">January</option>
			                  <option value="feb">February</option>
			                  <option value="mar">March</option>
			                  <option value="apr">April</option>
			                  <option value="may">May</option>
			                  <option value="jun">June</option>
			                  <option value="jul">July</option>
			                  <option value="aug">August</option>
			                  <option value="sep">September</option>
			                  <option value="oct">October</option>
			                  <option value="nov">November</option>
			                  <option value="dec">December</option>
			                </select>&nbsp;
			                <select class="form-control" name="dd-date-year">
			                <?php $current_year = \Carbon\Carbon::now()->year;?>
			                	@for ($i = $current_year; $i > $current_year-2; $i--)
												    <option>{{ $i }}</option>{{ $i }}
												@endfor
			                </select>
			              </div>
			            </div>
			          </div>
			          <div class="form-group {{ ($errors->has('dd-bank')) ? 'has-error' : '' }}">
			            <label class="col-sm-4 control-label">Name and branch of Bank</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Bank" class="form-control" name="dd-bank" value="{{ Input::old('dd-bank') ? Input::old('dd-bank') : '' }}" >
			            </div>
			          </div>
			          <div class="form-group {{ ($errors->has('dd-amount')) ? 'has-error' : '' }}">
			            <label class="col-sm-4 control-label">Amount</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Amount" class="form-control" name="dd-amount" value="{{ Input::old('dd-amount') ? Input::old('dd-amount') : '' }}">
			            </div>
			          </div>
	            </div><!-- /.payment-dd -->

	            <div class="payment bank-transfer collapse">
	            	
			          <div class="form-group">
			            <label class="col-sm-4 control-label">Date</label>
			            <div class="col-sm-8">
			              <div class="form-inline">
			                <select class="form-control" name="bank-transfer-date-day">
			                	@for ($i = 1; $i < 32; $i++)
												    <option>{{ $i }}</option>{{ $i }}
												@endfor
			                </select>&nbsp;
			                <select class="form-control" name="bank-transfer-date-month">
			                  <option>January</option>
			                  <option>February</option>
			                  <option>March</option>
			                  <option>April</option>
			                  <option>May</option>
			                  <option>June</option>
			                  <option>July</option>
			                  <option>August</option>
			                  <option>September</option>
			                  <option>October</option>
			                  <option>November</option>
			                  <option>December</option>
			                </select>&nbsp;
			                <select class="form-control" name="bank-transfer-date-year">
			                <?php $current_year = \Carbon\Carbon::now()->year;?>
			                	@for ($i = $current_year; $i > $current_year-2; $i--)
												    <option>{{ $i }}</option>{{ $i }}
												@endfor
			                </select>
			              </div>
			            </div>
			          </div>
			          <div class="form-group {{ ($errors->has('bank-transfer-bank')) ? 'has-error' : '' }}">
			            <label class="col-sm-4 control-label">Name and branch of Bank</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Bank" class="form-control" name="bank-transfer-bank" value="{{ Input::old('bank-transfer-bank') ? Input::old('bank-transfer-bank') : '' }}">
			            </div>
			          </div>
			          <div class="form-group {{ ($errors->has('bank-transfer-amount')) ? 'has-error' : '' }}">
			            <label class="col-sm-4 control-label">Amount</label>
			            <div class="col-sm-8">
	              		<input type="text" placeholder="Amount" class="form-control" name="bank-transfer-amount" value="{{ Input::old('bank-transfer-amount') ? Input::old('bank-transfer-amount') : '' }}">
			            </div>
			          </div>
	            
            </div><!-- /.payment-bank-transfer -->
				     <div class="clearfix">
		        	<button class="btn btn-primary pull-right">Register</button>
		     	   </div><!-- /.clearfix -->
		        </form>

		   
		      </div>
		    </div>
		    @else
		    	<p>Sorry. Registration is not available now</p>
		    @endif



				<div class="split_40"></div><!-- /.split_40 -->

			


		</div><!-- /.col-md-8 -->

		@include('yatras.side-yatras')
	</div><!-- /.row -->

							
@stop
