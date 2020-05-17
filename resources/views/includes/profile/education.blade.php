	<div class="tab-form mb-5">
		<div class="tab-form-header text-white">
			<h4>Education</h4>
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
					<div class="col-md-2">
			   		<span class="text-primary" onclick="removeEdu({{$edu->FurtherEducationID}})" style="cursor: pointer;"><i class="fas fa-trash"></i> Delete</span>
			   		<span class="text-primary float-right" onclick="editEdu({{$edu->FurtherEducationID}})" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</span>
			   		</div></div>
					@else
					<div class="row education">
					<div class="col-md-10">
					<h4 class="text-primary">{{$edu->Institution}}</h4>
					<p><span>From @php echo date("d-m-Y", strtotime($edu->QualStartGradDate)) @endphp - To @php echo date("d-m-Y", strtotime($edu->QualEndGradDate)) @endphp</span></p>
					</div>
					<div class="col-md-2">
			   		<span class="text-primary" onclick="removeEdu({{$edu->FurtherEducationID}})" style="cursor: pointer;"><i class="fas fa-trash"></i> Delete</span>
			   		<span class="text-primary float-right" onclick="editEdu({{$edu->FurtherEducationID}})" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</span>
			   		</div></div>
					@endif 

				<hr/>
			@endforeach	

			@else
		   <span>Add your education level</span>
		   @endif	
		   <span class="text-primary float-right mb-3 add-education" style="cursor: pointer;"><i class="fas fa-plus"></i> Add</span>
		 </div>
	</div>

	<div class="tab-form mb-5">
		<div class="tab-form-header text-white">
			<h4>Professional Qualifications</h4>
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

			@else
		   <span>Add your Professional qualifications and Professional Bodies</span>
		   @endif
		   <span class="text-primary float-right mb-3 add-profession" style="cursor: pointer;"><i class="fas fa-plus"></i> Add</span>
		   <br/>
		</div>

	</div>
