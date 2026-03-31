<?php
header("Content-Type: application/json");
include "connect.php";

// Get raw JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["year"])) {

    // Use a prepared statement to safely insert data and prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO main (locationID, year, month, day, time, totalFats, totalMI, totalSI, roadSurface, drugsInvolved, duiInvolved, crashType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssiiissss", $data["locationID"], $data["year"], $data["month"], $data["day"], $data["time"], $data["totalFats"], $data["totalMI"], $data["totalSI"], $data["roadSurface"], $data["drugsInvolved"], $data["duiInvolved"], $data["crashType"]);

    if ($stmt->execute()) {
        echo json_encode(["message" => "crash reported successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["message" => "Invalid input"]);
}

$conn->close();
?>

