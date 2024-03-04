<?php
 include './connect.php';
//  error_reporting(0);
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
  <title>Admin Staff</title>
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
if(isset($_GET['stid']))
{
    $st_id = $_GET['stid'];
    $st_query = mysqli_query($conn,"SELECT * FROM staff WHERE staff_id = '$st_id'");
    $st_row1=mysqli_fetch_array($st_query);

        $st_name1 = $st_row1['staff_name'];
        $st_uname1 = $st_row1['staff_uname'];
        $st_mail1 = $st_row1['staff_email']; 
        $st_pass1 = $st_row1['staff_pass']; 
        $st_gender1 = $st_row1['staff_gender']; 
        $st_city1 = $st_row1['staff_city']; 
        $st_phno1 = $st_row1['staff_phno']; 
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['sd_id']))
{
    $dl_id = $_GET['sd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM staff WHERE staff_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../images/shake/'.$dl_row['shake_img'];
    $del = mysqli_query($conn,"DELETE FROM staff WHERE staff_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-staff.php");
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
                  <h4 class="card-title">Staff Details</h4>
                  <p class="card-description">
                    Add staff Details
                  </p>
                  <form class="forms-sample" method="post">
                  <input type="hidden" name="shid" value="<?php echo $sh_id; ?>">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputName1">Staff Name</label>
                          <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                      </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email Id</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                          <select class="form-control" id="exampleSelectGender">
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputCity1">Phone No</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                    </div>
                  </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
    if(isset($_POST["submitsh"]))
    {
    $sh_name= $_POST["shname"];
    $sh_goal= $_POST["shgoal"];
    $sh_reci= $_POST["shrecipe"];
    $sh_raw= $_POST["shraw"];
    $sh_mcost= $_POST["shmcost"];
    $sh_scost= $_POST["shscost"];
    $sh_disc= $_POST["shdis"];
    $sh_img = $_FILES['shimg']['name'];

  // Image uploading formats
  $filename = $_FILES['shimg']['name'];
  $tempname = $_FILES['shimg']['tmp_name'];

// Fetch the shake ID from the form
$sh_id = $_POST["shid"];

if($sh_id=='') {
$sql = mysqli_query($conn,"INSERT INTO shake (shake_name, shake_goal, shake_recipes, shake_raw, shake_mcost, shake_scost, shake_desc, shake_img)
                                         VALUES ('$sh_name','$sh_goal','$sh_reci','$sh_raw','$sh_mcost','$sh_scost','$sh_disc','$sh_img')");
}else{
        // Update existing material
        if ($filename) {
          // Remove the existing image
          $imgs = '../images/shake/' . $sh_img;
          unlink($imgs);
          // Update shake with new image
      $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_raw='$sh_raw', shake_mcost='$sh_mcost', shake_scost='$sh_scost', shake_desc='$sh_disc', shake_img='$sh_img' WHERE shake_id='$sh_id'");
    } else {
      // Update shake without changing the image
      $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_raw='$sh_raw', shake_mcost='$sh_mcost', shake_scost='$sh_scost', shake_desc='$sh_disc', shake_img='$sh_img' WHERE shake_id='$sh_id'");
  }
}

if ($sql == TRUE)
{
// echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
move_uploaded_file($tempname, "../images/shake/$filename");
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
                <h4 class="card-title">Staff Details</h4>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Staff Name</th>
                        <th>Username</th>
                        <th>Email Id</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Phone No</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM staff ORDER BY staff_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $st_id=$row['staff_id'];
    $st_name=$row['staff_name'];
    $st_uname=$row['staff_uname'];
    $st_mail=$row['staff_email'];
    $st_pass=$row['staff_pass']; 
    $st_gender=$row['staff_gender']; 
    $st_city=$row['staff_city']; 
    $st_phno=$row['staff_phno']; 
?>
                    <tbody>
                      <tr>
                        <td class="py-1"><?php echo $st_id; ?></td>
                        <td><?php echo $st_name; ?></td>
                        <td><?php echo $st_uname; ?></td>
                        <td><?php echo $st_mail; ?></td>
                        <td><?php echo $st_pass; ?></td>
                        <td><?php echo $st_gender; ?></td>
                        <td><?php echo $st_city; ?></td><td>
                        <td><?php echo $st_phno; ?></td><td>
                          <a href="admin-shake.php?sid=<?php echo $s_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit 
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-shake.php?sid=<?php echo $s_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete 
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