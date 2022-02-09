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
                                    <img style="width: 75px; height:75px" id="postImg{{ $post->id }}"
                                        src="{{ asset('uploads/images/' . $post->image) }}">
                                    
                                    @include('modal.post.view_img_post')
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

                                    trimeText('#description_{{ $post->id }}', 70, 'show_trim_{{ $post->id }}',
                                        'hide_trime_{{ $post->id }}', "{{ __('home.read_more') }}",
                                        "{{ __('home.read_less') }}");


                                    imageModalClick('#postImgModal{{ $post->id }}', '#postImg{{ $post->id }}',
                                        '#postDisplayImg{{ $post->id }}')

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
