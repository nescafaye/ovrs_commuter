@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')
        
        <!--Settings -->
        <div class="settings_container">
            <span class="dashboard-subtitle-settings">Account Information</span>

            <!--Email -->
            <div class="email-container">
                <br>
                <span class="dashboard-subtitle-email">Email Address</span>
                <p class="email-description">This is where your confirmation email, tickets, and notifications will be sent</p>
                <input class="textbox" type="text" placeholder="someone@email.com">
            </div>

            <!--Username -->
            <div class="username-container">
                <br>
                <span class="dashboard-subtitle-username">Username</span>
                <input class="textbox" type="text" placeholder="username">
            </div>

            <!--Password -->
            <div class="password-container">
                 <br>
                    <span class="dashboard-subtitle-password">Password</span>
                    <p class="password-description">Enter both fields to update your password</p>
                    <input class="textbox" type="text" placeholder="Current Password">
                    <input class="textbox" type="text" placeholder="New Password">
                    <a href="" class="password-button">Forgot Password?</a>
                <br><br>
            </div>

            <!--Notification -->
            <div class="notification-container">
                <br><hr style="opacity: 0.4;"><br>
                <span class="dashboard-subtitle-settings">Notification</span>
                <!--Email -->
                <div class="email-notification-container">
                    <div class="email-description-container">
                        <span class="dashboard-subtitle-email">Email</span>
                        <p class="email-description">Receive updates, notifications, upcoming events, and offers in my email.</p>
                    </div>
                    <input class="apple-switch email" type="checkbox">
                </div>
                <!--SMS -->
                <div class="notification-sms-container">
                    <div class="sms-description-container">
                        <br><br>
                        <span class="dashboard-subtitle-sms">SMS</span>
                        <p class="sms-description">Receive updates, notifications, upcoming events, and offers in my email.</p>
                    </div>
                    <input class="apple-switch sms" type="checkbox">
                </div>
            </div>
            <div class="Billing-container">
                <br><hr style="opacity: 0.4;"><br>
                <span class="dashboard-subtitle-settings">Billing Details</span>
                <p class="billing-description">Let’s make your everyday payments safe & easy through <mark class="gcash-highlight">Gcash</mark></p><br>
                <details class="dropdown-billing-container">
                    <summary class="Username-billing">Passenger Name</summary>
                    <div class="billing-information-container">
                        <center>
                            <input class="textbox accountName" type="text" placeholder="Account Name">
                            <input class="textbox accountName" type="text" placeholder="Account Number">
                            <a href="#" class="button account save-changes">Save Changes</a>
                            <br>
                        </center>		
                    </div>
                    <br><br><br>
                </details>
                <br><br>
            </div>
        </div>
            
        @endsection

@endsection