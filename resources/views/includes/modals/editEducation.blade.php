@foreach($education as $edu)
@php $levels = array(
	array("id" => "Certificate", "name" => "Certificate"),
	array("id" => "Degree", "name" => "Degree"),
	array("id" => "Masters", "name" => "Masters"),
	array("id" => "PHD", "name" => "PHD"),
	array("id" => "Diploma", "name" => "Diploma"),
	array("id" => "Higher Diploma", "name" => "Higher Diploma"),
	array("id" => "PGDip", "name" => "PGDip"),
	array("id" => "PGCert", "name" => "PGCert"),
);

$types = array(
	array("id" => "First-class honours","name" => "First-class honours"),
	array("id" => "Second-class honours - Upper Division","name" => "Second-class honours - Upper Division"),
	array("id" => "Second-class honours - Lower Division","name" => "Second-class honours - Lower Division"),
	array("id" => "Third-class honours","name" => "Third-class honours"),
	array("id" => "Distinction","name" => "Distinction"),
	array("id" => "Merit","name" => "Merit"),
	array("id" => "Pass","name" => "Pass"),
);
@endphp
<div class="modal" id="educationModal{{$edu->FurtherEducationID}}" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        	<h4 class="modal-title text-primary text-center">Edit Your Education Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('edit.profile.feducation')}}">
        	 @csrf
        	 <input type="hidden" name="educationid" value="{{$edu->FurtherEducationID}}">
      <div class="modal-body">
        	<div class="container">
	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Education Level</label>
	    	<div class="col-md-6">
	    		<select class="selectpicker edLevel" name="level" autocomplete="off"  style="width: 100%" disabled>
	    			<option value="">Choose a level</option>
					@if($edu->FormalEducation != null && $edu->FormalEducation == 'Primary_School')
	    			<option value="Primary_School" selected>Primary School</option>
	    			@else
	    			<option value="Primary_School">Primary School</option>
	    			@endif
					@if($edu->FormalEducation != null && $edu->FormalEducation == 'Secondary_High_School')
	    			<option value="Secondary_High_School" selected>Secondary/High School</option>
	    			@else
	    			<option value="Secondary_High_School">Secondary/High School</option>
	    			@endif
					@if($edu->FurtherEducation != null)
	    			<option value="High_A_Level" selected>Further Education</option>
	    			@else
	    			<option value="High_A_Level">Further Education</option>
	    			@endif
	    		</select>
	    	</div>
			</div>
			@if($edu->FurtherEducation != null)
	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Certification Level</label>
	    	<div class="col-md-6">
	    		<select  class="selectpicker" data-width="100%;" name="furthered" id="furthered">
	    			@foreach($levels as $level)
	    			@if($edu->FurtherEducation == $level['name'])
					<option value="{{$level['name']}}" selected>{{$level['name']}}</option>
					@else
					<option value="{{$level['name']}}">{{$level['name']}}</option>
					@endif
					@endforeach
				</select>
	    	</div>
			</div>


	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Subjects / Discipline</label>
	    	<div class="col-md-6">
	    		<select  class="selectpicker" data-live-search="true" data-size="10" data-width="100%;" name="subject" id="subject">
					<option value=""></option>
					@foreach($subjects as $key => $subject)
	    			@if($edu->Subjects == $subjects[$key]->SubjectTitle)
					<option value="{{$subjects[$key]->SubjectTitle}}" selected>{{$subjects[$key]->SubjectTitle}}</option>
	    			@else
					<option value="{{$subjects[$key]->SubjectTitle}}">{{$subjects[$key]->SubjectTitle}}</option>
					@endif
					@endforeach
				</select>
	    	</div>
			</div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Specialization</label>
	    	<div class="col-md-6">
	    		<select  class="selectpicker" data-live-search="true" data-size="10" data-width="100%;" name="specialization" id="specialization">
					<option value=""></option>
					@foreach($specializations as $specialization)
	    			@if($edu->Specialization == $specialization->SpecializationTitle)
					<option value="{{$specialization->SpecializationTitle}}" selected>{{$specialization->SpecializationTitle}}</option>
	    			@else
					<option value="{{$specialization->SpecializationTitle}}" >{{$specialization->SpecializationTitle}}</option>
					@endif
					@endforeach
				</select>
	    	</div>
			</div>

	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Class Type</label>
	    	<div class="col-md-6">

	    		<select  class="selectpicker" data-width="100%;" name="type" id="type">

	    			@foreach($types as $type)
	    			@if($edu->QualificationTitle == $type['name'])
					<option value="{{$type['name']}}" selected>{{$type['name']}}</option>
					@else
					<option value="{{$type['name']}}">{{$type['name']}}</option>
					@endif
					@endforeach

				</select>

	    	</div>
			</div>
			@endif

	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Institution</label>
	    	<div class="col-md-6">
				<input type="text" name="institution" class="form-control" id="colFormLabel" value="{{$edu->Institution}}" required>
	    	</div>
			</div>
			
	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Attendance Dates</label>
	    	<div class="col-md-3">
        		<input class="form-control" id="date" name="start_date" value='<?php echo date("Y-m-d", strtotime($edu->QualStartGradDate)); ?>' type="date" required/>
	    	</div>
	    	<div class="col-md-3">
        		<input class="form-control" id="date" name="end_date" value="<?php echo date("Y-m-d", strtotime($edu->QualEndGradDate)); ?>" type="date" required/>
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

@endforeach