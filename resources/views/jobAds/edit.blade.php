@extends('layouts.admin2')

@section('title','JobAds')


@section('content')

<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        Edit Job Ad
      </h3>
    </div>
  </div>
  <!--begin::Form-->
  <form class="kt-form" method="POST" action="{{ route('jobAds.update',$job->ID) }}"  enctype="multipart/form-data">
    <div class="kt-portlet__body">
      @method('PUT')
      @csrf
      <div class="form-group">
            <label for="client_name">{{ __('Client name') }}</label>
            <select id="client_name" name="client_name" class="form-control{{ $errors->has('client_name') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Client</option>
            @foreach($clients as $client)
            @if($client['ClientID'] == $job->ClientID)
              <option value="{{$client->ClientID}}" selected="selected">{{$client->CompanyName}}</option>
              @else
             <option value="{{$client->ClientID}}">{{$client->CompanyName}}</option>
              @endif
            @endforeach
          </select>

            @if ($errors->has('client_name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('client_name') }}</strong>
            </span>
            @endif
          </div>

           <div class="form-group">
            <label for="job_title">{{ __('Job Title') }}</label>
            <input id="job_title" type="text" class="form-control{{ $errors->has('job_title') ? ' is-invalid' : '' }}" name="job_title" value="{{ $job->JobTitle  }}" required>

            @if ($errors->has('job_title'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('job_title') }}</strong>
            </span>
            @endif
          </div>



      <div class="form-group">
        <label for="job_category">{{ __('Job Category') }}</label>
        <select id="job_category" name="job_category" class="form-control{{ $errors->has('job_category') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Category</option>
            @foreach($industries as $industry)
            @if($industry['Name'] == $job->Category)
             <option value="{{$industry->Name}}" selected="selected">{{$industry->Name}}</option>
              @else
             <option value="{{$industry->Name}}">{{$industry->Name}}</option>
             @endif
            @endforeach

          </select>
        @if ($errors->has('job_category'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('job_category') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-group">
            <label for="email">{{ __('Summary') }}</label>
            <textarea name="summary" row="50" cols="80" class="form-control" > {{$job->Summary}}</textarea>
                @if ($errors->has('summary'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
                @endif

        </div>
<fieldset id="responsibilitiesfieldset">
    <legend>Requirements:</legend>

  <div id="requirements">
     @php
      $r = App\JobRequirement::where('JobID','=', $job->ID)->get();
      $reqid=1; @endphp

      @foreach($r as $jobReq)
    <div class="form-group row">
      <label for="JobFields_requirements_{{$reqid }}" class="required">
        Duty {{$reqid }}<span class="required">*</span>
      </label>
      <input size="60" maxlength="255" name="JobFields[requirements][{{$reqid }}]" id="JobFields_requirements_{{$reqid }}" type="text" value="@if(isset($jobReq->Requirement)) {{$jobReq->Requirement}} @else {{$reqid}} @endif" class="form-control">
    </div>

    @php
       $reqid++;
    @endphp

    @endforeach


  </div><!--requirements-->
    <div class=" form-group row">
      <input type="button" value="+ Add a Requirement" class="btn btn-primary pull-right" id="addrequirementes" />
    </div>
  </fieldset>

    <fieldset id="dutiesfieldset">
    <legend>Duties:</legend>
  <div id="duties">

      @php
      $d = App\JobDuty::where('JobID','=', $job->ID)->get();
      $dutyid=1; @endphp

      @foreach($d as $jobDuty)
    <div class="form-group row">
      <label for="JobFields_duties_{{$dutyid }}" class="required">
        Duty {{$dutyid }}<span class="required">*</span>
      </label>
      <input size="60" maxlength="255" name="JobFields[duties][{{$dutyid }}]" id="JobFields_duties_{{$dutyid }}" type="text" value="@if(isset($jobDuty->Duty)) {{$jobDuty->Duty}} @else {{$dutyid}} @endif" class="form-control">
    </div>

    @php
       $dutyid++;
    @endphp

    @endforeach

  </div><!--duties-->
    <div class=" form-group row">
      <input type="button" value="+Add a Duty" class="btn btn-primary pull-right" id="addduties" />
    </div>
  </fieldset>

        <div class="form-group row">
        	<label for="education_level">{{ __('Min Education Level') }}</label>
          <select id="education_level" name="education_level" class="form-control{{ $errors->has('education_level') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Education Level</option>
             @if(!empty($job->MinEduReq))
             <option value="{{$job->MinEduReq}}" selected="selected">{{$job->MinEduReq}}</option>
            <option value="Certificate">Certificate</option>
            <option value="Diploma">Diploma</option>
            <option value="Associate Degree">Associate Degree</option>
            <option value="Bachelor's Degree">Bachelor'sDegree</option>
            <option value="Master's Degree">Master's Degree</option>
            <option value="Doctrate Degree">Doctrate Degree</option>
              @else
            <option value="Certificate">Certificate</option>
            <option value="Diploma">Diploma</option>
            <option value="Associate Degree">Associate Degree</option>
            <option value="Bachelor's Degree">Bachelor'sDegree</option>
            <option value="Master's Degree">Master's Degree</option>
            <option value="Doctrate Degree">Doctrate Degree</option>

           @endif
           </select>
            @if ($errors->has('education_level'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('education_level') }}</strong>
                </span>
                @endif
    </div>


    <div class="form-group row">
          <label for="job_type">{{ __('Job Type') }}</label>
          <select id="job_type" name="job_type" class="form-control{{ $errors->has('job_type') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Job Type</option>
             @if(!empty($job->JobType))
             <option value="{{$job->JobType}}" selected="selected">{{$job->JobType}}</option>
              <option value="Permanent">Permanent</option>
            <option value="Part time">Part Time</option>
            <option value="Contract">Contract</option>
              @else
            <option value="Permanent">Permanent</option>
            <option value="Part time">Part Time</option>
            <option value="Contract">Contract</option>
            @endif
          </select>
            @if ($errors->has('job_type'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job_type') }}</strong>
                </span>
                @endif
    </div>



<div class="form-group row">
          <label for="location_city">{{ __('Location City') }}</label>
          <select id="location_city" name="location_city" class="form-control{{ $errors->has('location_city') ? ' is-invalid' : '' }}" >
            <option disabled selected>Select Location</option>
            @foreach($locations as $location)
              @if($location['LocationName'] == $job->LocationCity)
             <option value="{{$location->LocationName}}" selected="selected">{{$location->LocationName}}</option>
              @else
             <option value="{{$location->LocationName}}">{{$location->LocationName}}</option>
             @endif
            @endforeach
          </select>
            @if ($errors->has('location_city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location_city') }}</strong>
                </span>
                @endif
    </div>

<div class="form-group row">
          <label for="location_country">{{ __('Location Country') }}</label>
          <select id="location_country" name="location_country" class="form-control{{ $errors->has('location_country') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Country</option>
            @foreach($countries as $country)
            @if($country['CountryName'] == $job->LocationCountry)
             <option value="{{$country->CountryName}}" selected="selected">{{$country->CountryName}}</option>
              @else
             <option value="{{$country->CountryName}}">{{$country->CountryName}}</option>
             @endif
            @endforeach
          </select>
            @if ($errors->has('location_country'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location_country') }}</strong>
                </span>
                @endif
    </div>

    <div class="form-group row">
          <label for="salary_currency">{{ __('Salary Currency') }}</label>
          <select id="salary_currency" name="salary_currency" class="form-control{{ $errors->has('salary_currency') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Currency</option>
             @foreach($currencies as $currency)
             @if($currency['CurrencyName'] == $job->SalCurrency)
             <option value="{{$currency->CurrencyName}}" selected="selected">{{$currency->CurrencyName}}</option>
              @else
             <option value="{{$currency->CurrencyName}}">{{$currency->CurrencyName}}</option>
             @endif
            @endforeach
          </select>
            @if ($errors->has('salary_currency'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('salary_currency') }}</strong>
                </span>
                @endif
    </div>

    <div class="form-group row">
          <label for="monthly_salary">{{ __('Gross Monthly Salary') }}</label>
           <input id="monthly_salary" type="name" class="form-control{{ $errors->has('monthly_salary') ? ' is-invalid' : '' }}" name="monthly_salary" value="{{ $job->GrossMonthSal }}" required>
            @if ($errors->has('monthly_salary'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('monthly_salary') }}</strong>
                </span>
                @endif
    </div>

    <div class="form-group row">
          <label for="show_salary">{{ __('Show Salary') }}</label>
          <select id="show_salary" name="show_salary" class="form-control{{ $errors->has('show_salary') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Show Salary</option>
            @if(!empty($job->ShowSal))
            @if($job->ShowSal == 1)
             <option value="{{$job->ShowSal}}" selected="selected">Yes</option>
             <option value="0">No</option>
              @else
            <option value="{{$job->ShowSal}}" selected="selected">No</option>
            <option value="1">Yes</option>
            @endif
            @endif
          </select>
            @if ($errors->has('show_salary'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('show_salary') }}</strong>
                </span>
                @endif
    </div>
    <div class="form-group row">
          <label for="career_level">{{ __('Career Level') }}</label>
          <select id="career_level" name="career_level" class="form-control{{ $errors->has('career_level') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Career Level</option>
             @if(!empty($job->CareerLevel))
             <option value="{{$job->CareerLevel}}" selected="selected">{{$job->CareerLevel}}</option>
               <option value="Entry Level">Entry Level</option>
            <option value="Mid Level">Mid Level</option>
            <option value="Management">Management</option>
            <option value="Senior Management">Senior management</option>
            <option value="Executive">Executive</option>
              @else
            <option value="Entry Level">Entry Level</option>
            <option value="Mid Level">Mid Level</option>
            <option value="Management">Management</option>
            <option value="Senior Management">Senior management</option>
            <option value="Executive">Executive</option>
            @endif
          </select>
            @if ($errors->has('career_level'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('career_level') }}</strong>
                </span>
                @endif
    </div>
    <div class="form-group row">
          <label for="deadline">{{ __('Deadline') }}</label>
          <input id="deadline" type="text" name="deadline" class=" form-control{{ $errors->has('monthly_salary') ? ' is-invalid' : '' }} "  value="{{ $job->Deadline  }}" required>
            @if ($errors->has('deadline'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('deadline') }}</strong>
                </span>
                @endif
    </div>
    <div class="form-group row">
          <label for="revenue">{{ __('Revenue') }}</label>
          <select id="revenue" name="revenue" class="form-control{{ $errors->has('revenue') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Revenue</option>
             @if(!empty($job->Revenue))

             @if($job->Revenue == 0)
              <option value="{{$job->Revenue}}" selected="selected">Annual Percentage</option>
              <option value="1">1 Month Salary</option>
               @else
             <option value="{{$job->Revenue}}" selected="selected">1 Month Salary</option>
             <option value="0">Annual Percentage</option>
             @endif
            @endif
          </select>
            @if ($errors->has('revenue'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('revenue') }}</strong>
                </span>
                @endif
    </div>
    <div class="form-group row">
          <label for="candidate_placed">{{ __('Candidate Placed') }}</label>
          <select id="candidate_placed" name="candidate_placed" class="form-control{{ $errors->has('candidate_placed') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Placement Status</option>
             @if(!empty($job->CandidatePlaced))
             @if($job->CandidatePlaced == 0)
              <option value="{{$job->CandidatePlaced}}" selected="selected">No</option>
              <option value="1">Yes</option>
               @else
             <option value="{{$job->CandidatePlaced}}" selected="selected">Yes</option>
             <option value="0">No</option>
             @endif
              @else
            <option value="0">No</option>
            <option value="1">Yes</option>
            @endif
          </select>
            @if ($errors->has('candidate_placed'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('candidate_placed') }}</strong>
                </span>
                @endif
    </div>

      <div class="form-group row">
          <label for="staff_assigned">{{ __('Assign to Staff') }}</label>
          <select id="staff_assigned" name="staff_assigned" class="form-control{{ $errors->has('staff_assigned') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Staff</option>
           @foreach($staff as $staf)
           @if($staf['id'] == $job->StaffID)
             <option value="{{$staf->id}}" selected="selected"> {{$staf->Firstname.' '.$staf->Lastname}}</option>
              @else
           <option value="{{$staf->id}}">{{$staf->Firstname.' '.$staf->Lastname}} </option>
           @endif
           @endforeach
          </select>
            @if ($errors->has('staff_assigned'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('staff_assigned') }}</strong>
                </span>
                @endif
    </div>

    </div>

    <div class="kt-portlet__foot">
      <div class="kt-form__actions">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
  </form>
  <!--end::Form-->




@endsection
