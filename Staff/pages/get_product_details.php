<?php
include './connect.php';

if(isset($_POST['product_name'])) {
  $product_name = $_POST['product_name'];
  
  // Fetch product details including product code, category, and subcategory from database based on product name
  $query = mysqli_query($conn, "SELECT pro_code, pro_price, pro_category, pro_subcat, pro_vp, pro_curquantity FROM price WHERE pro_name = '$product_name'");
  $productDetails = mysqli_fetch_assoc($query);
  
  if($productDetails) {
    // Return product details as JSON response
    echo json_encode($productDetails);
  } else {
    echo json_encode(array()); // Return empty JSON if no data found
  }
}
?>
