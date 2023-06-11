@if (session()->has('success'))
    <div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        {!! Themes::svgIcon('general/gen043.svg', 'svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0') !!}
        <div class="d-flex flex-column pe-0 pe-sm-10 text-light">
            <h4 class="fw-semibold text-light">Notifikasi!</h4>
            <span>{!! session('success') !!}</span>
        </div>
        <button type="button"
                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
            {!! Themes::svgIcon('arrows/arr088.svg', 'svg-icon svg-icon-2hx svg-icon-light') !!}
        </button>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        {!! Themes::svgIcon('general/gen044.svg', 'svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0') !!}
        <div class="d-flex flex-column pe-0 pe-sm-10 text-light">
            <h4 class="fw-semibold text-light">Upss! Terjadi Kesalahan</h4>
            <span>{!! session('error') !!}</span>
        </div>
        <button type="button"
                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
            {!! Themes::svgIcon('arrows/arr088.svg', 'svg-icon svg-icon-2hx svg-icon-light') !!}
        </button>
    </div>
@endif
