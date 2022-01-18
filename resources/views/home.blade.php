@extends('layouts.new_app')

@section('title')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/house.png') }}" type="image/x-icon" />
    <title>{{ __('home.home') }}</title>

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

            if (page != null && page != '') {
                clearTimeout($.data(this, "scrollCheeck"));

                $.data(this, "scrollCheeck", setTimeout(function() {
                    var scroll_poition_for_posts_load = $(window).height() + $(window).scrollTop() +
                        100;

                        if (scroll_poition_for_posts_load >= $(document).height()) {

                            $("#spinnerModal2").css('display', 'block');


                        $.get(page, function(data) {
                            $('.posts').append(data.posts);
                            $('.endless-pagination').data('next-page', data.next_page);
                            $("#spinnerModal2").css('display', 'none');

                        });
                    }
                }, 150));
            }
        }
    });
</script>

@endsection
