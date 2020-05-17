<div class="modal" id="workModal" tabindex="-1" role="dialog" aria-labelledby="workModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        	<h4 class="modal-title text-primary text-center">Add Your Work Experience</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('add.profile.work')}}">
        	 @csrf
      <div class="modal-body">
			<div class="container">

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Title</label>
		    <div class="col-md-8">
		      <input type="text" class="form-control" id="title" name="title" placeholder="Your job title" required>
		       @error('title')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
	           @enderror
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Company Name</label>
		    <div class="col-md-8">
		      <input type="text" class="form-control" id="company" name="company" placeholder="Company name"required>
		       @error('company')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
	           @enderror
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Industry Sector</label>
		    <div class="col-md-8">
		      <select class="selectpicker" data-live-search="true" data-size="10" data-width="100%;" name="sector">
			      <option value="null" selected>Select Industry Sector</option>
			      @foreach($industry as $sector)
			      <option value="{{$sector->ID}}">{{$sector->Name}}</option>
			      @endforeach
			  </select>
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Position Title</label>
		    <div class="col-md-8">
		      <select  class="selectpicker" data-live-search="true" data-size="10" data-width="100%;" name="industry">
			      <option value="null" selected>Select Position Title</option>
			      @foreach($functions as $industry)
			      <option value="{{$industry->ID}}">{{$industry->Name}}</option>
			      @endforeach
			  </select>
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Job Type</label>
		    <div class="col-md-8">
			  <select class="selectpicker"  name="jobtype" id="jobtype">
				<option value=""></option>
				<option value="Full Time">Full Time</option>
				<option value="Part Time">Part Time</option>
				<option value="Internship">Internship</option>
				<option value="Contract">Contract</option>
			  </select>
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Start Date</label>
		    <div class="col-md-4">
	        	<input class="form-control" id="date" name="start_date" placeholder="MM/YYY" type="month"/>

		  	</div>
		    </div>

	  		<div class="form-group row">
		    <div class="col-md-4"></div>
		    <div class="col-md-4">
			<label class="check-inline">Current Job
			  <input type="checkbox" name="current" value="Yes">
			  <span class="checkmark"></span>
			</label>	  
		  	</div>
		    </div>

	  		<div class="form-group row" id="checkcurrent">
		    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">End Date</label>
		    <div class="col-md-4">
	        	<input class="form-control" id="date" name="end_date" placeholder="MM/YYY" type="month"/>
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Line Manager</label>
		    <div class="col-md-4">
	      		<input type="text" class="form-control" placeholder="Name" name="line_name"> 
		  	</div>
		    <div class="col-md-4">
	      	<input type="text" class="form-control" placeholder="Designation" name="line_designation">
		    </div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Monthly Gross</label>
		    <div class="col-md-4">
		      <select id="inputState" class="selectpicker" name="currency">
			      <option value="null" selected>Select Currency</option>
			      @foreach($currency as $currency)
			      <option value="{{$currency->	CurrencyID}}">{{$currency->CurrencyName}}</option>
			      @endforeach
			  </select>
		  	</div>
		    <div class="col-md-4">
	      	<input type="text" class="form-control" placeholder="Monthly Salary" name="salary">
		    </div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Referee Details</label>
		    <div class="col-md-4">
	      	<input type="text" class="form-control" placeholder="Name" name="referee_name1" required>
		  	</div>
		    <div class="col-md-4">
	      	<input type="text" class="form-control" placeholder="Designation e.g Manager" name="referee_desg1" required>
		    </div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Referee Contact</label>
		    <div class="col-md-4">	
		      		<input type="email" class="form-control" name="referee_email1" placeholder="Email Address" required>
		    </div>
		    <div class="col-md-4">	
		      		<input type="tel" class="form-control" name="referee_phone1" placeholder="Mobile Number" required>
		    </div>
		    </div>

		    <div id="referee2" style="text-align: right;"></div>
		    <div id="referee3" style="text-align: right;"></div>
		    
	  		<div class="form-group row">
		    <div class="col-md-4"></div>
		    <div class="col-md-4">
			<label class="check-inline">Contact Referee
			  <input type="checkbox" name="contactref1" value="Yes">
			  <span class="checkmark"></span>
			</label>	  
		  	</div>
		    <div class="col-md-4">
		    	<span class="text-primary float-right add-referee" style="cursor: pointer;margin-top: 1rem;"><i class="fas fa-plus"></i> Add More</span>
		    </div>
		    </div>

			<div class="alert alert-warning alert-dismissible fade ref-alert" role="alert">
			  <strong>Sorry !</strong> You have reached the maximum number of language selection.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>


		    <div class="form-group">
		    	<label class="text optional control-label" for="user_field_work_experience_item_description">Description</label>
		    	<textarea class="text optional custom-text-area form-control" cols="35" rows="10" name="description" spellcheck="false"></textarea>
		    <div class="small grey mt-500 pb-2">Tell briefly about your work: your role and responsibilities, daily tasks and main achievements.</div>
		    </div>

			</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
  	  </form>
    </div>
  </div>
</div>