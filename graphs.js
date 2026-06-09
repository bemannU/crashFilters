const myChart = document.getElementById("myChart");
const cf = document.getElementById("chartFilters");

cf.addEventListener("change", changeFilter)
let mainChart

function changeFilter(){
 let type =cf.value;
 getChartData(type);
 console.log(type)
}


getChartData("getLocationData")
function getChartData(type) {
    console.log('getting chart data');

    fetch("api.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        //send the search input to the server with specific request
        body: JSON.stringify({ request: type })  // Send a request to get all data
    })
        .then(response => response.json())
        .then(data => {
            let x = [];
            let y = [];
            console.log(data)
            //loop through the data and push the year level and count to the labels and counts array
            for (var i = 0; i < data.length; i++) {   
                x.push(data[i].x);
                y.push(parseInt(data[i].count))
            }
            console.log(x,y)
            buildChart(x, y)
        })
        .catch(error => console.error('Error:', error));
}

function buildChart(x, y){

if(mainChart){
mainChart.destroy()
}

mainChart = new Chart(myChart, {
    type: 'bar',
    data: {
      labels: x,
      datasets: [{
        label: '# of Crashes',
        data: y,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}
