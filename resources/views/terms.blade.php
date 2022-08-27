@extends('layouts.main')

@section('content')

    @extends('layouts.sidemenu')

        @section('details')

        <div class="terms-of-use-container">
            <span class="dashboard-subtitle-terms">AGREEMENT</span>
            <center>
                <br>
                <img src="{{ asset('assets/terms.png')}}" class="privacy">
            </center>
            <br><hr style="opacity: 0.4;"><br>
               <p class="service-description">We know it’s tempting to skip these Terms of Service, but it’s important to establish what you can expect from us as you use VanGo services, and what we expect from you.</p>
               <br>
               <p class="service-description">These Terms of Service reflect the way <mark class="terms-of-service">VanGo's business works</mark>, the laws that apply to our company, and <mark class="terms-of-service">certain things we’ve always believed to be true. </mark> As a result, these Terms of Service help define VanGo's relationship with you as you interact with our services. For example, these terms include the following topic headings.</p><br>
               <ul class="heading-list">
                   <li><mark class="terms-of-service">What you can expect from us, </mark> which describes how we provide and develop our services</li>
                   <li><mark class="terms-of-service">What we expect from you,</mark> which establishes certain rules for using our services</li>
                   <li><mark class="terms-of-service">Content in VanGo services,</mark> which describes the intellectual property rights to the content you find in our services — whether that content belongs to you, VanGo, or others</li>
                   <li><mark class="terms-of-service">In case of problems or disagreements,</mark> which describes other legal rights you have, and what to expect in case someone violates these terms</li>
               </ul>
               <br><hr style="opacity: 0.4;"><br>
               <p class="service-description">Understanding these terms is important because, by using our services, you’re agreeing to these terms.</p>
               <br>
               <p class="service-description">Besides these terms, we also publish a <mark class="terms-of-service">Privacy Policy.</mark> Although it’s not part of these terms, we encourage you to read it to better understand how you can update, manage, export, and delete your information.</p>
        </div>


            
        @endsection

@endsection