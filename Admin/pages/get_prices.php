<?php
include './connect.php'; // Assuming this file contains your database connection

if (isset($_POST['discount']) && isset($_POST['recipes'])) {
    $discount = $_POST['discount'];
    $selectedRecipes = $_POST['recipes'];

    // Fetch prices of selected recipes based on the selected discount
    $selectedRecipesStr = "'" . implode("','", $selectedRecipes) . "'";
    $query = mysqli_query($conn, "SELECT pro_name, pro_scoop$discount AS price FROM price WHERE pro_name IN ($selectedRecipesStr)");
    $prices = array();

    while ($row = mysqli_fetch_assoc($query)) {
        $prices[$row['pro_name']] = $row['price'];
    }

    // Return prices as JSON response
    echo json_encode($prices);
}
?>
