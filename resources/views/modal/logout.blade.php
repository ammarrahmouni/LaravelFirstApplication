<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('home.ready_leave') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ __('home.logout_paragraph') }}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('home.cancel') }}</button>
                    <button type="submit" class="btn btn-primary btn-logout">{{ __('login.logout') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

