<?php
session_start();

// Include the database connection code
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the logged-in user's unique code from the session
    $unique_code = $_SESSION['unique_code'];

    // Get the form data from the POST request
    $username = $_POST['username'];
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate and update the user's data
    if ($new_password === $confirm_password) {
        // Hash the new password before storing it in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the user's data in the database
        $sql = "UPDATE users SET username='$username', email='$email', password='$hashed_password'
                WHERE unique_code='$unique_code'";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the "My Profile" page after successful update
            header("Location: myprofile.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "New password and confirm password do not match.";
    }
}
?>
