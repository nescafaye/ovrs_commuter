
// transaction dropdown

    const selectedPassenger = document.querySelector(".selected-Passenger");
    const PassengerContainer = document.querySelector(".Passenger-container");
    const optionsPassenger = document.querySelectorAll(".Passenger");
    selectedPassenger.addEventListener("click", () => {
        PassengerContainer.classList.toggle("active");
    });

    optionsPassenger.forEach(o => {
        o.addEventListener("click", () => {
            selectedPassenger.innerHTML = o.querySelector("label").innerHTML;
            PassengerContainer.classList.remove("active");
        });
    });
