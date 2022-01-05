@extends('layouts.new_app')

@section('title')
    <title>{{ __('login.title') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/login.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}" />
    @include('layouts.login_header')
@endsection

@section('content')

    <body class="bg-gradient-primary">
        <div class="container ">

            <!-- Outer Row -->
            <div class="row justify-content-center ">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row ">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">{{ __('login.welcome') }}</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group">
                                                <input id="email" type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    @if (Cookie::has('user'))
                                                value="{{ Cookie::get('user') }}"
                                                @endif
                                                name="email" required autocomplete="email"
                                                autofocus placeholder="{{ __('login.email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert" style="display: flex">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input id="password" type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    @if (Cookie::has('password'))
                                                value="{{ Cookie::get('password') }}"
                                                @endif
                                                name="password" required autocomplete="current-password"
                                                placeholder="{{ __('login.password') }}">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert" style="display: flex">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" @if (Cookie::has('user'))
                                                    checked
                                                    @endif
                                                    >
                                                    <label class="custom-check-box" for="customCheck">
                                                        {{ __('login.remember') }}
                                                    </label>
                                                </div>

                                                <button style="padding: 15px" type="submit"
                                                    class="w-100 form-control-user btn btn-primary ">
                                                    {{ __('login.title') }}
                                                </button>

                                            </div>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            @if (Route::has('password.request'))
                                                <a class=" btn btn-link smallF" href="{{ route('password.request') }}">
                                                    {{ __('login.forget') }}
                                                </a>
                                            @endif
                                        </div>

                                        <div class="text-center">
                                            <a class="small"
                                                href="{{ route('register') }}">{{ __('login.create') }}</a>
                                        </div>

                                        <!-- Dropdown - language -->
                                        <div id="langDropdown" class="lang-flag " aria-labelledby="messagesDropdown">

                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a class="dropdown-item d-flex align-items-center nav-link" rel=" alternate"
                                                    hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                                </a>

                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('script')
    <script>
        if ('{{ app()->getLocale() }}' == 'en') {
            $('.dropdown-item:first-of-type').css('opacity', '.5').end().siblings().css('opacity', '1');
        } else if ('{{ app()->getLocale() }}' == 'tr') {
            $('.dropdown-item:nth-of-type(2)').css('opacity', '.5').end().siblings().css('opacity', '1');
        } else if ('{{ app()->getLocale() }}' == 'ar') {
            $('.dropdown-item:nth-of-type(3)').css('opacity', '.5').end().siblings().css('opacity', '1');
        }
    </script>
    @include('layouts.login_footer')

@endsection
