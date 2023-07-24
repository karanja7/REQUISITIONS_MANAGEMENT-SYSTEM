<?php
// Connect to the database and fetch data
$servername = "localhost";
$username = "root";
$password = "Gathoni1.";
$dbname = "requisition_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT product_name, remaining_quantity, total_quantity FROM products";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
