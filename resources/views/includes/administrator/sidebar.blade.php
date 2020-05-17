 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
           <img alt="Logo" src="{{asset('images/icons/summit-logo.png')}}" height="70" />
         </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <span>Dashboard</span>
          <button class="kt-aside__brand-aside-toggler" id="sidebarToggle">
            
          </button>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
     <?php
                if(Auth::user()->role == 0){
                  $navs = config('admin-constants.admin_nav');
                }elseif(Auth::user()->role ==1){
                  $navs = config('admin-constants.summit_staff');
                }
                foreach ($navs as $label => $nav) :
              ?>
      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        {{$label}}
      </div> -->
    @foreach($nav as $el)
       <?php
    // Program to display current page URL.

        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                    $_SERVER['REQUEST_URI'];
          ?>

          @if (strcmp($link, route($el['route'])))
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route($el['route'])}}">
         <span>{!! $el['icon'] !!}</span>
          <span>{{ $el['title'] }}</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      @else
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route($el['route'])}}" >
         <span>{!! $el['icon'] !!}</span>
          <span>{{ $el['title'] }}</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
     @endif
     @endforeach

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Resource Management</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="">Industry</a>
                 <a class="collapse-item" href="">Candidate</a>
                 <a class="collapse-item" href="">Job Test</a>
                 <a class="collapse-item" href="">Currency</a>
                 <a class="collapse-item" href="">Countries</a>
                 <a class="collapse-item" href="">Locations</a>
                 <a class="collapse-item" href="">Language</a>
                 <a class="collapse-item" href="">Professional Qualification</a>
                 <a class="collapse-item" href="">Subject/Discipline Titles</a>
                 <a class="collapse-item" href="">Specialization Titles</a>
                 <a class="collapse-item" href="">Hard Skills</a>
                 <a class="collapse-item" href="">Industry Functions</a>
             </div>
         </div>
     </li>

 <?php endforeach; ?>

      <!-- Divider -->

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

    </ul>