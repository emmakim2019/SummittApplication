	<div class="mb-5">
	<div class="tab-form ">
		<div class="tab-form-header text-white">
			<h4>Personal Summary</h4>
            <span class="text-white edit-summary" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
		</div>
		<div id="editablediv" style="padding: 1%">
			@if(!empty($cvdets->PersonalSummary))
			{!! $cvdets->PersonalSummary !!}
			@endif
		</div>
   @error('summary')
	<div class="alert alert-danger alert-dismissible fade" role="alert">
	  {{ $message }}.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
   @enderror
	</div>
	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "summary")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-summary" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-summary" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
</div>

<div class="row">
	<div class="col-md-6">
		<div class="mb-5">
  	<div class="tab-form ">
  		<div class="tab-form-header text-white">
  			<h4>Attributes</h4>
            <span class="text-white edit-attributes" style="cursor: pointer;"><i class="fas fa-comment"></i></i></span>
  		</div>
		 <div class="form-group multiselect-form" style="height: 130px; margin-bottom:0">
		    <!-- <label for="multiselect2">Choose five attributes from the dropdown</label> -->
		    <div class="attributes">
		    @foreach($attrs as $attr)
		    <span class="badge badge-success">{{$attr}}</span>
		    @endforeach
			</div>
		</div>
  	</div>
  		@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "attributes")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-attributes" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-attributes" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
		</div>

	</div>
		<div class="col-md-6">
			<div class="mb-5">
  	<div class="tab-form">
  		<div class="tab-form-header text-white">
  			<h4>Skills</h4>
            <span class="text-white edit-skills" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
  		</div>
		 <div class="form-group multiselect-form" style="height: 130px;margin-bottom:0">
		    <!-- <label for="multiselect2">Choose five skills from the dropdown</label> -->
  		@php 
  		$checks = array(
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
		    <div class="attributes">
	  			@foreach($checks as $check)
	  			@if(in_array($check['id'],array_values($skills)))
		    <span class="badge badge-success">{{$check['name']}}</span>
		    @endif
		    @endforeach
			</div>
	  	</div>
  	</div>
  	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "skills")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-skills" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-skills" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
  </div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-6">
			<div class="mb-5">
  	<div class="tab-form ">
  		<div class="tab-form-header text-white">
  			<h4>Hard Skills</h4>
            <span class="text-white edit-hardskills" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
  		</div>
		 <div class="form-group multiselect-form" style="height: 130px; margin-bottom:0;">
		    <!-- <label for="multiselect3">Choose five hard skills from the dropdown</label> -->
		    
		    <div class="attributes">
	  			@foreach($hardskills as $hardskill)
	  			@if(in_array($hardskill->ID,array_values($hskills)))
		    <span class="badge badge-success">{{$hardskill->Name}}</span>@endif
		    @endforeach
			</div>
	  	</div>
  	</div>
  	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "hardskills")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-hardskills" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-hardskills" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
  </div>
  	</div>
		<div class="col-md-6">
			<div class="mb-5">
  	<div class="tab-form ">
  		<div class="tab-form-header text-white">
  			<h4>Social Media</h4>
            <span class="text-white edit-social" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
  		</div>
  		<div class="container multiinput-form" style="height: 130px;padding: 0 5%"><br/>
  			<h4 class="mb-5"><i class="fa fa-skype"></i> {{$cvdets->SkypeContact}}</h4>
  			<h4><i class="fab fa-linkedin"></i> {{$cvdets->LinkedInContact}}</h4>
	  	</div>

  	</div>
  	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "social")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-socail" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-social" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
  </div>
  	</div>
</div>

<div class="row">
		<div class="col-md-6">
  <div class="mb-5">
  	<div class="tab-form">
  		<div class="tab-form-header text-white">
  			<h4>Language</h4>
            <span class="text-white edit-languages" style="cursor: pointer;"><i class="fas fa-comment"></i></span>
  		</div>	
		 <div class="form-group row"  style="padding: 4% 2% 10%">
		 	@if($lang != null && !empty($lang->Language1))
		 	<div class="col-md-6">
		    <h5 class="text-secondary">{{$lang->Language1}}</h5>
	  		<p>{{$lang->Fluency1}}</p>
	  		</div>
	  		@endif
		 	@if($lang != null && !empty($lang->Language2))
		 	<div class="col-md-6">
		    <h5 class="text-secondary">{{$lang->Language2}}</h5>
	  		<p>{{$lang->Fluency2}}</p>
	  		</div>
	  		@endif
		 	@if($lang != null && !empty($lang->Language3))
		 	<div class="col-md-6">
		    <h5 class="text-secondary">{{$lang->Language3}}</h5>
	  		<p>{{$lang->Fluency3}}</p>
	  		</div>
	  		@endif
		 	@if($lang != null && !empty($lang->Language4))
		 	<div class="col-md-6">
		    <h5 class="text-secondary">{{$lang->Language4}}</h5>
	  		<p>{{$lang->Fluency4}}</p>
	  		</div>
	  		@endif
	  	</div>	
  	</div>
  	@php $x = 0; @endphp
	@foreach($managements as $management)
	@if(!empty($management->section))
   @if($management->section === "languages")
    @php $x++; @endphp
    <div class="card comment-card">
    	<div class="card-body comment-body">
    		<p>
    			 <span class="details-span-first">{{'Comment'}} {{$x}}</span>
    			 | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
    			 | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
    			 <span class="details-span" style="float:right">
    			 	@if($management->staffID == Auth::user()->SummitStaff->id)
                      <a href="#" class="edit-languages" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
    			 	@else
                      <a href="#" class="view-languages" data-view="{{ $management->comment }}"> View </a>
                       
                    @endif
    			 </span>
    		</p>
    	</div>
    </div>
   @endif
   @endif
   @endforeach
  </div>
  	</div>
</div>