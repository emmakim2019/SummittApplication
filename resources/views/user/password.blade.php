@extends('layouts.pages')

@section('title','Edit My Profile')

@section('content')
<div class="courses-page">
  @include('includes.components.parallax',[
  'image'=>asset("images/banners/BannerCoursesPage@2x.png"),
  'text'=>'Change Password'
  ])

  @component('includes.components.breadcrumbs')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('home') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ route('profile.courses') }}" class="active">My Profile</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
      <a href="{{ route('profile.courses') }}" class="active">Change Password</a>
    </li>
  </ol>
  @endcomponent

<div class="passwordchange-section">
  <div class="row justify-content-center profile-row">

    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 profile-details-form">
    <h2 class="text-purple" style="text-align:center">Update your password</h2>

  <div class="clearfix"><br /></div>
    <form method="POST" action="{{route('profile.password.change')}}">
        @csrf

          <div class="form-group row justify-content-center">
            <div class="col-md-6">
                <label>Enter new Password:</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

          <div class="form-group row justify-content-center">
            <div class="col-md-6">
            <button type="submit" class="btn btn-overall purple">Change Password</button>
        </div>
    </div>
    </form>
   </div>
</div>
</div>
</div>
@endsection
