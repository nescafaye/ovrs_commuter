@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Main Section -->
	{{-- <main  class="l-main">
		<section class="settings section bd-container">
    		<span class="dashboard-title register">Create an account</span>
    		<div class="registration-container">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="full-name-container">
                        <input class="textbox register-account" type="text" name="comm_fname" placeholder="{{ __('First Name') }}" value="{{ old('comm_fname') }}">
                        <input class="textbox register-account" type="text" name="comm_lname" placeholder="{{ __('Last Name') }}" value="{{ old('comm_lname') }}> 
                        
                        @error('comm_fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    
                    <input class="textbox register-account" type="email" name="comm_mail" placeholder="{{ __('Email Address') }}" value="{{ old('comm_mail') }}">
                    
                        @error('comm_mail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    <input class="textbox register-account" type="text" name="comm_un" placeholder="{{ __('Username') }}" value="{{ old('comm_un') }}">
                    
                        @error('comm_un')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <div class="registration-password-container">
                        <input class="textbox register-account" type="password" name="comm_pw" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input class="textbox register-account" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                    </div>

                    <input type="submit" class="button account" value="{{ __('Create Account') }}">
                    
                </form>

    		</div>
    	</section>
	</main> --}}

    <!-- Main Section -->
	<main  class="l-main registration_main">
		<section class="register section bd-container" id="Registration">
    		<span class="dashboard-title register">Create an account</span>
 			<div class="registration-container">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="full-name-container">
                        <input class="textbox register-txtbx" type="text" name="comm_fname" placeholder="{{ __('First Name') }}" value="{{ old('comm_fname') }}">
                            
                            @error('comm_fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <input class="textbox register-txtbx" type="text" name="comm_lname" placeholder="{{ __('Last Name') }}" value="{{ old('comm_lname') }}">

                    </div>

                    <input class="textbox register-txtbx" type="email" name="comm_mail" placeholder="{{ __('Email Address') }}" value="{{ old('comm_mail') }}">
                    
                        @error('comm_mail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <input class="textbox register-txtbx" type="text" name="comm_un" placeholder="{{ __('Username') }}" value="{{ old('comm_un') }}">
                
                    @error('comm_un')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="registration-password-container">
                        <input class="textbox register-txtbx" type="password" name="comm_pw" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        
                        @error('comm_pw')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input class="textbox register-txtbx" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                    </div>

                    {{-- <input type="submit" class="button account" value="{{ __('Create Account') }}"> --}}
                    <button type="submit" class="button account">{{ __('Create Account') }}</button>

                </form>

 			</div>
    	</section>
    	
	</main>


@endsection
