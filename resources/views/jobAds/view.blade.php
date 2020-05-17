@extends('layouts.admin')

@section('title','Job Ads')


@section('content')

<div class="row profile bg-darkblue">    
    <div class="col-md-12">
        <div class="container">
        <div class="row profile-details bg-white">
            <div class="col-md-7">
                <h4 class="text-primary">{{$job->JobTitle}} </h4>
                <p class="details-span-first"><b>Monthly Salary:</b> {{$job->SalCurrency}} {{$job->GrossMonthSal}} </p>
                <p class="details-span-first"><b>Location:</b> {{$job->LocationCity}} {{$job->LocationCountry}}</p>
                <p class="details-span-first"><b>Career Level:</b> {{$job->CareerLevel}}</p>
                <p class="details-span-first"><b>Job Category:</b> {{$job->Category}}</p>
                <p class="details-span-first"><b>Education:</b> {{$job->MinEduReq}}</p>
            </div>
            <div class="col-md-5 profile-details-right">
                <a href="{{ route('jobAds.edit',$job->ID) }}"><span class="text-primary edit-contact" style="cursor: pointer;position: absolute;right: 0"><i class="fas fa-edit"></i></span></a>
                <h5 class="text-primary">Other Information</h5>
                <p class="details-span-first"><b>Job Type:</b> {{$job->JobType}} </p>
                <p class="details-span-first"><b>Deadline: </b> {{$job->Deadline}} </p>
                <p class="details-span-first"><b>Revenue </b> {{$job->Revenue}} </p>
                <p class="details-span-first"><b>Annual Percentage Revenue: {{$job->AnnualPercentageRevenue}} </b> </p>
            </div>
        </div>
        </div>
    </div>
</div>

    
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header tab-form-header">
              Jobs Summary
            </div>
            <div class="card-body">
             <p> {{$job->Summary}}</p>
            </div>
          </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header tab-form-header">
              Job's Requirements
              
            </div>
            <div class="card-body jobad-box">
             <ul>
               @foreach($requirements as $requirement)
                <li>{{$requirement->Requirement}}</li>
               @endforeach
              <ul>
            </div>

          </div>
          
        </div>
        <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header tab-form-header">
              Job's Duties
            </div>
            <div class="card-body jobad-box">
              <ul>
                @foreach($duties as $duty)
                <li>{{$duty->Duty}}</li>
               @endforeach
             </ul>
            </div>
          </div>
        </div>


        <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header tab-form-header">
              Candidate Applications
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <th>Fullname</th>
                  <th>Gender</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                @foreach($applications as $application)
                <tr>
                 <td>{{$application->candidates->RegDetails->Firstname}} {{$application->candidates->RegDetails->Lastname}}</td>
                 <td>{{$application->candidates->Gender}}</td>
                 <td>{{$application->candidates->PhoneNumber}}</td>
                 @php
                   $status = App\Interview::where('CV_ID','=',$application->CV_ID)->where('JobAD_ID','=',$application->Job_adID)->first();
                  @endphp
                 <td>@if(!empty($status)) {{$status->Status}} @else {{'Application Sent'}} @endif</td>
                 <td>
                  <span style="overflow: visible; position: relative; width: 110px;">
                  <a title="View details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="{{route('candidateCV',$application->CV_ID)}}">
                    <i class="fas fa-eye"></i></a>
                     <a title="Set Action" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="{{route('candidateCV',$application->CV_ID)}}">
                    <i class="fas fa-calendar"></i></a>
                  <!-- <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="#">
                      <i class="fas fa-edit"></i>
                  </a> -->
                </span>
                   

                 </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            <div class="row pagination-row">
             {{$applications->links()}}
            </div>
            </div>
          </div>
      </div>
      </div>



@endsection

