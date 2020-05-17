@extends('layouts.admin')

@section('title','Users')


@section('content')

     <div class="row profile bg-darkblue">
                <div class="col-md-3 profile-image">
                	<div class="row justify-content-center">
                	<img class="img-profile" src="@if(isset($user->SummitStaff->profilePhoto)) {{ asset('uploads/staff/'. $user->SummitStaff->profilePhoto.'')}} @else {{asset('admin-assets/img/default.jpg')}} @endif">
                </div>
                </div>
                <div class="col-md-9">
                    <div class="container">
                    <div class="row profile-details bg-white">
                        <div class="col-md-6">
                            <h3 class="text-primary">{{$user->SummitStaff->Firstname}} {{$user->SummitStaff->Lastname}}</h3>
                            <h5 class="text-primary">{{$user->SummitStaff->designation}} </h5>

                            <p>Mobile No | @if(isset($user->SummitStaff->PhoneNumber)){{$user->SummitStaff->PhoneNumber}} @endif </p>
                            
                            <p>{{$user->email}}</p>
                          
                            <p></p>
                        </div>
                        <div class="col-md-6 profile-details-right">
                            <a href="{{ route('users.edit',$user->SummitStaff->id) }}"><span class="text-primary edit-contact" style="cursor: pointer;position: absolute;right: 0"><i class="fas fa-edit"></i></span></a>
                            <h5 class="text-primary">Performance Statistics</h5>
                            <p><span class="details-span-first">Placed | </span> <span class="details-span"> Denied | </span></p>
                            <p> </p>
                            <p>Total Success Rate | </p>
                            <p><span class="details-span-first">Onboarded | </span> <span class="details-span">Re-assigned |</span></p>
                            <p> </p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

		
		<div class="row">
			<div class="col-md-6">
				<div class="card mb-5">
		        <div class="card-header tab-form-header">
		          Jobs Assigned
		          
		        </div>
		        <div class="card-body">
		          @foreach($jobs as $job)
                   <h5 class="text-primary">{{$job->JobTitle}}
                    <a href="{{ route('jobAds.edit',$job->ID) }}"><span class="edit-attributes jobs-edit"><i class="fas fa-edit"></i></span></a>
                   </h5>
                   <p><b><span class="details-span-first">{{$job->Clients->CompanyName}}</span> | <span class="details-span">{{$job->Category}}</span></b></p>

                   <p><b><span class="details-span-first">{{$job->LocationCity}}</span> | <span class="@if(isset($job->LocationCity)) details-span @else details-span-first @endif">{{$job->LocationCountry}}</span></b></p>
                  
                     <hr class="sidebar-divider">
		          @endforeach

		          <div class="row pagination-row">
				  {{$jobs->links()}}
				 </div>
		        </div>

		      </div>
		      
				</div>
				<div class="col-md-6">
		  	<div class="card mb-5">
		        <div class="card-header tab-form-header">
		          Candidates Assigned
		          <span class="text-white edit-attributes" style="cursor: pointer;"><i class="fas fa-edit"></i></span>
		        </div>
		        <div class="card-body">
		         
		        </div>
		      </div>
				</div>
			</div>
	

@endsection