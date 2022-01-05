<form id="userFormUpdated" action="" method="POST">
    @csrf
    <input style="display: none" name="user_id" value="{{ Auth::user()->id }}">
    <div id="ModalUserEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('home.user_edit') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>{{ __('login.full_name') }}</label>
                            <input id="name" type="text" class="form-control " name="name"
                                value="{{ Auth::user()->name }}" placeholder="{{ __('login.full_name') }}">
                            <strong class="form-text text-danger" id="name_error"></strong>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('login.phone') }}</label>
                        <input id="phone" type="text" class="form-control " name="phone"
                            value="{{ Auth::user()->phone }}" required placeholder="{{ __('login.phone') }}">
                        <strong class="form-text text-danger" id="phone_error"></strong>
                    </div>

                    <div class="form-group">
                        <label>{{ __('login.address') }}</label>
                        <input id="address" type="text" class="form-control " name="address"
                            value="{{ Auth::user()->address }}" required placeholder="{{ __('login.address') }}">
                        <strong class="form-text text-danger" id="address_error"></strong>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('home.close') }}</button>
                    <button type="button" class="btn btn-primary save-change">{{ __('home.save_change') }}</button>
                </div>

            </div>
        </div>
    </div>

</form>


<script>
    $(document).ready(function() {
        $('.save-change').on('click', function(e) {

            let formData = new FormData($('#userFormUpdated')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('edit.user.info', Auth::user()->id) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == true) {
                        Swal.fire(
                            response.done,
                            response.msg,
                            'success'
                        )
                        $(".close span").click();
                        $('.user-info #user-name').text(response.info[0]);
                        $('.user-info #user-phone').text(response.info[1]);
                        $('.user-info #user-address').text(response.info[2]);
                    } else if (response.status == false) {
                        Swal.fire(
                            response.msg,
                            'error'
                        )
                    }
                },
                error: function(reject) {
                    $('.form-group strong').text("");
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $('#' + key + '_error').text(val[0]);
                    });
                }
            });
        });
    });
</script>
