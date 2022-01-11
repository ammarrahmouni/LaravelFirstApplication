@extends('layouts.new_app')


@section('title')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    @guest
        <link href="{{ asset('css/gust_user.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('img/mainpage.png') }}" type="image/x-icon" />
        <title> {{ __('home.main_page') }} </title>


    @else
        <link rel="shortcut icon" href="{{ asset('img/house.png') }}" type="image/x-icon" />
        <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">
        <title> {{ __('home.home') }} </title>

    @endguest

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

@auth
    @include('modal.post.add_post_modal')
@endauth




@endsection

@section('script')
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/add_post.js') }}"></script>

<script>
    $(document).ready(function() {

        $(window).scroll(fetchPostsScrolling);

        function fetchPostsScrolling() {

            var page = $('.endless-pagination').data('next-page');
            console.log(page);
            if (page != null && page != '') {
                clearTimeout($.data(this, "scrollCheeck"));

                $.data(this, "scrollCheeck", setTimeout(function() {
                    var scroll_poition_for_posts_load = $(window).height() + $(window).scrollTop() +
                        100;

                    if (scroll_poition_for_posts_load >= $(document).height()) {
                        var search_result = $('input[name="search_post"]').val();
                        var category_id = $('input[name="category_id"]').val();
                        console.log(page); 
                        $.ajax({
                            type: "GET",
                            url: "{{ route('search.post') }}",
                            data: {
                                'page': page,
                                'search_post': search_result,
                                'category_id': category_id,
                            },
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                $('.posts').append(response.posts);
                                $('.endless-pagination').data('next-page', response.next_page);
                            }
                        });

                        // $.get(page, search_result, function(data) {
                        //     $('.posts').append(data.posts);
                        //     $('.endless-pagination').data('next-page', data.next_page);

                        // });
                    }
                }, 150));
            }
        }
    });
</script>

@endsection
