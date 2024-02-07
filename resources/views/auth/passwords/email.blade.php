@extends('layout/other')
@section('title')
    <title>{{ __('forgot-you-title') }}</title>
@endsection
@section('content-other')
    <div class="container-login100 image">
        <div class="wrap-login100 col-sm-6">
            {!! Form::open(['route' => 'password.email']) !!}
            <span class="login100-form-logo mb-3">
                <i class="fas fa-user-circle" style="font-size: 7rem;color: #0275d8"></i>
            </span>
            <span class="login100-form-title p-b-34 p-t-27 mb-3">
                {{ __('label-forgot-you') }}
            </span>
            <div class="row">
                <div class="col-sm-12 form-group">
                    {!! Form::label('Correo Electrónico', __('label-email')) !!}
                    {!! Form::email('email', old('email'), [
                        'class' => 'form-control',
                        'placeholder' => __('label-email'),
                        'required',
                    ]) !!}
                </div>
            </div>
            <div class="col-sm-12">
                @include('FlashMessage/message')
            </div>
            <div class="col-12 form-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('button-forgot-you-restore') }}</button>
            </div>
            <div class="col-sm-12 mb-3">
                <a class="btn btn-danger btn-lg btn-block mb-5" href="{{ url('/') }}">{{ __('button-back') }}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
