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
             <application-filter
              action="{{ route('jobs.my-applications') }}"
              categories="{{$categories}}" 
             >
             </application-filter>
           </div> 
          </div>
          <div class="clearfix"><br/></div>
          <div class="row">
            @if(count($jobCV) > 0)
              @foreach($jobCV as $jobcvs)
            <div class="col-md-12">
              <div class="applied row no-gutters">
                <div class="col-md-2 border-right"><p class="text-secondary"><a href="{{ route('jobs.applied', $jobcvs->ID)}}" class="btn-view">{{$jobcvs->JobTitle}}</a></p></div>
                <div class="col-md-2 border-right"><span>{{$jobcvs->Category}}</span></div>
                <div class="col-md-2 border-right"><span>{{$jobcvs->LocationCity}},{{$jobcvs->LocationCountry}}</span></div>
                <div class="col-md-2 border-right"><span>{{$jobcvs->JobType}}</span></div>
                <div class="col-md-2 border-right"><span>{{$jobcvs->CareerLevel}}</span></div>
                <div class="col-md-2"><span class="text-info">Application Sent</span></div>
                </div>
            </div>
              @endforeach
              @else
              <div class="text-center col-12">
            <br /><br /><br />
            <p>
                Your list of job applications is currently empty.
            </p>
            <p>
                Browse through Summit Recruitment and find your perfect job.
            </p>
            <a class="btn btn-info" href="http://www.summitrecruitment-search.com/jobs/" target="_blank">
                Browse Jobs
            </a>
            <br /><br /><br />
            <br /><br /><br />
        </div>
              @endif
          </div>

        </div>
    </div>
</div>    
@endsection


  