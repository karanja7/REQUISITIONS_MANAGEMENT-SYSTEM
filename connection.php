<?php
$servername = "localhost";
$username = "root";
$password = "Gathoni1.";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

