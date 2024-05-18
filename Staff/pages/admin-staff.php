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
  <title>Admin Staff</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>
<body>
  <div class="container-scroller">
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
if(isset($_GET['std_id']))
{
    $dl_id = $_GET['std_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM staff WHERE staff_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $del = mysqli_query($conn,"DELETE FROM staff WHERE staff_id='$dl_id'");
    if($del){
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-staff.php");
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
                <div class="card-body">
                  <h4 class="card-title">Staff Details</h4>
                  <p class="card-description">Add staff Details</p>
                  <form class="forms-sample" method="post">
                  <input type="hidden" name="stid" value="<?php echo $st_id; ?>">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputName1">Staff Name</label>
                          <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Name" name="stname" value="<?php echo $st_name1; ?>"  required>
                        </div>
                      </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Username</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Username" name="stusername" value="<?php echo $st_uname1; ?>"  required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email Id</label>
                        <input type="email" class="form-control" style="border-radius: 16px;" placeholder="abc123@gmail.com" name="stmail" value="<?php echo $st_mail1; ?>"  required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" style="border-radius: 16px;" placeholder="Password" name="stpass" value="<?php echo $st_pass1; ?>"  required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                          <select class="form-control" style="border-radius: 16px;" name="stgender" required>
                            <option <?php if($st_gender1=='Male' ) echo 'selected' ; ?> value="Male">Male</option>
                            <option <?php if($st_gender1=='Female' ) echo 'selected' ; ?> value="Female">Female</option>
                            <option <?php if($st_gender1=='Other' ) echo 'selected' ; ?> value="Other">Other</option>
                          </select>
                        </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="stcity" value="<?php echo $st_city1; ?>"  required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputCity1">Phone No</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="stphno" value="<?php echo $st_phno1; ?>"  required>
                      </div>
                    </div>
                  </div>
                    <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitst">Submit</button>
                    <button class="btn btn-light rounded-pill">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
    if(isset($_POST["submitst"]))
    {
    $st_name= $_POST["stname"];
    $st_uname= $_POST["stusername"];
    $st_mail= $_POST["stmail"];
    $st_pass= $_POST["stpass"];
    $st_gender= $_POST["stgender"];
    $st_city= $_POST["stcity"];
    $st_phno= $_POST["stphno"];

// Fetch the shake ID from the form
$st_id = $_POST["stid"];

if($st_id=='') {
$sql = mysqli_query($conn,"INSERT INTO staff (staff_name, staff_uname, staff_email, staff_pass, staff_gender, staff_city, staff_phno)
                                         VALUES ('$st_name','$st_uname','$st_mail','$st_pass','$st_gender','$st_city','$st_phno')");
}else{
      // Update shake
$sql = mysqli_query($conn, "UPDATE staff SET staff_name='$st_name', staff_uname='$st_uname', staff_email='$st_mail', staff_pass='$st_pass', staff_gender='$st_gender', staff_city='$st_city', staff_phno='$st_phno' WHERE staff_id='$st_id'");
}

if ($sql == TRUE){
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
                <h4 class="card-title">Staff Details</h4>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th>Edit</th>
                        <th>Delete</th>
                        <th>Slno</th>
                        <th>Staff Name</th>
                        <th>Username</th>
                        <th>Email Id</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Phone No</th>

                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM staff ORDER BY staff_id ");
$serialNo = 1;
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
                      <td>
                          <a href="admin-staff.php?stid=<?php echo $st_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit 
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-staff.php?std_id=<?php echo $st_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </a>
                        </td>
                        <td class="py-1"><?php echo $serialNo++; ?></td>
                        <td><?php echo $st_name; ?></td>
                        <td><?php echo $st_uname; ?></td>
                        <td><?php echo $st_mail; ?></td>
                        <td><?php echo $st_pass; ?></td>
                        <td><?php echo $st_gender; ?></td>
                        <td><?php echo $st_city; ?></td>
                        <td><?php echo $st_phno; ?></td>

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