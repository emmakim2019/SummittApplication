	<div class="tab-form mb-5">
		<div class="tab-form-header text-white">
			<h4>Work Experience</h4>
		</div>
		<div class="form-group" style="padding: 2%">
			@if(count($work) > 0)
			@foreach($work as $work)
				<div class="row education">
				<div class="col-md-10">
				<h4 class="text-primary">{{$work->Title}}</h4>
				<p>Company: {{$work->Company}}</p>
				<p><span>From - @php echo date("d-m-Y", strtotime($work->StartDate)); @endphp To - @if($work->CurrentDate == 'Yes')  now @endif</span></p>
				@foreach($workresps as $resp)
				@if($resp->WorkExpID == $work->WorkExpID)
				<p>{!! $resp->Responsibility !!}</p>
				<p>{!! $resp->Responsibility2 !!}</p>
				<p>{!! $resp->Responsibility3 !!}</p>
				<p>{!! $resp->Responsibility4 !!}</p>
				<p>{!! $resp->Responsibility5 !!}</p>
				<p>{!! $resp->Achievement !!}</p>
				<p>{!! $resp->Achievement2 !!}</p>
				<p>{!! $resp->Achievement3 !!}</p>
				<p>{!! $resp->Achievement4 !!}</p>
				<p>{!! $resp->Achievement5 !!}</p>
				@endif
				@endforeach
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
            <span class="text-white edit-interests" style="cursor: pointer;"><i class="fas fa-edit"></i></span>
		</div>

		 <div class="form-group row"  style="padding:1% 2%">
		 	<ul>
	    	@if(count($interests) > 0 && $interests[0]->Interests != null)
		    <li><h5 class="text-secondary text-primary">{{$interests[0]->Interests}}</h5></li>
	  		@endif
	    	@if(count($interests) > 0 && $interests[0]->Interest2 != null)
		    <li><h5 class="text-secondary text-primary">{{$interests[0]->Interest2}}</h5></li>
	  		@endif
	    	@if(count($interests) > 0 && $interests[0]->Interest3 != null)
		    <li><h5 class="text-secondary text-primary">{{$interests[0]->Interest3}}</h5></li>
	  		@endif
	    	@if(count($interests) > 0 && $interests[0]->Interest4 != null)
		    <li><h5 class="text-secondary text-primary">{{$interests[0]->Interest4}}</h5></li>
	  		@endif
	    	@if(count($interests) > 0 && $interests[0]->Interest5 != null)
		    <li><h5 class="text-secondary text-primary">{{$interests[0]->Interest5}}</h5></li>
	  		@endif
	  		</ul>
	  	</div>
	</div>
