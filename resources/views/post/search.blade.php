@extends('layouts.new_app')

@section('title')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/search.png') }}" type="image/x-icon" />
    <title>

        @if(  request()->query('search_post')  != "" )
            {{ request()->query('search_post') }} - {{ __('home.search_result') }}
        @else
            {{ $category_name->name }} - {{ __('home.search_result') }}

        @endif

    </title>
 
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
                        <div class="container mt-5 mb-5 card-mobile">
                            <div class="row d-flex align-items-center justify-content-center">
                                <div class="col-md-6 col-12 gust-post endless-pagination posts" data-next-page="2">

                                    @if (Auth::check())
                                        <a data-toggle="modal" data-target="#ModalPostAdd" class="btn add-post">
                                            <div class="btn-add-post-user-img">
                                                <img src="{{ asset('uploads/images/' . Auth::user()->image) }}" />
                                            </div>
                                            <div class="add-post-field">{{ __('home.what_think') }},
                                                {{ Auth::user()->name }}

                                                @if (app()->getLocale() == 'ar')
                                                    ؟
                                                @else
                                                    ?
                                                @endif
                                            </div>
                                        </a><br><br>

                                    @endif

                                    @if ($posts->count() > 0)
                                        @include('post.post')
                                    @else
                                        <img src="{{ asset('img/empty.svg') }}" width="500" height="300">
                                        <div class="text-center">{{ __('home.no_result_found') }}</div>
                                    @endif


                                </div>
                            </div>
                        </div>
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

                        var search_result = $('input[name="search_post"]').val();
                        var category_id = $('input[name="category_id"]').val();

                        $.ajax({
                            type: "GET",
                            url: "{{ route('search.post') }}",
                            data: {
                                'page': page,
                                'search_post': search_result,
                                'category_id': category_id,
                            },
                            success: function(response) {
                                $('.posts').append(response.posts);
                                $('.endless-pagination').data('next-page', response.next_page);
                                $("#spinnerModal2").css('display', 'none    ');
                                
                                if(response.last_item == null){
                                    $('.endless-pagination').data('next-page', null);
                                }

                            }
                        });
                        

                    }
                }, 150));
            }
        }
    });
</script>
@endsection
