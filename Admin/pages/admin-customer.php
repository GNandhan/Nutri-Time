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
  <title>Admin Customer</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
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
if(isset($_GET['userd_id']))
{
    $dl_id = $_GET['userd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM customer WHERE customer_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $del = mysqli_query($conn,"DELETE FROM customer WHERE customer_id='$dl_id'");
    if($del){ //for deleting the existing image from the folder
        header("location:admin-customer.php");
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
            <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Customer</h4>
                <p class="card-description">Customer Details</p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th>Edit</th>
                        <th>Delete</th>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Phno</th>
                        <th>WhatsappNo</th>
                        <th>Mail</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Weight Type</th>
                        <th>Weight Loss</th>
                        <th>Weight Gain</th>
                        <th>Address</th>
                        <th>Address</th>
                        <th>Address</th>

                        <th>Program</th>
                        <th>Total Amount</th>
                        <th>Amount Paid</th>
                        <th>Remaining Amount</th>

                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM customer ORDER BY customer_id ");
$serialNo = 1;
while($row=mysqli_fetch_assoc($sql))
{
    $cus_id=$row['customer_id'];
    $cus_fname=$row['customer_fname'];
    $cus_lname=$row['customer_lname'];
    $cus_age=$row['customer_age'];
    $cus_phno=$row['customer_phno'];
    $cus_whatsapp=$row['customer_whatsapp']; 
    $cus_mail=$row['customer_email']; 
    $cus_gender=$row['customer_gender']; 
    $cus_address=$row['customer_address']; 
    $cus_city=$row['customer_city']; 
    $cus_program=$row['customer_program']; 
    $cus_payment=$row['customer_payment']; 

    $name = $cus_fname . " " . $cus_lname;
?>
                    <tbody>
                      <tr>
                      <td>
                          <a  class="btn btn-inverse-secondary btn-icon-text p-2">Edit 
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-customer.php?userd_id=<?php echo $cus_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </a>
                        </td>
                        <td class="py-1">#<?php echo $serialNo++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $cus_age; ?></td>
                        <td><?php echo $cus_gender; ?></td>
                        <td><?php echo $cus_phno; ?></td>
                        <td><?php echo $cus_whatsapp; ?></td>
                        <td><?php echo $cus_mail; ?></td>
                        <td><?php echo $cus_city; ?></td>
                        <td><?php echo $cus_address; ?></td>
                        <td><?php echo $cus_program; ?></td>
                        <td><?php echo $cus_payment; ?></td>
                        <td><?php echo $cus_payment; ?></td>
                        <td><?php echo $cus_payment; ?></td>
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
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/chart.js"></script>
  <!-- End custom js for this page-->
</body>
</html>
