@extends('layouts.app')

@section('content')

    <!-- Main Section -->
	<main  class="l-main registration_main">
		<section class="register section bd-container" id="Registration">
    		<span class="dashboard-title register">Create an account</span>
 			<div class="registration-container">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="full-name-container">
                        <input class="textbox register-txtbx" type="text" name="comm_fname" placeholder="{{ __('First Name') }}" value="{{ old('comm_fname') }}" required autocomplete="given-name">
                            
                            @error('comm_fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <input class="textbox register-txtbx" type="text" name="comm_lname" placeholder="{{ __('Last Name') }}" value="{{ old('comm_lname') }}" required autocomplete="family-name">

                    </div>

                    <input class="textbox register-txtbx" type="email" name="comm_mail" placeholder="{{ __('Email Address') }}" value="{{ old('comm_mail') }}" required>
                    
                        @error('comm_mail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <input class="textbox register-txtbx" type="text" name="comm_un" placeholder="{{ __('Username') }}" value="{{ old('comm_un') }}" required>
                
                    @error('comm_un')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="registration-password-container">
                        <input class="textbox register-txtbx" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input class="textbox register-txtbx" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                    </div>

                    {{-- <input type="submit" class="button account" value="{{ __('Create Account') }}"> --}}
                    <button style="border:none" type="submit" class="button account">{{ __('Create Account') }}</button>

                </form>

 			</div>
    	</section>
    	
	</main>


@endsection
