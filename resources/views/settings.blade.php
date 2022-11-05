@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')

        <!-- Settings Container -->
        <div class="settings_container">

            <div class="flash-message" id="flash">

                @if (session('success'))
                
                        <div class="success-msg msg"> 
                            <div class="msg-txt">
                                <iconify-icon inline icon="bi:check-circle" class="iconify-inline" width="20" height="17"></iconify-icon>
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

            <span class="dashboard-subtitle-settings">Account Information</span>

            @foreach ($commuters as $commuter)

            <form action="{{ route('settings.edit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}

            <div class="settings-container">

            <div class="settings-information">

                <!-- Email -->
                <div class="email-container">
                    <br>
                    <span class="dashboard-subtitle-email">Email Address</span>
                    <p class="email-description">This is where your confirmation email, tickets, and notifications will be sent</p>
                    <input class="textbox txtemail acct" type="text" name="email" placeholder="{{ __('Email') }}" value="{{ $commuter->email }}">
                </div>

                <!-- Username -->
                <div class="username-container">
                    <br>
                    <span class="dashboard-subtitle-username">Username</span>
                    <input class="textbox txtusername acct" type="text" name="username" placeholder="{{ __('Username') }}" value="{{ $commuter->username }}">
                </div>

            </div>

            <div class="settings-profile">
                @if (empty($commuter->profilePic))
                <img class="prof-pic" src="{{ asset('assets/default-avatar.png') }}" alt="avatar">
                @else
                    <img class="prof-pic" src="{{ asset('storage/images/'. $commuter->profilePic) }}" alt="avatar">
                @endif

                <input type="file" accept="image/*" name="profilePic" id="" class="file-upload">
                <div class="admin-profile-button" class="profile-admin">
                    <button type="submit" class="upload-profile">Upload</button>
                    <br>
                    <button class="remove-profile">Remove</button>
                </div>

            </div>

            </div>

            <button type="submit" class="button account save-changes-account"> <a href="#modalWindowChangesAccount">Save Changes</a></button>

            <!-- Password -->
            <div class="password-container">
                 <br>
                    <span class="dashboard-subtitle-password">Password</span>
                    <p class="password-description">Enter these fields to update your password</p>
                            <input class="textbox pass" name="password" type="password" placeholder="{{ __('Current Password') }}">
                        <div class="new-password">
                            <input class="textbox pass new-pass" name="password" type="password" placeholder="{{ __('New Password') }}">
                            <input class="textbox pass new-pass" name="password_confirmation" type="password" placeholder="{{ __('Confirm Password') }}">
                        </div>
                    <a href="{{ route('password.update') }}" class="password-button">Forgot Password?</a>
                <br><br>

                <button type="submit" class="button account save-pass"> <a href="#modalWindowChangesAccount">Save Changes</a></button>
               
            </div>

            </form>

            <!-- Notification Container -->
            <div class="notification-container">
                <br><hr style="opacity: 0.2; border: 0.1px solid; border-radius:5px;"><br>
                <span class="dashboard-subtitle-settings">Notification</span>

                <!-- Email -->
                <div class="email-notification-container">
                    <div class="email-description-container">
                        <span class="dashboard-subtitle-email">Email</span>
                        <p class="email-description">Receive updates, notifications, upcoming events, and offers in my email.</p>
                    </div>
                    <input class="apple-switch email" type="checkbox" checked>
                </div>

                {{-- <!-- SMS -->
                <div class="notification-sms-container">
                    <div class="sms-description-container">
                        <br><br>
                        <span class="dashboard-subtitle-sms">SMS</span>
                        <p class="sms-description">Receive updates, notifications, upcoming events, and offers in my mobile number.</p>
                    </div>
                    <input class="apple-switch sms" type="checkbox">
                </div> --}}
            </div>

            <!-- Billing Container -->
            <div class="Billing-container">
                <br><hr style="opacity: 0.2; border: 0.1px solid; border-radius:5px;"><br>
                <span class="dashboard-subtitle-settings">Billing Details</span>
                <p class="billing-description">Let’s make your everyday payments safe & easy through <mark class="gcash-highlight">GCash</mark></p><br>
                <details open class="dropdown-billing-container">
                    <summary class="Username-billing">
                        <span> 
                        @if(empty($commuter->accName))
                            GCash Details
                        @else
                            {{ $commuter->accName }}
                        @endif
                        </span>
                        <img src="{{ asset('assets/arrowdown.svg')}}" width="14" height="14" alt="">
                    </summary>

                    <form action="{{ route('settings.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="billing-information-container pay">
                        <center>
                            <input class="textbox accountName" name="accName" type="text" placeholder="{{ __('Account Name') }}" value="{{ $commuter->accName }}">
                            <input class="textbox accountName" name="accNumber" type="text" placeholder="{{ __('Account Number') }}" value="{{ $commuter->accNumber }}">
                        </center>            		
                    </div>
                    <button onclick="openModal()" type="submit" class="button account save-changes bill"> <a href="#modalWindowChangesAccount">Save Changes</button>
                    <br><br><br>
                </details>

                </form>

            </div>


            @endforeach
            
        </div>

        <script>

            function closeMsg() {
                document.getElementById("flash").style.display = "none";

            }
            
            $("button").hide();

            $(function(){ // document ready function

                $(".file-upload").change(function() { // form change (checkboxes, radiobuttons etc)
                    $("button").show();
                });


                $(".acct").keyup(function() { // something typed in a textbox
                    
                    if ($(".acct") == $(".acct").val()) {
                        $(".save-changes-account").hide();

                    } else {
                        $(".save-changes-account").show();
                    }

                    // $("button").show();
                    });

                $(".accountName").keyup(function () { 

                    if ($(".accountName") == $(".accountName").val()) {
                        $(".save-changes").hide();

                    } else {
                        $(".save-changes").show();
                    }

                });

                $(".pass").keyup(function () { 

                if ($(".pass") == $(".pass").val()) {
                    $(".save-pass").hide();

                } else {
                    $(".save-pass").show();
                }

                });
            });

        </script>
            
        @endsection

@endsection