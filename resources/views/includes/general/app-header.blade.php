
        <nav class="navbar navbar-expand-md navbar-light bg-blue-transparent shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ env('SITE_URL') }}">
                    <img src="{{ asset('images/icons/logo.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto header-contacts">
                        <!-- Authentication Links -->
                        <!-- @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest -->
                        <li class="ke-contacts"><a class="text-white" href="tel:+254713461279"><img src="{{asset('images/icons/Flag_of_Kenya-16px.png')}}"> (+254) 713 461279</a></li>
                        <li class="sa-contacts"><a class="text-white" href="tel:+27218802561"><img src="{{asset('images/icons/Flag_of_South_Africa-16px.png')}}"> +27 (0) 218802561</a></li>
                        <li class="co-contacts"><a class="text-white" href="{{ env('SITE_URL') }}/contact/">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="nav-border"></div>
            <div class="container main-menu">
                <div class="collapse navbar-collapse justify-content-center row" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="col-md-10">
                    <ul class="navbar-nav nav-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ env('SITE_URL') }}" aria-current="page">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ env('SITE_URL') }}executive-search-and-talent-sourcing/">Executive Search</a></li>
                        <li class="nav-item dropdown"><a href="{{ env('SITE_URL') }}recruitment/" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recruitment</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}large-scale-employment-assignments/">Large Scale Employment Assignments</a>
                        </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/testimonials/">Testimonials</a></li>
                        <li class="nav-item dropdown"><a href="{{ env('SITE_URL') }}news/" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News &amp; Industry Updates</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}corporate-social-responsibility/">CSR</a>
                        </div>
                        </li>
                        <li class="nav-item dropdown"><a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Candidates</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}job-board/">Job Board</a>
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}career-levels/executive-level/">Executive Level</a>
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}career-levels/upper-mid-level/">Upper Mid Level</a>
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}career-levels/lower-mid-level/">Lower Mid Level</a>
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}career-levels/junior-level/">Junior Level</a>
                            <a class="dropdown-item" href="{{ env('SITE_URL') }}summitre/index.php/site/login">Upload CV</a>
                        </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/meet-the-team/">Meet the Team</a></li>
                    </ul>
                    </div>
                    <div class="col-md-1" style="padding: 0;">
                    <ul class="navbar-nav nav-menu mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul> 
                    </div>
                </div>
            </div>
        </nav>