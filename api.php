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

//api checks based on the request type and selects the relevent query
if($request == "all"){
    $sql = "SELECT * FROM main limit 100";

}else{
    echo json_encode(["message" => "Invalid request"]);
    exit;
}

//query the result from the database using the selected sql statement
$result = $conn->query($sql);

//check if there are results
if ($result->num_rows > 0) {
    // Loop through the results storing them in an array to be returned as JSON
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row; // Add each row to the students array
    }
    // Return the results as JSON back to fetch in the frontend
    echo json_encode($students);
} else {
    echo json_encode(["message" => "No data found"]);
}
//close the database connection
$conn->close();
?>