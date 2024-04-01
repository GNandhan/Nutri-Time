<?php
include './connect.php';

$id = $_POST['id']; // Retrieve the category ID from the AJAX request

// Fetch subcategories based on the category ID
$query = mysqli_query($conn, "SELECT * FROM category WHERE category_id='$id'");
while ($row = mysqli_fetch_assoc($query)) {
    $subcat_id = $row['subcategory_id'];
    $subcat_name = $row['subcategory_name'];
    ?>
    <option value="<?php echo $subcat_id; ?>"><?php echo $subcat_name; ?></option>
    <?php
}
?>
