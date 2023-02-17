{{-- <details class="gender-dropdown">

    <summary class="selected-gender"> 
        Select
    </summary>

    <div class="gender-select-box">

        <div class="gender-container">

            <div class="gender">
                <input type="radio" class="radio" id="Female" name="gender[]" />
                <label for="Female">{{ __('Female') }}</label>
            </div>
            <div class="gender">
                <input type="radio" class="radio" id="Male" name="gender[]" />
                <label for="Male">{{ __('Male') }}</label>
            </div>
            <div class="gender">
                <input type="radio" class="radio" id="Others" name="gender[]" />
                <label for="Others">{{ __('Others') }}</label>
            </div>
        </div>
   
    
</details> --}}

<div class="gender-dropdown0">
    <div class="gender-select-box0">

        <div class="gender-container0">

            <div class="gender0">
                <input type="radio" value="Female" class="radio" id="Female" name="gender[]" />
                <label for="Female">{{ __('Female') }}</label>
            </div>
            <div class="gender0">
                <input type="radio" value="Male" class="radio" id="Male" name="gender[]" />
                <label for="Male">{{ __('Male') }}</label>
            </div>
            <div class="gender0">
                <input type="radio" value="Female" class="radio" id="Others" name="gender[]" />
                <label for="Others">{{ __('Others') }}</label>
            </div>
        </div>

        <div class="selected-gender0"> 
            Gender
        </div>

    </div>
</div>


<script>

    const selectedGender0 = document.querySelector(".selected-gender0");
	const genderContainer0 = document.querySelector(".gender-container0");
	const optionsGender0 = document.querySelectorAll(".gender0");

	selectedGender0.addEventListener("click", () => {
		genderContainer0.classList.toggle("active");
	});

	optionsGender0.forEach(o => {
		o.addEventListener("click", () => {
			selectedGender0.innerHTML = o.querySelector("label").innerHTML;
			genderContainer0.classList.remove("active");
		});
	});

</script>