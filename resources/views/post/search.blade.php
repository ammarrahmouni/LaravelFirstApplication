@extends('layouts.new_app')

@section('title')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/house.png') }}" type="image/x-icon" />
    <title>{{ __('home.home') }}</title>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                        <div class="container mt-5 mb-5 card-mobile">
                            <div class="row d-flex align-items-center justify-content-center">
                                <div class="col-md-6 col-12 gust-post endless-pagination posts">

                                    @if (Auth::check())
                                        <a data-toggle="modal" data-target="#ModalPostAdd" class="btn add-post">
                                            <div class="btn-add-post-user-img">
                                                <img src="{{ asset('uploads/images/' . Auth::user()->image) }}" />
                                            </div>
                                            <div class="add-post-field">{{ __('home.what_think') }}</div>
                                        </a><br><br>

                                    @endif

                                    @if (isset($posts) && $posts->count() > 0)
                                        @foreach ($posts as $post)

                                            @if (isset($post->postTranslations) && $post->postTranslations->count() > 0)
                                                @foreach ($post->postTranslations as $psot_trans)
                                                    @auth
                                                        @include('modal.post.update_post_modal')
                                                        @include('modal.post.delete_post_modal')
                                                    @endauth

                                                    {{-- Post --}}
                                                    <div class="card">
                                                        <div class="d-flex justify-content-between p-2 px-3">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <img src="{{ asset('uploads/images/' . $post->users->image) }}"
                                                                    width="50" class="rounded-circle">
                                                                <div class="d-flex flex-column ml-2">
                                                                    <span class="font-weight-bold"
                                                                        style="color: black">{{ $post->users->name }}</span>

                                                                    <a
                                                                        href="{{ route('category.post', $post->categoryes->id) }}">
                                                                        <small id="category-name" class="text-primary"
                                                                            style="display: flex;">

                                                                            {{ $post->categoryes->name }}
                                                                        </small>
                                                                    </a>

                                                                </div>
                                                            </div>



                                                            @auth
                                                                @if (Auth::user()->id == $post->user_id)
                                                                    <div
                                                                        class="d-flex flex-column mt-1 ellipsis card-right-side">
                                                                        <small class="mr-2">
                                                                            {{ $post->created_at->diffForHumans() }}
                                                                        </small>
                                                                        <small class=" " id="postDropdown"
                                                                            role="button" data-toggle="dropdown">
                                                                            <i class="fas fa-ellipsis-h"></i>
                                                                        </small>
                                                                        <div class="dropdown-menu  shadow "
                                                                            aria-labelledby="postDropdown">

                                                                            <button data-bs-toggle="modal"
                                                                                data-bs-target="#ModalPostUpdate{{ $post->id }}"
                                                                                class="dropdown-item">
                                                                                <i
                                                                                    class="fas fa-pen fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                                {{ __('home.update') }}
                                                                            </button>

                                                                            @include('modal.post.update_post_modal')

                                                                            <button class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#deletePost{{ $post->id }}">
                                                                                <i
                                                                                    class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                                {{ __('home.delete') }}
                                                                            </button>

                                                                        </div>
                                                                    </div>

                                                                @else
                                                                    <div class="d-flex flex-row mt-1 ellipsis ">
                                                                        <small class="mr-2">
                                                                            {{ $post->created_at->diffForHumans() }}
                                                                        </small>
                                                                    </div>
                                                                @endif

                                                            @else
                                                                <div class="d-flex flex-row mt-1 ellipsis ">
                                                                    <small class="mr-2">
                                                                        {{ $post->created_at->diffForHumans() }}
                                                                    </small>
                                                                </div>
                                                            @endauth


                                                        </div>

                                                        <div class="dropdown-divider"></div>


                                                        <div class="p-2">
                                                            <div class="card-body" style="word-break: break-all">
                                                                <h5 class="card-title">
                                                                    {{ $psot_trans->title }}

                                                                </h5>
                                                                <p class="card-text"
                                                                    id="description_{{ $post->id }}">
                                                                    {{ $psot_trans->description }}

                                                                </p>
                                                            </div>

                                                            <script>
                                                                $(document).ready(function() {


                                                                    if (($('#description_{{ $post->id }}').text().length) > 300) {

                                                                        var oldText = $('#description_{{ $post->id }}').text();

                                                                        var newText = $('#description_{{ $post->id }}').text().substr(0, 300);
                                                                        $('#description_{{ $post->id }}').html(newText + " " +
                                                                            "<span class='show-trim' id='show_trim_{{ $post->id }}'>{{ __('home.read_more') }}</span>"
                                                                        );


                                                                        $(document).on('click', '#show_trim_{{ $post->id }}', function() {
                                                                            console.log(oldText);
                                                                            $(this).parent().html(oldText + " " +
                                                                                "<span class='hide-trim' id='hide_trime_{{ $post->id }}'>{{ __('home.read_less') }}</span>"
                                                                            );
                                                                        });

                                                                        $(document).on('click', '#hide_trime_{{ $post->id }}', function() {
                                                                            $(this).parent().html(newText + " " +
                                                                                "<span class='show-trim' id='show_trim_{{ $post->id }}'>{{ __('home.read_more') }}</span>"
                                                                            );
                                                                        })

                                                                    }
                                                                });
                                                            </script>

                                                        </div>

                                                        <img src="{{ asset('uploads/images/' . $post->image) }}"
                                                            class="img-fluid">


                                                        <div class="like-count">
                                                            <span><img width="25px" height="25px"
                                                                    src="{{ asset('img/like.svg') }}" /></span>
                                                            <span>{{ DB::table('likes')->where('post_id', $post->id)->count() }}
                                                            </span>
                                                        </div>



                                                        @if (Auth::check())
                                                            <div class="dropdown-divider"></div>
                                                            @include('post.like_post')
                                                        @endif

                                                    </div>


                                                @endforeach
                                            @endif



                                        @endforeach
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
@endsection
