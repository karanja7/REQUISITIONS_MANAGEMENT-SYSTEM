<?php
session_start();
// Handle sign-out button click
if (isset($_POST['sign-out-btn'])) {
    // Destroy the session to log the user out
    session_destroy();
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Database configuration and connection
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
  
// Initialize the success and error message variables
$successMessage = "";
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and sanitize form data
  $requesterName = $_POST['requesterName'];
  $productDetails = $_POST['productDetails'];
  $quantity = $_POST['quantity'];
  $supplier = $_POST['supplier'];
  $price = $_POST['price'];
  $deliveryDate = $_POST['deliveryDate'];
  $department = $_POST['department'];
  $additionalInfo = $_POST['additionalInfo'];
  //$requisitionNumber = generateRequisitionNumber();

  // Prepare the SQL statement with placeholders
  $stmt = $conn->prepare("INSERT INTO requisitions (requester_name, product_details, quantity, supplier, price, delivery_date, department, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the values to the prepared statement
    $stmt->bind_param("ssssdsss", $requesterName, $productDetails, $quantity, $supplier, $price, $deliveryDate, $department, $additionalInfo);


  // Execute the prepared statement
  if ($stmt->execute()) {
    $successMessage = "Requisition submitted successfully!";
      // Redirect to the requisition_list.php page
      header("Location: requisition_list.php");
      exit();
  } else {
    $errorMessage = "Error submitting requisition. Please try again.";
      echo "Error: " . $stmt->error;
  }
//statement and database connection
  $stmt->close();
  $conn->close();
}

// Generate a unique requisition number
function generateRequisitionNumber() {
  // use combination of timestamp and a random number
  $requisitionNumber = "PO" . time() . rand(100, 999);
  return $requisitionNumber;
}
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
<!--           main content              -->
    <div class="main-content">
        <div class="directory">
          <h1>REQUISITIONS</h1>
          <h3><a href="requisition_list.php" class="direct">Requisition List</a></h3>
      </div>
       
        <!-- Requisitions content-->
        <?php
// Assume the following function fetches the remaining quantities of items in stock from the database
function fetchRemainingQuantities() {
    // i'm supposed to replace with own database query to fetch the remaining quantities
    // i might want to join the requisitions table with the products table to get the current stock status
    $data = [
        ['product_name' => 'ICT products', 'remaining_quantity' => 10, 'total_quantity' => 100],
        ['product_name' => 'Records products', 'remaining_quantity' => 15, 'total_quantity' => 50],
        // Add more items as needed
    ];
    return $data;
}

// Function to automatically reorder items if the remaining quantity is below the threshold
function autoReorder() {
    $data = fetchRemainingQuantities();
    $threshold = 5; // Set the threshold for reordering

    // Check if any item's remaining quantity is below the threshold
    foreach ($data as $item) {
        if ($item['remaining_quantity'] < $threshold) {
            // Perform the automatic reorder process here
            // For demonstration purposes, we will just print a message
            echo "Automatic reorder triggered for: " . $item['product_name'] . "\n";
            // You can also include code to send an email/notification to the supplier for automatic reordering
        }
    }
}

// Call the autoReorder function to trigger the automatic reorder process
autoReorder();
?>


<section>
  <h2>Remaining Stock</h2>
  <div class="chart-container">
    <canvas id="remainingChart"></canvas>
  </div>
</section>

<!-- JavaScript to fetch data and render the chart -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    fetch('fetch_requisition_data.php') // Replace with your PHP script to fetch data from the database
      .then(response => response.json())
      .then(data => renderChart(data));
  });

  function renderChart(data) {
    // Extract data for chart labels and values
    const labels = data.map(item => item.product_name);
    const remainingQuantities = data.map(item => item.remaining_quantity);
    const totalQuantities = data.map(item => item.total_quantity);

    // Chart configuration
    const ctx = document.getElementById('remainingChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Remaining Quantity',
            data: remainingQuantities,
            backgroundColor: 'rgba(75, 192, 192, 0.6)', // Change the color and opacity of the bars
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          },
          {
            label: 'Total Quantity',
            data: totalQuantities,
            backgroundColor: 'rgba(255, 99, 132, 0.6)', // Change the color and opacity of the bars
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              display: true, // Show grid lines on the y-axis
            }
          },
          x: {
            grid: {
              display: false, // Hide grid lines on the x-axis
            }
          }
        },
        plugins: {
          legend: {
            display: true, // Show the legend
            position: 'top', // Position the legend at the top
            labels: {
              font: {
                size: 14 // Increase the font size of the legend labels
              }
            }
          },
          title: {
            display: false // Hide the chart title
          }
        }
      }
    });
  }
</script>

  <section>
  <?php if (!empty($successMessage)): ?>
        <p style="color: green;">
            <?= $successMessage ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($errorMessage)): ?>
        <p style="color: red;">
            <?= $errorMessage ?>
        </p>
    <?php endif; ?>
        <form id="requisition-form"method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Create Requisition</h2>
            <div>
                <label for="requester-name" class="req-label">Requester's Name:</label>
                <input type="text" id="requester-name" name="requesterName" class="req-input" placeholder="Your name" required>
            </div>
            <div class="">
                <label for="product-details" class="req-label">Product Details:</label>
                <input type="text" id="product-details" name="productDetails" class="req-input" placeholder="product name/identity" required>
            </div>
            <div>
                <label for="quantity" class="req-label">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="req-input" placeholder="Items/pieces" required>
            </div>
            <div>
                <label for="supplier" class="req-label">supplier:</label>
                <select type="number" id="supplier" name="supplier" class="req-input" required>
                    <option value="#"selected="selected">Choose supplier</option>
                    <option value="karani">karani suppliers</option>
                    <option value="KCL">KCL suppliers</option>
                    <option value="bidco">bidco suppliers</option>
                  </select> 
            </div>
            <div>
                <label for="price" class="req-label">Price:</label>
                <input type="number" id="price" name="price" class="req-input" placeholder="Ksh per item/piece" required>
            </div>
            <div>
                <label for="delivery-date" class="req-label">Delivery Date:</label>
                <input type="date" id="delivery-date" name="deliveryDate" class="req-input" required>
            </div>
            <div>
                <label for="department" class="req-label" >Department:</label>
                <input type="text" id="department" name="department"  class="req-input" placeholder="department name" required>
            </div>
            <div>
                <label for="additional-info" class="req-label">Additional Information:</label>
                <textarea id="additional-info" name="additionalInfo" placeholder="any specific details or concern of the item" required></textarea>
            </div>
            <button type="submit" class="">Submit</button>
  </form>
  </section>
</body>
</html>
        
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>