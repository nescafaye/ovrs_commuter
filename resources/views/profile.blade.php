@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')
        
        <!-- Passenger -->
        <div class="passenger-container">
            
            <div class="flash-message" id="flash">

                @if (session('success'))
                
                        <div class="success-msg msg"> 
                            <div class="msg-txt">
                                <iconify-icon icon="bi:check-circle" class="iconify-inline" width="20" height="17"></iconify-icon>
                                <span class>{{ session('success') }}</span>
                            </div>
                            <span class="iconify-inline dismiss" onclick="closeMsg()" data-icon="akar-icons:circle-x" data-width="19" data-height="19"></span>
                        </div>
                    
                @elseif (session('error'))
                        
                        <div class="error-msg msg">
                            <div class="msg-txt">
                                <span class="iconify-inline" data-icon="bi:exclamation-circle" data-width="17" data-height="17"></span> 
                                <span class>{{ session('error') }}</span>
                            </div>

                            <span class="iconify-inline dismiss" onclick="closeMsg()" data-icon="akar-icons:circle-x" data-width="19" data-height="19"></span>
                        </div>
    
                @endif
    
            </div>

            <span class="dashboard-subtitle-settings">Basic Information</span>
            <div class="passenger-title-container">
                <br>
                <span class="dashboard-subtitle-primary">Primary Commuter</span>
                <p class="email-description">A passenger type code provides the capability to specify fare related classifications for each passenger. </p>
                <br>
            </div>

            @foreach ($commuters as $commuter)

            <!-- Primary Passenger -->
            <div class="primary-container">
                <details open class="dropdown-passenger-container">
                    <summary class="Username-passenger">
                        <span>{{ $commuter->fname }} {{ $commuter->lname }}</span>
                        <img src="{{ asset('assets/arrowdown.svg')}}" width="14" height="14" alt="">
                    </summary>

                    <div class="passenger-information-container">

                        <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Full Name -->
                        <div class="passenger-name-container">
                            <center>
                                <br>
                                <input class="textbox primarytxtbx" name="fname" type="text" placeholder="First Name" value="{{ $commuter->fname }}">
                                <input class="textbox primarytxtbx" name="lname" type="text" placeholder="Last Name" value="{{ $commuter->lname }}">
                            </center>
                        </div>

                        <div class="subheading-informaiton-container">
                            
                            <!-- dropdown gender -->
                            <div class="gender-dropdown">
                                <div class="gender-select-box">
                                      <div class="gender-container">
                                        
                                        <div class="gender">
                                            <label class="gender-lbl">
                                                <input type="radio" class="radio" id="Female" name="gender" value="Female"/>
                                                {{ __('Female') }}
                                            </label>
                                        </div>

                                        <div class="gender">
                                            <label class="gender-lbl">
                                                <input type="radio" class="radio" id="Male" name="gender" value="Male"/>
                                                {{ __('Male') }}
                                            </label>
                                        </div>

                                        <div class="gender">
                                            <label class="gender-lbl">
                                                <input type="radio" class="radio" id="Female" name="gender" value="Others"/>
                                                {{ __('Others') }}
                                            </label>
                                        </div>
                                      </div>

                                      <div class="selected-gender">

                                        @if(empty($commuter->gender))
                                            Select
                                        @else
                                            {{ $commuter->gender }}
                                        @endif

                                      </div>

                                    </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="phone-number-container">
                                {{-- <span class="iconify-inline phone" data-icon="twemoji:flag-philippines" data-width="12" data-height="12"></span> --}}
                                <input class="textbox accountphone" id="phone" type="text" placeholder="Phone Number" name="phone" value="{{ $commuter->phone }}" onclick="shwPass()">
                            </div>
                        </div>

                    </div>

                    <br><br><br>
                </details>

                <center>
                    <button onclick="openModal()" type="submit" class="button account save-changes-account"> <a href="#modalWindowChangesAccount">Save Changes</button>
                </center>
            </form>
                
            </div>

            @endforeach

        </div>

        <!-- SAVE CHANGES MODAL -->
        <div id="modalWindowChangesAccount" class="">
            <div>
                <header>
                    <div class="close">
                    	<a href="#close" class="exit"><i class="uil uil-times"></i></a>
                    </div>
                    <br>
                    <center>
                        <img src="{{ asset('assets/save.png')}}" class="modal-img-save"> 
                    </center>
                    <br>
                    <center>
                    	<span class="dashboard-subtitle-modal">Are you sure you want to make changes?</span>
                    </center>
                    <br>
               </header>
               <div class="content">
                    <div class="field">
                        <div class="modal-choice">
                            <center>
                                <button type="submit" class="choice-1">Yes</button>
                                <button class="choice-2"><a href="#close" class="choice">No</a></button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Gender Dropdown Scripts -->
        <script type="text/javascript">

            const selectedGender = document.querySelector(".selected-gender");
            const genderContainer = document.querySelector(".gender-container");
            const optionsGender = document.querySelectorAll(".gender");
            selectedGender.addEventListener("click", () => {
                genderContainer.classList.toggle("active");
            });

            optionsGender.forEach(o => {
                o.addEventListener("click", () => {
                    selectedGender.innerHTML = o.querySelector("label").innerHTML;
                    genderContainer.classList.remove("active");
                });
            });

            function closeMsg() {
                document.getElementById("flash").style.display = "none";

            }

            // function shwPass() {
            //     document.getElementById(phone)
            // }


        </script>
        
        <script>
            
            $("button").hide();

            $(function(){ // document ready function
            $("form").change(function() { // form change (checkboxes, radiobuttons etc)
                $("button").show();
            });

            $("input").keyup(function() { // something typed in a textbox
                
                // $('input').blur(function()
                // {
                //     if( $(this).val() == '' ) {
                //             $("button").hide();
                //     }
                // });
                
                if ($("input") == $("input").val()) {
                    $("button").hide();

                }
                
                else {
                    $("button").show();
                }

                // $("button").show();
            });
            });


        </script>
            
        @endsection

@endsection