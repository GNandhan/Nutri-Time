<?php
include './connect.php'; // Include your database connection

if(isset($_POST['product_name'])) {
  $product_name = $_POST['product_name'];
  
  // Fetch product details including product code and purchase price from database based on product name
  $query = mysqli_query($conn, "SELECT pro_code, pro_price FROM price WHERE pro_name = '$product_name'");
  $row = mysqli_fetch_assoc($query);
  
  if($row) {
    // Return product details as JSON response
    echo json_encode($row);
  } else {
    echo json_encode(array()); // Return empty JSON if no data found
  }
}
?>
