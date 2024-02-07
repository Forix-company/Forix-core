@extends('layout/other')
@section('title')
    <title>{{ __('verify-title') }}</title>
@endsection
@section('content-other')
    <div class="container-login100">
        <div class="wrap-login100 col-sm-6">
            <div class="card">
                <div class="card-header">{{ __('verify-email') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('verify-subtitle') }}
                        </div>
                    @endif
                    {{ __('verify-subtitle-two') }}
                    {{ __('verify-subtitle-tree') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('verify-send-email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
