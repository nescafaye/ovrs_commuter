@extends('layouts.main') 
{{-- @extends('layouts.app') --}}


@section('content')


<!-- Main Section -->
    <main  class="l-main">
    	 <! -- No Booking -->
		<section class="no-bookings section bd-container">
			<center>
				<img src="{{ asset('assets/picture1.svg') }}" class="no-bookings-img">
			</center>
			<center>
				<span class="dashboard-subtitle-no-bookings">You have no upcoming bookings</span>
				<p class="bookings-description">Find the best trip for you</p>
				<a href="#" class="button">Book now</a>
			</center>
		</section>
    </main>

@endsection