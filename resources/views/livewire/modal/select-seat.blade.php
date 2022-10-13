<style>

    .l-header {
        z-index: 1;
    }

</style>

 {{-- <div id="modalSelectSeat"> --}}
    <div class="select-seat">
        <header>
            {{-- <div class="close">
                <a href="#close" class="exit"><i class="uil uil-times"></i></a>
            </div>
            <br> --}}
            <center>
                <span class="dashboard-subtitle-modal-seats">Choose your preferred seats</span>
            </center>

            {{-- @foreach ($trip as $tr)
               {{  $tr->fare }}
            @endforeach --}}


            <div class="interactive-seats" style="margin-top:1.8rem; margin-left: 1rem;">
                <div class="available">
                    <iconify-icon inline icon="akar-icons:circle" class="iconify avail" width="15" height="15"></iconify-icon>
                    <span
                        class="dashboard-subtitle-modal-seats-interactive-available">Available</span>
                </div>
                <div class="selected">
                    <iconify-icon inline icon="akar-icons:circle-fill" class="iconify select" width="15" height="15"></iconify-icon>
                    <span class="dashboard-subtitle-modal-seats-interactive">Selected</span>
                </div>
                <div class="reserved">
                    <iconify-icon inline icon="akar-icons:circle-fill" class="iconify reserve" width="15" height="15"></iconify-icon>
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
                            <input type="checkbox" name="seatCode" class="chxbx" value="{{ $seatCode }}" wire:click="increment"/>
                            <div class="icon-box">
                                <span>{{ $seatCode }}</span>
                            </div>
                        </label>

                    @endforeach

                    {{ $choose }}

                </div>
            </div>

            <center> <div id="result"></div> </span></center>
            
            <div class="buttons">
                <br>
                <button class="cancel" wire:click="$emit('closeModal')">Cancel</button>
                <button onclick="displayValue()" class="proceed"><a href="{{ route('payment') }}">Proceed</a></button>
            </div>
        </header>
    </div>
{{-- </div> --}}