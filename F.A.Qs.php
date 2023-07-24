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
                echo "You are logged in as: " .$_SESSION['username'];
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
        <h1>F.A.Qs </h1>
        <div class="no-data-container">
            <p>No data for now</p>
            <img src="images/empty-box.png" alt="Empty Box">
            
        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>