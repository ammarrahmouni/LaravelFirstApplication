@extends('layouts.new_app')

@section('title')
    <title>{{ __('home.add_post') }}</title>
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/new-post.png') }}" type="image/x-icon" />
    @include('layouts.login_header')
@endsection

{{-- 
    
    <body id="page-top">
        <div id="wrapper">
            @include('layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('layouts.nav')
                    <div class="container-fluid home-container">
                        <a class="btn bg-gradient-warning" href="{{ route('add.post') }}">
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
    
--}}


@section('content')

    <div class="post-content">
        <form method="POST" enctype="multipart/form-data" action="{{ route('save.post', Auth::user()->id) }}">
            @csrf

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">English</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">العربية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Türkçe</a>
                </li>

            </ul>

            <div class="form-group ">
                <label for="exampleFormControlSelect1">{{ __('home.select_category') }}</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="category">
                    <option selected disabled>----- {{ __('home.select_post') }} -----</option>
                    @if (isset($categorys) && $categorys->count() > 0)
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif

                </select>

                @error('category')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>



            <div class="form-group form-english">
                <label for="exampleInputEmail1">{{ __('home.post_title') }}</label>
                <input id="title_en" name="title_en" type="text" class="form-control form-control-lg"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" {{ __('home.post_title') }}"
                    value="{{ old('title_en') }}">
                @error('title_en')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group post-description  form-english">
                <label for="exampleInputEmail1">{{ __('home.post_description') }}</label>
                <textarea maxlength="300" name="description_en" class="form-control form-control-lg"
                    id="exampleFormControlTextarea1" rows="3"
                    placeholder=" {{ __('home.post_description') }}">{{ old('description_en') }}</textarea>
                <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                @error('description_en')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group form-turkish">
                <label for="exampleInputEmail1">{{ __('home.post_title_tr') }}</label>
                <input id="title_tr" name="title_tr" type="text" class="form-control form-control-lg"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" {{ __('home.post_title_tr') }}"
                    value="{{ old('title_tr') }}">
                @error('title_tr')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group post-description  form-turkish">
                <label for="exampleInputEmail1">{{ __('home.post_description_tr') }}</label>
                <textarea maxlength="300" name="description_tr" class="form-control form-control-lg"
                    id="exampleFormControlTextarea1" rows="3"
                    placeholder=" {{ __('home.post_description_tr') }}">{{ old('description_tr') }}</textarea>
                <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                @error('description_tr')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group  form-arabic">
                <label for="exampleInputEmail1">{{ __('home.post_title_ar') }}</label>
                <input id="title_ar" name="title_ar" type="text" class="form-control form-control-lg"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" {{ __('home.post_title_ar') }}"
                    value="{{ old('title_ar') }}">
                @error('title_ar')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group form-arabic">
                <label for="exampleInputEmail1">{{ __('home.post_description_ar') }}</label>
                <textarea maxlength="300" name="description_ar" class="form-control form-control-lg"
                    id="exampleFormControlTextarea1" rows="3"
                    placeholder=" {{ __('home.post_description_ar') }}">{{ old('description_ar') }}</textarea>
                <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                @error('description_ar')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input " id="image" accept=" image/jpg ">
                <label class="custom-file-label" for="inputGroupFile01">{{ __('home.choose_img') }}</label>
                @error('image')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div id="display-img"></div>

            <button type="submit" class="btn btn-primary">{{ __('home.submit') }}</button>
        </form>
    </div>

    <div class="post-btn">

    </div>


@endsection


@section('script')
    @include('layouts.login_footer')
    <script src="{{ asset('js/add_post.js') }}"></script>
@endsection
