<?php
include './connect.php';
error_reporting(0);

$cus_query = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = 1007;");

$c_row = mysqli_fetch_array($cus_query);
// Check if a customer with the given ID exists

$cus_id = $c_row['cust_id'];
$cus_code = $c_row['cust_code'];
$cus_name = $c_row['cust_name'];
$cus_phno = $c_row['cust_phno'];
$cus_invite = $c_row['cust_invited'];
$cus_age = $c_row['cust_age'];
$cus_bodyage = $c_row['cust_bodyage'];
$cus_gender = $c_row['cust_gender'];

echo $cus_id;
echo $cus_code;
echo $cus_name;
echo $cus_phno;
echo $cus_invite;
echo $cus_name;