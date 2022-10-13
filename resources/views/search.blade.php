@extends('layouts.main')

@section('content')

<main class="l-main">

    <!--  MENU TRANSACTION -->
    <section class="section " style="padding-top: 4.5rem;" id="reserve">
        
        <!-- Header -->
            <div class="transaction-bg">

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

                                            <input type="submit" class="search_button" value="Update">
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

                                        <input type="submit" class="search_button" value="Update">

                                    </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>

    <section class="results-transaction">

        <div class="results-container">

            <!-- SEATS -->

            @if(str_contains(url()->current(), '/search/results'))

            <div class="result-head">

                @if (count($result) >= 1)

                <div class="result-count">We've found {{ count($result) }} result/s</div>
                {{-- <div class="filter-container">
                    <div class="sort-by">Sort by</div>
                    <label class="sort-latest">
                        <input type="checkbox" name="latest" class="sort-by-latest" value="latest"/>
                        <div class="icon-box">
                            <span>Latest</span>
                        </div>
                    </label>
                </div> --}}
                    
                @endif

            </div>

            @if (count($result) == 0)

                <div class="no-results-container">
                    <div class="no-results-bg"></div>
                    <div class="no-results-text dashboard-subtitle-no-bookings">No results found :<</div>
                </div>
          
            @endif

            @foreach ($result as $res)
                                     
                    <div class="available-results-container">

                        <div class="left">
                            <div class="available-results-destination-container">
                                <div class="current-destination-container">
                                    <iconify-icon inline icon="dashicons:marker" class="iconify-inline dp" width="20" height="20"></iconify-icon>
                                    <span class="dashboard-subtitle-available">{{ $res->origin }} <mark
                                            class="current-destination-tag">({{ Str::limit($res->origin, 3, '') }})</mark></span>
                                </div>

                                <iconify-icon inline icon="radix-icons:border-dashed" class="iconify-inline dp" width="20" height="20" rotate="90deg"></iconify-icon>
                                <div class="destination-point-container">

                                    <iconify-icon inline icon="el:map-marker" class="iconify-inline dp" width="20" height="20"></iconify-icon>
                                    <span class="dashboard-subtitle-available-dp">{{ $res->destination }}<mark
                                            class="destination-tag">({{ Str::limit($res->destination, 3, '') }})</mark></span>
                                </div>
                            </div>

                            <div class="available-results-vaninformation-container">

                                <div class="No-seats-available">
                                    <span class="dashboard-subtitle-available-seats-tile">Available
                                        Seats</span>
                                    <div>
                                        <iconify-icon inline icon="mdi:car-seat" class="iconify-inline icon " width="20" height="20"></iconify-icon>
                                        <span class="dashboard-subtitle-available-seats">5 seats</span>
                                    </div>
                                </div>

                                <div class="departure-time">
                                    <span class="dashboard-subtitle-available-seats-tile">Departure
                                        Time</span>
                                    <div>
                                            <iconify-icon inline icon="mdi:bus-clock" class="iconify-inline icon" width="20" height="20"></iconify-icon>
                                        <span class="dashboard-subtitle-available-seats">{{ date('h:i A', strtotime($res->departureTime)) }}</span>
                                    </div>
                                </div>

                                {{-- <div class="plate-number">
                                    <span class="dashboard-subtitle-available-seats-tile">Plate
                                        Number</span>
                                    <div>
                                        <iconify-icon inline icon="mdi:van-passenger" class="iconify-inline icon" width="20" height="20"></iconify-icon>
                                        <span class="dashboard-subtitle-available-seats">{{ $res->plateNo }}</span>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <div class="right">
                            <div class="right-information">
                                <span class="dashboard-subtitle-available-seats-price"
                                    style="margin-left: 1.5rem;">P {{ (int) $res->fare }}</span>  
                            </div>

                            <button onclick='Livewire.emit("openModal", "modal.select-seat", {{ json_encode($res) }})' class="select-button"><a>Select Seats</a></button>
                        </div>
                    </div>

                    <br>

                @endforeach

            @elseif (str_contains(url()->current(), '/search/van'))

            @foreach ($vans as $van)

            <!-- VAN -->
            <div class="available-results-container">

                <div class="left">
                    <div class="available-results-destination-container">
                        <div class="current-destination-container">
                            <iconify-icon inline icon="dashicons:marker" class="iconify-inline dp" width="20" height="20"></iconify-icon>
                            <span class="dashboard-subtitle-available">{{ $van->origin }} <mark
                                    class="current-destination-tag">({{ Str::limit($van->origin, 3, '') }})</mark></span>
                        </div>

                        <iconify-icon inline icon="radix-icons:border-dashed" class="iconify-inline dp" width="20" height="20" rotate="90deg"></iconify-icon>
                        <div class="destination-point-container">

                            <iconify-icon inline icon="el:map-marker" class="iconify-inline dp" width="20" height="20"></iconify-icon>
                            <span class="dashboard-subtitle-available-dp">{{ $van->destination }}<mark
                                    class="destination-tag">({{ Str::limit($van->destination, 3, '') }})</mark></span>
                        </div>
                    </div>

                    <div class="available-results-vaninformation-container">

                        <div class="No-seats-available">
                            <span class="dashboard-subtitle-available-seats-tile">Available
                                Seats</span>
                            <div>
                                <iconify-icon inline icon="mdi:car-seat" class="iconify-inline icon " width="20" height="20"></iconify-icon>
                                <span class="dashboard-subtitle-available-seats">{{ $van->seatCapacity }}</span>
                            </div>
                        </div>

                        {{-- <div class="departure-time">
                            <span class="dashboard-subtitle-available-seats-tile">Departure
                                Time</span>
                            <div>
                                    <iconify-icon inline icon="mdi:bus-clock" class="iconify-inline icon" width="20" height="20"></iconify-icon>
                                <span class="dashboard-subtitle-available-seats">{{ date('h:i A', strtotime($van->departureTime)) }}</span>
                            </div>
                        </div> --}}

                        <div class="plate-number">
                            <span class="dashboard-subtitle-available-seats-tile">Vehicle</span>
                            <div>
                                <iconify-icon inline icon="mdi:van-passenger" class="iconify-inline icon" width="20" height="20"></iconify-icon>
                                <span class="dashboard-subtitle-available-seats">{{ $van->brand }} {{ $van->model }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="right">
                    <div class="right-information">
                        <span class="dashboard-subtitle-available-seats-price"
                            style="margin-left: 1.5rem;">P {{ (int) $van->rentalPrice }}</span>  
                    </div>

                    <button class="select-button"><a href="#modalViewVan">Select Van</a></button>
                </div>
            </div>

            <br>

            @endforeach
                
            @endif  

        </div>
    </section>

</main>

<script>
    function switchText() {
      let obj1 = document.getElementById("left");
      let obj2 = document.getElementById("right");
    
      let temp = obj1.value;
      obj1.value = obj2.value;
      obj2.value = temp;
    }
</script>

<script>

    function displayValue() {
        var seat = document.getElementsByName('seatCode');
          
        for(i = 0; i < 3; i++) {

            if(seat[i].checked)

            document.getElementById("result").innerHTML
                    = "Seats: "+ seat[i].value;
        }
    }

</script>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {

        let i;
        let slides = document.getElementsByClassName("van-photo");
        let dots = document.getElementsByClassName("demo");
        //   let captionText = document.getElementById("caption");

        if (n > slides.length) {
            slideIndex = 1
        }

        if (n < 1) {
            slideIndex = slides.length
        }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace("active", "");
        }

        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }

</script>

@endsection