<div class="btn-like">
    <form method="get" action="">

        <button type="button" class="btn btn-primary save-fas-icon 
        <?php
        $likes = DB::table('likes')->where([
            ['post_id', $post->id],
            ['user_id', Auth::user()->id],
        ])->first();
        if ($likes) {
            echo 'btn-like-active';
        }
        ?> "
            id="like-post{{ $post->id }}">
            <span id="like-icon"> <i class="far fa-thumbs-up"></i> </span> {{__('home.like')}}
        </button>
    </form>
    <script>
        $(document).ready(function() {

            let clicked = true;

            $('.save-fas-icon').each(function() {
                if ($(this).hasClass('btn-like-active')) {
                    $(this).find('#like-icon').html('<i class="fas fa-thumbs-up"></i>');
                    
                }
            })


            $('#like-post{{ $post->id }}').on('click', function(e) {
                e.preventDefault();

               

                if (clicked && !($(this).hasClass('btn-like-active'))) {
                    clicked = false;
                    $(this).addClass('btn-like-active');
                    $(this).find('#like-icon').html('<i class="fas fa-thumbs-up"></i>');
                    
                } else {
                    clicked = true;
                    $(this).removeClass('btn-like-active');
                    $(this).find('#like-icon').html('<i class="far fa-thumbs-up"></i>');
                    

                }

                if ($(this).hasClass('btn-like-active')) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('like.post', ['user_id' => Auth::user()->id, 'post_id' => $post->id]) }}",
                        data: "data",
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $('.like-count span:last-of-type').text(response.like_count)
                        }
                    });
                } else {
                    $.ajax({
                        type: "get",
                        url: "{{ route('dislike.post', ['user_id' => Auth::user()->id, 'post_id' => $post->id]) }}",
                        data: "data",
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $('.like-count span:last-of-type').text(response.like_count)
                        }
                    });
                }

            })

        });
    </script>

</div>
