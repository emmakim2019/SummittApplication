@extends('layouts.admin')

@section('title','JobAds')


@section('content')

<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        Add a new Job Ad
      </h3>
    </div>
  </div>
  <!--begin::Form-->
  <form class="kt-form" method="POST" action="{{ route('jobAds.store') }}"  enctype="multipart/form-data">
    <div class="kt-portlet__body">

      @csrf
      <div class="form-group">
            <label for="client_name">{{ __('Client name') }}</label>
            <select id="client_name" name="client_name" class="form-control{{ $errors->has('client_name') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Client</option>
            @foreach($clients as $client)
             <option value="{{$client->ClientID}}">{{$client->CompanyName}}
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
            <input id="job_title" type="name" class="form-control{{ $errors->has('job_title') ? ' is-invalid' : '' }}" name="job_title" value="{{ old('job_title')  }}" required>

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
             <option value="{{$industry->Name}}">{{$industry->Name}}
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
            <textarea name="summary" row="50" cols="80" class="form-control"></textarea>
                @if ($errors->has('summary'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
                @endif

        </div>
<fieldset id="responsibilitiesfieldset">
    <legend>Requirements:</legend>

  <div id="requirements">
    <div class=" form-group row">
      <label for="JobFields_requirements_1" class="required">
        Requirement 1 <span class="required">*</span>
      </label>
      <input size="60" maxlength="255" name="JobFields[requirements][1]" id="JobFields_requirements_1" type="text" value="" class="form-control">
    </div>

  </div><!--requirements-->
    <div class=" form-group row">
      <input type="button" value="+ Add a Requirement" class="btn btn-primary pull-right" id="addrequirements" />
    </div>
  </fieldset>

    <fieldset id="dutiesfieldset">
    <legend>Duties:</legend>
  <div id="duties">

    <div class="form-group row">
      <label for="JobFields_duties_1" class="required">
        Duty 1 <span class="required">*</span>
      </label>
      <input size="60" maxlength="255" name="JobFields[duties][1]" id="JobFields_duties_1" type="text" value="" class="form-control">
    </div>


  </div><!--duties-->
    <div class=" form-group row">
      <input type="button" value="+Add a Duty" class="btn btn-primary pull-right" id="addduty" />
    </div>
  </fieldset>

        <div class="form-group row">
        	<label for="education_level">{{ __('Min Education Level') }}</label>
          <select id="education_level" name="education_level" class="form-control{{ $errors->has('education_level') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Education Level</option>
            <option value="Certificate">Certificate</option>
            <option value="Diploma">Diploma</option>
            <option value="Associate Degree">Associate Degree</option>
            <option value="Bachelor's Degree">Bachelor'sDegree</option>
            <option value="Master's Degree">Master's Degree</option>
            <option value="Doctrate Degree">Doctrate Degree</option>
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
            <option value="Permanent">Permanent</option>
            <option value="Part time">Part Time</option>
            <option value="Contract">Contract</option>
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
             <option value="{{$location->LocationName}}">{{$location->LocationName}}
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
             <option value="{{$country->CountryName}}">{{$country->CountryName}}
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
             <option value="{{$currency->CurrencyID}}">{{$currency->CurrencyName}}
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
           <input id="monthly_salary" type="name" class="form-control{{ $errors->has('monthly_salary') ? ' is-invalid' : '' }}" name="monthly_salary" value="{{ old('monthly_salary')  }}" required>
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
            <option value="1">Yes</option>
            <option value="0">No</option>
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
            <option value="Entry Level">Entry Level</option>
            <option value="Mid Level">Mid Level</option>
            <option value="Management">Management</option>
            <option value="Senior Management">Senior management</option>
            <option value="Executive">Executive</option>
          </select>
            @if ($errors->has('career_level'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('career_level') }}</strong>
                </span>
                @endif
    </div>
    <div class="form-group row">
          <label for="deadline">{{ __('Deadline') }}</label>
          <input id="deadline" type="text" name="deadline" class=" form-control{{ $errors->has('monthly_salary') ? ' is-invalid' : '' }} "  value="{{ old('monthly_salary')  }}" required>
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
            <option value="0">Annual Percentage</option>
            <option value="1">1 Month Salary</option>
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
            <option value="0">No</option>
            <option value="1">Yes</option>
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
           <option value="{{$staf->id}}">{{$staf->Firstname.' '.$staf->Lastname}} </option>
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
