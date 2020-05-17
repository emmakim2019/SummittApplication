	<div class="tab-form mb-5">
		<div class="tab-form-header text-white">
			<h4>Work Experience</h4>
		</div>
		<div class="form-group" style="padding: 2%">
			@if(!empty($work))
			@foreach($work as $work)
				<div class="row education">
				<div class="col-md-10">
				<h4 class="text-primary">{{$work->Title}}</h4>
				<p>Company: {{$work->Company}}</p>
				<p><span>From - @php echo date("d-m-Y", strtotime($work->StartDate)); @endphp To - @if($work->CurrentDate == 'Yes')  now @endif</span></p>
					</div>
				<div class="col-md-2">
		   		<span class="text-primary" onclick="removeWork({{$work->WorkExpID}})" style="cursor: pointer;"><i class="fas fa-trash"></i> Delete</span>
		   		<span class="text-primary float-right" onclick="editWork({{$work->WorkExpID}})" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</span>
		   		</div></div>
				<hr/>
			@endforeach	

			@else
		   <span>Add your work experiences</span>
		   @endif	
		   <span class="text-primary float-right mb-3 add-experience" style="cursor: pointer;"><i class="fas fa-plus"></i> Add</span>
		   <br/>
		 </div>
	</div>

	<div class="tab-form mb-5">
		<div class="tab-form-header text-white">
			<h4>Other Interests</h4>
		</div>
		<div style="padding: 1% 4%">
	<div class="alert alert-warning alert-dismissible fade interest-alert" role="alert">
	  <strong>Sorry !</strong> You have reached the maximum number of language selection.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>

		<div class="form-group row">
		    <label for="name" class="col-md-5 text-center text-white col-form-label label label-primary">Interest</label>
		    <div class="col-md-5">	
	    			@if(!empty($interests[0]) && $interests[0]->Interests[0] != null)
		      		<input type="text" class="form-control" name="Interest1" value="{{$interests[0]->Interests}}">
		      		@else
		      		<input type="text" class="form-control" name="Interest1" >
		      		@endif
		    </div>
		    <div class="col-md-2">	
		    	<span class="text-primary float-right add-interest" style="cursor: pointer;margin-top: 1rem;"><i class="fas fa-plus"></i> Add More</span>
		    </div>
		</div>
		 <div id="interests2">
	    	@if(!empty($interests[0]) && $interests[0]->Interest2 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="text"  value="{{$interests[0]->Interest2}}" name="Interest2"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>
		 <div id="interests3">
	    	@if(!empty($interests[0]) && $interests[0]->Interest3 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="text"  value="{{$interests[0]->Interest3}}" name="Interest3"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>
		 <div id="interests3">
	    	@if(!empty($interests[0]) && $interests[0]->Interest4 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="text"  value="{{$interests[0]->Interest4}}" name="Interest4"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>
		 <div id="interests5">
	    	@if(!empty($interests[0]) && $interests[0]->Interest5 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="tel"  value="{{$interests[0]->Interest5}}" name="Interest5"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>
  	</div>

	</div>
