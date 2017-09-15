
@if (Session::has('flash_success_msg'))
    <div class="col-md-12 ">
        <div class="alert alert-success fade in" align="center" id="success-alert">
            <button class="close" data-dismiss="alert">
                ×
            </button>
            <i class="fa-fw fa fa-check"></i>
            <strong>Success!!!</strong> {{ Session::get('flash_success_msg') }}.
        </div>
    </div>
@elseif(Session::has('flash_warning_msg'))
    <div class="col-md-12 ">
        <div class="alert alert-warning fade in" align="center" id="warning-alert">
            <button class="close" data-dismiss="alert">
                ×
            </button>
            <strong>Warning!!!</strong> {{ Session::get('flash_warning_msg') }}.
        </div>
    </div>
@endif
