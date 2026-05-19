<?php
header("Content-Type: application/json");
include "connect.php";  // Include your database connection file

// Check if a file is uploaded
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["csvFile"])) {
    $file = $_FILES["csvFile"];

    // Check for upload errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        echo json_encode(["message" => "File upload error"]);
        exit;
    }

    // Read the CSV file contents
    $csvData = file_get_contents($file["tmp_name"]);
    $lines = explode("\n", $csvData); // Split the CSV data into lines by newline characters
    $parsedData = []; // Initialize an array to hold the parsed CSV data

    // Loop through each line of the CSV file and parse it into an array using str_getcsv
    foreach ($lines as $line) {
        $row = str_getcsv($line); // Convert CSV row into an array

        // Ensure the row has at least 12 columns before inserting
        if (count($row) >= 12) {
            $parsedData[] = $row; // Add the parsed row to the parsedData array
        }
    }

    // Insert into the database using a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO main (locationID, year, month, day, time, totalFats, totalMI, totalSI, roadSurface, drugsInvolved, duiInvolved, crashType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    //loop through each row from the CSV and load into the database using the prepared statement
    foreach ($parsedData as $row) {
        $locationID = intval($row[0]); //convet to number
        $year = $row[1];
        $month = $row[2];
        $day = $row[3];
        $time = $row[4];
        $totalFats = $row[5];
        $totalMI = $row[6];
        $totalSI = $row[7];
        $roadSurface = $row[8];
        $drugsInvolved = $row[9];
        $duiInvolved = $row[10];
        $crashType = $row[11];

        // Bind the parameters to sql statement in this example we have 3 parameters all of which are strings so we use "sss" to indicate this
        $stmt->bind_param("iisssiiissss", $locationID, $year, $month, $day, $time, $totalFats, $totalMI, $totalSI, $roadSurface, $drugsInvolved, $duiInvolved, $crashType);
        // Execute the statement and check for errors
        if (!$stmt->execute()) {
            echo json_encode(["message" => "Error inserting data: " . $stmt->error]);
            $stmt->close();
            $conn->close();
            exit;
        }
    }
    // Close the statement and return a success message
    $stmt->close();
    // Return a success message as JSON
    echo json_encode(["message" => "CSV data successfully uploaded and inserted"]);
} else {
    echo json_encode(["message" => "No file uploaded"]);
}

$conn->close();
?>
