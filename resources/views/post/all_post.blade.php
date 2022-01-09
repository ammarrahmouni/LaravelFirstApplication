<div class="container mt-5 mb-5 card-mobile">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6 col-12 gust-post endless-pagination posts" data-next-page="{{ $posts->nextPageUrl() }}">

            @if (Auth::check())
                <a data-toggle="modal" data-target="#ModalPostAdd" class="btn add-post">
                    <div class="btn-add-post-user-img">
                        <img src="{{ asset('uploads/images/' . Auth::user()->image) }}" />
                    </div>
                    <div class="add-post-field">{{ __('home.what_think') }}</div>
                </a><br><br>
                
            @endif
            
            @include('post.post')
            
        </div>
    </div>
</div>
