	<div class="mb-5">
	<div class="tab-form ">
		<div class="tab-form-header text-white">
			<h4>Education</h4>
			 <span class="text-white edit-education" style="cursor: pointer;"><i class="fas fa-comment"></i>
		</div>
		<div class="form-group" style="padding: 4% 2%">
			@if(!empty($education))
			@foreach($education as $edu)
					@if($edu->FurtherEducation != null)
					<div class="row education">
					<div class="col-md-10">
					<h4 class="text-primary">{{$edu->FurtherEducation}} {{$edu->Subjects}}</h4>
					<p>Specialization: {{$edu->Specialization}}</p>
					<p><span>{{$edu->Institution}} |</span> <span>From @php echo date("d-m-Y", strtotime($edu->QualStartGradDate)) @endphp - To @php echo date("d-m-Y", strtotime($edu->QualEndGradDate)) @endphp</span></p>
					</div>
					</div>
					@else
					<div class="row education">
					<div class="col-md-10">
					<h4 class="text-primary">{{$edu->Institution}}</h4>
					<p><span>From @php echo date("d-m-Y", strtotime($edu->QualStartGradDate)) @endphp - To @php echo date("d-m-Y", strtotime($edu->QualEndGradDate)) @endphp</span></p>
					</div>
					</div>
					@endif 

				<hr/>
			@endforeach	
		   @endif	
		  
		 </div>
	</div>
	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "education")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-education" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-education" data-view="{{ $management->comment }}"> View </a>
                       
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
	<div class="tab-form">
		<div class="tab-form-header text-white">
			<h4>Professional Qualifications</h4>
			 <span class="text-white edit-proffesional" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
		</div>

		<div class="form-group" style="padding: 2%">
			@if(!empty($qualifications))
			@foreach($qualifications as $value => $qual)
				<div class="row">
				<div class="col-md-10">
				<h4 class="text-primary">{{$qual->ProfessionalQualifications}}</h4>
				<p>Title: {{$qual->ProfQualTitle}}</p>
				<p> <span>From @php echo date("d-m-Y", strtotime($qual->StartDate)) @endphp - To @php echo date("d-m-Y", strtotime($qual->EndDate)) @endphp</span></p>
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
   @if($management->section === "proffesional")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-proffesional" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-proffesional" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
	</div>
