<?php
include './connect.php';

if (isset($_POST['customerName'])) {
  $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
  $query = mysqli_query($conn, "SELECT cust_invited FROM customer WHERE cust_name = '$customerName'");
  if ($row = mysqli_fetch_assoc($query)) {
    echo json_encode(['cust_invited' => $row['cust_invited']]);
  } else {
    echo json_encode(['cust_invited' => '']);
  }
} else {
  echo json_encode(['cust_invited' => '']);
}
?>
