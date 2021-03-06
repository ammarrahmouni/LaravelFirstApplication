@if (isset($posts) && $posts->count() > 0)
    @foreach ($posts as $post)

        @auth
            @include('modal.post.update_post_modal')
            @include('modal.post.delete_post_modal')
        @endauth

        {{-- Post --}}
        <div class="card">
            <div class="d-flex justify-content-between p-2 px-3">
                <div class="d-flex flex-row align-items-center">
                    <a href="{{ route('visit.user.profile', $post->user_id) }}">
                        <img src="{{ asset('uploads/images/' . $post->users->image) }}" width="50" height="50"
                            class="rounded-circle">


                        <div class="d-flex flex-column ml-2 post-user-header">
                            <span class="font-weight-bold" style="color: black">{{ $post->users->name }}</span>
                    </a>

                    <a href="{{ route('search.post', ['category_id' => $post->categoryes->id]) }}">
                        <small id="category-name" class="text-primary" style="display: flex;">
                            {{ $post->categoryes->name }}
                        </small>
                    </a>

                </div>
            </div>



            @auth
                @if (Auth::user()->id == $post->user_id)
                    <div class="d-flex flex-column mt-1 ellipsis card-right-side">
                        <small class="mr-2">
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                        <small class=" " id="postDropdown" role="button" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-h"></i>
                        </small>
                        <div class="dropdown-menu  shadow " aria-labelledby="postDropdown">

                            <button data-bs-toggle="modal" data-bs-target="#ModalPostUpdate{{ $post->id }}"
                                class="dropdown-item">
                                <i class="fas fa-pen fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('home.update') }}
                            </button>

                            @include('modal.post.update_post_modal')

                            <button class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#deletePost{{ $post->id }}">
                                <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
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
            <div class="card-body">
                <h5 class="card-title">
                    {{ $post->translate(app()->getLocale())->title }}
                </h5>
                <p class="card-text" id="description_{{ $post->id }}">
                    {!! $post->translate(app()->getLocale())->description !!}
                </p>
            </div>

            <script>
                $(document).ready(function() {
                    trimeText('#description_{{ $post->id }}', 300, 'show_trim_{{ $post->id }}',
                        'hide_trime_{{ $post->id }}', "{{ __('home.read_more') }}",
                        "{{ __('home.read_less') }}");


                    imageModalClick('#postImgModal{{ $post->id }}', '#postImg{{ $post->id }}',
                        '#postDisplayImg{{ $post->id }}')

                });
            </script>

        </div>

        <img src="{{ asset('uploads/images/' . $post->image) }}" class="img-fluid"
            id="postImg{{ $post->id }}" class="post-img-modal">

        @include('modal.post.view_img_post')


        <div class="like-count">
            <span><img width="25px" height="25px" src="{{ asset('img/like.svg') }}" /></span>
            <span id="like-click{{ $post->id }}">{{ DB::table('likes')->where('post_id', $post->id)->count() }}
            </span>
        </div>



        @if (Auth::check())
            <div class="dropdown-divider"></div>
            @include('post.like_post')
        @endif

        </div>

    @endforeach

@else



@endif
