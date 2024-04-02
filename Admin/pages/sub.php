<?php
include './connect.php';
?>

<?php
$id=$_POST['id'];
$out=mysqli_query($conn,"SELECT * FROM subcategory where category_id='$id'");
    while($row = mysqli_fetch_assoc($out))
    {
        $ids = $row['subcategory_id'];
        $name =$row['subcategory_name'];
        ?>
        <option value="<?php echo $ids; ?>"> <?php echo $name; ?> </option>
        <?php
    }
?>