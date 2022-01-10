<div class="user-content">

    <div class="user-img-block">
        <img id="myImg" class="user-img img-thumbnail" src="{{ asset('uploads/images/' . $user->image) }}">
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modall">

        <!-- The Close Button -->
        <span class="close-image-modal" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">

    </div>

    <div class="user-info">
        <div class="name">
            <span>{{ __('login.full_name') }}</span>
            <span id="user-name">{{ $user->name }}</span>
            <span></span>
            <span></span>
        </div>
        <br>
        <div class="dropdown-divider"></div>

        <div class="email">
            <span>{{ __('login.email') }}</span>
            <span id="user-email">{{ $user->email }}</span>
            <span></span>
            <span></span>
        </div>
        <br>

        <div class="dropdown-divider"></div>

        <div class="phone">
            <span>{{ __('login.phone') }}</span>
            <span id="user-phone">{{ $user->phone }}</span>
            <span></span>
            <span></span>
        </div>
        <br>

        <div class="dropdown-divider"></div>

        <div class="address">
            <span>{{ __('login.address') }}</span>
            <span id="user-address">{{ $user->address }}</span>
            <span></span>
            <span></span>
        </div>
        <br>

        <div class="dropdown-divider"></div>

        <div class="post-count">
            <span>{{ __('home.post_count') }}</span>
            <span>{{ $posts->total() }}</span>
            <span></span>
            <span></span>
        </div>
        <br>


    </div>

</div>

