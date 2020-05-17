@extends('layouts.candidate')

@section('content')

@if(Session::has('redirectMessage'))
@section('js')
<script type="text/javascript">
$(document).ready(function() {
    //console.log("got it");
 $("#notificationModal").modal('show');
});
</script>
@endsection
@elseif(Session::has('redirectError'))
@section('js')
<script type="text/javascript">
$(document).ready(function() {
    //console.log("got it");
 $("#errorModal").modal('show');
});
</script>
@endsection
@endif

<div class="auth">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="justify-content-center">
                <div class="auth-header"><h2>{{ __('Registration Form') }} <img src="{{asset('/images/icons/registration-bg.jpg')}}"></h2></div>
                <div>
                    @if (session('register_error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('register_error') }}
                        </div>
                    @endif
                    @include('includes.forms.register')
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="justify-content-center">
                <div class="auth-header"><h2>{{ __('Login Form') }} <img src="{{asset('/images/icons/login-bg.jpg')}}"></h2></div>

                <div>
                    @if (session('login_error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('login_error') }}
                        </div>
                    @endif
                    @include('includes.forms.login')
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
