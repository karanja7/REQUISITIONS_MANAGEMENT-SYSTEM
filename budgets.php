<?php
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
    <title>REQUISMART Dashboard</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <script src="script.js"></script>
    
</head>
<body>
    <div class="header">
        <img src="images/SOLNs.png" alt="REQUISMART Logo" class="logo">
        <a href="home.php" ><ion-icon name="home-sharp"></ion-icon></a>
        <nav> 
        <a href="#main" class="direct"></a>
        <a href="#help-support" class="direct"></a>  
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
        <!-- Budgets content goes here -->
        <h1>Budgets</h1>
        <div class="tabular--wrapper">
            <h3 class="main-title">Today's Financial Data</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                        <tbody>
                            <tr>
                                <td> 2023-06-29</td>
                                <td>Expenses</td>
                                <td>Office Supplies</td>
                                <td>$250</td>
                                <td>office Expenses</td>
                                <td>Pending</td>
                                <td><button>Edit</button></td>
                            </tr>
                            <tr>
                                <td> 2023-06-29</td>
                                <td>Income</td>
                                <td>Client Payment</td>
                                <td>$250</td>
                                <td>Sales</td>
                                <td>Completed</td>
                                <td><button>Edit</button></td>
                            </tr>
                            <tr>
                                <td> 2023-06-29</td>
                                <td>Expenses</td>
                                <td>Goods Transport</td>
                                <td>$250</td>
                                <td>Transport</td>
                                <td>Pending</td>
                                <td><button>Edit</button></td>
                            </tr>      
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">Total: $1,100</td>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
        
    
        <div class="budget-item">
            <div class="budget-card">
                <div class="budget-title">PRODUCTION Budget</div>
                <div class="budget-amount">Total Amount: $10,000</div>
                <div class="budget-spending">Spending to Date: $4,500</div>
                <div class="budget-remaining">Remaining Balance: $5,500</div>
                <div class="budget-details">
                    <p>Description: This budget is allocated for marketing campaigns.</p>
                    <p>Start Date: January 1, 2023</p>
                    <p>End Date: December 31, 2023</p>
                </div>
            </div>
        </div>
    
        <div class="budget-item">
            <div class="budget-card">
                <div class="budget-title">IT & TECH Budget</div>
                <div class="budget-amount">Total Amount: $20,000</div>
                <div class="budget-spending">Spending to Date: $15,000</div>
                <div class="budget-remaining">Remaining Balance: $5,000</div>
                <div class="budget-details">
                    <p>Description: This budget is allocated for IT infrastructure and software.</p>
                    <p>Start Date: January 1, 2023</p>
                    <p>End Date: December 31, 2023</p>
                </div>
            </div>
        </div>
    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
