
    <div class="forms">

        <div class="form login">

            <form action="{{ route('login') }}" method="POST" class="log-in-sign-in-form" autocomplete="off">
              @csrf

                <span class="title">Welcome!</span>

                @if(Session::has('error'))
                    <p class="alert alert-danger alert-dismissible fade show">{{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                    </p>
                @endif


                <div class="input-field form-group">
                    <input type="text" wire:model.lazy="username" placeholder="{{ __('Enter Username') }}" name="username" class="is-invalid" value="{{ old('username') }}" required autocomplete="username">
                    <span class="invalid-feedback"></span>
                    <i class="uil uil-user icon"></i>
                </div>
                
                    @error('username')
                        <span class="error-validation" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                <div class="input-field form-group pw">
                    <input type="password" wire:model.lazy="password" id="password-field" spellcheck="false" placeholder="{{ __('Enter Password') }}" name="password" class="password is-invalid" required>
                    <span class="invalid-feedback"></span>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash toggle-password" toggle="#password-field"></i>
                </div>

                    @error('password')
                        <span class="error-validation" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input class="form-check-input" name="remember" type="checkbox" id="logCheck" {{ old('remember') ? 'checked' : '' }}>
                        <label for="logCheck" class="form-check-label text"> {{ __('Keep me logged in') }}</label>
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
                  <button style="border:none" type="submit" class="button account">{{ __('Login') }}</button>
                </div>
            </form>

            <div class="socmed-button">

                <div class="row g-2">

                    <div class="col-12 or-sign-in">
                        <h5>&nbsp;or sign in with&nbsp;</h5>
                    </div>

                    <div class="col-9 social-login">
                        <button class="btn w-100 btn-light"><i class='bx bxl-google'></i><a class="google" href="{{ route('googleRedirect') }}" target="_blank">Continue with Google</a></button>
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

    <script src="../js/login.js"></script>
  
