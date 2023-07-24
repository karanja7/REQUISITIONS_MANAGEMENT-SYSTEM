<?php
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

// Retrieve the requisition number from the query parameter
$requisitionNumber = $_GET['requisition_number'];

// Retrieve the requisition details from the database based on the requisition number
$sql = "SELECT * FROM requisitions WHERE requisition_number = '$requisitionNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the requisition details
    $requisition = $result->fetch_assoc();
} else {
    echo "No Requisition Details found.";
}

// Close the database connection
$conn->close();
?>

<!-- HTML and CSS for displaying the requisition details -->
<!DOCTYPE html>
<html>
<head>
    <title>Requisition Details</title>
</head>
<body>
    <h1>Requisition Details</h1>
    <?php if (isset($requisition)): ?>
        <p><strong>Requisition Number:</strong> <?php echo $requisition['requisition_number']; ?></p>
        <p><strong>Requester Name:</strong> <?php echo $requisition['requester_name']; ?></p>
        <p><strong>Product Details:</strong> <?php echo $requisition['product_details']; ?></p>
        <p><strong>Quantity:</strong> <?php echo $requisition['quantity']; ?></p>
        <p><strong>Price:</strong> <?php echo $requisition['price']; ?></p>
        <p><strong>Delivery Date:</strong> <?php echo $requisition['delivery_date']; ?></p>
        <p><strong>Department:</strong> <?php echo $requisition['department']; ?></p>
        <p><strong>Additional Info:</strong> <?php echo $requisition['additional_info']; ?></p>
        <p><strong>Approval Status:</strong> <?php echo $requisition['approval_status']; ?></p>
    <?php endif; ?>
</body>
</html>
