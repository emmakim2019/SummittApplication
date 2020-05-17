
<div class="modal" id="editSkillsModal" tabindex="-1" role="dialog" aria-labelledby="editSkillsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        	<h2 class="modal-title text-primary text-center">Edit your skills</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('edit.profile.summary')}}">
        	 @csrf
      <div class="modal-body">
	  <div class="row">
		<div class="col-md-12">
			<div class="container">

	  		<div class="form-group row">
		    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Skills</label>
		    <div class="col-md-8">
	  		@php 
	  		$skill = array(
				array("id" => "Business_Management ", "name" => "Business Management"),
			array("id" => "Computer", "name" => "Computer"),
			array("id" => "Construction", "name" => "Construction"),
			array("id" => "Customer_Service", "name" => "Customer Service"),
			array("id" => "Diplomacy", "name" => "Diplomacy"),
			array("id" => "Effective_Listening", "name" => "Effective Listening"),
			array("id" => "Financial_Management", "name" => "Financial Management"),
			array("id" => "Interpersonal", "name" => "Interpersonal"),
			array("id" => "Multi-tasking", "name" => "Multi-tasking"),
			array("id" => "Negotiating", "name" => "Negotiating"),
			array("id" => "Organisation", "name" => "Organisation"),
			array("id" => "People_Management", "name" => "People Management"),
			array("id" => "Planning", "name" => "Planning"),
			array("id" => "Presentation", "name" => "Presentation"),
			array("id" => "Problem_Solving", "name" => "Problem Solving"),
			array("id" => "Programming", "name" => "Programming"),
			array("id" => "Report_Writing", "name" => "Report Writing"),
			array("id" => "Research", "name" => "Research"),
			array("id" => "Resourcefulness", "name" => "Resourcefulness"),
			array("id" => "Sales_Ability", "name" => "Sales Ability"),
			array("id" => "Technical", "name" => "Technical"),
			array("id" => "Time_Management", "name" => "Time Management"),
			array("id" => "Training", "name" => "Training"),
			array("id" => "Verbal_Communication", "name" => "Verbal Communication"),
			array("id" => "Written_Communication", "name" => "Written Communication"),
			);
	  		@endphp

		  		<select class="selectpicker selectdropdown" data-width="200px;" data-live-search="true" data-size="10" id="multiselect2" name="skill[]" multiple="multiple" autocomplete="off"  data-max-options="5" required>
		  			@foreach($skill as $skill)
		  			@if(in_array($skill['id'],array_values($skills)))
					<option selected value="{{$skill['id']}} ">{{$skill['name']}}</option>
					@else
					<option value="{{$skill['id']}} ">{{$skill['name']}}</option>
					@endif
					@endforeach
		  		</select>
		    </div>
		    </div>
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

