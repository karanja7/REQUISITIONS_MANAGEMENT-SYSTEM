<?php
// Handle sign-out button click
if (isset($_POST['sign-out-btn'])) {
    // Destroy the session to log the user out
    session_destroy();
    // Redirect to the login page
    header("Location: login.php");
    exit();
}

session_start();
include("connection.php");

// Check if the user is logged in and the unique code is stored in the session
if (isset($_SESSION['unique_code'])) {
    $unique_code = $_SESSION['unique_code'];

    // Fetch the user's email from the database using the unique code
    $sql = "SELECT username, email FROM users WHERE unique_code = '$unique_code'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // If a user with the unique code is found, retrieve the email
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $email = $row['email'];
    } else {
        // Redirect to the login page if the user is not found
        header("Location: login.php");
        exit();
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REQUISMART Dashboard</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <script src="loginscript.js"></script>
</head>
<body>
    <div class="header">
        <img src="images/SOLNs.png" alt="REQUISMART Logo" class="logo">
        <a href="home.php" ><ion-icon name="home-sharp"></ion-icon></a>
        <nav> 
            <a href="#" class="direct"></a>    
            <a href="#" class="direct"></a>   
            <a href="#" class="direct"></a>   

        </nav>
        
    </div>
    
    <div class="sidebar">
        <div class="user-info">
            <?php
            if (isset($_SESSION['username'])) {
                echo "You are logged in as: " . $_SESSION['username'];
            }
            ?>
        </div>
        <ul class="menu">
            <li>
                <a href="budgets.php"><ion-icon name="podium"></ion-icon> Budgets</a>
                <a href="requisitions.php"><ion-icon name="newspaper"></ion-icon></ion-icon> Requisitions</a>  
                <a href="myprofile.php"><ion-icon name="person-circle-sharp"></ion-icon> Profile</a>
                <a href="F.A.Qs.php"><ion-icon name="help-circle"></ion-icon> F.A.Qs</a>
                <a href="myprofile.php"><ion-icon name="settings"></ion-icon> Settings</a>
            </li>
        </ul>
        <form method="post">
            <button type="submit" id="sign-out-btn" name="sign-out-btn"> <ion-icon name="log-out"></ion-icon> Sign Out</button>
        </form>
    </div>
    
    <div class="main-content">
        <h1>My Profile </h1>
        <!-- my profile content goes here -->
        <form action="update_profile.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br>

        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" name="confirm_password" required><br>

        <input type="submit" value="Save Changes">
    </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
