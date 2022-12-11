<style>

    .l-header {
        z-index: 1;
    }

</style>

 {{-- <div id="modalSelectSeat"> --}}
    <div class="select-seat">
        <header>

            <form action="{{ route('payment') }}">
                @csrf

                {{-- {{route('bid.update', encrypt($id))}}


                public function update($id, Request $request){

                    $ID = decrypt($id);
                    $tender = TenderMaster::findOrFail($ID);

                    ..
                    ...
                } --}}

                
            <center>
                <span class="dashboard-subtitle-modal-seats">Choose your preferred seats</span>
            </center>

            <div class="interactive-seats" style="margin-top:1.8rem; margin-left: 1rem;">
                <div class="available">
                    <iconify-icon inline icon="bx:square-rounded" class="iconify avail" width="15" height="15"></iconify-icon>
                    <span class="dashboard-subtitle-modal-seats-interactive-available">Available</span>
                </div>
                <div class="selected">
                    <iconify-icon inline icon="bxs:square-rounded" class="iconify select" width="15" height="15"></iconify-icon>
                    <span class="dashboard-subtitle-modal-seats-interactive">Selected</span>
                </div>
                <div class="reserved">
                    <iconify-icon inline icon="bxs:square-rounded" class="iconify reserve" width="15" height="15"></iconify-icon>
                    <span class="dashboard-subtitle-modal-seats-interactive">Reserved</span>
                </div>
            </div>

            <br>


            <div class="interactive-seating-chart">

                <div class="seat-layout">

                    <div class="driver-area">
                        <span class="iconify steering" data-icon="tabler:steering-wheel"
                            data-width="45" data-height="45"></span>
                    </div>

                    @foreach ($seat as $seatCode)

                        <label class="commuter-seats s1">
                            <input type="checkbox" class="chxbx" value="{{ $seatCode }}" id="{{ $seatCode }}" name="seatCode[]" onclick="maxSeats()"/>
                            <div class="icon-box">
                                <span>{{ $seatCode }}</span>
                            </div>
                        </label>

                    @endforeach

                </div>
            </div>

            <div class="prompt-section">

                <div class="selected-seats">
                    <iconify-icon inline icon="mdi:car-seat" class="iconify-inline seat-icon" width="20" height="20"></iconify-icon>
                    <input disabled type="text" id="valueList" class="valueList">
                    <input hidden type="text" id="noOfPassengers" value="{{ $query['noOfPassengers'] }}">
                    <span id="result"></span>
                </div>
    
                <div id="max-msg">
                    <span class="error-maximum">Maximum of [{{ $query['noOfPassengers'] }}] seat/s only</span>
                </div>

            </div>
            
            <div class="buttons">
                <a class="cancel modal-btn" wire:click="$emit('closeModal')">Cancel</a>

                 {{-- get url query parameters --}}
                @foreach ($trip as $tr)

                    {{-- {{ $returnDate = $tr->returnDate}} --}}

                    {{-- try mo hidden input --}}

                    <input type="hidden" name="id" value="{{ $tr->id}}">
                    <input type="hidden" name="origin" value="{{$query['origin']}}">
                    <input type="hidden" name="destination" value="{{$query['destination']}}">
                    <input type="hidden" name="route" value="{{$tr->routeTitle}}">
                    <input type="hidden" name="departureDate" value="{{$query['departureDate']}}">
                    <input type="hidden" name="departureTime" value="{{$tr->departureTime}}">
                    <input type="hidden" name="returnDate" value="{{$query['returnDate']}}">
                    <input type="hidden" name="passengers" value="{{$query['noOfPassengers']}}">
                    <input type="hidden" name="fare" value="{{ $tr->fare }}">
                    <input type="hidden" name="p" value="{{ $tr->plateNo }}">

                    <button class="proceed modal-btn disabled" id="proceed">Proceed</a>
                    
                    @if ($loop->first)
                        @break
                    @endif

                @endforeach

            </div>

            </form>
        </header>
    </div>

    <script lang="javascript">

        var valueList = document.getElementById('valueList');
        var noOfPass = document.getElementById('noOfPassengers');
        var result = document.getElementById('result');
        var maxMsg = document.getElementById('max-msg');
        noOfPass = parseInt(noOfPass.value);

        var proceedBtn = document.getElementById('proceed');

        valueList.value = 'No seat/s selected'

        var listArray = [];
        var checkboxes = document.querySelectorAll('.chxbx');
        var chkbox = document.getElementsByClassName('chxbx');

            for (var checkbox of checkboxes) {

                checkbox.addEventListener('click', function() {

                    if (this.checked == true) {
                        listArray.push(this.value);
                        valueList.value = listArray.join(', ');

                        if (noOfPass == listArray.length) {

                            proceedBtn.classList.remove("disabled");
                            
                        }

                        else if (listArray.length > noOfPass) {

                            this.checked = false;
                            listArray.pop(this.value);
                            valueList.value = listArray.join(', ');

                            maxMsg.style.display = "block";

                            setTimeout(function(){
                                maxMsg.style.display = "none";
                            }, 2500);
                        }

                    }

                    else {

                        //Remove from array when it is unchecked

                        listArray = listArray.filter(e => e !== this.value);
                        valueList.value = listArray.join(', ');

                        if (listArray.length == 0) {
                            valueList.value = 'No seat/s selected';
                        }

                        else if (listArray.length < noOfPass) {

                            proceedBtn.classList.add("disabled");

                            for (let i = 0; i <= chkbox.length; i++) {
                             
                             chkbox[i].disabled = false;

                            } 
                        }
                    }
                })    
            }

    </script>

{{-- </div> --}}