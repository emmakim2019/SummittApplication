<div class="modal" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        	<h4 class="modal-title text-primary text-center">Add Your Education Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('add.profile.feducation')}}">
        	 @csrf
        	 <input type="hidden" name="educationid">
      <div class="modal-body">
        	<div class="container">

	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Education Level</label>
	    	<div class="col-md-6">
	    		<select class="selectpicker edLevel" name="level" autocomplete="off"  style="width: 100%" required>
	    			<option value="">Choose a level</option>
	    			<option value="Primary_School">Primary School</option>
	    			<option value="Secondary_High_School">Secondary/High School</option>
	    			<option value="High_A_Level">Further Education</option>
	    		</select>
	    	</div>
			</div>

	  		<div class="form-group row highLevel">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Certification Level</label>
	    	<div class="col-md-6">
	    		<select  class="selectpicker" data-width="100%;" name="furthered" id="furthered">
					<option value=""></option>
					<option value="Certificate">Certificate</option>
					<option value="Degree">Degree</option>
					@if(!empty($education))
					@foreach($education as $edu)
					@if($edu->FurtherEducation != null)
					<option value="Masters">Masters</option>
					<option value="PHD">PHD</option>
					<option value="Diploma">Diploma</option>
					<option value="Higher Diploma">Higher Diploma</option>
					<option value="PGDip">PGDip</option>
					<option value="PGCert">PGCert</option>
					@endif
					@endforeach
					@endif
				</select>
	    	</div>
			</div>

	  		<div class="form-group row highLevel">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Subjects / Discipline</label>
	    	<div class="col-md-6">
	    		<select  class="selectpicker" data-live-search="true" data-size="10" data-width="100%;" name="subject" id="subject">
					<option value=""></option>
					@foreach($subjects as $key => $subject)
					<option value="{{$subjects[$key]->SubjectTitle}}">{{$subjects[$key]->SubjectTitle}}</option>
					@endforeach
				</select>
	    	</div>
			</div>

	  		<div class="form-group row highLevel">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Specialization</label>
	    	<div class="col-md-6">
	    		<select  class="selectpicker" data-live-search="true" data-size="10" data-width="100%;" name="specialization" id="specialization">
					<option value=""></option>
					@foreach($specializations as $specialization)
					<option value="{{$specialization->SpecializationTitle}}">{{$specialization->SpecializationTitle}}</option>
					@endforeach
				</select>
	    	</div>
			</div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Institution</label>
	    	<div class="col-md-6">
				<input type="text" name="institution" class="form-control" id="colFormLabel" placeholder="Institution" required>
	    	</div>
			</div>

	  		<div class="form-group row highLevel">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Class Type</label>
	    	<div class="col-md-6">
	    		<select  class="selectpicker" data-width="100%;" name="type" id="type">
					<option value=""></option>
					<option value="First-class honours ">First-class honours </option>
					<option value="Second-class honours - Upper Division">Second-class honours - Upper Division</option>
					<option value="Second-class honours - Lower Division">Second-class honours - Lower Division</option>
					<option value="Third-class honours">Third-class honours</option>
					<option value="Distinction ">Distinction </option>
					<option value="Merit ">Merit </option>
					<option value="Pass ">Pass </option>
				</select>
	    	</div>
			</div>
			
	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Attendance Dates</label>
	    	<div class="col-md-3">
        		<input class="form-control" id="date" name="start_date" placeholder="MM/DD/YYY" type="date" required/>
	    	</div>
	    	<div class="col-md-3">
        		<input class="form-control" id="date" name="end_date" placeholder="MM/DD/YYY" type="date" required/>
	    	</div>
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