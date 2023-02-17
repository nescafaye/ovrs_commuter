
<div class="gender-dropdown2">
    <div class="gender-select-box2">

        <div class="gender-container2">

            <div class="gender2">
                <input type="radio" value="Female" class="radio2" id="Female2" name="gender[]" />
                <label for="Female2">{{ __('Female') }}</label>
            </div>
            <div class="gender2">
                <input type="radio" value="Male" class="radio2" id="Male2" name="gender[]" />
                <label for="Male2">{{ __('Male') }}</label>
            </div>
            <div class="gender2">
                <input type="radio" value="Female" class="radio2" id="Others2" name="gender[]" />
                <label for="Others2">{{ __('Others') }}</label>
            </div>
        </div>

        <div class="selected-gender2"> 
            Gender
        </div>

    </div>
</div>


<script>

    const selectedGender2 = document.querySelector(".selected-gender2");
	const genderContainer2 = document.querySelector(".gender-container2");
	const optionsGender2 = document.querySelectorAll(".gender2");

	selectedGender2.addEventListener("click", () => {
		genderContainer2.classList.toggle("active");
	});

	optionsGender2.forEach(o => {
		o.addEventListener("click", () => {
			selectedGender2.innerHTML = o.querySelector("label").innerHTML;
			genderContainer2.classList.remove("active");
		});
	});

</script>