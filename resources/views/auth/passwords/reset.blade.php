@extends('components.layout.auth', [
    'title' => 'Reset Password',
])

@section('content')
    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
        <!--begin::Wrapper-->
        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" method="POST" id="kt_sign_in_form"
                  action="{{ route('password.update') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Lupa Password ?
                    </h1>
                    <!--end::Title-->
                    <!--begin::Subtitle-->
                    <div class="text-gray-500 fw-semibold fs-6">Masukkan email Anda untuk mengatur ulang password Anda.
                    </div>
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
                <div class="fv-row mb-3">
                    <!--begin::Email-->
                    <input type="hidden" name="token" value="{{ $token }}">

                    <input type="text" placeholder="Email" name="email" autocomplete="off" value="{{ $email ?? old('email') }}"
                           class="form-control bg-transparent"/>
                    <!--end::Email-->
                </div>
                <!--end::Input group=-->
                <div class="fv-row mb-3">
                    <!--begin::Password-->
                    <input type="password" placeholder="Password" name="password" autocomplete="off"
                           class="form-control bg-transparent"/>
                    <!--end::Password-->
                </div>
                <!--end::Input group=-->
                <div class="fv-row mb-3">
                    <!--begin::Password-->
                    <input type="password" placeholder="Password Confirmation" name="password_confirmation" autocomplete="off"
                           class="form-control bg-transparent"/>
                    <!--end::Password-->
                </div>
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button type="submit" class="btn btn-lg btn-primary w-100">
                        {{ __('Reset Password') }}
                    </button>
                </div>
                <!--end::Submit button-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
