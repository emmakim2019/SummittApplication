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
             @php 
             $edulevels = array(
               array('name' => 'Certificate'),
               array('name' => 'Diploma'),
               array('name' => 'Associate Degree'),
               array('name' => 'Bachelors Degree'),
               array('name' => 'Masters Degree'),
               array('name' => 'Doctrate Degree'),
             );
             $job_type = array(
               array('name' => 'Permanent'),
               array('name' => 'Part Time'),
               array('name' => 'Contract'),
             );
             $clevels = array(
               array('name' => 'Entry Level'),
               array('name' => 'Mid Level'),
               array('name' => 'Management'),
               array('name' => 'Senior Management'),
               array('name' => 'Executive'),
             );
             @endphp
             <application-filter
              action="{{ route('jobs.my-applications') }}" 
              job_type="{{ json_encode($job_type) }}"
              clevels="{{ json_encode($clevels) }}"
              edulevels="{{ json_encode($edulevels) }}"
             >
             </application-filter>
           </div> 
          </div>
		  		<div class="row">
		  			<div class="col-md-4">
			            @include('includes.components.application-sidebar')
			        </div>
		  			<div class="col-md-8">
                        @if(isset($jobdets))

                        <div class="row">
                            <div class="col-md-12">
                            <h2 class="text-secondary">{{$jobdets->JobTitle}}</h2>
                            </div>
                        </div>
                        <div class="clearfix"><br/></div>
                        <div class="row">
                            <div class="col-md-12">
                            <p class="text-grey"><span>{{$jobdets->Deadline}}</span> | <span class="text-secondary">Application Sent</span></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{$jobdets->Summary}}
                            </div>
                        </div>
                        <div class="clearfix"><br/></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" class="text-secondary" data-parent="#accordion" href="#collapse1">
                                        Job details</a>
                                      </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                      <div class="panel-body">
                                        <p><b>Job Type  |</b>  {{$jobdets->JobType}}</p>
                                        <p><b>Location  |</b>  {{$jobdets->LocationCity}} {{$jobdets->LocationCountry}}</p>
                                        <p><b>Career Level  |</b>  {{$jobdets->CareerLevel}}</p>
                                        @if($jobdets->ShowSal == 'Yes')
                                        <p><b>Salary  |</b>  {{$jobdets->SalCurrency}} {{$jobdets->GrossMonthSal}}</p>
                                        @endif
                                        <p><b>Deadline  |</b>  {{$jobdets->Deadline}}</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" class="text-secondary" data-parent="#accordion" href="#collapse2">
                                        Key Responsibilities</a>
                                      </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                      <div class="panel-body">
                                          <ul class="keySkills">
                                              @foreach($jobdutys as $dutys)
                                              <li>{{$dutys->Duty}}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" class="text-secondary" data-parent="#accordion" href="#collapse3">
                                        Qualifications</a>
                                      </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                      <div class="panel-body">
                                          
                                          <ul class="keySkills">
                                              @foreach($jobreqs as $req)
                                              <li>{{$req->Requirement}}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        @endif             
                    </div>
		  		</div>
        </div>
    </div>
</div>    
@endsection


  