const dataOutput = document.getElementById('dataOutput');
const nextButton = document.getElementById("nextButton");
const prevButton = document.getElementById("prevButton");

let pageCount = 1;
nextButton.addEventListener("click",nextPage);
prevButton.addEventListener("click",prevPage);

function nextPage(){
    pageCount++
    console.log(pageCount);
    getData('all');
}

function prevPage(){
    pageCount - 1
    console.log(pageCount);
    getData('all');
}

if (window.location.search) {
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get('type');
    getData(type);
} else {
    getData('all');
}



function getData(type) {
    fetch("api.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ request: type, page: pageCount })  // Send a request to get all data
    })
        //convert the response to json
        .then(response => response.json())
        //then do something with the data
        .then(data => {
            console.log(data);
            //check if there is a message
            if (data.message) {
                dataOutput.innerHTML = '<tr><td colspan="3">' + data.message + '</td></tr>';
                return;
               // if there is no message, print the data
            } else {
                printList(data);
                console.log("works")
            }
        })
        //catch any errors and log them to the console
        .catch(error => console.error('Error:', error));
}

//this function is called when the search button is clicked - it sends a fetch request to the server api and returns the data to the printList function
function searchPlayers() {
    console.log('searchPlayers');
    const searchInput = document.getElementById('search').value;
    console.log(searchInput);
    fetch("api.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        //send the search input to the server with specific request
        body: JSON.stringify({ request: "searchPlayer", search: searchInput })  // Send a request to get all data
    })  
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.message) {
                dataOutput.innerHTML = '<tr><td colspan="3">' + data.message + '</td></tr>';
                return;
            } else {
                printList(data);
            }
        })
        .catch(error => console.error('Error:', error));
}


//this function prints out a list of students by passing in an array of data
function printList(data) {
    console.log(data)
        
    // Clear the table rows accept header
    dataOutput.innerHTML = '<th>Crash ID</th> <th>Location ID</th> <th>Year</th> <th>Month</th> <th>Day</th> <th>Time</th> <th>Fatalities</th> <th>Minor Injuries</th> <th>Serious Injuries</th> <th>Road Surface</th> <th>Drugs Involved</th> <th>DUI Involved</th> <th>Crash Type</th>';
    // Loop through the data and print each row into table
    data.forEach(row => {
        dataOutput.innerHTML += '<tr><td>' + row.crashID + '</td><td>' + row.locationID + '</td><td>' + row.year + '</td><td>' + row.month + '</td><td>' + row.day + '</td><td>' + row.time + '</td><td>' + row.totalFats + '</td><td>' + row.totalMI + '</td><td>' + row.totalSI + '</td><td>' + row.roadSurface + '</td><td>' + row.drugsInvolved + '</td><td>' + row.duiInvolved + '</td><td>' + row.crashType + '</td></tr>';
    });


}
