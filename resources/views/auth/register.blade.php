@extends('layouts.app')

@section('content')

@if(Session::has('redirectMessage'))
@section('js')
<script>
$(document).ready(function() {
    console.log("got it");
 $("#notificationModal").modal('show');
});
</script>
@endsection
@elseif(Session::has('redirectError'))
@section('js')
<script>
$(document).ready(function() {
    console.log("got it");
 $("#errorModal").modal('show');
});
</script>
@endsection
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @include('includes.forms.login')
                </div>
            </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @include('includes.forms.register')
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
