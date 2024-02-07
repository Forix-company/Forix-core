@extends('layout/login')
@section('title')
    <title>{{ __('login-title') }}</title>
@endsection
@section('content-login')
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm-8 image"></div>
            <div class="col-sm-4 text-center align-self-center">
                {!! Form::open(['url' => 'login']) !!}
                <div class="col-sm-12">
                    <i class="fas fa-user-circle mb-3" style="font-size: 8rem;color: #0275d8"></i>
                    <p class="h3">{{ __('label-account') }}
                    </p>
                </div>
                <div class="col-sm-12">
                    @include('FlashMessage/message')
                </div>
                <div class="col-sm-12 form-group">
                    {!! Form::label('login-email', __('label-email')) !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
                </div>
                <div class="col-sm-12 form-group mb-3">
                    {!! Form::label('login-password', __('label-password')) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => 'Contraseña']) !!}
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('label-forgot-you-password') }}
                            </a>
                        @endif
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('label-remember-me') }}</label>
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <button class="btn btn-primary btn-lg btn-block">{{ __('button-get-into') }}</button>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ url('register') }}">{{ __('button-register') }}</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var alertElement = document.getElementById('myAlert');
        if (alertElement) {
            setTimeout(hideElement, 3000);
        }

        function hideElement() {
            var alertElement = document.getElementById('myAlert');
            alertElement.style.display = 'none';
        }
    </script>
@endpush
