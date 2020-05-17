
<div class="modal" id="editSummaryModal" tabindex="-1" role="dialog" aria-labelledby="editSummaryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h2 class="modal-title text-primary text-center">Edit your profile summary</h2>
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
		    <div class="col-md-12">

			  		<textarea name="summary" class="form-control  @error('summary') is-invalid @enderror" row="100" style="border-radius: 0;height: 100px">
			  			@if(!empty($cvdets->PersonalSummary))
			  			{!! $cvdets->PersonalSummary !!}
			  			@endif
			  		</textarea>
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

