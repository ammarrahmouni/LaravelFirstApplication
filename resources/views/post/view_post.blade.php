@extends('layouts.new_app')

@section('title')
    <title>{{ __('home.my_post') }}</title>
    <link rel="stylesheet" href="{{ asset('css/post/view_post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">

    <link rel="shortcut icon" href="{{ asset('img/new-post.png') }}" type="image/x-icon" />
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

    @if (Session::has('delete_post'))

        <script>
            swal("{{ __('home.done') }}", "{!! Session::get('delete_post') !!}", "success", {
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

    <script>
        // Function To Trim Text
        function tirmText(selector, maxLength) {
            $(selector).each(function() {
                var oldText = $(selector).text();
                if (oldText.length > maxLength) {
                    var newText = $(this).text().substr(0, maxLength);
                    $(this).html(newText + " " + "<span class='show-trim'>{{ __('home.read_more') }}</span>");
                }

                $(document).on('click', '.show-trim', function() {
                    $(this).parent().html(oldText + " " +
                        "<span class='hide-trim'>{{ __('home.read_less') }}</span>");
                });

                $(document).on('click', '.hide-trim', function() {
                    $(this).parent().html(newText + " " +
                        "<span class='show-trim'>{{ __('home.read_more') }}</span>");
                })
            });

        }

        $(document).ready(function() {

            for (let index = 0; index < {{ $posts->count() }}; index++) {
                tirmText($('#description_{{app()->getLocale()}}_row ').eq(index), 75);

            }
        });
    </script>
@endsection
