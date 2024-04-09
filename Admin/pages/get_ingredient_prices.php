<?php
include './connect.php'; // Include database connection

if(isset($_POST['discount'])) {
    $discount = $_POST['discount'];

    // Query to fetch corresponding ingredient prices based on discount
    $query = "SELECT pro_name, $discount AS price FROM price";
    $result = mysqli_query($conn, $query);

    $response = '<ul>';
    while($row = mysqli_fetch_assoc($result)) {
        $response .= '<li>'.$row['pro_name'].': '.$row['price'].'</li>';
    }
    $response .= '</ul>';

    echo $response;
}
?>
