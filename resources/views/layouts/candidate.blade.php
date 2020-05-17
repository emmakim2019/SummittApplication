<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/Mobile-Website-App-150x150.png') }}"/>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://kit.fontawesome.com/8f04f65c87.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('build/js/intlTelInput.js')}}"></script>
    <script type="text/javascript" src="{{ asset('build/js/utils.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('build/css/intlTelInput.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">


        @include('includes.general.app-header')

        <main class="py-4">
            @yield('content')
        </main>


<!-- Back to top button -->
@guest
@else
<a id="support" href="{{ route('tickets')}}"><span>Support</span></a>
@endguest
<a id="back-top"><span>Back Up</span></a>

        @include('includes.general.app-footer')
        @include('includes.modals.notification')
        @include('includes.modals.errors')
        @include('includes.modals.popup')
        
    </div>    

@if(Session::has('redirectError'))
<script type="text/javascript">
$(document).ready(function() {
    //console.log("got it");
 $("#errorModal").modal('show');
});
</script>
@endif

@yield('js')
</body>
</html>
