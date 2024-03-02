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
  <title>Admin User</title>
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
// fetching the data from the URL for deleting the subject form
if(isset($_GET['ud_id']))
{
    $dl_id = $_GET['ud_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../images/user/'.$dl_row['user_image'];
    $del = mysqli_query($conn,"DELETE FROM user WHERE user_id ='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-user.php");
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
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Customer</h4>
                <p class="card-description">
                  Customer Details
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>User Id</th>
                        <th>Customer Image</th>
                        <th>Customer Name</th>
                        <th>Phno</th>
                        <th>Address</th>
                        <th>Blood Group</th>
                        <th>City</th>
                        <th>Program</th>
                        <th>Payment Method</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM user ORDER BY user_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $u_id=$row['user_id'];
    $u_name=$row['user_name'];
    $u_phno=$row['user_phno'];
    $u_gender=$row['user_gender'];
    $u_blood=$row['user_blood'];
    $u_address=$row['user_address']; 
    $u_city=$row['user_city']; 
    $u_prog=$row['user_program']; 
    $u_payment=$row['user_payment']; 
    $u_img=$row['user_image']; 
?>
                    <tbody>
                      <tr>
                        <td class="py-1"><?php echo $u_id; ?></td>
                        <td><img src="../images/material/<?php echo $u_img; ?>" alt=""></td>
                        <td><?php echo $u_name; ?></td>
                        <td><?php echo $u_phno; ?></td>
                        <td><?php echo $u_address; ?></td>
                        <td><?php echo $u_blood; ?></td>
                        <td><?php echo $u_city; ?></td>
                        <td><?php echo $u_prog; ?></td>
                        <td><?php echo $u_payment; ?></td>
                        <td>
                          <a href="admin-user.php?ud_id=<?php echo $u_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete 
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
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
