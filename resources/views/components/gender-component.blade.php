

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



<script>

    const selectedGender = document.querySelector(".selected-gender", "");
	const genderContainer = document.querySelector(".gender-container");
	const optionsGender = document.querySelectorAll(".gender");

	selectedGender.addEventListener("click", () => {
		genderContainer.classList.toggle("active");
	});

	optionsGender.forEach(o => {
		o.addEventListener("click", () => {
			selectedGender.innerHTML = o.querySelector("label").innerHTML;
			genderContainer.classList.remove("active");
		});
	});

</script>