
<div class="modal" id="editInterestsModal" tabindex="-1" role="dialog" aria-labelledby="editInterestsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title text-primary text-center">Edit your hard skills</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('edit.profile.interest')}}">
        	 @csrf
      <div class="modal-body">
<div class="row">
	<div class="col-md-12">
		<div class="container">

	<div class="alert alert-warning alert-dismissible fade interest-alert" role="alert">
	  <strong>Sorry !</strong> You have reached the maximum number of language selection.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	
		<div class="form-group row">
		    <label for="name" class="col-md-5 text-center text-white col-form-label label label-primary">Interest</label>
		    <div class="col-md-5">	
	    			@if(count($interests) > 0 && $interests[0]->Interests != null)
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
	    	@if(count($interests) > 0 && $interests[0]->Interest2 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="text"  value="{{$interests[0]->Interest2}}" name="Interest2"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>
		 <div id="interests3">
	    	@if(count($interests) > 0 && $interests[0]->Interest3 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="text"  value="{{$interests[0]->Interest3}}" name="Interest3"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>
		 <div id="interests3">
	    	@if(count($interests) > 0 && $interests[0]->Interest4 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="text"  value="{{$interests[0]->Interest4}}" name="Interest4"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>
		 <div id="interests5">
	    	@if(count($interests) > 0 && $interests[0]->Interest5 != null)
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label>
  				<div class="col-md-5"><input class="form-control" id="other_number" type="tel"  value="{{$interests[0]->Interest5}}" name="Interest5"/></div>
  				<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

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

