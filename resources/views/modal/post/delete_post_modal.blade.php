<form action="" method="post" enctype="multipart/form-data" id="DeleteFormModal{{ $post->id }}">
    @csrf

    <div class="modal fade" id="deletePost{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        {{ __('home.are_you_shure') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-delete-body">
                    {{ __('home.modal_content') }}
                </div>
                <div class="modal-footer">
                    <button id="btn-delete-post{{ $post->id }}" type="submit"
                        class="btn btn-secondary">{{ __('home.yes') }}</button>
                    <button type="button" class="btn btn-primary " data-bs-dismiss="modal">{{ __('home.no') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {

        $('#btn-delete-post{{ $post->id }}').on('click', function(e) {
            e.preventDefault();
            let formData = new FormData($('#DeleteFormModal{{ $post->id }}')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('delete.post', ['post_id' => $post->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("#spinnerModal").css('display', 'block');

                },

                complete: function() {
                    $("#spinnerModal").css('display', 'none');

                },

                success: function(response) {
                    if (response.status == true) {
                        $(".btn-close").click();
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



                    }
                }
            });
        })
    });
</script>
