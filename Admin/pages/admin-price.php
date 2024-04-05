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
  <title>Admin Price</title>
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
if(isset($_GET['pid']))
{
    $priid = $_GET['pid'];
    $p_query = mysqli_query($conn,"SELECT * FROM price WHERE pri_id = '$priid'");
    $p_row1=mysqli_fetch_array($p_query);

        $p_code1 = $p_row1['pro_code'];
        $p_name1 = $p_row1['pro_name'];
        $p_mrp1 = $p_row1['pro_mrp']; 
        $p_pri1 = $p_row1['pro_price']; 
        $p_dis151 = $p_row1['pro_dis15']; 
        $p_dis251 = $p_row1['pro_dis25']; 
        $p_dis351 = $p_row1['pro_dis35']; 
        $p_dis421 = $p_row1['pro_dis42']; 
        $p_dis501 = $p_row1['pro_dis50']; 
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['pd_id']))
{
    $dl_id = $_GET['pd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM price WHERE pri_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $del = mysqli_query($conn,"DELETE FROM price WHERE pri_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-price.php");
    }
    else
    {
        echo "Deletion Failed";
    }    
}
?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1 class="card-title">Product Price</h1>
                <p class="card-description">Add Product Discount Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="prid" value="<?php echo $priid; ?>">
                  <div class="row">
                  <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcode"
                          value="<?php echo $p_code1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodname"
                          value="<?php echo $p_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product MRP</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodmrp"
                          value="<?php echo $p_mrp1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Purchase Price</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodpur"
                          value="<?php echo $p_pri1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row"> 
                    <p>Discount Price</p> <br>
                    <div class="col">
                      <div class="form-group">
                        <label>15%</label>
                        <input type="number" class="form-control" style="border-radius: 15px;" name="dis15" value="<?php echo $p_dis151; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>25%</label>
                        <input type="number" class="form-control" style="border-radius: 15px;" name="dis25" value="<?php echo $p_dis251; ?>"
                          required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>35%</label>
                        <input type="number" class="form-control" style="border-radius: 15px;" name="dis35" value="<?php echo $p_dis351; ?>"
                          required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>42%</label>
                        <input type="number" class="form-control" style="border-radius: 15px;" name="dis42" value="<?php echo $p_dis421; ?>"
                          required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>50%</label>
                        <input type="number" class="form-control" style="border-radius: 15px;" name="dis50" value="<?php echo $p_dis501; ?>"
                          required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submitp">Submit</button>
                  <a href="./admin-price.php" type="reset" class="btn btn-light">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
    if(isset($_POST["submitp"]))
    {
    $pcode= $_POST["prodcode"];
    $pname= $_POST["prodname"];
    $pmrp= $_POST["prodmrp"];
    $ppur= $_POST["prodpur"];
    $pdis15= $_POST["dis15"];
    $pdis25= $_POST["dis25"];
    $pdis35= $_POST["dis35"]; 
    $pdis42= $_POST["dis42"]; 
    $pdis50= $_POST["dis50"]; 

   
// Fetch the shake ID from the form
$pri_id = $_POST["prid"];

if($pri_id=='') {
$sql = mysqli_query($conn,"INSERT INTO price (pro_name, pro_code, pro_mrp, pro_price, pro_dis15, pro_dis25, pro_dis35, pro_dis42, pro_dis50)
                                         VALUES ('$pname','$pcode','$pmrp','$ppur','$pdis15','$pdis25','$pdis35','$pdis42','$pdis50' )");
}else{
      // Update shake
$sql = mysqli_query($conn, "UPDATE price SET pro_name='$pname', pro_code='$pcode', pro_mrp='$pmrp', pro_price='$ppur', pro_dis15='$pdis15', pro_dis25='$pdis25', pro_dis35='$pdis35', pro_dis42='$pdis42', pro_dis50='$pdis50' WHERE pri_id='$pri_id'");
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
                <h4 class="card-title">Product</h4>
                <div class="row">
                  <div class="col-md-9">
                    <p class="card-description">Product Discount Details</p>
                  </div>
                  <div class="col-md-3">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By:
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <p class="pl-3">Type</p>
                        <div class="dropdown-item">
                          <input type="checkbox" id="checkCategory" class="filter-checkbox" value="category">
                          <label for="checkCategory">Used Product</label>
                        </div>
                        <div class="dropdown-item">
                          <input type="checkbox" id="checkSubcategory" class="filter-checkbox" value="subcategory">
                          <label for="checkSubcategory">Unused Product</label>
                        </div>
                        <!-- Add more checkbox items for other filter options -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Slno</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>MRP</th>
                        <th>Purchased Price</th>
                        <th>15% Discount</th>
                        <th>25% Discount</th>
                        <th>35% Discount</th>
                        <th>42% Discount</th>
                        <th>50% Discount</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <?php  
$sql=mysqli_query($conn,"SELECT * FROM price ORDER BY pri_id ");
$serialNo = 1;
while($row=mysqli_fetch_assoc($sql))
{
    $pri_id=$row['pri_id'];
    $pri_cod=$row['pro_code'];
    $pri_nam=$row['pro_name'];
    $pri_mrp=$row['pro_mrp'];
    $pri_pri=$row['pro_price']; 
    $pri_dis15=$row['pro_dis15']; 
    $pri_dis25=$row['pro_dis25']; 
    $pri_dis35=$row['pro_dis35'];
    $pri_dis42=$row['pro_dis42'];
    $pri_dis50=$row['pro_dis50']; 
?>
                    <tbody>
                      <tr>
                        <td class="py-1"><?php echo $serialNo++; ?></td>
                        <td class="py-1">#<?php echo $pri_cod; ?></td>
                        <td><?php echo $pri_nam; ?></td>
                        <td><?php echo $pri_mrp; ?></td>
                        <td><?php echo $pri_pri; ?></td>
                        <td><?php echo $pri_dis15; ?></td>
                        <td><?php echo $pri_dis25; ?></td>
                        <td><?php echo $pri_dis35; ?></td>
                        <td><?php echo $pri_dis42; ?></td>
                        <td><?php echo $pri_dis50; ?></td>
                        <td>
                          <a href="admin-price.php?pid=<?php echo $pri_id; ?>"
                            class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i
                              class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-price.php?pd_id=<?php echo $pri_id; ?>"
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
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All rights reserved.</span>
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