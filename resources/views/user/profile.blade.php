@extends('layouts.admin')

@section('title','Edit My Profile')

@section('content')

<div class="container-fluid">
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ppic-change-div">
     <form action="{{route('staff.profile.image',[Auth::user()->id])}}" method="post" class="form form-horizontal" enctype="multipart/form-data">
                 {{ csrf_field() }}
            <div class="form-group ">
                <div class="fileinput fileinput-new" data-provides="fileinput" data-toggle="tooltip" title="upload the following file types jpg, jpeg, JPG, png, PNG, pdf, svg, gif"  id="profileImage"  style="width:100%; text-align:center;margin-top: 25px;">
                    <div class="fileinput-new thumbnail" >
                      <div class="m-card-profile__pic-wrapper">
                        <img src="@if(isset(Auth::user()->SummitStaff->profilePhoto)) {{ asset('uploads/staff/'. $user->SummitStaff->profilePhoto.'')}} @else {{asset('admin-assets/img/default.jpg')}} @endif" alt=""  style="width:50%"/> </div>
                      </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" > </div>
                    <div>
                        <span class="btn default btn-file"  id="btnImage">
                            <span class="fileinput-new" > Click to upload image</span>
                             
                            <input type="file" class="validate[ optional,checkFileType[jpg|jpeg|JPG|png|PNG|gif|GIF|JPEG|svg|pdf]]" name="profile_image" style="margin-left:25%"> </span>
                            <button type="submit" class="btn btn-primary fileinput-exists" >
                              Save
                            </button>
                        <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>

                    </div>

                    <div class="upload-error"></div>
                </div>
            </div>
          </form>
    </div>
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 profile-details-form">
      <h1 class="text-purple" ><strong>Personal Information</strong></h1>

      <p class="text-purple">Edit your details and click submit to finish the process.</p>
      <form method="POST" action="{{route('staff.profile')}}">
        @csrf

          <div class="form-group row">
            <div class="col-md-8">
                  <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->SummitStaff->Firstname }}" required>
                  @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('class') }}</strong>
                      </span>
                  @enderror
                  </div>
              </div>

    <div class="form-group row">
        <div class="col-md-8">
              <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->SummitStaff->Lastname }}" required>

              @if ($errors->has('last_name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('last_name') }}</strong>
              </span>
              @endif
            </div>
        </div>

    <div class="form-group row">
        <div class="col-md-8">
            <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{$user->SummitStaff->PhoneNumber }}"  placeholder="Phone Number" >

            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
            </div>
        </div>

    <div class="form-group row">
        <div class="col-md-8">
            <input id="designation" type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" value="{{$user->SummitStaff->designation }}"  placeholder="Designation" >

            @if ($errors->has('designation'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('designation') }}</strong>
            </span>
            @endif
            </div>
        </div>
    <div class="form-group row">
        <div class="col-md-8">
            <input id="username" type="text"  class="form-control" value="{{ $user->email }}" readonly>
            </div>
        </div>

    <div class="form-group row " style="justify-content: right;">
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

      </form>
    </div>

</div>
</div>

@endsection
