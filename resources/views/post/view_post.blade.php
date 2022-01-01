@extends('layouts.new_app')

@section('title')
    <title>{{ __('home.my_post') }}</title>
    <link rel="stylesheet" href="{{ asset('css/post/view_post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}" >

    <link rel="shortcut icon" href="{{ asset('img/new-post.png') }}" type="image/x-icon" />
    @include('layouts.login_header')

@endsection




@section('content')

    @if (Session::has('update_post'))
        <div class="alert alert-warning alert-dismissible fade show saved-post" role="alert">
            <strong>{{ Session::get('update_post') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (Session::has('delete_post'))
        <div class="alert alert-warning alert-dismissible fade show saved-post" role="alert">
            <strong>{{ Session::get('delete_post') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <body id="page-top">
        @include('layouts.login_footer')
        <div id="wrapper">
            @include('layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('layouts.nav')
                    <div class="container-fluid view-post-container ">
                        @include('post.post_table')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </body>




@endsection


@section('script')
    <script src="{{ asset('js/view_post.js') }}"></script>
    <script src="{{ asset('js/add_post.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
