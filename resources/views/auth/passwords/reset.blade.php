@extends('layout/other')
@section('title')
    <title>{{ __('forgot-you-title') }}</title>
@endsection
@section('content-other')
    <div class="container-login100 image">
        <div class="wrap-login100 col-sm-6">
            {!! Form::open(['method' => 'POST', 'route' => 'password.update']) !!}
            <div class="row">
                <div class="col-sm-12 form-group">
                    <span class="login100-form-logo mb-3">
                        <i class="fas fa-user-circle" style="font-size: 7rem;color: #0275d8"></i>
                    </span>
                </div>
                <div class="col-sm-12 form-group">
                    <span class="login100-form-title p-b-34 p-t-27 mb-3">
                        {{ __('label-forgot-you-create-password') }}
                    </span>
                </div>
                <div class="col-sm-12">
                    @include('FlashMessage/message')
                </div>
                <div class="col-sm-4 form-group">
                    <label for="email" class="col-form-label text-md-right">{{ __('label-email') }}</label>
                </div>
                <div class="col-sm-8 form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-4 form-group">
                    <label for="password" class="col-form-label text-md-right">{{ __('label-password') }}</label>
                </div>
                <div class="col-sm-8 form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-4 form-group">
                    <label for="password-confirm"
                        class="col-form-label text-md-right">{{ __('label-password-confirm-title') }}</label>
                </div>
                <div class="col-sm-8 form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
                <div class="col-sm-4 form-group">
                    <label>{{ __('label-show-password') }}</label>
                </div>
                <div class="col-sm-8 form-group">
                    <input type="checkbox" id="showPassword" name="showPassword" onclick="togglePasswordVisibility()">
                    {{ __('label-show-password') }}
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('label-forgot-you') }}
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function togglePasswordVisibility() {
            var passwordInput1 = document.getElementById("password");
            var passwordInput2 = document.getElementById("password-confirm");

            if (passwordInput1.type === "password" && passwordInput2.type === "password") {
                passwordInput1.type = "text";
                passwordInput2.type = "text";
            } else {
                passwordInput1.type = "password";
                passwordInput2.type = "password";
            }
        }
    </script>
@endpush
