<form id="userFormUpdated" action="{{ route('save.post', Auth::user()->id) }}" method="POST"
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
                            <div id="display-img" class="img-thumbnail"></div>
                            <div class="custom-file">
                                <input accept="image/jpeg,jpg,png" name="image" type="file" class="custom-file-input "
                                    id="image" accept=" image/jpg ">
                                <label class="custom-file-label"
                                    for="inputGroupFile01">{{ __('home.choose_img') }}</label>
                                    <small class="form-text text-danger" id="image_error"></small>

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
                            <small class="form-text text-danger" id="category_error"></small>
                            

                        </div>

                        <br><br>



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





                        <div class="form-group form-english">
                            <label>{{ __('home.post_title') }}</label>
                            <input id="title_en" name="title_en" type="text" class="form-control form-control-lg"placeholder=" {{ __('home.post_title') }}">
                            <small class="form-text text-danger" id="title_en_error"></small>
                            
                        </div>

                        <div class="form-group post-description  form-english">
                            <label>{{ __('home.post_description') }}</label>
                            <textarea maxlength="300" name="description_en" class="form-control form-control-lg" rows="3" placeholder=" {{ __('home.post_description') }}"></textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <small class="form-text text-danger" id="description_en_error"></small>

                        </div>

                        <div class="form-group form-turkish">
                            <label>{{ __('home.post_title_tr') }}</label>
                            <input id="title_tr" name="title_tr" type="text" class="form-control form-control-lg" placeholder=" {{ __('home.post_title_tr') }}" >
                                <small class="form-text text-danger" id="title_tr_error"></small>

                        </div>

                        <div class="form-group post-description  form-turkish">
                            <label>{{ __('home.post_description_tr') }}</label>
                            <textarea maxlength="300" name="description_tr" class="form-control form-control-lg"
                                rows="3" placeholder=" {{ __('home.post_description_tr') }}"></textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <small class="form-text text-danger" id="description_tr_error"></small>

                        </div>


                        <div class="form-group  form-arabic">
                            <label>{{ __('home.post_title_ar') }}</label>
                            <input id="title_ar" name="title_ar" type="text" class="form-control form-control-lg"
                                placeholder=" {{ __('home.post_title_ar') }}">
                                <small class="form-text text-danger" id="title_ar_error"></small>

                        </div>

                        <div class="form-group form-arabic">
                            <label>{{ __('home.post_description_ar') }}</label>
                            <textarea maxlength="300" name="description_ar" class="form-control form-control-lg" rows="3" placeholder=" {{ __('home.post_description_ar') }}"></textarea>
                            <div class="rmg-chracter"> {{ __('home.rmg_character') }} <span> </span> </div>
                            <small class="form-text text-danger" id="description_ar_error"></small>

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

        $('#btn-add-post').on('click', function(e) {

            e.preventDefault();
            let formData = new FormData($('#userFormUpdated')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('save.post', Auth::user()->id) }}",
                data: formData,
                contentType: false,
                processData : false,
                success: function(response) {
                    if(response.status == true){
                        alert(response.msg);
                        $(".close span").click();

                    }
                    else if(response.status == false){
                        alert(response.msg);
                    }
                }, error: function(reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val){
                        $('#' + key + '_error').text(val[0]);
                    });
                }
            });
        })


    });
</script>
