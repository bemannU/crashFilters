//add an event listener to the form and prevent the default action of the form refreshing the page
document.getElementById("crashForm").addEventListener("submit", function (event) {
    event.preventDefault();
    //get the values from the form and remove any whitespace
    let year = document.getElementById("year").value.trim();
    let month = document.getElementById("month").value.trim();
    let day = document.getElementById("day").value.trim();
    let time = document.getElementById("time").value.trim();
    let totalFats = document.getElementById("totalFats").value.trim();
    let totalMI = document.getElementById("totalMI").value.trim();
    let totalSI = document.getElementById("totalSI").value.trim();
    let roadSurface = document.getElementById("roadSurface").value.trim();
    let drugsInvolved = document.getElementById("drugsInvolved").value.trim();
    let duiInvolved = document.getElementById("duiInvolved").value.trim();
    let crashType = document.getElementById("crashType").value.trim();
    //get references to the message div and submit button
    const formMessage = document.getElementById("message");
    const submitBtn = document.getElementById("reportBtn");
    //validate the form data
    // if (first === "" || last === "" || year_level === "") {
    //     formMessage.style.color = "red";
    //     formMessage.textContent = "All fields are required!"; 
    //     return;
    // }
    //disable the button to prevent double-submissions while waiting for the server
    submitBtn.disabled = true;
    submitBtn.textContent = "Reporting...";
    //create an object with the form data
    let formData = { locationID: locationID, year: year, month: month, day: day, time: time, totalFats: totalFats, totalMI: totalMI, totalSI: totalSI, roadSurface: roadSurface, drugsInvolved: drugsInvolved, duiInvolved: duiInvolved, crashType: crashType};
    console.log(formData);

    //send the form data to the server
    fetch("addCrash.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
    })
        //get the response from the server
        .then(response => response.text())
        //do something with the response data that has been converted to a JavaScript object
        .then(data => {
            console.log(data);
            if (data.message === " added successfully") {
                //clear the form
                document.getElementById("crashForm").reset();
                //show a green success message in the page instead of an alert
                formMessage.style.color = "green";
                formMessage.textContent = " added successfully!";
            } else {
                //show error message in red
                formMessage.style.color = "red";
                formMessage.textContent = data.message;
            }
        })
        .catch(error => {
            formMessage.style.color = "red";
            formMessage.textContent = "A network error occurred. Please try again.";
            console.error('Error:', error);
        })
        .finally(() => {
            //re-enable the button once the server has responded
            submitBtn.disabled = false;
            submitBtn.textContent = "Submit";
        });

});
