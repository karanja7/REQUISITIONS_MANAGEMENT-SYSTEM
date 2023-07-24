<?php
session_start();
// Database configuration
$servername = "localhost";
$username = "root";
$password = "Gathoni1.";
$dbname = "requisition_management";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Handle delete request
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    // Delete the requisition from the database
    $deleteSql = "DELETE FROM requisitions WHERE requisition_number = '$deleteId'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Requisition deleted successfully.";
    } else {
        echo "Error deleting requisition: " . $conn->error;
    }
}

// Retrieve requisition data from the database for a specific department
$department = "production"; // Replace with the desired department name or get it dynamically from the user
$sql = "SELECT * FROM requisitions WHERE department = '$department'";
$result = $conn->query($sql);

?>

<!-- HTML and CSS for displaying the list of requisitions -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisition List</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <style>
        body{
            margin-left: 20px;
            margin-right: 10px;
            font-family: 'palatino',sans-serif;
        }
        table {
            border-radius: 10px;
            width: 100%;
            border-collapse: collapse;
        }
        thead{
            
            background: rgba(113, 99, 186, 255);
            color: #fff;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        td a{
            color: green;
            background: none;
            cursor: pointer;
            text-decoration: none;
            border: none;
        }
        td a:hover{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="reqpageheader">
        <a href="home.php"><img src="images/SOLNs.png" alt="REQUISMART " class="logo"></a>
        <a href="home.php" ><ion-icon name="home-sharp"></ion-icon></a>
        <nav> 
            <a href="#" class="direct"></a>    
            <a href="#" class="direct"></a>   
            <a href="#" class="direct"></a>   

        </nav>
    </div>
    <h1>Requisition List</h1>
    <?php if (isset($success) && $success): ?>
        <p style="color: green;">Requisition submitted successfully!</p>
    <?php elseif (isset($success) && !$success): ?>
        <p style="color: red;">Error submitting requisition. Please try again.</p>
    <?php endif; ?>
    <table>
    <thead>
        <tr>
            <th>Requisition Number</th>
            <th>Requester Name</th>
            <th>Product Details</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Delivery Date</th>
            <th>Department</th>
            <th>Additional Info</th>
            <th>Action</th>
        </tr>
    </thead>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['requisition_number']; ?></td>
                <td><?php echo $row['requester_name']; ?></td>
                <td><?php echo $row['product_details']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['delivery_date']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['additional_info']; ?></td>
                <td>
                    <a href="requisition_details.php?requisition_number=<?php echo $row['requisition_number']; ?>">View Details</a>
                    <a href="requisition_list.php?delete_id=<?php echo $row['requisition_number']; ?>" onclick="return confirm('Are you sure you want to delete this requisition?')">Delete</a>
                    <a href="edit_requisition.php?requisition_number=<?php echo urlencode($row['requisition_number']); ?>">Edit</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>