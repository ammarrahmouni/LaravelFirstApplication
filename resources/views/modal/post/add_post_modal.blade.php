<form id="postFormAdd" action="" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div id="ModalPostAdd" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('home.add_post') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">



                    {{-- Start Add Post Content --}}

                    <div class="post-content">

                        <div class="image-field">
                            <img class="rounded img-thumbnail" width="500" height="300" id="display-img" />

                            <br>

                            <div class="custom-file">
                                <input accept="image/*" name="image" type="file" class="custom-file-input "
                                    id="image">
                                <label class="custom-file-label custom-file-label-post"
                                    for="inputGroupFile01">{{ __('home.choose_img') }}</label>
                                <strong class="form-text text-danger" id="image_error"></strong>

                            </div>

                        </div>
                        <br>

                        <div class="form-group ">
                            <label for="exampleFormControlSelect1">{{ __('home.select_category') }}</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="category">
                                <option selected disabled>----- {{ __('home.select_post') }} -----</option>
                                @if (isset($categories) && $categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                            <strong class="form-text text-danger" id="category_error"></strong>


                        </div>

                        <br><br>



                        <ul class="nav nav-tabs nav-lang-flag" >
                            <li class="nav-item ">
                                <a class="nav-link active " id="test" aria-current="page" href="#">English</a>
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
                                placeholder=" {{ __('home.post_title') }}">
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="title_en_error"></strong>

                        </div>

                        <div class="form-group post-description  form-english">
                            <label>{{ __('home.post_description') }}</label>
                            <textarea maxlength="600" name="description_en" class="form-control form-control-lg"
                                rows="3" placeholder=" {{ __('home.post_description') }}"></textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="description_en_error"></strong>

                        </div>

                        <div class="form-group form-turkish">
                            <label>{{ __('home.post_title_tr') }}</label>
                            <input maxlength="100" id="title_tr" name="title_tr" type="text"
                                class="post-title form-control form-control-lg"
                                placeholder=" {{ __('home.post_title_tr') }}">
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="title_tr_error"></strong>

                        </div>

                        <div class="form-group post-description  form-turkish">
                            <label>{{ __('home.post_description_tr') }}</label>
                            <textarea maxlength="600" name="description_tr" class="form-control form-control-lg"
                                rows="3" placeholder=" {{ __('home.post_description_tr') }}"></textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="description_tr_error"></strong>

                        </div>


                        <div class="form-group  form-arabic">
                            <label>{{ __('home.post_title_ar') }}</label>
                            <input maxlength="100" id="title_ar" name="title_ar" type="text"
                                class="post-title form-control form-control-lg"
                                placeholder=" {{ __('home.post_title_ar') }}">
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="title_ar_error"></strong>

                        </div>

                        <div class="form-group post-description form-arabic">
                            <label>{{ __('home.post_description_ar') }}</label>
                            <textarea maxlength="600" name="description_ar" class="form-control form-control-lg"
                                rows="3" placeholder=" {{ __('home.post_description_ar') }}"></textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <strong class="form-text text-danger" id="description_ar_error"></strong>

                        </div>



                    </div>

                    {{-- End Add Post Content --}}


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('home.close') }}</button>
                    <button id="btn-add-post" type="submit" class="btn btn-primary ">{{ __('home.add') }}</button>
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

        $('#btn-add-post').on('click', function(e) {

            e.preventDefault();
            let formData = new FormData($('#postFormAdd')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('save.post', Auth::user()->id) }}",
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

                        $(".close span").click();


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
                        $('#' + key + '_error').text(val[0]);

                    });
                }
            });
        })


    });
</script>
