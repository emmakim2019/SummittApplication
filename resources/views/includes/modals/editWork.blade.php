
@foreach($work as $work)
@php 
$types = array(
	array("name" => "Full Time"),
	array("name" => "Part Time"),
	array("name" => "Internship"),
	array("name" => "Contract"),
);
@endphp
<div class="modal" id="workModal{{$work->WorkExpID}}" tabindex="-1" role="dialog" aria-labelledby="workModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        	<h2 class="modal-title text-primary text-center">Add Your Work Experience</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('edit.profile.work')}}">
        	 @csrf
        	 <input type="hidden" name="workid" value="{{$work->WorkExpID}}">
      <div class="modal-body">
			<div class="container">


	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Title</label>
		    <div class="col-md-8">
		      <input type="text" class="form-control" id="title" name="title" value="{{$work->Title}}">
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Company Name</label>
		    <div class="col-md-8">
		      <input type="text" class="form-control" id="company" name="company" value="{{$work->Company}}">
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
			      @foreach($industry as $sectors)
			      @if($work->Sector == $sectors->ID)
			      <option value="{{$sectors->ID}}" selected>{{$sectors->Name}}</option>
			      @else
			      <option value="{{$sectors->ID}}">{{$sectors->Name}}</option>
			      @endif
			      @endforeach
			  </select>
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Position Title</label>
		    <div class="col-md-8">
		      <select class="selectpicker" data-live-search="true" data-size="10" data-width="100%;" name="industry">
			      @foreach($functions as $function)
			      @if($work->Industry_Functions == $function->ID)
			      <option value="{{$function->ID}}" selected>{{$function->Name}}</option>
			      @else
			      <option value="{{$function->ID}}">{{$function->Name}}</option>
			      @endif
			      @endforeach
			  </select>
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Job Type</label>
		    <div class="col-md-8">
			  <select class="selectpicker"  name="jobtype" id="jobtype">
			      @foreach($types as $type)
			      @if($work->JobType == $type['name'])
					<option value="{{$type['name']}}" selected>{{$type['name']}}</option>
			      @else
					<option value="{{$type['name']}}">{{$type['name']}}</option>
			      @endif
			      @endforeach
			  </select>
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Start Date</label>
		    <div class="col-md-4">
	        	<input class="form-control" id="date" name="start_date"  value='<?php echo date("Y-m", strtotime($work->StartDate)); ?>' type="month"/>

		  	</div>
		    </div>

	  		<div class="form-group row">
		    <div class="col-md-4"></div>
		    <div class="col-md-4">

			      @if($work->CurrentDate == 'Yes')
			<label class="check-inline">Current Job
			  <input type="checkbox" name="current" value="Yes" checked>
			  <span class="checkmark"></span>
			</label>	
			@else
			<label class="check-inline">Current Job
			  <input type="checkbox" name="current" value="Yes">
			  <span class="checkmark"></span>
			</label>	
			   @endif
		  	</div>
		    </div>

	  		<div class="form-group row" id="checkcurrent">
		    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">End Date</label>
		    <div class="col-md-4">
			      @if($work->CurrentDate != 'Yes')
	        	<input class="form-control" id="date" name="end_date"  value='<?php echo date("Y-m", strtotime($work->EndDate)); ?>' type="month"/>
	        	@else
	        	<input class="form-control" id="date" name="end_date"  placeholder="MM/YYY" type="month"/>
	        	@endif
		  	</div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Monthly Gross</label>
		    <div class="col-md-4">
		      <select id="inputState" class="form-control" name="currency">
			      @foreach($currency as $curr)
			      @if($work->CurrencyID == $curr->CurrencyID)
			      <option value="{{$curr->CurrencyID}}" selected>{{$curr->CurrencyName}}</option>
			      @else
			      <option value="{{$curr->CurrencyID}}">{{$curr->CurrencyName}}</option>
			      @endif
			      @endforeach
			  </select>
		  	</div>
		    <div class="col-md-4">
	      	<input type="text" class="form-control" placeholder="Monthly Salary" name="salary" value="{{$work->MonthlyGrossSalary}}">
		    </div>
		    </div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Direct Supervisor</label>
		    <div class="col-md-4">
	      		<input type="text" class="form-control" placeholder="Name" name="line_name"  value="{{$work->Line_Manager_Name}}" required> 
		  	</div>
		    <div class="col-md-4">
	      	<input type="text" class="form-control" placeholder="Designation" name="line_designation" value="{{$work->Line_Manager_Designation}}" required>
		    </div>
		    </div>

	  		<div class="form-group row">
		    <div class="col-md-4"></div>
		    <div class="col-md-4">
			<label class="check-inline">Contact Manager
			  <input type="checkbox" name="contactref1" value="Yes" checked>
			  <span class="checkmark"></span>
			</label>	  
		  	</div>
		    <div class="col-md-4">
		    </div>
		    </div>

		    <div class="form-group">
		    	<label class="text optional control-label" for="user_field_work_experience_item_description">Description</label>
		    	<textarea class="text optional custom-text-area form-control" cols="35" rows="10" name="description" spellcheck="false">
		    		@foreach($workresps as $resp)
					@if($resp->WorkExpID == $work->WorkExpID) {{ $resp->Responsibility }} {{ $resp->Responsibility2 }} {{ $resp->Responsibility3 }} {{ $resp->Responsibility4 }} {{ $resp->Responsibility5 }} {{ $resp->Achievement }} {{ $resp->Achievement2 }} {{ $resp->Achievement3 }} {{ $resp->Achievement4 }} {{ $resp->Achievement5 }} 
					@endif
					@endforeach
			</textarea>
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
@endforeach