<?php
include './connect.php'; // Include database connection

if(isset($_POST['discount'])) {
    $discount = $_POST['discount'];

    // Query to fetch corresponding ingredient prices based on discount
    $query = "SELECT pro_name, $discount AS price FROM price";
    $result = mysqli_query($conn, $query);

    $response = '<ul>';
    while($row = mysqli_fetch_assoc($result)) {
        $response .= '<li>
                        <div class="form-check ml-4">
                          <input class="form-check-input" type="checkbox" name="shincreprice[]" value="'.$row['pro_name'].'">
                          <label class="form-check-label">'.$row['price'].'</label>
                        </div>
                      </li>';
    }
    $response .= '</ul>';

    echo $response;
}
?>
