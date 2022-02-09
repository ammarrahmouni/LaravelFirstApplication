<style>
    /* Style the Image Used to Trigger the Modal */
    #postImg{{ $post->id }} {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* The Modal (background) */
    #postImgModal{{ $post->id }} {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 100000;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    #postDisplayImg{{ $post->id }} {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Add Animation - Zoom in the Modal */
    #postDisplayImg{{ $post->id }} {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0);
        }

        to {
            -webkit-transform: scale(1);
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0);
        }

        to {
            transform: scale(1);
        }
    }

    /* The close-image-modal Button */
    #close-image-modal{{ $post->id }} {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    #close-image-modal{{ $post->id }}:hover,
    #close-image-modal{{ $post->id }}:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        #postDisplayImg{{ $post->id }} {
            width: 100%;
        }
    }

    /* Style the Image Used to Trigger the Modal */

</style>


<!-- The Modal -->
<div id="postImgModal{{ $post->id }}" class="modall">

    <!-- The Close Button -->
    <span id="close-image-modal{{ $post->id }}"
        onclick="document.getElementById('postImgModal{{ $post->id }}').style.display='none'">&times;</span>

    {{-- The Download Button --}}
    <a href="{{ route('download.img.post', $post->id) }}" target="_blank" class="btn-download">
        <i class="fas fa-download"></i>
    </a>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="postDisplayImg{{ $post->id }}">

</div>
