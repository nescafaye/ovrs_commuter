@extends('layouts.main')

@section('content')

<main class="l-main">

    <!--  MENU TRANSACTION -->
    <section class="section " style="padding-top: 4.5rem;" id="reserve">
        
        <x-search-component/>
        
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
                                    <span class="dashboard-subtitle-available">{{ $res->origin }}&nbsp;<mark
                                            class="current-destination-tag">({{ Str::limit($res->origin, 3, '') }})</mark></span>
                                </div>

                                <iconify-icon inline icon="radix-icons:border-dashed" class="iconify-inline dp" width="20" height="20" rotate="90deg"></iconify-icon>
                                <div class="destination-point-container">

                                    <iconify-icon inline icon="el:map-marker" class="iconify-inline dp" width="20" height="20"></iconify-icon>
                                    <span class="dashboard-subtitle-available-dp">{{ $res->destination }}&nbsp;<mark class="destination-tag">({{ Str::limit($res->destination, 3, '') }})</mark></span>
                                </div>
                            </div>

                            <div class="available-results-vaninformation-container">


                                <div class="No-seats-available">
                                    <span class="dashboard-subtitle-available-seats-tile">Available Seats</span>

                                    <div>
                                        <iconify-icon inline icon="mdi:car-seat" class="iconify-inline icon " width="20" height="20"></iconify-icon>
                                        <span class="dashboard-subtitle-available-seats">{{ $availableSeats }}</span>
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

                            </div>
                        </div>
                        <div class="right">
                            <div class="right-information">
                                <span class="dashboard-subtitle-available-seats-price"
                                    style="margin-left: 1.5rem;">P {{ (int) $res->fare }}</span>  
                            </div>

                            {{-- @foreach ($all as $item) --}}

                                {{-- @foreach ($collection as $query) --}}

                                <button onclick='Livewire.emit("openModal", "modal.select-seat", {{ json_encode($res) }})' class="select-button"><a>Select Seats</a></button>

                                {{-- @if ($loop->first)
                                    @break
                                @endif         

                            @endforeach --}}
                            

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
                            <span class="dashboard-subtitle-available-seats-tile">Seat Capacity</span>
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

                    <button onclick='Livewire.emit("openModal", "modal.select-van", {{ json_encode([$van]) }})' class="select-button"><a>Select Van</a></button>
                </div>
            </div>

            <br>

            @endforeach
                
            @endif  

        </div>
    </section>

</main>

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

    function currSlide(n) {
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