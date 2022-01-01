@extends('home')

@section('title')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @guest
        <link href="{{ asset('css/gust_user.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('img/mainpage.png') }}" type="image/x-icon" />
        <title> {{__('home.main_page')}} </title>


    @else
        <link rel="shortcut icon" href="{{ asset('img/house.png') }}" type="image/x-icon" />
        <title> {{__('home.home')}} </title>

    @endguest

    @include('layouts.login_header')
@endsection

