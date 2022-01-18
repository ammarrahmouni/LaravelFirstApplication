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

        <style>
            /* Style the Image Used to Trigger the Modal */
            #postImg{{ $post->id }} {
                cursor: pointer;
                transition: 0.3s;
            }

            /* The Modal (background) */
            #postImgModal{{ $post->id }} {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 100000;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.9);
                /* Black w/ opacity */
            }

            /* Modal Content (Image) */
            #postDisplayImg{{ $post->id }} {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }

            /* Add Animation - Zoom in the Modal */
            #postDisplayImg{{ $post->id }} {
                -webkit-animation-name: zoom;
                -webkit-animation-duration: 0.6s;
                animation-name: zoom;
                animation-duration: 0.6s;
            }

            @-webkit-keyframes zoom {
                from {
                    -webkit-transform: scale(0);
                }

                to {
                    -webkit-transform: scale(1);
                }
            }

            @keyframes zoom {
                from {
                    transform: scale(0);
                }

                to {
                    transform: scale(1);
                }
            }

            /* The close-image-modal Button */
            #close-image-modal{{ $post->id }} {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }

            #close-image-modal{{ $post->id }}:hover,
            #close-image-modal{{ $post->id }}:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px) {
                #postDisplayImg{{ $post->id }} {
                    width: 100%;
                }
            }

            /* Style the Image Used to Trigger the Modal */

        </style>

        <img src="{{ asset('uploads/images/' . $post->image) }}" class="img-fluid"
            id="postImg{{ $post->id }}" class="post-img-modal">

        <!-- The Modal -->
        <div id="postImgModal{{ $post->id }}" class="modall">

            <!-- The Close Button -->
            <span id="close-image-modal{{ $post->id }}"
                onclick="document.getElementById('postImgModal{{ $post->id }}').style.display='none'">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="postDisplayImg{{ $post->id }}">

        </div>

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
