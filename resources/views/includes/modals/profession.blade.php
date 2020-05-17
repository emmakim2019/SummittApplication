<div class="modal" id="professionModal" tabindex="-1" role="dialog" aria-labelledby="professionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        	<h2 class="modal-title text-primary text-center">Add Your Professional Qualification</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('add.profile.proffesion')}}">
        	 @csrf
      <div class="modal-body">
        	<div class="container">
	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Professional Qualification</label>
	    	<div class="col-md-6">
    			<select class="selectpicker" data-live-search="true" data-size="10" name="qualification">
					@foreach($profs as $key => $prof)
					<option value="{{$profs[$key]->profqualtitle}}">{{$profs[$key]->profqualtitle}}</option>
					@endforeach
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

        	<div class="container">

        	<h2 class="modal-title text-primary text-center">Add Your Professional Bodies</h2>
        	<br/>
	  		<div class="form-group row">
		    <label for="name" class="col-md-6 text-center text-white col-form-label label label-primary">Professional Bodies</label>
	    	<div class="col-md-6">
    			<select class="selectpicker" data-live-search="true" data-size="10" name="bodies">
					@foreach($profs as $key => $prof)
					<option value="{{$profs[$key]->profqualtitleID}}">{{$profs[$key]->profqualtitle}}</option>
					@endforeach
	    		</select>
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