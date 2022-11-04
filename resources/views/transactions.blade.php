@extends('layouts.main') 
{{-- @extends('layouts.app') --}}


@section('content')


<!-- Main Section -->
    <main  class="l-main">

		<div class="transaction-bg" id="transaction" style="padding-top: 4.5rem;">

			<div class="tabs">

				<!-- TRANSACTION TABS -->
				<ul class="nav nav-pills mb-6" id="pills-tab" role="tablist">

					<!-- seats tab -->
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
							data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
							aria-selected="true"> 
							
							<iconify-icon icon="mdi:car-seat" class="iconify tab" width="22" height="22"></iconify-icon>Reserve Seats</button>
					</li>

					<!-- van tab-->
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
							data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
							aria-selected="false">

							<iconify-icon icon="fa6-solid:van-shuttle" class="iconify tab" width="22" height="22"></iconify-icon> Rent Van</button>
					</li>
				</ul>

				<!-- TABS CONTENT -->
				<div class="tab-content" id="pills-tabContent">
					<!-- Reserve Seat -->
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
						aria-labelledby="pills-home-tab">
						<div class="rent_van" id="reserve-seat">

							<form action="{{ route('search.seat') }}" method="GET">
							{{-- @csrf --}}

							<!--  Destination -->
								<div class="destinations_transaction">

									<!--  Current -->
										<div class="current_destination_container">
											<span class="dashboard-subtitle-current-destination">Leaving
												From</span>
											<input class="textbox currentdestination" type="text" name="origin" id="left" value="{{ request()->origin }}"
												placeholder="Current Destination">
										</div>

										<button onclick="switchText()"><span class="iconify-inline arrow-destination"
											data-icon="akar-icons:arrow-right-left" data-width="20"
											data-height="20"></span></button>

										<!--  Destination Point -->
											<div class="current_destination_container">
												<span class="dashboard-subtitle-current-destination">Going
													to</span>
												<input class="textbox currentdestination" type="text" name="destination" id="right" value="{{ request()->destination }}"
													placeholder="Destination Point">
											</div>
								</div>
								<div class="border-left"></div>
								<!--  DATE -->
									<div class="date_transaction_container">

										<!--  Deparute Date -->
											<div class="departuredate_transaction">
												<span class="dashboard-subtitle-current-destination">Departure
													Date</span>
												<input type="date" class="departuredate" name="departureDate" value="{{ request()->departureDate }}"
													onfocus="this.showPicker()">
												
											</div>

											<!--  Return Date -->
												<div class="date_transaction">
													<span class="dashboard-subtitle-current-destination">Return
														Date</span>
													<input type="date" class="departuredate" name="returnDate" value="{{ request()->returnDate }}"
														onfocus="this.showPicker()">
												</div>
									</div>

									<div class="border-left"></div>
									<!--  Passenger -->
										<div class="number-passenger-container">
											<span class="dashboard-subtitle-current-destination">Passenger</span>
											<div class="Passenger-dropdown">
												<div class="Passenger-select-box">
													<div class="Passenger-container">
														<div class="Passenger">
															<input type="radio" class="radio" id="1" value="1" name="noOfPassengers"/>
															<label for="1">1 passenger</label>
														</div>
														<div class="Passenger">
															<input type="radio" class="radio" id="2" value="2" name="noOfPassengers"/>
															<label for="2">2 passengers</label>
														</div>
														<div class="Passenger">
															<input type="radio" class="radio" id="3" value="3" name="noOfPassengers"/>
															<label for="3">3 passengers</label>
														</div>
													</div>
													<div class="selected-Passenger">
														{{ request()->noOfPassengers }} 

														@empty(request()->noOfPassengers)
															Select
														@endempty
														   
														@if (request()->noOfPassengers >= 2)
															passengers
														@elseif(request()->noOfPassengers == 1)
															passenger
														@endif

													</div>
												</div>
											</div>
										</div>

										<input type="submit" class="search_button" value="Search">
							</form>
										{{-- <button class="search_button"></button> --}}
										
						</div>
					</div>
					<!-- Rent Van -->
					<div class="tab-pane fade" id="pills-profile" role="tabpanel"
						aria-labelledby="pills-profile-tab">
						<div class="rent_van">

							<form action="{{ route('search.van') }}" method="GET">
								{{-- @csrf --}}

							<!--  Destinations -->
								<div class="destinations_transaction">
									<!--  Current -->
										<div class="current_destination_container">
											<span class="dashboard-subtitle-current-destination">Leaving
												From</span>
											<input class="textbox currentdestination" type="text" name="origin"
												placeholder="Current Destination">
										</div>

										<span class="iconify-inline arrow-destination"
											data-icon="akar-icons:arrow-right-left" data-width="20"
											data-height="20"></span>

										<!--  Destination Point -->
											<div class="current_destination_container">
												<span class="dashboard-subtitle-current-destination">Going
													to</span>
												<input class="textbox currentdestination" type="text" name="destination"
													placeholder="Destination Point">
											</div>
								</div>
								<div class="border-left"></div>

								<!--  Date -->
									<div class="date_transaction_container">

										<!--  Deparute Date -->
											<div class="departuredate_transaction">
												<span class="dashboard-subtitle-current-destination">Departure
													Date</span>
												<input type="date" class="departuredate" name="departureDate"> 
											</div>

											<!--  Return Date -->
												<div class="date_transaction">
													<span class="dashboard-subtitle-current-destination">Return
														Date</span>
													<input type="date" class="departuredate" name="returnDate"
														onfocus="this.showPicker()">
												</div>
									</div>

									<input type="submit" class="search_button" value="Search">

								</form>
						</div>
					</div>

				</div>
			</div>
		</div>

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
    </main>

@endsection