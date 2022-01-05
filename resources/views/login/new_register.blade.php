@extends('layouts.new_app')

@section('title')
    <title>{{ __('login.register') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/login.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}" />

    @include('layouts.login_header')
@endsection

@section('content')

    <body class="bg-gradient-primary">

        <div class="main" style="position: relative;top: 5%;">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">{{ __('login.create') }}</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('register') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row custom-file"
                                                style="margin-bottom:25px; margin-left:0;">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <input id="image" type="file"
                                                        class="custom-file-input form-control form-control-user @error('image') is-invalid @enderror"
                                                        name="image" required>
                                                    <label style="border-radius: 10rem;padding: 1.5rem 1rem;
                                                            line-height: 0.3;" class="custom-file-label"
                                                        for="inputGroupFile01">{{ __('home.choose_img') }}</label>
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <input id="name" type="text"
                                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required autocomplete="name"
                                                        autofocus placeholder="{{ __('login.full_name') }}">


                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input id="email" type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                                    placeholder="{{ __('login.email') }}">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input id="phone" type="text"
                                                    class="form-control form-control-user @error('phone') is-invalid @enderror"
                                                    name="phone" value="{{ old('phone') }}" required
                                                    placeholder="{{ __('login.phone') }}">

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input id="address" type="text"
                                                    class="form-control form-control-user @error('phone') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" required
                                                    placeholder="{{ __('login.address') }}">

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input id="password" type="password"
                                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password"
                                                        placeholder="{{ __('login.password') }}">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="col-sm-6">
                                                    <input id="password-confirm" type="password"
                                                        class="form-control form-control-user" name="password_confirmation"
                                                        required autocomplete="new-password"
                                                        placeholder="{{ __('login.repeat') }}">
                                                </div>
                                            </div>


                                            <button style="padding: 15px" type="submit"
                                                class="w-100 form-control-user btn btn-primary">
                                                {{ __('login.register_aacount') }}
                                            </button>



                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small"
                                                href="{{ route('password.request') }}">{{ __('login.forget') }}</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small"
                                                href="{{ route('login') }}">{{ __('login.have_account') }}</a>
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
    @include('layouts.login_footer')
    <script>
        if ('{{ app()->getLocale() }}' == 'en') {
            $('.dropdown-item:first-of-type').css('opacity', '.5').end().siblings().css('opacity', '1');
        } else if ('{{ app()->getLocale() }}' == 'tr') {
            $('.dropdown-item:nth-of-type(2)').css('opacity', '.5').end().siblings().css('opacity', '1');
        } else if ('{{ app()->getLocale() }}' == 'ar') {
            $('.dropdown-item:nth-of-type(3)').css('opacity', '.5').end().siblings().css('opacity', '1');
        }
    </script>
    <script src="{{ asset('js/register.js') }}"></script>
@endsection
