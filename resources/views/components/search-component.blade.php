<!-- Header -->
 <div class="transaction-bg">

    <div class="tabs">

        <div class="content-container">
            <nav class="tab-pills">
                <span class="tab-title active" data-title="home">                    
                    <button class="tab-btn"><iconify-icon icon="mdi:car-seat" class="iconify tab" width="22" height="22"></iconify-icon>Reserve Seats</button>
                </span>
                <span class="tab-title" data-title="work">                    
                    <button class="tab-btn"><iconify-icon icon="fa6-solid:van-shuttle" class="iconify tab" width="22" height="22"></iconify-icon> Rent Van</button>
                </span>
                <div class="slider"></div>
            </nav>
            <div class="content">
                <div class="tab-content show" data-content="home">

                    <!-- Reserve Seat -->

                    <div class="reserve_seat" id="reserve-seat">

                        <form action="{{ route('search.seat') }}" method="GET">
    
                        <!--  Destination -->
                            <div class="destinations_transaction">
    
                                <!--  Current -->
                                    <div class="current_destination_container">
                                        <span class="dashboard-subtitle-current-destination">Leaving From</span>
                                        <input class="textbox currentdestination search-input" list="origin" name="origin" id="left" value="{{ Request::get('origin') }}" placeholder="Current Destination" autocomplete="off" required>
    
                                        <datalist id="origin">
    
                                            @foreach ($route->unique('origin') as $rt)
    
                                                <option value="{{ $rt->origin }}">{{ Str::upper(Str::limit($rt->origin, 3, '')) }}</option>
                                                
                                            @endforeach
    
                                        </datalist>
                                    
                                    </div>
    
                                    <button onclick="switchText()"><span class="iconify-inline arrow-destination" data-icon="akar-icons:arrow-right-left" data-width="20" data-height="20"></span></button>
    
                                    <!--  Destination Point -->
    
                                        <div class="current_destination_container">
                                            <span class="dashboard-subtitle-current-destination">Going to</span>
                                            <input class="textbox currentdestination search-input" list="destination" name="destination" id="right" value="{{ Request::get('destination') }}" placeholder="Destination Point" autocomplete="off" required>
                                            
                                            <datalist id="destination">
    
                                                @foreach ($route->unique('destination') as $rt)
    
                                                    <option value="{{ $rt->destination }}">{{ Str::upper(Str::limit($rt->destination, 3, '')) }}</option>
                                                
                                                @endforeach
    
                                            </datalist>
    
                                        </div>
                            </div>
    
                            <div class="border-left"></div>
    
                            <!--  DATE -->
    
                                <div class="date_transaction_container">
    
                                    <!--  Departure Date -->
    
                                        <div class="departuredate_transaction">
                                            <span class="dashboard-subtitle-current-destination">Departure Date</span>
                                            <input type="date" class="departuredate" name="departureDate" value="{{ Request::get('departureDate') }}" onfocus="this.showPicker()" required>  
                                        </div>
    
                                    <!--  Return Date -->
                                        <div class="date_transaction">
                                            <span class="dashboard-subtitle-current-destination">Return Date</span>
                                            <input type="date" class="departuredate" name="returnDate" value="{{ Request::get('returnDate') }}" onfocus="this.showPicker()">
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
                                                        <input type="radio" @if(request()->noOfPassengers == 1) @checked(true) @endif class="radio" id="1" value="1" name="noOfPassengers"/>
                                                        <label for="1">1 passenger</label>
                                                    </div>
                                                    <div class="Passenger">
                                                        <input type="radio" @if(request()->noOfPassengers == 2) @checked(true) @endif class="radio" id="2" value="2" name="noOfPassengers"/>
                                                        <label for="2">2 passengers</label>
                                                    </div>
                                                    <div class="Passenger">
                                                        <input type="radio" @if(request()->noOfPassengers == 3) @checked(true) @endif class="radio" id="3" value="3" name="noOfPassengers"/>
                                                        <label for="3">3 passengers</label>
                                                    </div>
                                                </div>
                                                <div class="selected-Passenger">
                                                    
                                                    {{ (string) request()->noOfPassengers }} 
    
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

                                    @csrf
    
                                    <input type="submit" class="search_button" value="Search">
                        </form>
                                    
                    </div>
                </div>
                <div class="tab-content" data-content="work">

                    <!-- Rent Van -->
                <div class="rent_van">

                    <form action="{{ route('search.van') }}" method="GET">

                    <!--  Destinations -->
                        <div class="destinations_transaction">
                            <!--  Current -->
                                <div class="current_destination_container">
                                    <span class="dashboard-subtitle-current-destination">Leaving
                                        From</span>
                                    <input class="textbox currentdestination search-input" type="text" name="origin"
                                        placeholder="Current Destination" value="{{ request()->origin }}" required>
                                </div>

                                <button onclick="switchText()"><span class="iconify-inline arrow-destination" data-icon="akar-icons:arrow-right-left" data-width="20" data-height="20"></span></button>

                                <!--  Destination Point -->
                                    <div class="current_destination_container">
                                        <span class="dashboard-subtitle-current-destination">Going
                                            to</span>
                                        <input class="textbox currentdestination search-input" type="text" name="destination"
                                            placeholder="Destination Point" value="{{ request()->destination }}" required>
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
                                        onfocus="this.showPicker()" required>
                                    
                                </div>

                                <!--  Return Date -->
                                    <div class="date_transaction">
                                        <span class="dashboard-subtitle-current-destination">Return
                                            Date</span>
                                        <input type="date" class="departuredate" name="returnDate" value="{{ request()->returnDate }}"
                                            onfocus="this.showPicker()" required>
                                    </div>
                        </div>

                                <input type="submit" class="search_button" value="Search">

                        @csrf

                        </form>
                </div>
            

                </div>
            </div>
        </div>

    </div>
</div>

<script>

    function switchText() {
      let obj1 = document.getElementById("left");
      let obj2 = document.getElementById("right");
    
      let temp = obj1.value;
      obj1.value = obj2.value;
      obj2.value = temp;
    }
    
    const slider = document.querySelector('.slider')
    const links = document.querySelectorAll('nav span')

    const contents = document.querySelectorAll('.content .tab-content')
    const contentEl = document.querySelector('.content')

    links.forEach(link => {
        link.addEventListener('click', (e) => {
            links.forEach(link=>{
                link.classList.remove('active')
                sliderPos(link)
            })
            link.classList.add('active')
            sliderPos(link)
        })

    })

    function sliderPos(link) {

        slider.style.width = `${link.offsetWidth}px`
        slider.style.height = `${link.offsetHeight}px`
        slider.style.left = `${link.offsetLeft}px`

        contents.forEach(c => {
            c.classList.remove('show')
            if (c.dataset.content == link.dataset.title) {
                c.classList.add('show')
            }
        })
    }

    keepDatalistOptions('.search-input');

    function keepDatalistOptions(selector = '') {

        // select all input fields by datalist attribute or by class/id
        selector = !selector ? "input[list]" : selector;
        let datalistInputs = document.querySelectorAll(selector);
        
        if (datalistInputs.length) {
            for (let i = 0; i < datalistInputs.length; i++) {
            let input = datalistInputs[i];
            input.addEventListener("input", function(e) {
                e.target.setAttribute("placeholder", e.target.value);
                e.target.blur();
            });
            input.addEventListener("focus", function(e) {
                e.target.setAttribute("placeholder", e.target.value);
                e.target.value = "";
            });
            input.addEventListener("blur", function(e) {
                e.target.value = e.target.getAttribute("placeholder");
            });
            }
        }

    }

</script>
