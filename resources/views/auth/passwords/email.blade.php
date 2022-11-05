@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<main  class="l-main">
    <section class="section bd-container reset-container">

        <span class="dashboard-title register reset-title">Reset Password</span>

        <div class="flash-message" id="flash">

            @if (session('status'))

                <div class="success-msg msg"> 
                    <div class="msg-txt">
                        <iconify-icon inline icon="bi:check-circle" class="iconify-inline" width="20" height="19"></iconify-icon>
                        <span class>{{ session('status') }}</span>
                    </div>
                    <span class="iconify-inline dismiss" onclick="closeMsg()" data-icon="akar-icons:circle-x" data-width="19" data-height="19"></span>
                </div>

            @endif

        </div>

        <div class="reset-msg">Enter the email address associated with your account and we'll send you a link to reset your password.</div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <input class="textbox register-txtbx form-control @error('email') is-error @enderror" type="email" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">
                    
            @error('email')

                <div class="error-validation " role="alert">
                    {{ $message }}
                </div>
            
            @enderror

            <button style="border:none" type="submit" class="button account">{{ __('Send Password Reset Link') }}</button>
        </form>

    </section>

</main>
@endsection
