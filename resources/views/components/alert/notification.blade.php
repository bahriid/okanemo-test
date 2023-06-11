@if (session()->has('success'))
    <div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        <div class="d-flex flex-column pe-0 pe-sm-10 text-light">
            <h4 class="fw-semibold text-light">Notifikasi!</h4>
            <span>{!! session('success') !!}</span>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        <div class="d-flex flex-column pe-0 pe-sm-10 text-light">
            <h4 class="fw-semibold text-light">Upss! Terjadi Kesalahan</h4>
            <span>{!! session('error') !!}</span>
        </div>
    </div>
@endif
