@extends('layout/login')
@section('title')
    <title>{{ __('login-title') }}</title>
@endsection
@section('content-login')
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm-8 image"></div>
            <div class="col-sm-4 text-center align-self-center">
                {!! Form::open(['method' => 'POST', 'route' => ['login.2fa', $user->id], 'aria-label' => __('Login')]) !!}
                <div class="col-sm-12 form-group">
                    <i class="fas fa-lock mb-3" style="font-size: 8rem;color: #0275d8"></i>
                    <p class="h3">{{ __('otp-title') }}</p>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="code_verification" class="col-form-label">
                        {{ __('otp-title-code') }}
                    </label>
                    <input type="hidden" name="correo" value="{{ $user->email }}">
                    <input id="code_verification" type="number" min="0"
                        class="form-control{{ $errors->has('code_verification') ? ' is-invalid' : '' }}"
                        name="code_verification" value="{{ old('code_verification') }}" required autofocus>
                    @if ($errors->has('code_verification'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('code_verification') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">{{ __('button-get-into') }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
