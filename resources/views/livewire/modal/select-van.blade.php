<div class="rent-van">
    <header>

        <form action="{{ route('payment') }}">

        <div class="view-van-container">

            <div class="gallery-container">

                <div class="van-gallery">
                    <div class="van-photo photo-main" style="display: block">
                        <img src="{{ asset('assets/car1.jpg') }}">
                    </div>
                    <div class="van-photo photo-main">
                        <img src="{{ asset('assets/car2.jpg') }}">
                    </div>
                    <div class="van-photo photo-main">
                        <img src="{{ asset('assets/car3.jpg') }}">
                    </div>
                    <div class="van-photo photo-main">
                        <img src="{{ asset('assets/car4.jpg') }}">
                    </div>
                </div>

                <div class="thumbnail">
                    <div class="column">
                        <img class="demo cursor" src="{{ asset('assets/car1.jpg') }}" style="width:100%" onclick="currSlide(1)"
                            alt="The Woods">
                    </div>

                    <div class="column">
                        <img class="demo cursor" src="{{ asset('assets/car2.jpg') }}" style="width:100%" onclick="currSlide(2)"
                            alt="Cinque Terre">
                    </div>

                    <div class="column">
                        <img class="demo cursor" src="{{ asset('assets/car3.jpg') }}" style="width:100%" onclick="currSlide(3)"
                            alt="Mountains and fjords">
                    </div>

                    <div class="column last">
                        <img class="demo cursor" src="{{ asset('assets/car4.jpg') }}" style="width:100%" onclick="currSlide(4)"
                            alt="Northern Lights">
                    </div>
                </div>
            </div>

            <div class="van-info">
                <div class="vantype">
                    <span class="dashboard-subtitle-van-type van-brand">{{ $vans['brand'] }}</span>
                    <span class="dashboard-subtitle-van-type-name">{{ $vans['model'] }}</span>
                </div>
                <div style="margin-top: 1rem;">
                    <iconify-icon icon="ri:information-fill" width="20" height="20" class="iconify-inline info"></iconify-icon>
                    <span class="dashboard-subtitle-van-type-description">{{ $vans['desc'] }}</span>
                </div>
                <br>
                <div class="van-information">
                    <div class="rental-price">
                        <span class="dashboard-subtitle-van-type">Rental
                            Price</span>
                        <span class="dashboard-subtitle-van-price">P {{ $vans['rentalPrice'] }}</span>
                    </div>
                    <div class="van-color" style="margin-left: 5rem;">
                        <span class="dashboard-subtitle-van-type">Color</span>
                        <span class="dashboard-subtitle-van-price">{{ $vans['color'] }}</span>
                    </div>
                </div>

                <div class="sub-van-info" style="color: #42A1A1;">
                    <div class="one">
                        <span class="iconify-inline specs" data-icon="ci:settings-filled" data-width="20"
                            data-height="20"></span>
                        <span class="dashboard-subtitle-van-type-">{{ $vans['transmissionType'] }}</span>
                    </div>

                    <div class="two" style="margin-left:2rem; margin-right: 2rem;">
                        <span class="iconify-inline specs" data-icon="fa-solid:users" data-width="20" data-height="20"></span>
                        <span class="dashboard-subtitle-van-type-">{{ $vans['seatCapacity'] }}</span>
                    </div>
                    <div class="three">
                        <span class="iconify-inline specs" data-icon="fluent:luggage-16-filled" data-width="20"
                            data-height="20"></span>
                        <span class="dashboard-subtitle-van-type-">{{ $vans['amenities'] }}</span>
                    </div>
                </div>

                <br><br>

                <input type="hidden" name="origin" value="{{ $vans['origin'] }}">
                <input type="hidden" name="destination" value="{{ $vans['destination'] }}">
                <input type="hidden" name="route" value="{{ $vans['routeTitle'] }}">
                <input type="hidden" name="model" value="{{ $vans['model'] }}">
                <input type="hidden" name="brand" value="{{ $vans['brand'] }}">
                <input type="hidden" name="rentalPrice" value="{{ $vans['rentalPrice'] }}">
                <input type="hidden" name="color" value="{{ $vans['color'] }}">
                <input type="hidden" name="transmissionType" value="{{ $vans['transmissionType'] }}">
                <input type="hidden" name="seatCapacity" value="{{ $vans['seatCapacity'] }}">
                <input type="hidden" name="amenities" value="{{ $vans['amenities'] }}">
                <input type="hidden" name="pickupDate" value="{{ $vans['departureDate'] }}">
                <input type="hidden" name="pickupTime" value="{{ $vans['departureTime'] }}">
                <input type="hidden" name="returnDate" value="{{ $query['returnDate'] }}">
                <input type="hidden" name="type" value="{{ $type }}">
                

                <div class="buttons btn-van">
                    <a class="cancel modal-btn" wire:click="$emit('closeModal')">Cancel</a>
                    <button class="proceed modal-btn" id="proceed">Proceed</a>
                </div>

                @csrf

                </form>
            </div>
        </div>
    </header>
</div>


