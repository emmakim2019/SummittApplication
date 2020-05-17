@extends('layouts.candidate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div id="regForm">
        			  <!-- Circles which indicates the steps of the form: -->
		  <div class="steps">
            <ul id="progressbar">
                <li class="step finish"><span>Personal Details</span></li>
                <li class="step active"><span>Education</span></li>
                <li class="step"><span>Work</span></li>
            </ul>
		  </div>
		  <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="45"
			  aria-valuemin="0" aria-valuemax="100" style="width:45%">
			    45%
			  </div>
		  </div>
		  <!-- One "tab" for each step in the form: -->
		  <div class="tab">
		  	@if(session()->has('register_error'))
			    <div class="form-group row">
			        <div class="col-md-12">
			            <div class="form-check">
			            <div class="alert alert-success alert-dismissible fade show" role="alert">
			                {{ session()->get('register_error') }}
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            </div>
			        </div>
			    </div>
			@endif
		  	@include('includes.components.education')
		  </div>
  		 <div class="row justify-content-center">
		      <a href="{{ route('profile.create.summary')}}" class="btn btn-secondary">Back</a>&nbsp;&nbsp;
		      <a href="{{ route('profile.create.work')}}" class="btn btn-success">Go to next</a>
		  </div>
		</div>

        </div>
    </div>
</div>
@if(!empty($education))
@include('includes.modals.editEducation')
@endif
@if(!empty($qualifications))
@include('includes.modals.editProfession')
@endif
@include('includes.modals.education')
@include('includes.modals.profession')
@endsection

@section('js')
<script src="{{asset('js/script.js')}}"></script>
@endsection