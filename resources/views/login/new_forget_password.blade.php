@extends('layouts.new_app')

@section('title')
    <title>{{ __('login.rpt_password') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/login.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}" />

@endsection

@section('content')

    <body class="bg-gradient-primary">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            @if (session('status'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: "{{__('home.done')}}",
                                        text: "{{ session('status') }}",
                                        timer: 3500,
                                        showClass: {
                                            popup: 'animate__animated animate__fadeInDown'
                                        },
                                        hideClass: {
                                            popup: 'animate__animated animate__fadeOutUp'
                                        }
                                    })
                                </script>
                            @endif
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-2">{{ __('login.forget') }}</h1>
                                            <p class="mb-4">{{ __('login.header_rest') }}</p>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="form-group">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                                    placeholder="{{ __('login.email') }}">


                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>



                                            <button style="padding: 15px" type="submit"
                                                class="form-control-user btn btn-primary w-100">
                                                {{ __('login.rpt_password') }}
                                            </button>



                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small"
                                                href="{{ route('register') }}">{{ __('login.create') }}</a>
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
    <script>
        $(document).ready(function () {
            chooseLanguage("{{app()->getLocale()}}");
        });
    </script>
    @include('layouts.login_footer')
@endsection
