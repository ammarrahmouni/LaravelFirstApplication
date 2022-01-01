@extends('layouts.new_app')

@section('title')
    <title>{{ __('login.verify_email') }}</title>
    <link rel="shortcut icon" href="{{asset('img/login.png')}}" type="image/x-icon" />
    @include('layouts.login_header')
@endsection

@section('content')

    <body class="bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="top: 100%">
                        
                        <div class="card-header" style="display: flex;" >{{ __('login.verify_email') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('login.verify_email_request_resend') }}
                                </div>
                            @endif

                            {{ __('login.verify_email_check') }}
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" style="display: flex;"
                                    class="btn btn-link ">{{ __('login.verify_email_request') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('script')
    @include('layouts.login_footer')
@endsection
