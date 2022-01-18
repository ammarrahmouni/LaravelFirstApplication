@extends('layouts.new_app')

@section('title')
    <title>{{ __('home.my_post') }}</title>
    <link rel="stylesheet" href="{{ asset('css/post/view_post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">

    <link rel="shortcut icon" href="{{ asset('img/new-post.png') }}" type="image/x-icon" />

@endsection




@section('content')


    <body id="page-top">

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
    @include('layouts.login_footer')



@endsection


@section('script')

    <script src="{{ asset('js/view_post.js') }}"></script>
    <script src="{{ asset('js/add_post.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
 
@endsection
