@extends('layouts.admin')

@section('title','Users')


@section('content')
<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between ">
  <form class="kt-form" method="POST" action="{{route('users.index')}}">
    <div class="kt-portlet__body">
      @csrf
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
        <div class="form-group">
          <select id="nationality" name="nationality" class="form-control">
            <option disabled selected>Nationality</option>
            @foreach($countries as $country)
             <option value="{{$country->CountryName}}">{{$country->CountryName}}</option>
            @endforeach
          </select>
    </div>
  </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
          <select id="status" name="status" class="form-control" >
            <option disabled selected>Status</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
    </div>
  </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
          <select id="account_type" name="account_type" class="form-control">
            <option disabled selected>User Role</option>
            <option value="0">Administrator</option>
            <option value="1">Staff</option>
          </select>
    </div>
  </div>

  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Search</button>
   </div>
  </div>
  </div>

    </div>
  </form>
  <div class="row user-add-button">


  <a href="{{route('users.create')}}" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
  <span class="icon"><i class="fas fa-plus"></i></span>
  <span class="text">New User</span> </a>
</div>
 </div>
 
</div>

 <div class="container-fluid">
   <div class="row ">
    @foreach($users as $user)
   
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 user-row">
    
        <div class="card @if($user->status == 1) border-right-success @else border-right-secondary @endif  h-100 py-2 user-py-2">
          
                <div class="card-body user-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <img class="img-profile" src="@if(isset($user->SummitStaff->profilePhoto)) {{ asset('uploads/staff/'. $user->SummitStaff->profilePhoto.'')}} @else {{asset('admin-assets/img/default.jpg')}} @endif" style="width:80px; height:80px">
                    </div>
                    <div class="col user-detail-col">
                      <div class="font-weight-bold text-primary mb-1">
                       <a href="{{ route('users.show',$user->id) }}" ><span class="user-fullname"> {{$user->SummitStaff->Firstname}} {{$user->SummitStaff->Lastname}}</span></a>

                        <span class="user-role"> @if(($user->role == 0)) {{'Administrator'}} @else {{'Staff'}} @endif</span>

                        <span class="user-nationality">{{'Kenyan'}}</span>

                      </div>
                      <div class="mb-0 text-gray-800">{{$user->email}}</div>
                    </div>
                    
                  </div>
                </div>
              </div>

      </div>
   @endforeach
 </div>
 <div class="row pagination-row">
  {{$users->links()}}
 </div>
</div>
@endsection