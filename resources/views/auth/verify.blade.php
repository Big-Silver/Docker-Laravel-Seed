@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 margin-nav">
            <div class="card">
                <div class="card-header">{{ __('auth.verifyEmail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success alert-block" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ __('auth.verifyLinkSent') }}
                    </div>
                    @endif

                    {{ __('auth.verifyCheck') }}
                    {{ __('auth.notReceiveVerify') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.requestanotherVerify') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection