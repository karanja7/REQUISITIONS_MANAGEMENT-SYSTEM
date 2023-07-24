<?php
require_once 'connection.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user data from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables and redirect to the homepage
            $_SESSION['username'] = $user['username'];
            $_SESSION['unique_code'] = $user['unique_code'];
            header("Location: home.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}
?>
