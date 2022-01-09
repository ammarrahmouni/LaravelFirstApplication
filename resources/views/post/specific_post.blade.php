@extends('home')

@section('title')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
       {{-- Jquery --}}
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"
       integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    @guest
        <link href="{{ asset('css/gust_user.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('img/mainpage.png') }}" type="image/x-icon" />
        <title> {{__('home.main_page')}} </title>


    @else
        <link rel="shortcut icon" href="{{ asset('img/house.png') }}" type="image/x-icon" />
        <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}" >
        <title> {{__('home.home')}} </title>

    @endguest

    @include('layouts.login_header')
@endsection

