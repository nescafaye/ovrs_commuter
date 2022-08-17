@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')
        
            <!--Passenger -->
            <div class="passenger-container">
                <span class="dashboard-subtitle-settings">Passenger Information</span>
                <div class="passenger-title-container">
                    <br>
                    <span class="dashboard-subtitle-primary">Primary Passenger</span>
                    <p class="email-description">A passenger type code provides the capability to specify fare related classifications for each passenger. </p>
                    <br>
                </div>


                <!--Primary Passenger -->
                <div class="primary-container">
                    <details class="dropdown-passenger-container">
                        <summary class="Username-passenger">Primary Passenger Name</summary>
                        <div class="passenger-information-container">
                            <div class="passenger-name-container">
                                <center>
                                    <br>
                                    @foreach ($commuters as $commuter)

                                    <input class="textbox primarytxtbx" type="text" placeholder="First Name" value="{{ $commuter->comm_fname }}">
                                    <input class="textbox primarytxtbx" type="text" placeholder="Last Name" value="{{ $commuter->comm_lname }}">
                                        
                                    @endforeach
  
                                </center>
                            </div>
        
                            <div class="subheading-informaiton-container">
                                
                                <!-- Dropdown gender -->
                                <div class="gender-dropdown">
                                    <div class="gender-select-box">
                                            <div class="gender-container">
                                                <div class="gender">
                                                    <input type="radio" class="radio" id="Female" name="category" />
                                                    <label for="Female">Female</label>
                                            </div>
                                            <div class="gender">
                                                    <input type="radio" class="radio" id="Male" name="category" />
                                                    <label for="Male">Male</label>
                                            </div>
                                            <div class="gender">
                                                    <input type="radio" class="radio" id="Others" name="category" />
                                                    <label for="Others">Others</label>
                                            </div>
                                            </div>
                                            <div class="selected-gender">Select</div>
                                        </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="phone-number-container">
                                    <span class="iconify-inline phone" data-icon="twemoji:flag-philippines" data-width="22" data-height="22"></span>
                                    <input class="textbox accountphone" type="text" placeholder="Phone Number" value="">
                                </div>
                            </div>
                        </div>	
                        <center>
                            <a href="#" class="button account save-changes">Save Changes</a>
                        </center>
                        <br><br><br>
                    </details>
                </div>
            </div>
            
        @endsection

@endsection