@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')

        <!-- Settings Container -->
        <div class="settings_container">

            <div class="flash-message">

            @if (session('success'))
                    <p class="success-msg msg"><span class="iconify-inline" data-icon="bi:check-circle" data-width="17" data-height="17"></span> {{ session('success') }}</p>   
            
            @elseif (session('error'))

                    <p class="error-msg msg"><span class="iconify-inline" data-icon="bi:exclamation-circle" data-width="17" data-height="17"></span> {{ session('error') }}</p>

            @endif

            </div>

            <span class="dashboard-subtitle-settings">Account Information</span>

            @foreach ($commuters as $commuter)

            <form action="{{ route('settings.edit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}

            <!-- Email -->
            <div class="email-container">
                <br>
                <span class="dashboard-subtitle-email">Email Address</span>
                <p class="email-description">This is where your confirmation email, tickets, and notifications will be sent</p>
                <input class="textbox" type="text" name="comm_mail" placeholder="{{ __('Email') }}" value="{{ $commuter->comm_mail }}">
            </div>

            <!-- Username -->
            <div class="username-container">
                <br>
                <span class="dashboard-subtitle-username">Username</span>
                <input class="textbox" type="text" name="comm_un" placeholder="{{ __('Username') }}" value="{{ $commuter->comm_un }}">
            </div>

            <!-- Password -->
            <div class="password-container">
                 <br>
                    <span class="dashboard-subtitle-password">Password</span>
                    <p class="password-description">Enter both fields to update your password</p>
                    <input class="textbox" name="password" type="password" placeholder="{{ __('Current Password') }}">
                    <input class="textbox" name="password" type="password" placeholder="{{ __('New Password') }}">
                    <a href="{{ route('password.update') }}" class="password-button">Forgot Password?</a>
                <br><br>

                <button type="submit" class="button account save-changes-account"> <a href="#modalWindowChangesAccount">Save Changes</a></button>
               
            </div>

            </form>

            <!-- Notification Container -->
            <div class="notification-container">
                <br><hr style="opacity: 0.3; border: 0.5px solid; border-radius:5px;"><br>
                <span class="dashboard-subtitle-settings">Notification</span>

                <!-- Email -->
                <div class="email-notification-container">
                    <div class="email-description-container">
                        <span class="dashboard-subtitle-email">Email</span>
                        <p class="email-description">Receive updates, notifications, upcoming events, and offers in my email.</p>
                    </div>
                    <input class="apple-switch email" type="checkbox">
                </div>

                <!-- SMS -->
                <div class="notification-sms-container">
                    <div class="sms-description-container">
                        <br><br>
                        <span class="dashboard-subtitle-sms">SMS</span>
                        <p class="sms-description">Receive updates, notifications, upcoming events, and offers in my email.</p>
                    </div>
                    <input class="apple-switch sms" type="checkbox">
                </div>
            </div>

            <!-- Billing Container -->
            <div class="Billing-container">
                <br><hr style="opacity: 0.3; border: 0.5px solid; border-radius:5px;"><br>
                <span class="dashboard-subtitle-settings">Billing Details</span>
                <p class="billing-description">Let’s make your everyday payments safe & easy through <mark class="gcash-highlight">GCash</mark></p><br>
                <details open class="dropdown-billing-container">
                    <summary class="Username-billing">
                        <span>Billing Account</span>
                        <img src="{{ asset('assets/arrowdown.svg')}}" width="14" height="14" alt="">
                    </summary>
                    <div class="billing-information-container">
                        <center>
                            <input class="textbox accountName" type="text" placeholder="Account Name">
                            <input class="textbox accountName" type="text" placeholder="Account Number">
                            <a href="#modalWindowChangesAccount" class="button account save-changes">Save Changes</a>
                            <br>
                        </center>		
                    </div>
                    <br><br><br>
                </details>
                <br>
            </div


            @endforeach
            
        </div>
            
        @endsection

@endsection