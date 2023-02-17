
<div class="gender-dropdown1">
    <div class="gender-select-box1">

        <div class="gender-container1">

            <div class="gender1">
                <input type="radio" value="Female" class="radio1" id="Female1" name="gender[]" />
                <label for="Female1">{{ __('Female') }}</label>
            </div>
            <div class="gender1">
                <input type="radio" value="Male" class="radio1" id="Male1" name="gender[]" />
                <label for="Male1">{{ __('Male') }}</label>
            </div>
            <div class="gender1">
                <input type="radio" value="Female" class="radio1" id="Others1" name="gender[]" />
                <label for="Others1">{{ __('Others') }}</label>
            </div>
        </div>

        <div class="selected-gender1"> 
            Gender
        </div>

    </div>
</div>


<script>

    const selectedGender1 = document.querySelector(".selected-gender1");
	const genderContainer1 = document.querySelector(".gender-container1");
	const optionsGender1 = document.querySelectorAll(".gender1");

	selectedGender1.addEventListener("click", () => {
		genderContainer1.classList.toggle("active");
	});

	optionsGender1.forEach(o => {
		o.addEventListener("click", () => {
			selectedGender1.innerHTML = o.querySelector("label").innerHTML;
			genderContainer1.classList.remove("active");
		});
	});

</script>