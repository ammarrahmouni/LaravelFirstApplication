@extends('layouts.new_app')

@section('title')
    <link rel="shortcut icon" href="{{ asset('img/man.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/user/user_details.css') }}">
    <title>{{ __('home.profile') }}</title>
    @include('layouts.login_header')
@endsection


@section('content')

    @if (Session::has('dont_have_premission'))
        <script>
            swal("{{ __('home.error') }}", "{!! Session::get('dont_have_premission') !!}", "error", {
                button: "{{ __('home.ok') }}"
            })
        </script>

    @endif

    <body id="page-top">

        <div id="wrapper">
            @include('layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                @include('layouts.login_footer')
                <!-- Main Content -->
                <div id="content">
                    @include('layouts.nav')
                    <div class="container-fluid">
                        @include('user.user_details')
                    </div>
                </div>
                @include('layouts.footer')
            </div>

        </div>

    </body>


@endsection
@section('script')
    <script src="{{ asset('js/user/user_details.js') }}"></script>
@endsection
