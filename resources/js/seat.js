var valueList = document.getElementById('valueList');
var noOfPass = document.getElementById('noOfPassengers');
var maxMsg = document.getElementById('max');
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
                
                // for (let i = 0; i < chkbox.length; i++) {

                //     chkbox[i].disabled = true;

                //     if (chkbox[i].checked) {

                //         chkbox[i].disabled = false;
                //     }
                // }
            }

            else if (listArray.length > noOfPass) {

                this.checked = false;
                listArray.pop(this.value);
                valueList.value = listArray.join(', ');

                setTimeout(function(){
                    maxMsg.style.display = "block";
                }, 1000);
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

