<?php
 include './connect.php';
//  error_reporting(0);
//  session_start();
//  if($_SESSION["email"]=="")
//  {
//     header('location:admin-login.php');
//  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Shake</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
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
if(isset($_GET['sid']))
{
    $sh_id = $_GET['sid'];
    $s_query = mysqli_query($conn,"SELECT * FROM shake WHERE shake_id = '$sh_id'");
    $s_row1=mysqli_fetch_array($s_query);

        $p_code1 = $s_row1['shake_name'];
        $p_name1 = $s_row1['shake_goal'];
        $p_cat1 = $s_row1['shake_recipes']; 
        $p_sub1 = $s_row1['shake_raw']; 
        $p_brand1 = $s_row1['shake_mcost']; 
        $p_pri1 = $s_row1['shake_scost']; 
        $p_qua1 = $s_row1['shake_desc']; 
        $p_img1 = $s_row1['shake_img']; 
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['sd_id']))
{
    $dl_id = $_GET['sd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM shake WHERE shake_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../images/shake/'.$dl_row['pro_image'];
    $del = mysqli_query($conn,"DELETE FROM shake WHERE shake_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-shake.php");
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
                <!-- Form -->
                <div class="card-body">
                  <h1 class="card-title">Shakes</h1>
                  <p class="card-description">
                    Add Shakes Details
                  </p>
                  <form class="forms-sample">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Shake Name</label>
                          <input type="text" class="form-control"  placeholder="#00A001" name="shname">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Shake Goal</label>
                          <input type="text" class="form-control"  placeholder="Weight Gainer"  name="shgoal">
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Shake Recipes</label>
                            <select class="form-control"  name="shrecipe">
                              <option>Recipes 1</option>
                              <option>Recipes 2</option>
                            </select>
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Raw materials</label>
                            <select class="form-control" name="shraw">
                              <option>material 1</option>
                              <option>materials 2</option>
                            </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Making Cost</label>
                          <input type="text" class="form-control" name="shmcost">
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Selling Price</label>
                          <input type="text" class="form-control" name="shscost">
                        </div> 
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Description</label>
                          <input type="text" class="form-control" name="shdis">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Shake Image</label>
                           <div class="input-group mb-3">
                            <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="shimg" onchange="displaySelectedFileName(this)"  value="<?php echo $p_img1; ?>" required>
                            <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="./admin-shake.php" class="btn btn-light">Cancel</a>
                  </form>
                </div>
                <!-- Form Closed -->
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
            <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Shakes</h4>
                <p class="card-description">
                 Shake Details
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>sl-no</th>
                        <th>Shake Image</th>
                        <th>Shake Name</th>
                        <th>Shake Goal</th>
                        <th>Recipes</th>
                        <th>Raw Materials</th>
                        <th>Making Cost</th>
                        <th>Selling price</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td><img src="../images/shake2.jpg" alt=""></td>
                        <td>Fat reducer</td>
                        <td>Loss fat</td>
                        <td>Sugar, Milk, Nutients</td>
                        <td>Sugar, Milk, Nutients, cardamom </td>
                        <td>150</td>
                        <td>270</td>
                        <td>Helps you to reduce fat easiler, low sugar, </td>
                        <td>
                          <button class="btn btn-inverse-secondary btn-icon-text p-2">Edit 
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- table view closed -->
              </div>
            </div>
           
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
  <script>
    function displaySelectedFileName(input) {
        var fileName = input.files[0].name;
        var label = input.nextElementSibling;
        label.innerText = fileName;
    }
</script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
