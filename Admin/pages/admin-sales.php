<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email"]=="")
 {
    header('location:admin-login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Stock</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- including the sidebar,navbar -->
    <?php
  include './topbar.php';
?>
    <?php
if(isset($_GET['stoid']))
{
    $stoid = $_GET['stoid'];
    $sto_query = mysqli_query($conn,"SELECT * FROM stock WHERE stock_id = '$stoid'");
    $sto_row1=mysqli_fetch_array($p_query);

        $stoloct1 = $sto_row1['stock_place'];
        $stomat1 = $sto_row1['stock_name']; 
        $stoqua1 = $sto_row1['stock_quantity']; 
        $stocom1 = $sto_row1['stock_comname']; 
        $stopri1 = $sto_row1['stock_price']; 
        $stogst1 = $sto_row1['stock_gst']; 
        $stototal1 = $sto_row1['stock_total']; 
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['stod_id']))
{
    $dl_id = $_GET['stod_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM stock WHERE stock_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $del = mysqli_query($conn,"DELETE FROM stock WHERE stock_id='$dl_id'");
    if($del){
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-sales.php");
    }
    else{
        echo "Deletion Failed";
    }    
}
?>
<!-- Fetching prices of all materials from the database -->
<?php
$material_prices = array();
$query = mysqli_query($conn, "SELECT pro_name, pro_mrp FROM product");
while ($row = mysqli_fetch_assoc($query)) {
    $material_prices[$row['pro_name']] = $row['pro_mrp'];
}
?>
<!-- JavaScript to update the price field -->
<script>
  // Define a JavaScript object to store material prices
  var materialPrices = <?php echo json_encode($material_prices); ?>;
  
  // Function to update price field based on selected raw material
  function updatePrice() {
    var selectedMaterial = document.getElementById("stomaterial").value;
    var priceInput = document.getElementById("stopri");
    // Set the price field value based on selected material
    if (selectedMaterial && materialPrices[selectedMaterial]) {
      priceInput.value = materialPrices[selectedMaterial];
    } else {
      priceInput.value = ""; // Clear the price field if no material is selected
    }
  }
</script>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1 class="card-title">Product Sales</h1>
                <p class="card-description">Sales Management/ Distribution</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="pid" value="<?php echo $proid; ?>">
                  <div class="row">
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product</label>
                        <select class="form-control" name="stomaterial" id="stomaterial" onchange="updatePrice()">
                            <option selected>Select the Product</option>
                              <?php 
                    $query = mysqli_query($conn,"select * from product");
                    while ($row = mysqli_fetch_assoc($query))
                      {
                      $pro_id=$row["pro_id"];
                      $pro_name=$row["pro_name"];
                  ?>
                    <option value="<?php echo $pro_name; ?>" <?php if($row['pro_name'] == $sh_raw1){echo 'selected';} ?> ><?php echo $pro_name; ?></option>
                    <?php
                      }
                    ?>
                            </select>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Vendor / Company Name</label>
                        <input type="text" class="form-control" placeholder="Weight Gainer" name="stocomname" value="<?php echo $stocom1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="procat" onchange="getcat();" id="catid" required>
                        <option selected>Select the categories</option>
                <?php
                      $query = mysqli_query($conn,"select * from category");
                      while ($row = mysqli_fetch_assoc($query))
                      {
                        $cate_id=$row["category_id"];
                        $cate_name=$row["category_name"];
                ?>
                      <option value="<?php echo $cate_id; ?>" <?php if($row['category_id']==$p_cat1){ echo 'selected';} ?> ><?php echo $cate_name; ?></option>
                    <?php
                      }
                    ?>
              </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Subcategory</label>
                        <select class="form-control" name="subcat"   id="sub" required>
                        <option selected>Select the Brand</option>
                <?php
                      $data2 = "SELECT * FROM subcategory";
                      $data2_query = mysqli_query($conn,$data2);
                      while ($row2 = mysqli_fetch_assoc($data2_query))
                      {
                        $subcat_id=$row2['subcategory_id'];
                        $subcat_name=$row2['subcategory_name'];
                ?>
                      <option value="<?php echo $subcat_id; ?>" <?php if($row2['subcategory_id']==$p_sub1){ echo 'selected';} ?> ><?php echo $subcat_name; ?></option>
                    <?php
                      }
                    ?>
              </select>
                      </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="stoqua" value="<?php echo $stoqua1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="stoloc" value="<?php echo $stoloct1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="stopri" id="stopri" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Sales Price</label>
                        <input type="number" class="form-control" name="stogst" value="<?php echo $stogst1; ?>"
                          required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submitsto">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
    if(isset($_POST["submitsto"]))
    {
    $stomat= $_POST["stomaterial"];
    $stocom= $_POST["stocomname"];
    $stoloct= $_POST["stoloc"];
    $stoqua= $_POST["stoqua"];
    $stopri= $_POST["stopri"];
    $stogst= $_POST["stogst"];

    // $total = $stopri * ($stogst / 100);
    // $stototal = intval($stoqua) * intval($stopri);


// Fetch the shake ID from the form
$sto_id = $_POST["stoid"];

if($sto_id=='') {
$sql = mysqli_query($conn,"INSERT INTO stock (stock_place, stock_name, stock_quantity, stock_comname, stock_price, stock_total, stock_date)
                                         VALUES ('$stoloct','$stomat','$stoqua','$stocom','$stopri','$stogst', NOW())");
}else{
      // Update shake
$sql = mysqli_query($conn, "UPDATE stock SET stock_place='$stoloct', stock_name='$stomat', stock_quantity='$stoqua', stock_comname='$stocom', stock_price='$stopri', stock_total='$stogst' WHERE stock_id='$sto_id'");
}
if ($sql == TRUE){
echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
} 
else{
  echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
}
}
?>
        <div class="row ">
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Stock</h4>
                <div class="row">
                  <div class="col-md-9">
                    <p class="card-description">Stock Details</p>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Slno</th>
                        <th>Product</th>
                        <th>Vendor Name</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sales Price</th>
                        <!-- <th>Total</th> -->
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <?php  
$sql=mysqli_query($conn,"SELECT * FROM stock ORDER BY stock_id ");
$serialNo = 1;
while($row=mysqli_fetch_assoc($sql))
{
    $stock_id=$row['stock_id'];
    $stock_place=$row['stock_place'];
    $stock_proid=$row['product_id'];
    $stock_name=$row['stock_name'];
    $stock_quan=$row['stock_quantity']; 
    $stock_comname=$row['stock_comname']; 
    $stock_pri=$row['stock_price']; 
    // $stock_gst=$row['stock_gst'];  
    $stock_total=$row['stock_total'];
    $stock_date=$row['stock_date']; 
?>
                    <tbody>
                      <tr>
                        <td class="py-1"><?php echo $serialNo++; ?></td>
                        <td class="py-1"><?php echo $stock_name; ?></td>
                        <td><?php echo $stock_comname; ?></td>
                        <td><?php echo $stock_place; ?></td>
                        <td><?php echo $stock_quan; ?></td>
                        <td><?php echo $stock_pri; ?></td>
                        <!-- <td><?php echo $stock_gst; ?></td> -->
                        <td><?php echo $stock_total; ?></td>
                        <td>
                          <a href="admin-sales.php?stoid=<?php echo $stock_id; ?>"
                            class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i
                              class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-sales.php?stod_id=<?php echo $stock_id; ?>"
                            class="btn btn-inverse-danger btn-icon-text p-2">Delete<i
                              class="ti-trash btn-icon-prepend"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                    <?php
}
?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- table view closed -->
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All
            rights reserved.</span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>
</html>