<nav class="navbar navbar-expand topbar navbar-light bg-light mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
        action="{{ route('search.post') }}" method="get">
        <input type="hidden" value="{{request()->category_id}}" name="category_id" />
        <div class="input-group">
            <input type="text" name="search_post" class="form-control bg-light border-0 small" value="{{request()->query('search_post')}}"
                placeholder="{{ __('home.search') }}" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>

            <!-- Dropdown - Search -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="{{ __('home.search') }}" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </li>



        <!-- Nav Item - Language -->
        <li class="nav-item dropdown no-arrow mx-1">

            @if (app()->getLocale() == 'en')
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('img/flags/us.svg') }}">
                </a>
            @endif

            @if (app()->getLocale() == 'ar')
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('img/flags/sa.svg') }}">

                </a>
            @endif

            @if (app()->getLocale() == 'tr')
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('img/flags/tr.svg') }}">

                </a>
            @endif


            <!-- Dropdown - Language -->
            <div id="langDropdown"
                class="lang-flag dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">

                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item d-flex align-items-center nav-link" rel=" alternate"
                        hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>

                @endforeach

            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        @guest

            <li class="nav-item nav-guset-user" >
                <a  class="nav-link" href="{{ route('login') }}">{{ __('login.title') }}</a>
            </li>

            <li class="nav-item nav-guset-user">
                <a  class="nav-link"
                    href="{{ route('register') }}">{{ __('login.register') }}</a>
            </li>

        @else

            <!-- Nav Item - Alerts 
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    {{-- <span class="badge badge-danger badge-counter">3+</span> 
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    {{-- <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                        </div> 
                    </a>


                </div>
            </li>--}}

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="nav-user-name mr-2 d-none d-lg-inline  small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('uploads/images/' . Auth::user()->image) }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                    {{-- Profile Button --}}
                    <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('home.profile') }}
                    </a>

                    {{-- My Post Button --}}
                    <a class="dropdown-item" href="{{ route('show.post', Auth::user()->id) }}">
                        <i class="fas fa-paste fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('home.my_post') }}
                    </a>

                    <div class="dropdown-divider"></div>

                    {{-- Logout Button --}}
                    <button class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('login.logout') }}
                    </button>
                </div>
            </li>

        @endguest

    </ul>

</nav>



@include('modal.logout')
