@extends('layouts.main')

@section('content')

<main class="l-main">

    <! -- PAYMENT FORM-->
    	<section class=" bd-container section ">
    		<div class="payment-form-container-seats">
    			
    			<div class="commuter-payment-container">
    				<div class="commuter-container">
    					<span class="commmuter-form-title">Commuter Information</span>
    				</div>
    				<div class="commuter-information-contaienr">
    					<br>
    					<! --FIRST COMMUTER-->
    					<div class="first-passenger-container">
    						<div class="first-passenger-information-container">
								<div class="passenger-title">
									<span class="payment-form-passenger">Primary Commuter</span>
									<span class="payment-form-title-passenger-type">Adult</span>
								</div>
							</div>
							<div class="passsenger-body-information">
								<div  class="passenger-information">
									<div class="fullname-passenger">
										<input class="textbox fname" type="text" placeholder="First Name">
										<input class="textbox lname" type="text" placeholder="Last Name">
									</div>
								</div>
								<div style="margin: 2rem;">
									<div class="gender-dropdown">
										<div class="gender-select-box">
      										<div class="gender-container">
       		 									<div class="gender">
						          					<input type="radio" class="radio" id="Female" name="category" />
						          					<label for="Female">Female</label>
        										</div>
						        				<div class="gender">
						          					<input type="radio" class="radio" id="Male" name="category" />
						          					<label for="Male">Male</label>
					        					</div>
					        					<div class="gender">
						          					<input type="radio" class="radio" id="Others" name="category" />
						          					<label for="Others">Others</label>
					        					</div>
      										</div>
      										<div class="selected-gender">Select</div>
   	 									</div>
    								</div>
								</div>
							</div>
    					</div>

    					<! -- SECOND COMMUTER-->
    					<div class="second-passenger-container">
    						<div class="second-passenger-information-container">
								<div class="passenger-title">
									<span class="payment-form-passenger">Second Commuter</span>
									<span class="payment-form-title-passenger-type">Adult</span>
								</div>
							</div>
							<div class="passsenger-body-information">
								<div  class="passenger-information">
									<div class="fullname-passenger">
										<input class="textbox fname" type="text" placeholder="First Name">
										<input class="textbox lname" type="text" placeholder="Last Name">
									</div>
								</div>
								<div style="margin: 2rem;">
									<div class="second-dropdown">
										<div class="second-select-box">
      										<div class="second-container">
       		 									<div class="second-gender">
						          					<input type="radio" class="radio" id="Female" name="category" />
						          					<label for="Female">Female</label>
        										</div>
						        				<div class="second-gender">
						          					<input type="radio" class="radio" id="Male" name="category" />
						          					<label for="Male">Male</label>
					        					</div>
					        					<div class="second-gender">
						          					<input type="radio" class="radio" id="Others" name="category" />
						          					<label for="Others">Others</label>
					        					</div>
      										</div>
      										<div class="second-selected-gender">Select</div>
   	 									</div>
    								</div>
								</div>
							</div>
    					</div>

    					<! -- THIRD COMMUTER-->
    					<div class="third-passenger-container">
    						<div class="third-passenger-information-container">
								<div class="passenger-title">
									<span class="payment-form-passenger">Third Commuter</span>
									<span class="payment-form-title-passenger-type">Adult</span>
								</div>
							</div>
							<div class="passsenger-body-information">
								<div  class="passenger-information">
									<div class="fullname-passenger">
										<input class="textbox fname" type="text" placeholder="First Name">
										<input class="textbox lname" type="text" placeholder="Last Name">
									</div>
								</div>
								<div style="margin: 2rem;">
									<div class="third-dropdown">
										<div class="third-select-box">
      										<div class="third-container">
       		 									<div class="third-gender">
						          					<input type="radio" class="radio" id="Female" name="category" />
						          					<label for="Female">Female</label>
        										</div>
						        				<div class="third-gender">
						          					<input type="radio" class="radio" id="Male" name="category" />
						          					<label for="Male">Male</label>
					        					</div>
					        					<div class="third-gender">
						          					<input type="radio" class="radio" id="Others" name="category" />
						          					<label for="Others">Others</label>
					        					</div>
      										</div>
      										<div class="third-selected-gender">Select</div>
   	 									</div>
    								</div>
								</div>
							</div>
    					</div>

    				</div>
    				<br>
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
                                    <input type="radio" name="paymentMethod" id="">
                                    <img width="40" height="40" src="{{ asset('assets/gcash.svg') }}"> 
                                    GCash
                                </label>
							</div>
							
							<br><br>
						</div>
    				</div>
    			</div>
    			<br>
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
                                        <span class="dashboard-subtitle-available-reservation">Sun, Oct 9</span>
                                    </div>

                                    <div class="collapse-first-col">

                                        <div class="collapse-text from-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="fluent:my-location-24-regular" data-width="25" data-height="25"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">From</span>
                                            <span class="dashboard-subtitle-available-reservation">Tuguegarao</span>
                                        </div>

                                        <div class="collapse-text to-cont">
                                            <span class="iconify-inline reservation-icon " data-icon="fa-solid:map-marker-alt" data-width="20" data-height="20"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">To</span>
                                            <span class="dashboard-subtitle-available-reservation">Alcala</span>
                                        </div>

                                    </div>

                                    <div class="collapse-second-col">

                                        <div class="collapse-text departure-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="material-symbols:departure-board" data-width="23" data-height="23"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">Departure Time</span>
                                            <span class="dashboard-subtitle-available-reservation">11:00 AM</span>
                                        </div>

                                        <div class="collapse-text seat-cont">
                                            <span class="iconify-inline reservation-icon" data-icon="mdi:car-seat" data-width="20" data-height="20"></span>
                                            <span class="dashboard-subtitle-available-reservation-subtitle">Seat(s)</span>
                                            <span class="dashboard-subtitle-available-reservation">A1, B2, B3</span>
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

									<div class="route-title sub dashboard-subtitle-available-reservation">Tuguegarao to Alcala</div>

									<div class="passenger-fee fee-container">
										<div class="dashboard-subtitle-available-reservation-subtitle">Primary passenger</div>
										<div class="fare">P 100.00</div>
									</div>

									<div class="passenger-fee fee-container">
										<div class="dashboard-subtitle-available-reservation-subtitle">Secondary passenger</div>
										<div class="fare">P 100.00</div>
									</div>

									<div class="passenger-fee fee-container">
										<div class="dashboard-subtitle-available-reservation-subtitle">Tertiary passenger</div>
										<div class="fare">P 100.00</div>
									</div>

									<hr>

									<div class="subtotal sub dashboard-subtitle-available-reservation">Subtotal</div>

									<div class="additional-fee fee-container">
										<div class="reservation-info">
											<div class="dashboard-subtitle-available-reservation-subtitle">Reservation Fee</div>
											<span class="iconify-inline" data-width="15" data-width="15" data-icon="bi:info-circle-fill"></span>
										</div>
										<div class="fare">P 0.00</div>
									</div>

									<div class="additional-fee fee-container">
										<div class="reservation-info">
											<div class="dashboard-subtitle-available-reservation-subtitle">Tax</div>
											<span class="iconify-inline" data-width="15" data-width="15" data-icon="bi:info-circle-fill"></span>
										</div>
										<div class="fare">P 4.50</div>
									</div>

									<hr class="hr-out">

									<div class="total-fee fee-container">
										<div class="total-info">
											<div class="total-text">Total</div>
											<div class="total-subtext">Taxes and Fees included</div>
										</div>

										<div class="total-price">P 304.50</div>
									</div>

								</div>

							</div>
							

						</details>
    					{{-- <div class="fare-title-container">
							<div class="fare-title" style="margin-right: 2rem;">
								<br>
								<span class="payment-form-title-passenger-method">Fare Summary</span>
								<br><br>
							</div>
						</div>
						<div class="fare-summary-body" style=" border-radius:0px 0px 12px 12px ;">
							<div class="fare-sumary-container">
								<div class="commuter-fare-container">
									<div class="commuter-title-fare">
										<span class="payment-form-trip-details">Transaction</span>
									</div>
									<br>
									<div class="commuter-fare">
										<div class="commuter-1">
											<span class="payment-form-trip-details-commuter">Primary Commuter</span>
											<div class="price-commuter" style="margin-left:4rem;">
												<span class="payment-form-trip-details">P 100</span>
											</div>
										</div>
										<div class="commuter-2">
											<span class="payment-form-trip-details-commuter">Second Commuter</span>
											<div class="price-commuter" style="margin-left:4.5rem;">
												<span class="payment-form-trip-details">P 100</span>
											</div>
										</div>
										<div class="commuter-3">
											<span class="payment-form-trip-details-commuter">Third Commuter</span>
											<div class="price-commuter" style="margin-left:5.8rem;">
												<span class="payment-form-trip-details">P 100</span>
											</div>
										</div>
									</div>
								</div>
								<center>
									<div class="line-divider"></div>
								</center>
								<div class="subtotal-summary-container">
									<div class="subtotal-title" style="margin:2rem">
										<div>
											<span class="payment-form-trip-details">Subtotal</span>
										</div>
										<br>
										<div class="reservation-fee">

											<span class="payment-form-trip-details-name">Reservation Fee</span>
											<span class="payment-form-trip-details" style="margin-left:5.8rem;">P 100</span>
										</div>
										<div class="tax-fee">
											<span class="payment-form-trip-details-name">Tax</span>
											<span class="payment-form-trip-details" style="margin-left:12rem;">P 100</span>
										</div>
									</div>
								</div>
								<center>
									<div class="line-divider"></div>
								</center>
								<div class="total-fare-container">
									<div class="total-fare-title" style="margin:2rem">
										<span class="payment-form-trip-details">Total</span>
									</div>
									<div class="total-fare" style="margin-bottom:2rem">
										<span class="payment-form-trip-details-name" style="margin-left:2rem;">Taxes and Fees</span>
										<span class="payment-form-trip-details totalprice" style="margin-left: 5rem;">P 100</span>
									</div>
								</div>
							</div>
						</div> --}}
    				</div>
    			</div>
    		</div>
    		<! -- PAYMENT BUTTON-->
			<div class="payment-button">
				<div class="paymentseats">
					<br>
					<span class="warning-button">By clicking <mark style="background:none; color: #42A1A1;">Proceed to payment</mark>, I understand and agree with the<mark style="background:none; color: #42A1A1; text-decoration:underline;"><a target="_blank" href="{{ route('privacy') }}">privacy policy</a></mark> and <mark style="background:none; color: #42A1A1; text-decoration:underline;"><a target="_blank" href="{{ route('terms') }}">terms of service</a></mark> of VanGo.</span>
					<br><br>
					<button class="proceed-payment-button "><a href="#modalBeforeProceed">Proceed to payment</a></button>
					<button class="cancel-payment-button"><a href="#modalCancellationWarning">Cancel</a></button>
				</div>	
			</div>
    	</section>

</main>

@endsection