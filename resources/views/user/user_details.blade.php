<div class="user-content">

    <div class="user-img-block">
        <img class="user-img img-thumbnail" src="{{ asset('uploads/images/' . Auth::user()->image) }}">
        <button data-toggle="modal" data-target="#ModalUserImage"
            class="btn bg-gradient-primary text-white">{{ __('home.edit_image') }}</button>
    </div>
    <div class="user-info">
        <div class="name">
            <span>{{ __('login.full_name') }}</span>
            <span id="user-name">{{ Auth::user()->name }}</span>
            <span></span>
            <span></span>
        </div>
        <br>
        <div class="dropdown-divider"></div>

        <div class="email">
            <span>{{ __('login.email') }}</span>
            <span id="user-email">{{ Auth::user()->email }}</span>
            <span></span>
            <span></span>
        </div>
        <br>

        <div class="dropdown-divider"></div>

        <div class="phone">
            <span>{{ __('login.phone') }}</span>
            <span id="user-phone">{{ Auth::user()->phone }}</span>
            <span></span>
            <span></span>
        </div>
        <br>

        <div class="dropdown-divider"></div>

        <div class="address">
            <span>{{ __('login.address') }}</span>
            <span id="user-address">{{ Auth::user()->address }}</span>
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

        <div class="dropdown-divider"></div>
        <br>


        <div class="opt-btn">
            <button class="btn bg-gradient-primary text-white" data-toggle="modal" data-target="#ModalUserEdit"> Edit
            </button>
        </div>
        <br>

    </div>

</div>

@include('modal.user.edit_user')
@include('modal.user.edit_user_image')
