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
        <div class="btn active"></div>
        <div class="btn"></div>
        <div class="btn"></div>
      </div>
    </div>

    <script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    let currentSlide = 1;

    // Javascript for image slider manual navigation
    var manualNav = function(manual){
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
          btn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
      });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) => {
            activeSlide.classList.remove('active');
          });

        slides[i].classList.add('active');
        btns[i].classList.add('active');
        i++;

        if(slides.length == i){
          i = 0;
        }
        if(i >= slides.length){
          return;
        }
        repeater();
      }, 10000);
      }
      repeater();
    }
    repeat();
    </script>

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
                        <input type="email" placeholder="{{ __('Enter Email') }}" name="email" class="is-invalid" value="{{ old('email') }}" required autocomplete="email">
                        <span class="invalid-feedback"></span>
                        <i class="uil uil-envelope icon"></i>

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                    </div>

                    <div class="input-field form-group">
                        <input type="password" id="password-field" spellcheck="false" placeholder="{{ __('Enter Password') }}" name="password" class="password is-invalid" required>
                        <span class="invalid-feedback"></span>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash toggle-password" toggle="#password-field"></i>
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
                            <button class="btn w-100 btn-light"><i class='bx bxl-google'></i>Sign in with Google</button>
                        </div>

                        <div class="col-3 social-login">
                            <button class="btn w-100 btn-primary fb"><i class='bx bxl-facebook'></i></button>
                        </div>


                    </div>

                </div>

                <div class="login-signup">
                    <span class="text">Don't have an account?
                        <a href="#" class="text signup-link">Register Now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <!-- Always remember to call the above files first before calling the bootstrap.min.js file -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    <!-- Show password function -->

    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("uil-eye uil-eye-slash");

            var input = $($(this).attr("toggle"));

            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });
    </script>
@endsection
