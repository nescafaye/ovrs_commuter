@extends('layouts.main')

@section('content')

<main class="l-main">

    <!-- PAYMENT FORM-->
	<form action="{{ route('checkout') }}" method="get">
	@csrf

    	<section class="bd-container section ">
    		<div class="payment-form-container-seats">

				@if ($query['type'] == 'reserve')

				<div class="commuter-payment-container">

					@foreach ($commuter as $comm)
					
					<div class="commuter-container">
						<span class="commmuter-form-title">Commuter Information</span>
					</div>
					<div class="commuter-information-contaienr">

						<!--FIRST COMMUTER-->

						<div class="first-passenger-container">
							<div class="first-passenger-information-container">
								<div class="passenger-title">
									<span class="payment-form-passenger">Primary Commuter</span>
									<label class="lbl-commuter">
										<input type="checkbox" id="commuter" class="checkbox-comm">
										<span class="payment-form-title-passenger-type">I am a commuter</span>
									</label>
									
								</div>
							</div>
							<div class="passsenger-body-information">
								<div class="passenger-information">
									<div class="fullname-passenger">
										<span class="hidden" id="hidden-fname">{{ $comm->fname }}</span>
										<span class="hidden" id="hidden-lname">{{ $comm->lname }}</span>
										<input class="textbox fname" id="fname" name="fname[]" type="text" placeholder="First Name" required>
										<input class="textbox lname" id="lname" name="lname[]" type="text" placeholder="Last Name" required>
									</div>
								</div>
								<div class = "gender-information" style="margin: 2rem;">

									<x-gender-component/>
									
								</div>
							</div>
						</div>

					@endforeach


						@for ($i = 2; $i < $query['passengers']+1; $i++)

							<div class="first-passenger-container">
								<div class="first-passenger-information-container">
									<div class="passenger-title">
										<span class="payment-form-passenger">Commuter {{ $i }} <span class="optional-text">(Optional)</span></span>
										{{-- <span class="payment-form-title-passenger-type">Adult</span> --}}
									</div>
								</div>
								<div class="passsenger-body-information">
									<div class="passenger-information">
										<div class="fullname-passenger">
											<input class="textbox fname" id="fname-{{ $i }}" name="fname[]" type="text" placeholder="First Name" >
											<input class="textbox lname input-other" id="lname-{{ $i }}" name="lname[]" type="text" placeholder="Last Name" >
										</div>
									</div>

									<div class = "gender-information" style="margin: 2rem;">

										@if ($i == 2) 

											<x-gender1-component/>
											
										@elseif ($i == 3)

											<x-gender2-component/>
											
										@endif
										
										
									</div>
								</div>
							</div>

						@endfor
						
				</div>

				<div class="first-passenger-container">
					<div class="first-passenger-information-container">
						<div class="passenger-title">
							<span class="payment-form-passenger">Contact Information</span>
							{{-- <span class="payment-form-title-passenger-type">Adult</span> --}}
						</div>
					</div>
					<div class="passsenger-body-information">
						<div class="passenger-information">
							<div class="fullname-passenger contact-information">
								<input class="textbox fname" id="email" name="contactEmail" type="text" placeholder="Email" >
								<input class="textbox lname input-other" id="contactNo" name="contactNo" type="text" placeholder="Contact Number" >
							</div>
						</div>
					</div>
				</div>

				@elseif ($query['type'] == 'rent')

				<div class="commuter-payment-container">
					<div class="commuter-container">
						<span class="commmuter-form-title">Commuter Information</span>
					</div>

					@foreach ($commuter as $comm)

					<div class="commuter-information-contaienr">

						<div class="first-passenger-container">
							<div class="first-passenger-information-container">
								<div class="passenger-title">
									<span class="payment-form-passenger">Primary Commuter</span>
									<label class="lbl-commuter">
										<input type="checkbox" id="commuter" class="checkbox-comm">
										<span class="payment-form-title-passenger-type">I am a commuter</span>
									</label>
									
								</div>
							</div>
							<div class="passsenger-body-information">
								<div class="passenger-information">
									<div class="fullname-passenger">
										<span class="hidden" id="hidden-fname">{{ $comm->fname }}</span>
										<span class="hidden" id="hidden-lname">{{ $comm->lname }}</span>
										<input class="textbox fname" id="fname" name="fname[]" type="text" placeholder="First Name" required>
										<input class="textbox lname" id="lname" name="lname[]" type="text" placeholder="Last Name" required>
									</div>
								</div>
								<div class = "gender-information" style="margin: 2rem;">

									<x-gender-component/>
									
								</div>
							</div>
						</div>
					
					

					@endforeach
					</div>
				
				<div class="first-passenger-container">
					<div class="first-passenger-information-container">
						<div class="passenger-title">
							<span class="payment-form-passenger">Contact Information</span>
							{{-- <span class="payment-form-title-passenger-type">Adult</span> --}}
						</div>
					</div>
					<div class="passsenger-body-information">
						<div class="passenger-information">
							<div class="fullname-passenger contact-information">
								<input class="textbox fname" id="email" name="contactEmail" type="text" placeholder="Email" >
								<input class="textbox lname input-other" id="contactNo" name="contactNo" type="text" placeholder="Contact Number" >
							</div>
						</div>
					</div>
				</div>

					
				@endif
    			

    				<! -- PAYMENT METHOD -->

    				<div class="commuter-container">
    					<span class="payment-form-title">Payment Information</span>
    					<br><br>
    				</div>
					
    				<div class="payment-method-container">
    					<div class="payment-title-container">
    						<div class="payment-title"> 
    							<br>
    							<span class="payment-title" style="margin-left:2rem">Payment Method</span>
    							<br><br>
    						</div>
    					</div>
    					<div class="payment-container" style="border-radius: 0px 0px 12px 12px;">
							<div class="gcash" style="margin-top: 2rem;margin-left: 2rem;">
                                <label class="gcash-radio">
                                    <input type="radio" name="paymentMethod" id="gcash" value="gcash" required>
                                    <img width="40" height="40" src="{{ asset('assets/gcash.svg') }}"> 
									<span>Gcash</span>
                                </label>
							</div>
							
							<br><br>
						</div>
    				</div>
    		</div>

    			<br>

				@if ($query['type'] == 'reserve')

    			<!-- TRIP SUMMARY  -->
    			<div class="reservation-fare-summary-container">
    				
    				<!-- Reservation Summary -->
    				<div class="reservation-summary-container" style="margin-top:4rem">

                        <details open class="dropdown-passenger-container">
                            <summary class="payment-form-passenger">
                                <span class="collapse-title">Reservation Summary</span>
                                <img src="{{ asset('assets/arrowdown.svg')}}" width="14" height="14" alt="">
                            </summary>
        
                            <div class="passenger-information-container">

                                <div class="collapse-body">

                                    <div class="departure-date">
										<input type="hidden" name="departureDate" value="{{ $query['departureDate'] }}">
										<input type="hidden" name="returnDate" value="{{ $query['returnDate'] }}">
                                        <span class="dashboard-subtitle-available-reservation">{{ $query['departureDate'] }} &#8211; {{ $query['returnDate'] }} @if ($query['returnDate'] == null) None @endif</span>
                                    </div>

                                    <div class="collapse-first-col">

                                        <div class="collapse-text from-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="fluent:my-location-24-regular" data-width="25" data-height="25"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">From</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['origin'] }}</span>
                                        </div>

                                        <div class="collapse-text to-cont">
                                            <span class="iconify-inline reservation-icon " data-icon="fa-solid:map-marker-alt" data-width="20" data-height="20"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">To</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['destination'] }}</span>
                                        </div>

                                    </div>

                                    <div class="collapse-second-col">

                                        <div class="collapse-text departure-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="material-symbols:departure-board" data-width="23" data-height="23"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">Departure Time</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['departureTime'] }}</span>
                                        </div>

                                        <div class="collapse-text seat-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="mdi:car-seat" data-width="20" data-height="20"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">Seat(s)</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['seatCode'] }}</span>
											<input hidden type="text" name="seatsTaken" value="{{ $query['seatCode'] }}">
											<input hidden type="text" name="pNo" value="{{ $query['p'] }}">
											
                                        </div>

                                    </div>

                                </div>
                              
        
                            </div>
        
                        </details>
                   
    				</div>

    				<br>

    				<!-- Fare Summary -->

    				<div class="fare-summary-container">

						<details open class="dropdown-passenger-container">
                            <summary class="payment-form-passenger">
                                <span class="collapse-title">Fare Summary</span>
                                <img src="{{ asset('assets/arrowdown.svg')}}" width="14" height="14" alt="">
                            </summary>

							<div class="passenger-information-container">

								<div class="collapse-body-two">

									<input hidden type="text" name="route" value="{{ $query['route'] }}">
									<div class="route-title sub dashboard-subtitle-available-reservation">{{ $query['route'] }}</div>
									<input hidden type="text" name="type" value="{{ $query['type'] }}">

										<div class="passenger-fee fee-container">
											<div class="dashboard-subtitle-available-reservation-subtitle">Commuter 1 
											<span class="commuter-name" id="lname"></span>
											</div>
											<input hidden type="text" name="fare" value="{{ $query['fare'] }}">
											<div class="fare">P {{ $query['fare'] }}</div>
										</div>
									
									@for ($i = 2; $i <= $query['passengers']; $i++)

										<div class="passenger-fee fee-container">
											<div class="dashboard-subtitle-available-reservation-subtitle">Commuter {{$i}} 
											<span class="show-other" id="lname-{{ $i }}"></span>
											</div>
											<div class="fare">P {{ $query['fare'] }}</div>
										</div>

									@endfor

									<hr class="hr-out">

									<div class="subtotal sub dashboard-subtitle-available-reservation">Subtotal</div>

									<div class="additional-fee fee-container">
										<div class="reservation-info">
											<div class="dashboard-subtitle-available-reservation-subtitle">Reservation Fee</div>
											<span class="iconify-inline" data-width="15" data-width="15" data-icon="bi:info-circle-fill"></span>
										</div>
										<div class="fare">P {{ $reservationFee }}</div>
									</div>

									<div class="additional-fee fee-container">
										<div class="reservation-info">
											<div class="dashboard-subtitle-available-reservation-subtitle">Tax</div>
											<span class="iconify-inline" data-width="15" data-width="15" data-icon="bi:info-circle-fill"></span>
										</div>
										<div class="fare">P {{ $taxFee }}</div>
									</div>

									<hr class="hr-out">

									<div class="total-fee fee-container">
										<div class="total-info">
											<div class="total-text">Total</div>
											<div class="total-subtext">Taxes and Fees included</div>
										</div>

										<div class="total-price">
											<b>{{ $total }}</b>
											<input hidden type="text" data-type="currency" name="totalAmount" value="{{ $total }}">
										</div>
									</div>

								</div>

							</div>
							

						</details>
    					
    				</div>
    			</div>

				@elseif ($query['type'] == 'rent')

				<div class="reservation-fare-summary-container">
    				
    				<!-- Reservation Summary -->
    				<div class="reservation-summary-container" style="margin-top:4rem">

                        <details open class="dropdown-passenger-container">
                            <summary class="payment-form-passenger">
                                <span class="collapse-title">Rent Summary</span>
                                <img src="{{ asset('assets/arrowdown.svg')}}" width="14" height="14" alt="">
                            </summary>
        
                            <div class="passenger-information-container">

                                <div class="collapse-body">

                                    <div class="departure-date">
										<input type="hidden" name="departureDate" value="{{ $query['pickupDate'] }}">
										<input type="hidden" name="returnDate" value="{{ $query['returnDate'] }}">
                                        <span class="dashboard-subtitle-available-reservation">{{ $query['pickupDate'] }} &#8211; {{ $query['returnDate'] }} @if ($query['returnDate'] == null) None @endif</span>
                                    </div>

                                    <div class="collapse-first-col">

										{{-- <div class="collapse-text from-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="fluent:my-location-24-regular" data-width="25" data-height="25"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">Van</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['brand'] }} {{ $query['model'] }}</span>
                                        </div> --}}

                                        <div class="collapse-text from-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="fluent:my-location-24-regular" data-width="25" data-height="25"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">From</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['origin'] }}</span>
                                        </div>

                                        <div class="collapse-text to-cont">
                                            <span class="iconify-inline reservation-icon " data-icon="fa-solid:map-marker-alt" data-width="20" data-height="20"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">To</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['destination'] }}</span>
                                        </div>

                                    </div>

                                    <div class="collapse-second-col">

                                        <div class="collapse-text departure-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="material-symbols:departure-board" data-width="23" data-height="23"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">Departure Time</span>
											<input type="hidden" name="pickupTime" value="{{ $query['pickupTime'] }}">
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['pickupTime'] }}</span>
                                        </div>

                                        <div class="collapse-text seat-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="mdi:car-seat" data-width="20" data-height="20"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">Seat Capacity</span>
                                            <span class="dashboard-subtitle-available-reservation">{{ $query['seatCapacity'] }}</span>
											{{-- <input hidden type="text" name="pNo" value="{{ $query['p'] }}"> --}}
											
                                        </div>

                                    </div>

                                </div>
                              
        
                            </div>
        
                        </details>
                   
    				</div>

    				<br>

    				<!-- Fare Summary -->

    				<div class="fare-summary-container">

						<details open class="dropdown-passenger-container">
                            <summary class="payment-form-passenger">
                                <span class="collapse-title">Fare Summary</span>
                                <img src="{{ asset('assets/arrowdown.svg')}}" width="14" height="14" alt="">
                            </summary>

							<div class="passenger-information-container">

								<div class="collapse-body-two">
									
									<input hidden type="text" name="route" value="{{ $query['route'] }}">
									<div class="route-title sub dashboard-subtitle-available-reservation">{{ $query['route'] }}</div>

									<input hidden type="text" name="type" value="{{ $query['type'] }}">

										<div class="passenger-fee fee-container">
											<div class="dashboard-subtitle-available-reservation-subtitle">{{ $query['brand'] }} {{ $query['model'] }}
											<input type="hidden" name="vehicle" value="{{ $query['brand'] }} {{ $query['model'] }}">
											<span class="show-other" id="lname"></span>
											</div>
											<div class="fare">P {{ $query['rentalPrice'] }}</div>
										</div>


									<hr class="hr-out">

									<div class="subtotal sub dashboard-subtitle-available-reservation">Subtotal</div>

									<div class="additional-fee fee-container">
										<div class="reservation-info">
											<div class="dashboard-subtitle-available-reservation-subtitle">Reservation Fee</div>
											<span class="iconify-inline" data-width="15" data-width="15" data-icon="bi:info-circle-fill"></span>
										</div>
										<div class="fare">P {{ $reservationFee }}</div>
									</div>

									<div class="additional-fee fee-container">
										<div class="reservation-info">
											<div class="dashboard-subtitle-available-reservation-subtitle">Tax</div>
											<span class="iconify-inline" data-width="15" data-width="15" data-icon="bi:info-circle-fill"></span>
										</div>
										<div class="fare">P {{ $taxFee }}</div>
									</div>

									<hr class="hr-out">

									<div class="total-fee fee-container">
										<div class="total-info">
											<div class="total-text">Total</div>
											<div class="total-subtext">Taxes and Fees included</div>
										</div>

										<div class="total-price">
											<b>{{ number_format( (float) $query['rentalPrice'] + $reservationFee + $taxFee, 2, '.', ',') }}</b>
											<input hidden type="text" data-type="currency" name="totalAmount" value="{{ $total }}">
										</div>
									</div>

								</div>

							</div>
							

						</details>
    					
    				</div>
    			</div>

				@endif

    		</div>

    		<!-- PAYMENT BUTTON-->
			<div class="payment-button">
				<div class="paymentseats">
					<br>
					<span class="warning-button">By clicking <mark style="background:none; color: #42A1A1;">Proceed to payment</mark>, I understand and agree with the <mark style="background:none; color: #42A1A1; text-decoration:underline;"><a target="_blank" href="{{ route('privacy') }}"> privacy policy</a></mark> and <mark style="background:none; color: #42A1A1; text-decoration:underline;"><a target="_blank" href="{{ route('terms') }}">terms of service</a></mark> of VanGo.</span>
					<br><br>
					<button class="proceed-payment-button" type="submit">Proceed to payment</button>
					<button class="cancel-payment-button"><a href="#modalCancellationWarning">Cancel</a></button>
				</div>	
			</div>
			
    	</section>

	</form>

		{{-- <!-- ARE YOU SURE MODAL (Proceed) -->
		<div id="modalBeforeProceed">
			<div>
                <header>
                	<div class="close">
                        <a href="#close" class="exit"><i class="uil uil-times"></i></a>
                    </div>
                    <div>
                    	<br><br>
                    	<center>
                    		<span class="iconify-inline" style="color: #42A1A1;" data-icon="ep:success-filled" data-width="50" data-height="50"></span>
                    	</center>
                    	<div>
                    		<br>
                    		<center>
                    			<span class="dashboard-subtitle-modal-payment">You have successfully made a transaction!</span>
                    			<br><br>
                    			<img src="{{ asset('assets/e-ticket.png') }}">
                    			
                    			
                    		</center>
                    		
                    	</div>
                    </div>
                </header>
            </div>
		</div>

		<!-- ARE YOU SURE MODAL -->
		
		<div id="modalCancellationWarning">
			<div>
                <header>
                	<div class="close">
                        <a href="#close" class="exit"><i class="uil uil-times"></i></a>
                    </div>
                    <div>
                    	<br><br>
                    	<center>
                    		<img src="{{ asset('assets/cancel.svg') }}" class="modal-img-payment"> 
                    	</center>
                    	<div>
                    		<br>
                    		<center>
                    			<span class="dashboard-subtitle-modal-payment">Are you sure you want to cancel?</span>
                    			<br><br>
                    			<div>
                    				<button class="cancel-payment">Cancel</button>
                    			<button class="yes-payment">Yes</button>
                    			</div>
                    			
                    		</center>
                    		
                    	</div>
                    </div>
                </header>
            </div>
		</div> --}}

</main>

<script>

	// populate the textboxes with user's full name when the checkbox is checked

	var hiddenFname = $('#hidden-fname').html();
	var hiddenLname = $('#hidden-lname').html();


    $(document).ready(function(){

        $('#commuter').click(function(){

            if ($(this).is(":checked")){

				$('#fname').prop('readonly', true);
				$('#lname').prop('readonly', true);

                $('#fname').val(hiddenFname);
				$('#lname').val(hiddenLname);
				$('.commuter-name').show();
				$('.commuter-name').html("(" + hiddenLname + ")");

            }
            else if ($(this).is(":not(:checked)")){

				$('#fname').prop('readonly', false);
				$('#lname').prop('readonly', false);

                $('#fname').val('');
				$('#lname').val('');
				$( ".commuter-name" ).hide();
            }

        });

		$('#lname').keyup(function () { 

			var lnameVal = $(this).val();

			$('.commuter-name').show();
			$('.commuter-name').html("(" + lnameVal + ")");

			if (lnameVal === '') {
				$( ".commuter-name" ).hide();
			}
		})

    });

	$(document).ready(function(){ 


		$('.input-other').each(function () {

			$(this).keyup(function (e) { 
				
				var value = $(this).val();
				var getVal = $(this).attr('id');

				$('.show-other').each(function () {

					var showVal = $(this).attr('id');
					
					if (getVal === showVal) {

						$(this).show();

						$(this).html("(" + value  + ")" );

						if (value === '') {
							$(this).hide();
						}
					}

				});

			});

        });

	})
	

</script>


@endsection