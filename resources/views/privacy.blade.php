@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')

        <div class="privacy-container ">
            <span class="dashboard-subtitle-terms">VANGO POLICY</span>

            <center>
                <br>
                <img src="{{ asset('assets/12.png') }}" class="privacy">
            </center>
            <br><hr style="opacity: 0.4;"><br>
            <p class="privacy-description">When you use our services,<mark class="terms-of-service"> you’re trusting us with your information.</mark> We understand this is a big responsibility and work hard to protect your information and put you in control.</p>
            <br>
            <p class="privacy-description">This <mark class="terms-of-service">Privacy Policy</mark> is meant to help you understand what information we collect, why we collect it, and how you can update, manage, export, and delete your information.</p>
            <br>
            <p class="privacy-description">We build a range of services that help people daily to explore and interact with the world in new ways. Our services include:</p>
            <br>
            <ul class="heading-list">
                   <li><mark class="terms-of-service">Products that are integrated into third-party apps and sites </mark>, like ads, analytics, and embedded Google Maps</li>
                   <li>Platforms like the Chrome browser</li>
                   <li>Google apps, sites, and devices, like Search, YouTube, and Google Home</li>
               </ul>
               <br><hr style="opacity: 0.4;"><br>
            <p class="privacy-description">You can use our services in a variety of ways to manage your privacy.  And across our services, <mark class="terms-of-service">you can adjust your privacy settings </mark> to control what we collect and how your information is used.</p>
            <br>
            <p class="privacy-description">We <mark class="terms-of-service"> also use your information to ensure our services are working as intended </mark>, such as tracking outages or troubleshooting issues that you report to us. And we use your information to make improvements to our services — for example, understanding which search terms are most frequently misspelled helps us improve spell-check features used across our services.</p>
        </div>

            
        @endsection

@endsection