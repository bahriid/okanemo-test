@extends('components.layout.auth', [
    'title' => 'Login',
])

@section('content')
<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" method="POST"  id="kt_sign_in_form" action="{{ route('login') }}">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">Admin Panel Dashboard</div>
                <!--end::Subtitle=-->
            </div>
            <div class="mb-15">
                <div>
                    <x-alert.validation/>
                    <x-alert.notification/>
                </div>
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Email-->
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-3">
                <!--begin::Password-->
                <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                <div></div>
                <!--begin::Link-->
                <a href="{{route('password.reset')}}" class="link-primary">Forgot Password ?</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" class="btn btn-lg btn-primary w-100">
                    Masuk
                </button>
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                <a href="../../demo35/dist/authentication/layouts/overlay/sign-up.html" class="link-primary">Sign up</a></div>
            <!--end::Sign up-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
</div>
@endsection
