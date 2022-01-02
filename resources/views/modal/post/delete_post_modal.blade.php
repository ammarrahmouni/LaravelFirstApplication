<form action="{{route('delete.post', $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="deletePost{{$post->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        {{ __('home.are_you_shure') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ __('home.modal_content') }}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" >{{ __('home.yes') }}</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ __('home.no') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>