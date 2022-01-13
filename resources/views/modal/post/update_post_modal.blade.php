<script src="{{ asset('js/add_post.js') }}"></script>   

<form id="postFormUpdate{{ $post->id }}" action="" method="post" enctype="multipart/form-data">
    @csrf
    <div id="ModalPostUpdate{{ $post->id }}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('home.edit_post') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    {{-- Start Update Post Content --}}

                    <div class="post-content">

                        <div class="image-field">
                            <img class="rounded img-thumbnail" width="500" height="300"
                                id="dispaly-img-update{{ $post->id }}"
                                src="{{ asset('uploads/images/' . $post->image) }}" />

                            <br>

                            <div class="custom-file">
                                <input accept="image/*" name="image" type="file" class="custom-file-input "
                                    id="image{{ $post->id }}" accept=" image/jpg,jpeg,png ">
                                <label class="custom-file-label"
                                    for="image-label{{ $post->id }}">{{ __('home.choose_img') }}</label>

                                <strong class="form-text text-danger" id="image_error_update_{{$post->id}}"></strong>
                            </div>

                        </div>
                        <br>

                        <div class="form-group ">
                            <label for="exampleFormControlSelect1">{{ __('home.select_category') }}</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="category">
                                <option disabled>----- {{ __('home.select_post') }} -----</option>

                                @if (isset($categories) && $categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->categoryes->id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                            <strong class="form-text text-danger" id="category_error_update_{{$post->id}}"></strong>


                        </div>

                        <br><br>



                        <ul class="nav nav-tabs  nav-lang-flag">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Türkçe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">العربية</a>
                            </li>


                        </ul>


                        <div class="form-group form-english">
                            <label>{{ __('home.post_title') }}</label>
                            <input maxlength="100" id="title_en" name="title_en" type="text"
                                class="post-title form-control form-control-lg"
                                placeholder=" {{ __('home.post_title') }}"
                                value="{{ $post->translate('en')->title }}">
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="title_en_error_update_{{$post->id}}"></strong>
                        </div>

                        <div class="form-group post-description  form-english">
                            <label>{{ __('home.post_description') }}</label>
                            <textarea maxlength="600" name="description_en" class="form-control form-control-lg"
                                rows="3"
                                placeholder=" {{ __('home.post_description') }}">{{ $post->translate('en')->description }}</textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="description_en_error_update_{{$post->id}}"></strong>

                        </div>

                        <div class="form-group form-turkish">
                            <label>{{ __('home.post_title_tr') }}</label>
                            <input maxlength="100" id="title_tr" name="title_tr" type="text"
                                class="post-title form-control form-control-lg"
                                placeholder=" {{ __('home.post_title_tr') }}"
                                value="{{ $post->translate('tr')->title }}">
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="title_tr_error_update_{{$post->id}}"></strong>

                        </div>

                        <div class="form-group post-description  form-turkish">
                            <label>{{ __('home.post_description_tr') }}</label>
                            <textarea maxlength="600" name="description_tr" class="form-control form-control-lg"
                                rows="3"
                                placeholder=" {{ __('home.post_description_tr') }}">{{ $post->translate('tr')->description }}</textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="description_tr_error_update_{{$post->id}}"></strong>

                        </div>


                        <div class="form-group  form-arabic">
                            <label>{{ __('home.post_title_ar') }}</label>
                            <input maxlength="100" id="title_ar" name="title_ar" type="text"
                                class="post-title form-control form-control-lg"
                                placeholder=" {{ __('home.post_title_ar') }}"
                                value="{{ $post->translate('ar')->title }}">
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="title_ar_error_update_{{$post->id}}"></strong>

                        </div>

                        <div class="form-group post-description  form-arabic">
                            <label>{{ __('home.post_description_ar') }}</label>
                            <textarea maxlength="600" name="description_ar" class="form-control form-control-lg"
                                rows="3"
                                placeholder=" {{ __('home.post_description_ar') }}">{{ $post->translate('ar')->description }}</textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="description_ar_error_update_{{$post->id}}"></strong>

                        </div>



                    </div>

                    {{-- End Update Post Content --}}


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('home.close') }}</button>
                    <button id="btn-update-post{{ $post->id }}" type="submit"
                        class="btn btn-primary ">{{ __('home.save_change') }}</button>
                </div>



            </div>
        </div>
    </div>

</form>


    <script>
    $(document).ready(function() {

        $('.nav-lang-flag .nav-item a').on('click', function(e){
            e.preventDefault();
        })

        $('#image{{ $post->id }}').on("change", function() {

            if ($(this).val() == '' ) {
                $('#dispaly-img-update{{ $post->id }}').fadeOut(500);
                $('label[for="image-label{{ $post->id }}"]').text("{{__('home.choose_img')}}");

            } else {
                $('#dispaly-img-update{{ $post->id }}').fadeIn(500);
                $('label[for="image-label{{ $post->id }}"]').text($(this).val().split('\\').pop());
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('dispaly-img-update{{ $post->id }}');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }


        });


        $('#btn-update-post{{ $post->id }}').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "{{__('home.save_change_modal')}}",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "{{ __('home.save') }}",
                denyButtonText: "{{ __('home.dont_save') }}",
                cancelButtonText: "{{__('home.cancel')}}",
            }).then((result) => {

                if (result.isConfirmed) {


                    let formData = new FormData($('#postFormUpdate{{ $post->id }}')[0]);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('update.post', ['post_id' => $post->id, 'user_id' => Auth::user()->id]) }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: response.done,
                                    text: response.msg,
                                    icon: 'success',
                                    confirmButtonText: "{{ __('home.ok') }}",


                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })

                            } else if (response.status == false) {
                                Swal.fire(
                                    response.error,
                                    response.msg,
                                    'error'
                                )
                            }
                        },
                        error: function(reject) {
                            $('.form-group').find('strong').html("");
                            $('.custom-file').find('strong').html("");
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function(key, val) {
                                $('#' + key + '_error_update_' + "{{$post->id}}").text(val[0]);
                            });
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire("{{__('home.change_not_saved')}}", '', 'info');
                    $(".close span").click();

                }
            })

        })

    });
</script>
