<form id="userImageFormUpdated" action="{{ route('edit.user.image', Auth::user()->image) }}" method="POST"
    enctype="multipart/form-data">
    @csrf

    <div id="ModalUserImage" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">



                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('home.user_edit_img') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="image-preview">

                        <div id="display-img" class="img-thumbnail"></div>

                        {{-- Custom Input File --}}
                        <div class="file-input">

                            <input accept="image/* " type="file" name="image" id="image" class="file-input__input" />

                            <label class="file-input__label" for="image">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload"
                                    class="svg-inline--fa fa-upload fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                                    </path>
                                </svg>
                                <span>{{ __('home.choose_img') }}</span></label>
                        </div>




                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('home.close') }}</button>
                    <button type="submit"
                        class="btn btn-primary save-change-img">{{ __('home.save_change') }}</button>
                </div>

            </div>
        </div>
    </div>

</form>



<script>
    $(document).ready(function() {
        $('.save-change-img').on('click', function(e) {
            e.preventDefault();


            let formData = new FormData($('#userImageFormUpdated')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('edit.user.image', Auth::user()->id) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#load-bar').show();
                },

                complete: function() {
                    $('#load-bar').hide();
                },
                success: function(response) {
                    if (response.status == true) {
                        $('#display-img').css("display", 'none')
                        Swal.fire(
                            response.done,
                            response.msg,
                            'success'
                        )
                        $(".close span").click();
                        var imageSource = '{{ asset('uploads/images') }}';
                        var imgValue = $('.file-input #image').val();
                        $('.user-img').attr('src', imageSource + '/' + response.image);
                        $('.img-profile').attr('src', imageSource + '/' + response.image);
                        $('.file-input #image').val("");

                    } else if (response.status == false) {
                        swal("{{ __('home.error') }}", "" + response.msg + "",
                            "error", {
                                button: "{{ __('home.ok') }}"
                            })
                    }
                }
            });
        });
    });
</script>
