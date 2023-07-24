<?php
// Retrieve the requisition number from the query parameter
$requisitionNumber = $_GET['requisition_number'];

// Check if requisition number is provided
if (empty($requisitionNumber)) {
    echo "Requisition number not specified.";
    exit;
}

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

// Retrieve the requisition details from the database based on the requisition number
$sql = "SELECT * FROM requisitions WHERE requisition_number = '$requisitionNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the requisition details
    $requisition = $result->fetch_assoc();
} else {
    echo "Requisition not found.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $requesterName = $_POST['requesterName'];
    $productDetails = $_POST['productDetails'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $deliveryDate = $_POST['deliveryDate'];
    $department = $_POST['department'];
    $additionalInfo = $_POST['additionalInfo'];

    // Update the requisition details in the database
    $sql = "UPDATE requisitions SET requester_name = ?, product_details = ?, quantity = ?, price = ?, delivery_date = ?, department = ?, additional_info = ? WHERE requisition_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssidsiss", $requesterName, $productDetails, $quantity, $price, $deliveryDate, $department, $additionalInfo, $requisitionNumber);

    if ($stmt->execute()) {
        echo "Requisition updated successfully.";
    } else {
        echo "Error updating requisition: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!-- HTML and form for editing the requisition details -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Requisition</title>
</head>
<body>
    <h1>Edit Requisition</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="requisition_number" value="<?php echo htmlspecialchars($requisition['requisition_number']); ?>">

        <div>
            <label for="requester-name">Requester Name:</label>
            <input type="text" id="requester-name" name="requesterName" value="<?php echo htmlspecialchars($requisition['requester_name']); ?>" required>
        </div>
        <div>
            <label for="product-details">Product Details:</label>
            <input type="text" id="product-details" name="productDetails" value="<?php echo htmlspecialchars($requisition['product_details']); ?>" required>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($requisition['quantity']); ?>" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($requisition['price']); ?>" required>
        </div>
        <div>
            <label for="delivery-date">Delivery Date:</label>
            <input type="date" id="delivery-date" name="deliveryDate" value="<?php echo htmlspecialchars($requisition['delivery_date']); ?>" required>
        </div>
        <div>
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" value="<?php echo htmlspecialchars($requisition['department']); ?>" required>
        </div>
        <div>
            <label for="additional-info">Additional Information:</label>
            <textarea id="additional-info" name="additionalInfo"><?php echo htmlspecialchars($requisition['additional_info']); ?></textarea>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>

