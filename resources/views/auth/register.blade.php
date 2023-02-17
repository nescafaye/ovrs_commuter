@extends('layouts.app')

@section('content')

    <!-- Main Section -->
	<main  class="l-main registration_main">
		<section class="register section bd-container" id="Registration">
    		<span class="dashboard-title register">Create an account</span>
 			<div class="registration-container">

                <form method="POST" action="{{ route('register') }}" >
                    @csrf

                    <div class="full-name-container">

                        <div>
                        <input class="textbox register-txtbx form-control @error('fname') is-error @enderror" type="text" name="fname" placeholder="{{ __('First Name') }}" value="{{ old('fname') }}" autocomplete="given-name">
                        
                        </div>

                        @error('fname')
                     
                        <div class="error-validation" role="alert">
                            {{ $message }}
                        </div> 
        
                        @enderror

                        <div>
                        <input class="textbox register-txtbx form-control @error('lname') is-error @enderror" type="text" name="lname" placeholder="{{ __('Last Name') }}" value="{{ old('lname') }}" autocomplete="family-name">
                           
                        </div>

                        @error('lname')
                        
                        <div class="error-validation " role="alert">
                            {{ $message }}
                        </div>
        
                        @enderror

                    </div>

                    <input class="textbox register-txtbx form-control @error('email') is-error @enderror" type="email" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">
                    
                        @error('email')

                            <div class="error-validation " role="alert">
                                {{ $message }}
                            </div>
                        
                        @enderror

                    <input class="textbox register-txtbx form-control @error('username') is-error @enderror" type="text" name="username" placeholder="{{ __('Username') }}" value="{{ old('username') }}" required autocomplete="username">
                
                    @error('username')
                            <div class="error-validation" role="alert">
                                    {{ $message }}
                            </div>
                    @enderror

                    <div class="registration-password-container ">
                        <input class="textbox register-txtbx form-control @error('password') is-error @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    

                        <input class="textbox register-txtbx" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                    </div>

                    @error('password')
                    <div class="error-validation " role="alert">
                        {{ $message }}
                    </div>
                @enderror

                    {{-- <input type="submit" class="button account" value="{{ __('Create Account') }}"> --}}
                    <button style="border:none" type="submit" class="button account">{{ __('Create Account') }}</button>

                </form>

 			</div>
    	</section>
    	
	</main>


@endsection
