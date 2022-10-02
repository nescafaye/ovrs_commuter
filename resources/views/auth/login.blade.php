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
        <div class="btn_slider active"></div>
        <div class="btn_slider"></div>
        <div class="btn_slider"></div>
      </div>

    </div>
      @livewire('login')
    </div>

@endsection
