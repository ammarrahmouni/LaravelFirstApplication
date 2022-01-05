@extends('layouts.new_app')

@section('title')
    <link rel="shortcut icon" href="{{ asset('img/man.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/user/user_details.css') }}">
    <title>{{ __('home.profile') }}</title>
    @include('layouts.login_header')

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

        @include('layouts.login_footer')
    </body>


@endsection
@section('script')
    <script src="{{ asset('js/user/user_details.js') }}"></script>
@endsection
