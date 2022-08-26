@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')

        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif
        
        <! --Passenger -->
        <div class="passenger-container">
            <span class="dashboard-subtitle-settings">Passenger Information</span>
            <div class="passenger-title-container">
                <br>
                <span class="dashboard-subtitle-primary">Primary Passenger</span>
                <p class="email-description">A passenger type code provides the capability to specify fare related classifications for each passenger. </p>
                <br>
            </div>

            @foreach ($commuters as $commuter)

            <! --Primary Passenger -->
            <div class="primary-container">
                <details open class="dropdown-passenger-container">
                    <summary class="Username-passenger">Primary Passenger Name</summary>
                    <div class="passenger-information-container">

                        <form action="{{ route('account.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <! --Full Name -->
                        <div class="passenger-name-container">
                            <center>
                                <br>
                                <input class="textbox primarytxtbx" name="comm_fname" type="text" placeholder="First Name" value="{{ $commuter->comm_fname }}">
                                <input class="textbox primarytxtbx" name="comm_lname" type="text" placeholder="Last Name" value="{{ $commuter->comm_lname }}">
                            </center>
                        </div>
                        <div class="subheading-informaiton-container">
                            
                            <! -- dropdown gender -->
                            <div class="gender-dropdown">
                                <div class="gender-select-box">
                                      <div class="gender-container">
                                            <div class="gender">
                                              <input type="radio" class="radio" id="Female" name="category" value=""/>
                                              <label for="Female">Female</label>
                                        </div>
                                        <div class="gender">
                                              <input type="radio" class="radio" id="Male" name="category" value=""/>
                                              <label for="Male">Male</label>
                                        </div>
                                        <div class="gender">
                                              <input type="radio" class="radio" id="Others" name="category" value=""/>
                                              <label for="Others">Others</label>
                                        </div>
                                      </div>
                                      <div class="selected-gender">Select</div>
                                    </div>
                            </div>

                            <! -- Phone Number -->
                            <div class="phone-number-container">
                                <span class="iconify-inline phone" data-icon="twemoji:flag-philippines" data-width="22" data-height="22"></span>
                                <input class="textbox accountphone" type="text" placeholder="Phone Number" name="comm_phone" value="{{ $commuter->comm_phone }}">
                            </div>
                        </div>

                    </div>
                    	
                    <center>
                        <button type="submit" class="button account save-changes-account"> <a href="#modalWindowChangesAccount">Save Changes</button>
                    </center>

                    </form>

                    <br><br><br>
                </details>
            </div>

            @endforeach

        </div>

        <! -- SAVE CHANGES MODAL -->
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
                                <button class="choice-1">Yes</button>
                                <button class="choice-2">No</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <! -- EXIT MODAL -->
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
                          		<button class="choice-1"><a href="" class="choices-1">Yes</button></a>
                            	<button class="choice-2"><a href="" class="choices-2">No</a></button>
                        	</center>
                    	</div>
                	</div>
            	</div>
        	</div>
    	</div>
            
        @endsection

@endsection