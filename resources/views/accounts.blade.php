@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')
        
        <!-- Passenger -->
        <div class="passenger-container">
            
            <div class="flash-message">

                @if (session('success'))
                        <p class="success-msg msg"><span class="iconify-inline" data-icon="bi:check-circle" data-width="17" data-height="17"></span> {{ session('success') }}</p>   
                
                @elseif (session('error'))
    
                        <p class="error-msg msg"><span class="iconify-inline" data-icon="bi:exclamation-circle" data-width="17" data-height="17"></span> {{ session('error') }}</p>
    
                @endif
    
                </div>

            <span class="dashboard-subtitle-settings">Passenger Information</span>
            <div class="passenger-title-container">
                <br>
                <span class="dashboard-subtitle-primary">Primary Passenger</span>
                <p class="email-description">A passenger type code provides the capability to specify fare related classifications for each passenger. </p>
                <br>
            </div>

            @foreach ($commuters as $commuter)

            <!-- Primary Passenger -->
            <div class="primary-container">
                <details open class="dropdown-passenger-container">
                    <summary class="Username-passenger">Primary Passenger Name</summary>
                    <div class="passenger-information-container">

                        <form action="{{ route('account.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Full Name -->
                        <div class="passenger-name-container">
                            <center>
                                <br>
                                <input class="textbox primarytxtbx" name="comm_fname" type="text" placeholder="First Name" value="{{ $commuter->comm_fname }}">
                                <input class="textbox primarytxtbx" name="comm_lname" type="text" placeholder="Last Name" value="{{ $commuter->comm_lname }}">
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
                                           {{ $commuter->gender }}
                                      </div>
                                    </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="phone-number-container">
                                <span class="iconify-inline phone" data-icon="twemoji:flag-philippines" data-width="12" data-height="12"></span>
                                <input class="textbox accountphone" type="text" placeholder="Phone Number" name="comm_phone" value="{{ $commuter->comm_phone }}">
                            </div>
                        </div>

                    </div>
                    	
                    <center>
                        <button onclick="openModal()" type="submit" class="button account save-changes-account"> <a href="#modalWindowChangesAccount">Save Changes</button>
                    </center>
                    

                    </form>

                    <br><br><br>
                </details>
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

         <!-- EXIT MODAL -->
    	<div id="modalWindowExit" class="">
        	<div>
            	<header>
                	<div class="close">
                    	<a href="#close" class="exit"><i class="uil uil-times"></i></a>
                	</div>
               	 	<br>
            		<center>
               	 		<img src="Images/offline.png" class="modal-img-logout"> 
                	</center>
                    <br>
                	<center>
                     	<span class="dashboard-subtitle-modal">Are you sure you want to Log out?</span>
                	</center>
                	<br>
            	</header>
            	<div class="content">
                	<div class="field">
                    	<div class="modal-choice">
                        	<center>
                          		<button type="submit" class="choice-1">Yes</button>
                            	<button class="choice-2"><a href="#close" class="choices-2">No</a></button>
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
        </script>
            
        @endsection

@endsection