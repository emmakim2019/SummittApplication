@extends('layouts.profile')

@section('title','Change Email Address')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{ url()->current() }}" class="active">Change Email Address</a>
    </li>
</ol>
@endsection

@section('profile-header')

<div class="container">
  <h2>Change Email Address</h2>
  <div class = "ik-hr-black-slim">
    <span class="hr-inner">
      <span class="hr-inner-style"></span>
    </span>
  </div>
</div>

@endsection

@section('content')
<div class="container">
  <p class="text-muted">Current Email Address</p>
</div>

<div class="container">
  <form method="POST" action="{{route('profile.email.edit')}}">
    @csrf
    <div>

      <div class="form-group">
        <label>Email Address:</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user['email'] }}" required>

        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn-arsenic">Update Email</button>
    </div>
  </form>

</div>
@endsection
