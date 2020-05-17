
<div class="modal" id="editSocialModal" tabindex="-1" role="dialog" aria-labelledby="editSocialModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title text-primary text-center">Edit your social media</h4>
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
              <label for="colFormLabel" class="col-md-4 offset-md-1 text-primary text-center col-form-label label">Skype</label>
              <div class="col-md-6">
                <input type="text" name="skype" class="form-control" id="colFormLabel" value="{{$cvdets->SkypeContact}}">
              </div>
            </div>  

              <div class="form-group row">
              <label for="colFormLabel" class="col-md-4 offset-md-1 text-primary text-center col-form-label label">LinkedIn</label>
              <div class="col-md-6">
                
                <input type="text" name="linkedin" class="form-control" id="colFormLabel" value="{{$cvdets->LinkedInContact}}">
             
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

