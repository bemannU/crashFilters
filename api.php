<?php
include "connect.php";  // Include your database connection file


// Set the content type to JSON
header("Content-Type: application/json");
// Get the raw POST data and decode it as JSON
$data = json_decode(file_get_contents("php://input"), true);
// Retrieve data from post stored in data - always required
if(isset($data["request"])) {
    $request = $data["request"];
}else{
    echo json_encode(["message" => "Request type not specified"]);
    exit;
}

//api checks based on the request type and selects the relevent query ----------------------------------------------next button/prev button
if($request == "all"){
    $page = $data["page"];
    $os =($page *100)-100;
    $sql = "SELECT * FROM main limit 100 offset $os";
    //echo $sql;
//--------------------------------------------------------------------------------------------------------graphing system
}else if($request=="getChartData"){
    $sql = "select roadSurface as x, count(roadSurface) as count from main group by roadSurface";
}
else if($request=="getCrashTypeData"){
    $sql = "select crashType as x, count(crashType) as count from main group by crashType";
}
else if($request=="getLocationData"){
    $sql = "select locationID as x, count(locationID) as count from main group by locationID";
}
else if($request=="getDrugsData"){
    $sql = "select drugsInvolved as x, count(drugsInvolved) as count from main group by drugsInvolved";
}
else if($request=="getDUIData"){
    $sql = "select duiInvolved as x, count(duiInvolved) as count from main group by duiInvolved";
}
else{
    echo json_encode(["message" => "Invalid request"]);
    exit;
}

//query the result from the database using the selected sql statement
$result = $conn->query($sql);

//check if there are results
if ($result->num_rows > 0) {
    // Loop through the results storing them in an array to be returned as JSON
    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = $row; // Add each row to the students array
    }
    // Return the results as JSON back to fetch in the frontend
    echo json_encode($results);
} else {
    echo json_encode(["message" => "No data found"]);
}
//close the database connection
$conn->close();
?>