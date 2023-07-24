<?php
session_start();
include('connection.php');

// Handle sign-out button click
if (isset($_POST['sign-out-btn'])) {
    // Destroy the session to log the user out
    session_destroy();
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REQUISMART Dashboard | welcome</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <script src="loginscript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <a href="home.php"><img src="images/SOLNs.png" alt="REQUISMART " class="logo"></a>
        <a href="home.php" ><ion-icon name="home-sharp"></ion-icon></a>
        <nav> 
            <a href="#main" class="direct">About Us</a>
            <a href="#help-support" class="direct">Help & support</a>     
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
                <a href="myprofile."><ion-icon name="settings"></ion-icon> Settings</a>
            </li>
        </ul>
        <form method="post">
            <button type="submit" id="sign-out-btn" name="sign-out-btn"> <ion-icon name="log-out"></ion-icon> Sign Out</button>
        </form>
        </div>
<!--main content-->

    <section id="showcase">
    <div class="home-main-content">
        <h1>Company Budgets and Requisition management system</h1>
        <p>REQUISMART is a revolutionary budgets and requisitions system that helps streamline the procurement process. Our intuitive system allows you to keep track of all of your spending, allowing for more accurate forecasting and better budget management. With REQUISMART, you can reduce paperwork, speed up processes, and simplify procurement, resulting in more time to focus on other important tasks.</p>
        </div>
    </section>

        <section id="boxes">
            <div class="container">
                <div class="box">
                    <img src="images/management.jpg" alt="Financial Management Dashboard">
                    <h3>Financial Management Dashboard</h3>
                    <p>Our financial overview service provides detailed insight into your budgets, expenses, and requisitions in a formal tone.</p>

                </div>
                <div class="box">
                    <div class="overlay"></div>
                    <img src="images/assistance.jpg" alt="Budget and Requisition Management Assistance">
                    <h3>Budget and Requisition Management Assistance</h3>
                    <p>The Help and Support section provides users with access to resources and assistance for any issues or queries they may have, in a formal tone.</p>

                </div>
                <div class="box">
                    <img src="images/tool.jpg" alt="Requisition Management Tool">
                    <h3>Requisition Management Tool</h3>
                    <p>To submit a new requisition, access the Requisitions Management section and follow the necessary steps</p>

                </div>
            </div>
        </section>

        <section id="main">
            <div class="container">
                <article id="main-col">
                    <h1 class="page-title"> About Us</h1>
                    <p>
                        At RequiSmart, our mission is to empower businesses to take control of their finances through intelligent budget management and streamlined requisition processes. We strive to provide our clients with a user-friendly platform that simplifies financial management and facilitates efficient decision-making. Our goal is to be the go-to solution for businesses seeking a comprehensive accounting platform that delivers results and maximizes their financial potential.
                    </p>
                    <p class="dark">
                        We work with our clients to develop strategies that are tailored to their unique needs, allowing them to maximize their resources and achieve their goals. We also provide ongoing support and assistance throughout the process, making sure that our clients are able to get the most out of their budgets and requisition services. 
                    </p>
                </article>

                <aside id="sidebar">
                    <div class="dark">
                    <h3>what we do </h3>
                    <p>Our comprehensive financial management platform streamlines budget tracking and requisition processes, empowering businesses to make informed financial decisions and drive growth.</p>
                    </div>
                </aside>
                
            </div>
        </section>
        
    <section id="help-support">
        <h2>Help and Support</h2>
        <div class="contact-container">
            <div class="contact">
                <h3>Production Department</h3>
                <p>Contact: +254 789-456-345</p>
                <p>Email: production@example.com</p>
            </div>
            <div class="contact">
                <h3>Tech Department</h3>
                <p>Contact: +254 790-456-345</p>
                <p>Email: tech@example.com</p>
            </div>
            <div class="contact">
                <h3>Records Department</h3>
                <p>Contact: +254 792-456-345</p>
                <p>Email: records@example.com</p>
            </div>
            <div class="contact">
                <h3>General Support</h3>
                <p>Contact: +254 794-456-345</p>
                <p>Email: support@example.com</p>
            </div>
    </div>
    </section>


  <div class="footer">
        <a href="https://twitter.com" target="_blank"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="https://facebook.com" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="https://instagram.com" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
    </div> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
