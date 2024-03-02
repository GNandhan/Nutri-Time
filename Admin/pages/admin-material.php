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
  <title>Admin Materials</title>
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
    $proid = $_GET['pid'];
    $p_query = mysqli_query($conn,"SELECT * FROM material WHERE pro_id = '$proid'");
    $p_row1=mysqli_fetch_array($p_query);

        $p_code1 = $p_row1['pro_code'];
        $p_name1 = $p_row1['pro_name'];
        $p_cat1 = $p_row1['pro_category']; 
        $p_sub1 = $p_row1['pro_subcategory']; 
        $p_brand1 = $p_row1['pro_brand']; 
        $p_pri1 = $p_row1['pro_price']; 
        $p_qua1 = $p_row1['pro_quantity']; 
        $p_img1 = $p_row1['pro_image']; 
        $p_dis1 = $p_row1['pro_distribution'];
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['pd_id']))
{
    $dl_id = $_GET['pd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM material WHERE pro_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../images/material/'.$dl_row['pro_image'];
    $del = mysqli_query($conn,"DELETE FROM material WHERE pro_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-material.php");
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
                <h1 class="card-title">Materials</h1>
                <p class="card-description">
                  Add Material Details
                </p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="pid" value="<?php echo $proid; ?>">
                  <div class="row">
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" placeholder="#00A001" name="procode" value="<?php echo $p_code1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Weight Gainer" name="proname" value="<?php echo $p_name1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="procat" required>
                          <option <?php if($p_cat1=='Category1' ) echo 'selected' ; ?> value="Category1">Category1</option>
                          <option <?php if($p_cat1=='Category2' ) echo 'selected' ; ?>  value="Category2">Category2</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Subcategory</label>
                        <select class="form-control" name="subcat" required>
                          <option value="Subcategory11" <?php if($p_sub1=='Subcategory11' ) echo 'selected' ; ?>>Subcategory11</option>
                          <option value="Subcategory22" <?php if($p_sub1=='Subcategory22' ) echo 'selected' ; ?>>Subcategory22</option>
                        </select>

                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Product Brand</label>
                        <input type="text" class="form-control" name="probrand" value="<?php echo $p_brand1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="proprice" value="<?php echo $p_pri1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="proquant" value="<?php echo $p_qua1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Image</label>
                        <div class="input-group mb-3">
                            <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="proimg" onchange="displaySelectedFileName(this)"  value="<?php echo $p_img1; ?>" required>
                            <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <img src="../images/material/<?php echo $p_img1; ?>" alt="" width="100">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Stock Distribution</label>
                        <input type="text" class="form-control" name="prodis" value="<?php echo $p_dis1; ?>" required>
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2" name="submitp">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
    if(isset($_POST["submitp"]))
    {
    $pcode= $_POST["procode"];
    $pname= $_POST["proname"];
    $pcat= $_POST["procat"];
    $psubcat= $_POST["subcat"];
    $pbrand= $_POST["probrand"];
    $pprice= $_POST["proprice"];
    $pquan= $_POST["proquant"]; 
    $pdis= $_POST["prodis"];
    $pimg = $_FILES['proimg']['name'];

  // Image uploading formats
  $filename = $_FILES['proimg']['name'];
  $tempname = $_FILES['proimg']['tmp_name'];

// Image uploading formats
// $filename = $_FILES['proimg']['name'];
// $tempname = $_FILES['proimg']['tmp_name'];
// $folder = "../images/material/";

// Fetch the material ID from the URL parameters
$pro_id = $_POST["pid"];

if($pro_id=='')
{
$sql = mysqli_query($conn,"INSERT INTO material (pro_code, pro_name, pro_category, pro_subcategory, pro_brand, pro_price, pro_quantity, pro_image, pro_distribution)
                                         VALUES ('$pcode','$pname','$pcat','$psubcat','$pbrand','$pprice','$pquan','$pimg','$pdis')");
}else{
        // Update existing material
        if ($filename) {
          // Remove the existing image
          $imgs = '../images/material/' . $pimg;
          unlink($imgs);
          // Update material with new image
      $sql = mysqli_query($conn, "UPDATE material SET pro_code='$pcode', pro_name='$pname', pro_category='$pcat', pro_subcategory='$psubcat', pro_brand='$pbrand', pro_price='$pprice', pro_quantity='$pquan', pro_image='$pimg', pro_distribution='$pdis' WHERE pro_id='$pro_id'");
    } else {
      // Update material without changing the image
      $sql = mysqli_query($conn, "UPDATE material SET pro_code='$pcode', pro_name='$pname', pro_category='$pcat', pro_subcategory='$psubcat', pro_brand='$pbrand', pro_price='$pprice', pro_quantity='$pquan', pro_distribution='$pdis' WHERE pro_id='$pro_id'");
  }
}

if ($sql == TRUE)
{
// echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
move_uploaded_file($tempname, "../images/material/$filename");
echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
} 
else
{
  echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
}
}
?>
        <div class="row ">
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Materials</h4>
                <p class="card-description">
                  Material Details
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Product Code</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Stock Distribution</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM material ORDER BY pro_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $pro_id=$row['pro_id'];
    $pro_cod=$row['pro_code'];
    $pro_nam=$row['pro_name'];
    $pro_cat=$row['pro_category'];
    $pro_subcat=$row['pro_subcategory']; 
    $pro_bra=$row['pro_brand']; 
    $pro_pri=$row['pro_price']; 
    $pro_qua=$row['pro_quantity']; 
    $pro_dis=$row['pro_distribution']; 
    $pro_img=$row['pro_image']; 
?>
                    <tbody>
                      <tr>
                        <td class="py-1">#<?php echo $pro_cod; ?></td>
                        <td><img src="../images/material/<?php echo $pro_img; ?>" alt="" width="50" class="rounded-circle"></td>
                        <td><?php echo $pro_nam; ?></td>
                        <td><?php echo $pro_cat; ?></td>
                        <td><?php echo $pro_subcat; ?></td>
                        <td><?php echo $pro_bra; ?></td>
                        <td><?php echo $pro_pri; ?></td>
                        <td><?php echo $pro_qua; ?></td>
                        <td><?php echo $pro_dis; ?></td>
                        <td>
                          <a href="admin-material.php?pid=<?php echo $pro_id; ?>"
                            class="btn btn-inverse-secondary btn-icon-text p-2">Edit
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-material.php?pd_id=<?php echo $pro_id; ?>"
                            class="btn btn-inverse-danger btn-icon-text p-2">Delete
                            <i class="ti-trash btn-icon-prepend"></i>
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
  <script>
    function displaySelectedFileName(input) {
        var fileName = input.files[0].name;
        var label = input.nextElementSibling;
        label.innerText = fileName;
    }
</script>

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