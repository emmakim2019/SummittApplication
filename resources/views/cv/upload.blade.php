@extends('layouts.candidate')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('includes.components.sidebar')
        </div>
        <div class="col-md-9">
		  <div class="row">
		  	<div class="col-md-12">
		  		<div class="cvupload">
    					@if($details->CVUpload == null)
		  			<div class="right"><h4>Kindly upload your Resume before downloading your custom CV</h4></div>
    				<div class="left" style="display: flex;">
              			<cv-upload action="{{ route('upload.cv') }}">
		                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                </cv-upload>
		            </div>
		                @else
		  			<div class="right"><h4>Download your Custom CV</h4></div>
    				<div class="left" style="display: flex;">
    					<a href="{{route('export.cv')}}" class="btn buttn-download"><i class="fa fa-download"></i> Download CV</a>
					</div>
		                @endif
		               
		  		</div>
		  	</div>
		  </div>
		  <div class="row">
		  	<div class="col-md-3">
		  		<div class="container cv-sidebar text-center text-white">

		  			<div class="form-group">
		  				<div class="cv-image">
		  				<div class="image" style="background-image: url('/uploads/{{$details->CandidatePhoto}}');"></div>
                            <h3>{{$details->Firstname}} {{$details->Lastname}}</h3>
		  				</div>
		  			</div>

		  			<div class="form-group">
		  				<div class="cv-contact">
                            <p>mobile no | {{$cvdets->PhoneNumber}}</p>
                            @if($cvdets->PhoneNumberOther != null)
                            <p>other mobile no | {{$cvdets->PhoneNumberOther}}</p>
                            @endif
                            <p>{{$details->EmailAddress}}</p>
                            @if($cvdets->EmailAddressOther != null)
                            <p>{{$cvdets->EmailAddressOther}}</p>
                            @endif
                            <p>{{$cvdets->Nationality}} | @if($cvdets->Identification != null) {{$cvdets->ID_No}} @else {{$cvdets->Passport_No}} @endif</p>
		  				</div>
		  			</div>
					<div class="nav-border"></div>
		  			<div class="form-group">
		  				<div class="cv-contact">
                            <p>Driving License | {{$cvdets->DL}} </p>
                            <p>Car Owner | {{$cvdets->CarOwner}} </p>
                            <p>{{$cvdets->PhysicalAddress}} </p>
                            <p>P.O. Box | {{$cvdets->PO_BOX}}</p>
                            <p>D.O.B | {{$cvdets->DOB}} </p>
		  				</div>
		  			</div>
					<div class="nav-border"></div>
		  			<div class="form-group">
		  				<div class="cv-contact">
		  					<p class="text-white"><i class="fa fa-skype"></i></p>
		  					<p class="text-white">{{$cvdets->SkypeContact}}</p>
		  				</div>
		  				<div class="social">
		  					<p class="text-white"><i class="fa fa-linkedin"></i></p>
		  					<p class="text-white">{{$cvdets->LinkedInContact}}</p>
		  				</div>
		  			</div>

			


		  		</div>
		  	</div>
		  	<div class="col-md-9"><div class="container">

		  		<div class="form-group row"><div class="logo">
                    <img src="{{ asset('images/icons/summit-logo.png') }}" class="float-right" style="width: 20%">
		  		</div></div>

		  		<div class="form-group">
		  			<p>{!! $cvdets->PersonalSummary !!}</p>
		  		</div>

		  		@if(count($work) > 0)
		  		<div class="form-group">
		  			<div class="workexp">
		  				<div class="cvheadline"><h2>Work Experience</h2></div>
		  				<hr class="cvline" />
						@foreach($work as $work)
							<div class="education">
							<h4 class="text-secondary">{{$work->Title}}</h4>
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
							<hr/>
						@endforeach	
		  			</div>
		  		</div>
				@endif

				@if(count($education) > 0)
		  		<div class="form-group">
		  			<div class="workexp">
		  				<div class="cvheadline"><h2>Education</h2></div>
		  				<hr class="cvline" />
						@foreach($education as $edu)
							<div class="education">
							@if($edu->FurtherEducation != null)
							<h4 class="text-secondary">{{$edu->FurtherEducation}} {{$edu->Subjects}}</h4>
							<p>Specialization: {{$edu->Specialization}}</p>
							<p><span>{{$edu->Institution}} |</span> <span>From @php echo date("d-m-Y", strtotime($edu->QualStartGradDate)) @endphp - To @php echo date("d-m-Y", strtotime($edu->QualEndGradDate)) @endphp</span></p>
							@else
							<h4 class="text-secondary">{{$edu->Institution}}</h4>
							<p><span>From @php echo date("d-m-Y", strtotime($edu->QualStartGradDate)) @endphp - To @php echo date("d-m-Y", strtotime($edu->QualEndGradDate)) @endphp</span></p>
							@endif 
								</div>
							<hr/>
						@endforeach	
		  			</div>
		  		</div>
				@endif

				@if(count($qualifications) > 0)
		  		<div class="form-group">
		  			<div class="workexp">
		  				<div class="cvheadline"><h2>Professional Qualifications</h2></div>
		  				<hr class="cvline" />
						@foreach($qualifications as $value => $qual)
							<div class="education">
							<h4 class="text-secondary">{{$qual->ProfessionalQualifications}}</h4>
							<p>Title: {{$qual->ProfQualTitle}}</p>
							<p> <span>From @php echo date("d-m-Y", strtotime($qual->StartDate)) @endphp - To @php echo date("d-m-Y", strtotime($qual->EndDate)) @endphp</span></p>
								</div>
							<hr/>
						@endforeach	
		  			</div>
		  		</div>
				@endif

				@if(count($profbodies) > 0)
		  		<div class="form-group">
		  			<div class="workexp">
		  				<div class="cvheadline"><h2>Professional Bodies</h2></div>
		  				<hr class="cvline" />
						@foreach($profbodies as $value => $bodies)

						@foreach($profs as $key => $prof)
						@if($bodies->ProfessionalBody == $profs[$key]->profqualtitleID)
							<div class="education">
							<h4 class="text-secondary">{{$profs[$key]->profqualtitle}}</h4>
								</div>
						@endif
						@endforeach	
						@endforeach	
		  			</div>
		  		</div>
				@endif

				@if(count($skills) > 0)
		  		<div class="form-group">
		  			<div class="skills">
		  				<div class="cvheadline"><h2>Key Skills</h2></div>
		  				<hr class="cvline" />

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
				<ul class="keySkills">
	  			@foreach($checks as $check)
	  			@if(in_array($check['id'],array_values($skills)))
					<li>{{$check['name']}}</li>
				@endif
				@endforeach	
				</ul>
		  			</div>
		  		</div>
				@endif

				@if(count($hardskills) > 0)
		  		<div class="form-group">
		  			<div class="skills">
		  				<div class="cvheadline"><h2>Hard Skills</h2></div>
		  				<hr class="cvline" />
				<ul class="keySkills">
	  			@foreach($hardskills as $hardskill)
	  			@if(in_array($hardskill->ID,array_values($hskills)))
					<li>{{$hardskill->Name}}</li>
				@endif
				@endforeach		
				</ul>
		  			</div>
		  		</div>
				@endif

					@if(count($attrs) > 0)
		  		<div class="form-group">
		  			<div class="cv-contact">
		  				<div class="cv-title"><h4>Attributes</h4></div>
		    	@foreach($attrs as $attr)
		    	@if($attr != null)
					<span>{{$attr}}</span>
				@endif	
				@endforeach	
		  			</div>
		  		</div>
				@endif

			@if($lang != null)
		  		<div class="form-group">
		  			<div class="cv-contact">
		  				<div class="cv-title"><h4>Languages</h4></div>
	  			@if(!empty($lang->Language1))
					<span>{{$lang->Language1}} - {{$lang->Fluency1}}</span>
		  		@endif
			 	@if(!empty($lang->Language2))
					<span>{{$lang->Language2}} - {{$lang->Fluency2}}</span>
		  		@endif
			 	@if(!empty($lang->Language3))
					<span>{{$lang->Language3}} - {{$lang->Fluency3}}</span>
		  		@endif
			 	@if(!empty($lang->Language4))
					<span>{{$lang->Language4}} - {{$lang->Fluency4}}</span>
		  		@endif	
		  			</div>
		  		</div>
				@endif
		  		
		  	</div></div>
		  </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{asset('js/custom-file-input.js')}}"></script>
@endsection