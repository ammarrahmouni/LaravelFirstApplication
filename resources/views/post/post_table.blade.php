<br><br>
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">



<div class="post-table card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('home.my_post') }}</h6>
        <a data-toggle="modal" data-target="#ModalPostAdd">
            <button type="button" class="btn btn-success add-button">
                <i class="fas fa-plus "></i>{{ __('home.add_new_post') }}
            </button>
        </a>
    </div>
    @include('modal.post.add_post_modal')

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead style="text-align: center">
                    <tr>
                        <th scope="col">{{ __('home.title') }}</th>
                        <th scope="col">{{ __('home.description') }}</th>
                        <th scope="col">{{ __('home.category_type') }}</th>
                        <th scope="col">{{ __('home.created_at') }}</th>
                        <th scope="col">{{ __('home.photo') }}</th>
                        <th scope="col" colspan="2">{{ __('home.operation') }}</th>
                    </tr>
                </thead>

                <tbody>

                    @if (isset($posts) && $posts->count() > 0)

                        @foreach ($posts as $post)
                            <tr>
                                <td class="table-row" scope="row" id="title_{{ app()->getLocale() }}_row">
                                    {{ $post->translate(app()->getLocale())->title }}</td>
                                <td class="table-row" scope="row" id="description_{{ $post->id }}">
                                    {{ $post->translate(app()->getLocale())->description }}</td>

                                <td scope="row" id="category_row">
                                    {{ $post->categoryes->name }}
                                </td>

                                <td scope="row">{{ $post->created_at->diffForHumans() }}</td>
                                <td scope="row">
                                    <style>
                                        /* Style the Image Used to Trigger the Modal */
                                        #postImg{{ $post->id }} {
                                            border-radius: 5px;
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
                                    
                                    <img style="width: 75px; height:75px"  id="postImg{{ $post->id }}"
                                        src="{{ asset('uploads/images/' . $post->image) }}">

                                    <!-- The Modal -->
                                    <div id="postImgModal{{ $post->id }}" class="modall">

                                        <!-- The Close Button -->
                                        <span id="close-image-modal{{ $post->id }}"
                                            onclick="document.getElementById('postImgModal{{ $post->id }}').style.display='none'">&times;</span>

                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="postDisplayImg{{ $post->id }}">

                                    </div>
                                </td>



                                <td scope="row">
                                    <button data-bs-toggle="modal" data-bs-target="#ModalPostUpdate{{ $post->id }}"
                                        type="button" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                        {{ __('home.update') }}
                                    </button>
                                    @include('modal.post.update_post_modal')
                                </td>


                                <td scope="row">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deletePost{{ $post->id }}">
                                        <i class="fas fa-trash"></i>
                                        {{ __('home.delete') }}
                                    </button>

                                    @include('modal.post.delete_post_modal')
                                </td>
                            </tr>
                            <script>
                                $(document).ready(function() {


                                    if (($('#description_{{ $post->id }}').text().length) > 70) {

                                        var oldText = $('#description_{{ $post->id }}').text();

                                        var newText = $('#description_{{ $post->id }}').text().substr(0, 70);
                                        $('#description_{{ $post->id }}').html(newText + " " +
                                            "<span class='show-trim' id='show_trim_{{ $post->id }}'>{{ __('home.read_more') }}</span>"
                                        );


                                        $(document).on('click', '#show_trim_{{ $post->id }}', function() {
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

                                    $('#postImg{{ $post->id }}').on('click', function() {
                                        $('#postImgModal{{ $post->id }}').css('display', 'block');
                                        $('#postDisplayImg{{ $post->id }}').attr('src', $(this).attr('src'));

                                    })

                                    $(document).on('keyup ', function(e) {
                                        if (e.key == "Escape") {
                                            $('#postImgModal{{ $post->id }}').css('display', 'none');
                                        }
                                    });

                                    $('#postImgModal{{ $post->id }}').on("click", function() {
                                        $(this).css('display', 'none');
                                    });
                                });
                            </script>

                        @endforeach
                    @endif

                </tbody>

            </table>

            @if ($posts->total() > 0)
                <div class="paginate-footer">
                    @if (app()->getLocale() == 'ar')
                        {{ $posts->links() }}
                        {{ __('home.show') }} {{ $posts->firstItem() }}
                        {{ __('home.of') }}
                        {{ $posts->lastItem() }}
                        {{ __('home.to') }} {{ $posts->total() }} {{ __('home.entries') }}
                    @else
                        {{ $posts->links() }}
                        {{ __('home.show') }} {{ $posts->firstItem() }}
                        {{ __('home.to') }}
                        {{ $posts->lastItem() }}
                        {{ __('home.of') }} {{ $posts->total() }} {{ __('home.entries') }}
                    @endif
                </div>
            @endif

        </div>
    </div>
</div>
