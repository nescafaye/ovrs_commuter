@extends('layouts.app')

@section('content')
<div class="login container">

    <div class="img-slider">
      <div class="slide active">
        <img src="{{ asset('assets/illus-1.svg') }}" alt="">
        <div class="info">
          <h2>Fastest way to rent</h2>
          <p>VanGO is the fastest way to rent a van or reserve a seat since nowadays, almost everyone is using their gadgets, specifically smartphones to transact with their own businesses.</p>
        </div>
      </div>
      <div class="slide">
        <img src="{{ asset('assets/illus-2.svg') }}" alt="">
        <div class="info">
          <h2>Easy to use</h2>
          <p>VanGo app has simple design, a seamless checkout process, and intuitive navigation that make the app easy and enjoyable to use.</p>
        </div>
      </div>
      <div class="slide">
        <img src="{{ asset('assets/illus-3.svg') }}" alt="">
        <div class="info">
          <h2>Setting up made easier</h2>
          <p>We provide a better user experience while using fewer resources by creating a simple UX design that focuses on critical functions. We prefer to complete tasks quickly and easily with onlya few taps, so setting up has been simplified.</p>
        </div>
      </div>
    
      <div class="navigation">
        <div class="btn_slider active"></div>
        <div class="btn_slider"></div>
        <div class="btn_slider"></div>
      </div>
    </div>

        <div class="forms">

            <div class="form login">

                <?php
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger alert-dismissible">' . $login_err . '<a href="#" class="close" style="text-decoration:none; color: gray; position:relative; right: -13%; padding: 0 2px; border-radius:10px;" data-dismiss="alert" aria-label="close">&times;</a> </div>';
                }
                ?>

                <form action="{{route('login')}}" method="POST" class="log-in-sign-in-form" autocomplete="off">
                  @csrf

                    <span class="title">Welcome!</span>

                    <div class="input-field form-group">
                        <input type="text" placeholder="{{ __('Enter Username') }}" name="comm_un" class="is-invalid" value="{{ old('comm_un') }}" required autocomplete="username">
                        <span class="invalid-feedback"></span>
                        <i class="uil uil-envelope icon"></i>

                        @error('comm_un')
                          <span class="invalid-feedback" role="alert">
                              <strong>Username Error</strong>
                          </span>
                        @enderror

                    </div>

                    <div class="input-field form-group pw">
                        <input type="password" id="password-field" spellcheck="false" placeholder="{{ __('Enter Password') }}" name="comm_pw" class="password is-invalid" required>
                        <span class="invalid-feedback"></span>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash toggle-password" toggle="#password-field"></i>

                        @error('comm_pw')
                          <span class="invalid-feedback" role="alert">
                              <strong>Password Error</strong>
                          </span>
                        @enderror

                    </div>

                    <!-- <div class="Forgot-password">
                        <a href="#" class="forgot-pw">Forgot Password?</a>
                    </div> -->


                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text">
                              {{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>

                    <!-- <div class="check">
                              <div class="ckbox"><input type="checkbox" name="chckBox"></div>
                              <p>I Accept the <span><a href="#" style="font-decoration: none;">Terms of use</a>.</span></p>
                    </div> -->

                    <div class="input-field button-login form-group">
                        <input type="submit" name="btnLogin" value="{{ __('Login') }}">
                    </div>
                </form>

                <div class="socmed-button">

                    <div class="row g-2">

                        <div class="col-12">
                            <h5>&nbsp;or sign in with&nbsp;</h5>
                        </div>

                        <div class="col-9 social-login">
                            <button class="btn w-100 btn-light"><i class='bx bxl-google'></i><span>Sign in with Google</span></button>
                            <a href="{{ route('googleRedirect') }}" class="text signup-link">Sign in with Google</a>
                        </div>

                        <div class="col-3 social-login">
                            <button class="btn w-100 btn-primary fb"><i class='bx bxl-facebook'></i></button>
                        </div>

                    </div>

                </div>

                <div class="login-signup">
                    <span class="text">Don't have an account?
                        <a href="{{ route('register') }}" class="text signup-link">Register Now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>

@endsection
