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
                                <td class="table-row" scope="row" id="description_{{$post->id}}">
                                    {{ $post->translate(app()->getLocale())->description }}</td>

                                <td scope="row" id="category_row">
                                    {{ $post->categoryes->name }}
                                </td>

                                <td scope="row">{{ $post->created_at->diffForHumans() }}</td>
                                <td scope="row">
                                    <img style="width: 75px; height:75px" id="image_row"
                                        src="{{ asset('uploads/images/' . $post->image) }}">
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

                                 
                                        if ( ($('#description_{{$post->id}}').text().length) > 70) {
                                            
                                            var oldText = $('#description_{{$post->id}}').text();

                                            var newText = $('#description_{{$post->id}}').text().substr(0, 70);
                                            $('#description_{{$post->id}}').html(newText + " " +
                                                "<span class='show-trim' id='show_trim_{{$post->id}}'>{{ __('home.read_more') }}</span>");


                                            $(document).on('click', '#show_trim_{{$post->id}}', function() {
                                                console.log(oldText);
                                                $(this).parent().html(oldText + " " +
                                                    "<span class='hide-trim' id='hide_trime_{{$post->id}}'>{{ __('home.read_less') }}</span>");
                                            });

                                            $(document).on('click', '#hide_trime_{{$post->id}}', function() {
                                                $(this).parent().html(newText + " " +
                                                    "<span class='show-trim' id='show_trim_{{$post->id}}'>{{ __('home.read_more') }}</span>");
                                            })

                                        }
                                });
                            </script>

                        @endforeach
                    @endif

                </tbody>

            </table>

            @if ($posts->total() > 0)
                <div class="paginate-footer">
                    {{ $posts->links() }}
                    {{ __('home.show') }} {{ $posts->firstItem() }} {{ __('home.to') }}
                    {{ $posts->lastItem() }}
                    {{ __('home.of') }} {{ $posts->total() }} {{ __('home.entries') }}
                </div>
            @endif

        </div>
    </div>
</div>
