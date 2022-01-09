<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon ">
            <img src="{{ asset('img/logo.svg') }}" id="logo-nav">
        </div>

    </a>



    <!-- Divider -->
    <hr class="sidebar-divider" style="margin-top: 80px">



    <!-- Nav Item - Pages Collapse Menu -->
    @auth
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('home') }}">
                <i class="fas fa-home fa-cog"></i>
                <span>{{ __('home.home') }}</span>
            </a>
        </li>
    @else
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('guset.user') }}">
            <i class="fas fa-home fa-cog"></i>
            <span>{{ __('home.home') }}</span>
        </a>
    </li>

    @endauth


    <!-- Nav Item - Utilities Collapse Menu -->
    @auth
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profile', Auth::user()->id) }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('home.profile') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('show.post', Auth::user()->id) }}">
                <i class="fas fa-paste "></i>
                <span> {{ __('home.my_post') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endauth

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('home.categories') }}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            {{ __('home.categories') }}
        </a>
        <div id="collapsePages" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner rounded list-group">
                @include('post.categories_post')
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
