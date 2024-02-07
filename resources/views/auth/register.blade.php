@extends('layout/other')
@section('title')
    <title>{{ __('register-title') }}</title>
@endsection
@section('content-other')
    <div class="container-login100 image">
        <div class="wrap-login100 col-sm-6">
            {!! Form::open(['url' => 'register']) !!}
            <div class="row">
                <div class="col-sm-12 form-group">
                    <span class="login100-form-logo mb-3">
                        <i class="fas fa-user-circle" style="font-size: 7rem;color: #0275d8"></i>
                    </span>
                </div>
                <div class="col-sm-12 form-group">
                    <span class="login100-form-title">
                        {{ __('label-register') }}
                    </span>
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('label-name-title', __('label-name-title')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('label-email', __('label-email')) !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required']) !!}
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('label-password', __('label-password')) !!}
                    {!! Form::password('password', [
                        'class' => 'form-control',
                        'placeholder' => __('label-password'),
                        'required',
                        'id' => 'passwordInput1',
                    ]) !!}
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('label-password-confirm-title', __('label-password-confirm-title')) !!}
                    {!! Form::password('password_confirmation', [
                        'class' => 'form-control',
                        'placeholder' => __('label-password-confirm-title'),
                        'id' => 'passwordInput2',
                        'required',
                    ]) !!}
                </div>
                <div class="col-sm-12 form-group">
                    <input type="checkbox" id="showPassword" name="showPassword" onclick="togglePasswordVisibility()">
                    {{ __('label-show-password') }}
                </div>
                <div class="col-sm-12 form-group">
                    {!! Form::submit(__('button-create-account'), ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                    <a class="btn btn-danger btn-lg btn-block" href="{{ url('/') }}">{{ __('button-back') }}</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function togglePasswordVisibility() {
            var passwordInput1 = document.getElementById("passwordInput1");
            var passwordInput2 = document.getElementById("passwordInput2");

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
