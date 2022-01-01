@extends('layouts.new_app')

@section('title')
    <title>{{ __('home.edit_post') }}</title>
    <link rel="stylesheet" href="{{ asset('css/post/add_post.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/pencil.png') }}" type="image/x-icon" />
    @include('layouts.login_header')
@endsection


@section('content')


    <div class="post-content">
        <form method="POST" enctype="multipart/form-data" action="{{ route('update.post', $posts->id) }}">
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
                    <option>----- {{ __('home.select_post') }} -----</option>

                    @if (isset($categories) && $categories->count() > 0)
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{$posts->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
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
                    value="{{ $posts->translate('en')->title }}">
                @error('title_en')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group post-description form-english">
                <label for="exampleInputEmail1">{{ __('home.post_description') }}</label>
                <textarea maxlength="300" name="description_en" class="form-control form-control-lg"
                    id="exampleFormControlTextarea1" rows="3"
                    placeholder=" {{ __('home.post_description') }}">{{ $posts->translate('en')->description }}</textarea>
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
                    value="{{ $posts->translate('tr')->title }}">
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
                    placeholder=" {{ __('home.post_description_tr') }}">{{ $posts->translate('tr')->description }}</textarea>
                <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                @error('description_tr')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group form-arabic">
                <label for="exampleInputEmail1">{{ __('home.post_title_ar') }}</label>
                <input id="title_ar" name="title_ar" type="text" class="form-control form-control-lg"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" {{ __('home.post_title') }}"
                    value="{{ $posts->translate('ar')->title }}">
                @error('title_ar')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group post-description form-arabic">
                <label for="exampleInputEmail1">{{ __('home.post_description_ar') }}</label>
                <textarea maxlength="300" name="description_ar" class="form-control form-control-lg"
                    id="exampleFormControlTextarea1" rows="3"
                    placeholder=" {{ __('home.post_description_ar') }}">{{ $posts->translate('ar')->description }}</textarea>
                <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                @error('description_ar')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input " id="image_input">
                <label class="custom-file-label" for="inputGroupFile01">{{ __('home.choose_img') }}</label>
                @error('image')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div id="display-img"
                style="display:block; background-image: url('{{ asset('uploads/images/' . $posts->image) }}')">
            </div>

            <button type="submit" class="btn btn-warning">{{ __('home.update') }}</button>

            <a href="{{ route('show.post', Auth::user()->id) }}">
                <button type="button" class="btn btn-primary">{{ __('home.cancel') }}</button>
            </a>
        </form>


    </div>


@endsection


@section('script')
    @include('layouts.login_footer')
    <script src="{{ asset('js/add_post.js') }}"></script>
@endsection
