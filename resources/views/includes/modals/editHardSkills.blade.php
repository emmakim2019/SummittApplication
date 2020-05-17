
<div class="modal" id="editHardSkillsModal" tabindex="-1" role="dialog" aria-labelledby="editHardSkillsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title text-primary text-center">Edit your hard skills</h4>
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
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Hard Skills</label>
	    <div class="col-md-8">

	  		<select class="selectpicker selectdropdown" data-width="200px;" data-live-search="true" data-size="10" id="multiselect3" name="hardskill[]" multiple="multiple"  data-max-options="5" autocomplete="off" required>
	  			@foreach($hardskills as $hardskill)
	  			@if(in_array($hardskill->ID,array_values($hskills)))
				<option selected value="{{$hardskill->ID}}">{{$hardskill->Name}}</option>	
				@else
				<option value="{{$hardskill->ID}}">{{$hardskill->Name}}</option>
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

