<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user data from the registration form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $unique_code = uniqid(); // Generate a unique code for each user

    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password, unique_code) 
            VALUES ('$username', '$email', '$password', '$unique_code')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
