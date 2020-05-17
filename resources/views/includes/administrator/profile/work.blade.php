	<div class="mb-5">
	<div class="tab-form">
		<div class="tab-form-header text-white">
			<h4>Work Experience</h4>
			 <span class="text-white edit-workexperience" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
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
				</div>
				<hr/>
			@endforeach	
		   @endif	
		   
		   <br/>
		 </div>
	</div>
	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "workexperience")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-workexperience" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-workexperience" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
</div>
    <div class="mb-5">
	<div class="tab-form ">
		<div class="tab-form-header text-white">
			<h4>Other Interests</h4>
            <span class="text-white edit-interests" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
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
	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "interests")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-interests" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-interests" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
</div>
