@extends('layouts.new_app')

@section('title')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}" >
    <link rel="shortcut icon" href="{{ asset('img/house.png') }}" type="image/x-icon" />
    <title>{{ __('home.home') }}</title>
    @include('layouts.login_header')
@endsection


@section('content')

    <body id="page-top">
        <div id="wrapper">
            @include('layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('layouts.nav')
                    <div class="container-fluid home-container ">
                        <a  data-toggle="modal" data-target="#ModalPostAdd" class="btn add-post"  >
                            {{ __('home.add_post') }}
                        </a>
                        @section('category')
                            @include('post.all_post')
                        @show
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </body>

    @include('layouts.login_footer')
    @include('modal.post.add_post_modal')


    

@endsection

@section('script')
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/add_post.js') }}"></script>

@endsection
