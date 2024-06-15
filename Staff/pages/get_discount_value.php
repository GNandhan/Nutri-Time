<?php
// Include your database connection file
include './connect.php';

// Fetch the product name and discount type from the AJAX POST request
$productName = $_POST['product_name'];
$discountType = $_POST['discount_type'];

// Query the database to fetch the discount value based on the selected product and discount type
$query = mysqli_query($conn, "SELECT $discountType FROM price WHERE pro_name = '$productName'");
if ($row = mysqli_fetch_assoc($query)) {
  $discountValue = $row[$discountType];

  // Return the fetched discount value
  echo $discountValue;
} else {
  // If no discount value is found, return an empty response
  echo "";
}
