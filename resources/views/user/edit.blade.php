@extends('layouts.admin')

@section('title','Users')


@section('content')

<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
       Edit User
      </h3>
    </div>
  </div>
  <!--begin::Form-->
  <form class="kt-form" method="POST" action="{{ route('users.update',$user->id) }}"  enctype="multipart/form-data">
    <div class="kt-portlet__body">
     @method('PUT')
      @csrf
      <div class="form-group">
            <label for="first_name">{{ __('First Name') }}</label>
            <input id="first_name" type="name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->Firstname }}" required>

            @if ($errors->has('first_name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('first_name') }}</strong>
            </span>
            @endif
          </div>

           <div class="form-group">
            <label for="last_name">{{ __('Last Name') }}</label>
            <input id="last_name" type="name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->Lastname }}" required>

            @if ($errors->has('last_name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group ">
          <label for="phone">{{ __('Phone Number') }}</label>
            <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->PhoneNumber  }}"  placeholder="Phone Number" >

            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
            
        </div>

    <div class="form-group">
      <label for="designation">{{ __('Designation') }}</label>
            <input id="designation" type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" value="{{ $user->designation  }}"  placeholder="Designation" >

            @if ($errors->has('designation'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('designation') }}</strong>
            </span>
            @endif
            
        </div>



      <div class="form-group">
        <label for="email">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email_address') ? ' is-invalid' : '' }}" name="email_address" value="{{ $user->EmailAddress }}" required>

        @if ($errors->has('email_address'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email_address') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-group">
            <label for="email">{{ __('Password') }}</label>
          <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password')  }}"  required >
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

        </div>

        <div class="form-group">
            <label for="email">{{ __('Confirm Password') }}</label>
          <input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required >
                @if ($errors->has('confirm_password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('confirm_password') }}</strong>
                </span>
                @endif

        </div>

        <div class="form-group ">
        	<label for="email">{{ __('Account Type') }}</label>
          <select id="account_type" name="account_type" class="form-control{{ $errors->has('account_type') ? ' is-invalid' : '' }}" required>
            <option disabled selected>Select Account Type</option>
            <option value="0">Administrator</option>
            <option value="1">Staff</option>
          </select>
            @if ($errors->has('account_type'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('account_type') }}</strong>
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
