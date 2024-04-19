<?php
include './connect.php';
error_reporting(0);
session_start();
if ($_SESSION["email"] == "") {
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
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- including the sidebar,navbar -->
    <?php
    include './topbar.php';
    ?>
    <?php
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['userd_id'])) {
      $dl_id = $_GET['userd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $del = mysqli_query($conn, "DELETE FROM customer WHERE customer_id='$dl_id'");
      if ($del) { //for deleting the existing image from the folder
        header("location:admin-customer.php");
      } else {
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
                <h1 class="card-title">Customer Details</h1>
                <p class="card-description">Add Customer Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="prid" value="<?php echo $priid; ?>">
                  <div class="row">
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Customer Id</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcode" value="<?php echo $p_code1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodname" value="<?php echo $p_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Customer Phno</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodmrp" value="<?php echo $p_mrp1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Whatsapp No</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodpur" value="<?php echo $p_pri1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Weight (begining)</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Weight(Current)</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                  </div> 
                <p class="card-description">Add Program Details</p> <hr>
                <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label>Program</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>No of Days</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label>Total Amount</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Amount Paid</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Remaining Amount</label>
                        <input type="text" class="form-control" style="border-radius: 15px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
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
        if (isset($_POST["submitp"])) {
          $pcode = $_POST["prodcode"];
          $pname = $_POST["prodname"];
          $pcat = $_POST["prodcat"];
          $psubcat = $_POST["prodsubcat"];
          $pmrp = $_POST["prodmrp"];
          $ppur = $_POST["prodpur"];
          $pdis15 = $_POST["dis15"];
          $pdis25 = $_POST["dis25"];
          $pdis35 = $_POST["dis35"];
          $pdis42 = $_POST["dis42"];
          $pdis50 = $_POST["dis50"];


          // Fetch the shake ID from the form
          $pri_id = $_POST["prid"];

          if ($pri_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO price (pro_name, pro_code, pro_category, pro_subcat, pro_mrp, pro_price, pro_dis15, pro_dis25, pro_dis35, pro_dis42, pro_dis50)
                                         VALUES ('$pname','$pcode','$pcat','$psubcat','$pmrp','$ppur','$pdis15','$pdis25','$pdis35','$pdis42','$pdis50' )");
          } else {
            // Update shake
            $sql = mysqli_query($conn, "UPDATE price SET pro_name='$pname', pro_code='$pcode', pro_category='$pcat', pro_subcat='$psubcat', pro_mrp='$pmrp', pro_price='$ppur', pro_dis15='$pdis15', pro_dis25='$pdis25', pro_dis35='$pdis35', pro_dis42='$pdis42', pro_dis50='$pdis50' WHERE pri_id='$pri_id'");
          }
          if ($sql == TRUE) {
            echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
          } else {
            echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
          }
        }
        ?>
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
                        <th>Phno</th>
                        <th>WhatsappNo</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Mail</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Weight (Begining)</th>
                        <th>Weight (Current)</th>
                        <th>Weight Difference</th>
                        <th>Program</th>
                        <th>No of days</th>
                        <th>Total Amount</th>
                        <th>Amount Paid</th>
                        <th>Remaining Amount</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM customer ORDER BY customer_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $cus_id = $row['customer_id'];
                      $cus_fname = $row['customer_fname'];
                      $cus_lname = $row['customer_lname'];
                      $cus_age = $row['customer_age'];
                      $cus_phno = $row['customer_phno'];
                      $cus_whatsapp = $row['customer_whatsapp'];
                      $cus_mail = $row['customer_email'];
                      $cus_gender = $row['customer_gender'];
                      $cus_address = $row['customer_address'];
                      $cus_city = $row['customer_city'];
                      $cus_program = $row['customer_program'];
                      $cus_payment = $row['customer_payment'];
                      $name = $cus_fname . " " . $cus_lname;
                    ?>
                      <tbody>
                        <tr>
                          <td><a class="btn btn-inverse-secondary btn-icon-text p-2">Edit <i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-customer.php?userd_id=<?php echo $cus_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>
</html>