	// pupulate the textboxes with user's full name when the checkbox is checked
    
	var checkCommuter = document.getElementByID('commuter');
	
	var hiddenFname = document.getElementsByClassName("hidden-fname").innerHTML;
	var hiddenLname = document.getElementsByClassName("hidden-lname").innerHTML;

    var getFname = document.getElementById("fname");
    var getLname = document.getElementById("lname");
	
		if (checkCommuter.checked = true) {
            alert('haha');
		}

		else {
			getFname.value = '';
			getLname.value = '';
		}


    // <!-- Primary Passenger Gender Dropdown Scripts -->

	const selectedGender = document.querySelector(".selected-gender");
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

    // <!-- Second Passenger Gender Dropdown Scripts -->

    const selectedSecondGender = document.querySelector(".second-selected-gender");
	const gendersecondContainer = document.querySelector(".second-container");
	const optionssecondGender = document.querySelectorAll(".second-gender");
	selectedSecondGender.addEventListener("click", () => {
		gendersecondContainer.classList.toggle("active");
	});

	optionssecondGender.forEach(o => {
		o.addEventListener("click", () => {
			selectedSecondGender.innerHTML = o.querySelector("label").innerHTML;
			gendersecondContainer.classList.remove("active");
		});
	});

    // <!-- Third Passenger Gender Dropdown Scripts -->

	const selectedThirdGender = document.querySelector(".third-selected-gender");
	const genderThirdContainer = document.querySelector(".third-container");
	const optionsthirdGender = document.querySelectorAll(".third-gender");
	selectedThirdGender.addEventListener("click", () => {
		genderThirdContainer.classList.toggle("active");
	});

	optionsthirdGender.forEach(o => {
		o.addEventListener("click", () => {
			selectedThirdGenderthird.innerHTML = o.querySelector("label").innerHTML;
			genderThirdContainer.classList.remove("active");
		});
	});