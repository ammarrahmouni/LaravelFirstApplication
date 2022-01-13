@extends('layouts.new_app')

@section('title')
    <link rel="shortcut icon" href="{{ asset('img/man.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/user/user_details.css') }}">
    <title>{{ __('home.profile') }}</title>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
@endsection

@section('content')

    <body id="page-top">

        <div id="wrapper">
            @include('layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    @include('layouts.nav')
                    <div class="container-fluid">
                        @include('user.visit_user_details')
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