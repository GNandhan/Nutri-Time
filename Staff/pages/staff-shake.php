<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email"]=="")
 {
  
    header('location:staff-login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Staff Shake</title>
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

        $sh_name1 = $s_row1['shake_name'];
        $sh_goal1 = $s_row1['shake_goal'];
        $sh_reci1 = $s_row1['shake_recipes']; 
        $sh_raw1 = $s_row1['shake_raw']; 
        $sh_mcost1 = $s_row1['shake_mcost']; 
        $sh_scost1 = $s_row1['shake_scost']; 
        $sh_gst1 = $s_row1['shake_gst']; 
        $sh_disc1 = $s_row1['shake_desc']; 
        $sh_bene1 = $s_row1['shake_benefit']; 
        $sh_img1 = $s_row1['shake_img']; 
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['sd_id']))
{
    $dl_id = $_GET['sd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM shake WHERE shake_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../../Admin/images/shake/'.$dl_row1['shake_img'];
    $del = mysqli_query($conn,"DELETE FROM shake WHERE shake_id='$dl_id'");
    if($del){
        unlink($img); //for deleting the existing image from the folder
        header("location:staff-shake.php");
    }
    else{
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
                  <p class="card-description">Add Shakes Details</p>
                  <form method="post" enctype="multipart/form-data" class="forms-sample">
                  <input type="hidden" name="shid" value="<?php echo $sh_id; ?>">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Shake Name</label>
                          <input type="text" class="form-control"  placeholder="#00A001" name="shname"  value="<?php echo $sh_name1; ?>" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Shake Goal</label>
                          <input type="text" class="form-control"  placeholder="Weight Gainer"  name="shgoal" value="<?php echo $sh_goal1; ?>" required>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                        <label>Shake Recipes</label>
                          <input type="text" class="form-control"  placeholder="Milk, Sugar"  name="shrecipe" value="<?php echo $sh_reci1; ?>" required>
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Raw materials</label>
                            <select class="form-control" name="shraw">
                              <option selected>Select the Raw material</option>
                              <?php
                    $query = mysqli_query($conn,"select * from material");
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
                      <div class="col">
                        <div class="form-group">
                          <label>Making Cost</label>
                          <input type="number" class="form-control" name="shmcost" value="<?php echo $sh_mcost1; ?>" required>
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <!-- <div class="col-2">
                        <div class="form-group">
                          <label>Selling Price</label>
                          <input type="number" class="form-control" name="shscost" value="<?php echo $sh_scost1; ?>" required>
                        </div> 
                      </div> -->
                      <div class="col">
                        <div class="form-group">
                          <label>Benefit</label>
                          <input type="text" class="form-control" name="shbene" value="<?php echo $sh_bene1; ?>" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Description</label>
                          <input type="text" class="form-control" name="shdis" value="<?php echo $sh_disc1; ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                          <label>GST</label>
                          <input type="number" class="form-control" name="shgst" value="<?php echo $sh_gst1; ?>" placeholder="percentage%" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Shake Image</label>
                           <div class="input-group mb-3">
                            <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="shimg" onchange="displaySelectedFileName(this)"  value="<?php echo $sh_img1; ?>" required>
                            <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                            <input type="hidden" name="current_shimg" value="<?php echo $sh_img1; ?>">
                            </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submitst">Submit</button>
                    <a href="./staff-shake.php" class="btn btn-light">Cancel</a>
                  </form>
                </div>
                <!-- Form Closed -->
              </div>
            </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
    if(isset($_POST["submitst"]))
    {
    $sh_id = $_POST["shid"];
    $sh_name= $_POST["shname"];
    $sh_goal= $_POST["shgoal"];
    $sh_reci= $_POST["shrecipe"];
    $sh_raw= $_POST["shraw"];
    $sh_mcost= $_POST["shmcost"];
    $sh_gst= $_POST["shgst"];
    $sh_disc= $_POST["shdis"];
    $sh_bene= $_POST["shbene"];
    $sh_img = $_FILES['shimg']['name'];

    // Calculate selling price
    $price = $sh_mcost * ($sh_gst / 100);
    $selling_price = $sh_mcost + $price;

  // Image uploading formats
  $filename = $_FILES['shimg']['name'];
  $tempname = $_FILES['shimg']['tmp_name'];

// Fetch the shake ID from the form
$sh_id = $_POST["shid"];

if($sh_id=='') {
$sql = mysqli_query($conn,"INSERT INTO shake (shake_name, shake_goal, shake_recipes, shake_raw, shake_mcost, shake_scost, shake_desc, shake_benefit, shake_gst, shake_img)
                                      VALUES ('$sh_name','$sh_goal','$sh_reci','$sh_raw','$sh_mcost','$selling_price','$sh_disc','$sh_bene','$sh_gst','$sh_img')");
}else{
        // Update existing material
        if ($filename) {
          // Remove the existing image
          $imgs = '../../Admin/images/shake/' . $sh_img;
          unlink($imgs);
          // Update shake with new image
      $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_raw='$sh_raw', shake_mcost='$sh_mcost', shake_scost='$selling_price', shake_desc='$sh_disc', shake_benefit='$sh_bene', shake_gst='$sh_gst', shake_img='$sh_img' WHERE shake_id='$sh_id'");
    } else {
      // Update shake without changing the image
      $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_raw='$sh_raw', shake_mcost='$sh_mcost', shake_scost='$selling_price', shake_desc='$sh_disc', shake_benefit='$sh_bene', shake_gst='$sh_gst' WHERE shake_id='$sh_id'");
  }
}
if ($sql == TRUE){
move_uploaded_file($tempname, "../../Admin/images/shake/$filename");
echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
} 
else{
  echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
}
}
?>
            <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Shakes</h4>
                <p class="card-description">Shake Details</p>
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
                        <th>GST</th>
                        <th>Selling price</th>
                        <th>Benefits</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM shake ORDER BY shake_id ");
$serialNo = 1;
while($row=mysqli_fetch_assoc($sql))
{
    $s_id=$row['shake_id'];
    $s_name=$row['shake_name'];
    $s_goal=$row['shake_goal'];
    $s_reci=$row['shake_recipes'];
    $s_raw=$row['shake_raw']; 
    $s_mcost=$row['shake_mcost']; 
    $s_scost=$row['shake_scost']; 
    $s_gst=$row['shake_gst']; 
    $s_bene=$row['shake_benefit']; 
    $s_disc=$row['shake_desc']; 
    $s_img=$row['shake_img']; 

?>
                    <tbody>
                      <tr>
                      <td class="py-1"><?php echo $serialNo++; ?></td>
                        <td><img src="../../Admin/images/shake/<?php echo $s_img; ?>" alt=""></td>
                        <td><?php echo $s_name; ?></td>
                        <td><?php echo $s_goal; ?></td>
                        <td><?php echo $s_reci; ?></td>
                        <td><?php echo $s_raw; ?></td>
                        <td><?php echo $s_mcost; ?></td>
                        <td><?php echo $s_gst; ?></td>
                        <td><?php echo $s_scost; ?></td>
                        <td><?php echo $s_bene; ?></td>
                        <td><?php echo $s_disc; ?></td>
                        <td>
                          <a  href="staff-shake.php?sid=<?php echo $s_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit 
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="staff-shake.php?sd_id=<?php echo $s_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete 
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

    // Display selected image
    var fileReader = new FileReader();
    fileReader.onload = function(e) {
        var img = document.createElement("img");
        img.src = e.target.result;
        img.style.width = "350px"; // Set width
        img.style.height = "auto"; // Maintain aspect ratio
        img.style.borderRadius = "8px"; // Border radius
        img.style.marginTop = "50px"; // Optional margin
        label.parentNode.appendChild(img);
    };
    fileReader.readAsDataURL(input.files[0]);
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
