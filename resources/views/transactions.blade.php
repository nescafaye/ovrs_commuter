@extends('layouts.main') 
{{-- @extends('layouts.app') --}}


@section('content')


<!-- Main Section -->
    <main  class="l-main">

		<div style="padding-top: 4.5rem;">
			<x-search-component/>
		</div>

		@if ($count == 0)

			<! -- No Booking -->
			<section class="no-bookings section bd-container">

				<center>
					<img src="{{ asset('assets/nothing.svg') }}" width="220" height="220" class="no-bookings-img">
				</center>
				<center>
					<span class="dashboard-subtitle-no-bookings">You have no upcoming bookings</span>
					<p class="bookings-description">Find the best trip for you</p>
					<a href="#transaction" class="button">Book now</a>
				</center>
			</section>

		@else

			<section class="upcoming-container" id="upcoming">

				<div class="upcoming-title">Upcoming trips</div>

				@foreach ($transactions as $transaction)

				<div class="rent-seats-container" id="transaction">
					<div class="rent-header-container">
					
						<mark class="schedule seatsched">{{ $transaction->transactionType }} - 

							@php

								$departDate = date('Y-m-d', strtotime($transaction->departureDate));
								$dateNow = now();
								$formatNow = date('Y-m-d', strtotime($dateNow));

								$diff = \Carbon\Carbon::parse($departDate)->diffInDays($formatNow);

							@endphp


							@if ($diff == 0) 
								Today 
							@elseif ($diff == 1)
								Tomorrow
							@elseif ($diff > 1)
								In {{ $diff }} days
							@elseif ($diff < 0)
								Completed
							@endif
							
						</mark>

					</div>
					<div class="rent-body-container">
						<div class="trip-schedule">
							<p class="date-description date">{{ date('F d, Y', strtotime($transaction->departureDate)) }}</p>
							<p class="date-description"></p>
						</div>
						<div class="trip-destination">
							<span class="dashboard-subtitle-destination">{{ $transaction->routeTaken }}</span>
						</div>
					</div>
				</div>

				@endforeach

			</section>

			
			
		@endif
		

    </main>

@endsection