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
        if (isset($_GET['custid'])) {
          $cusid = $_GET['custid'];
          $p_query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$cusid'");
          $p_row1 = mysqli_fetch_array($p_query);

          $cus_id1 = $p_row1['customer_id'];
          $cus_code1 = $p_row1['customer_code'];
          $cus_name1 = $p_row1['customer_name'];
          $cus_phno1 = $p_row1['customer_phno'];
          $cus_whatphno1 = $p_row1['customer_whatsapp'];
          $cus_age1 = $p_row1['customer_age'];
          $cus_gender1 = $p_row1['customer_gender'];
          $cus_email1 = $p_row1['customer_email'];
          $cus_password1 = $p_row1['customer_password'];
          $cus_city1 = $p_row1['customer_city'];
          $cus_address1 = $p_row1['customer_address'];
          $cus_weightbeg1 = $p_row1['customer_weightbeg'];
          $cus_weightcur1 = $p_row1['customer_weightcur'];
          $cus_weightdif1 = $p_row1['customer_weightdif'];
          $cus_program1 = $p_row1['customer_program'];
          $cus_type1 = $p_row1['customer_type'];
          $cus_nodays1 = $p_row1['customer_nodays'];
          $cus_total1 = $p_row1['customer_total'];
          $cus_paid1 = $p_row1['customer_paid'];
          $cus_remain1 = $p_row1['customer_remain'];
        }
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
                  <input type="hidden" name="custid" value="<?php echo $cusid; ?>">
                  <div class="row">
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Customer Id</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscode" value="<?php echo $cus_code1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusname" value="<?php echo $cus_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Customer Phno</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusphno" value="<?php echo $cus_phno1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Whatsapp No</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuswhat" value="<?php echo $cus_whatphno1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusage" value="<?php echo $cus_age1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusgender" value="<?php echo $cus_gender1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" class="form-control" style="border-radius: 16px;" name="cusemail" value="<?php echo $cus_email1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Weight (begining)</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusweibg" value="<?php echo $cus_weightbeg1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Weight(Current)</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusweicu" value="<?php echo $cus_weightcur1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscity" value="<?php echo $cus_city1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusaddress" value="<?php echo $cus_address1; ?>" required>
                      </div>
                    </div>
                  </div> 
                <p class="card-description">Add Program Details</p> <hr>
                <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label>Program</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprogram" value="<?php echo $cus_program1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Program Type</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprgtype" value="<?php echo $cus_type1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>No of Days</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label>Total Amount</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="custotal" value="<?php echo $cus_total1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Amount Paid</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuspaid" value="<?php echo $cus_paid1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Remaining Amount</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusrem" value="<?php echo $cus_remain1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitp">Submit</button>
                  <a href="./admin-price.php" type="reset" class="btn btn-light rounded-pill">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
        if (isset($_POST["submitp"])) {
          $ccode = $_POST["cuscode"];
          $cname = $_POST["cusname"];
          $cphno = $_POST["cusphno"];
          $cwhat = $_POST["cuswhat"];
          $cage = $_POST["cusage"];
          $cgender = $_POST["cusgender"];
          $cmail = $_POST["cusemail"];
          $cweibg = $_POST["cusweibg"];
          $cweicu = $_POST["cusweicu"];
          $cweidif = $cweibg - $cweicu;
          $ccity = $_POST["cuscity"];
          $caddress = $_POST["cusaddress"];
          $cprogram = $_POST["cusprogram"];
          $cprgtype = $_POST["cusprgtype"];
          $cnodays = $_POST["cusnoday"];
          $ctotal = $_POST["custotal"];
          $cpaid = $_POST["cuspaid"];
          $crem = $_POST["cusrem"];


          // Fetch the shake ID from the form
          $cus_id = $_POST["custid"];

          if ($cus_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO customer (customer_code, customer_name, customer_phno, customer_whatsapp, customer_age, customer_gender, customer_email, customer_city, customer_address, customer_weightbeg, customer_weightcur, customer_weightdif, customer_program, customer_type, customer_nodays, customer_total, customer_paid, customer_remain)
                                         VALUES ('$ccode','$cname','$cphno','$cwhat','$cage','$cgender','$cmail','$ccity','$caddress','$cweibg','$cweicu','$cweidif','$cprogram','$cprgtype','$cnodays','$ctotal','$cpaid','$crem')");
          } else {
            // Update shake
            $sql = mysqli_query($conn, "UPDATE customer SET customer_code='$ccode', customer_name='$cname', customer_phno='$cphno', customer_whatsapp='$cwhat', customer_age='$cage', customer_gender='$cgender', customer_email='$cmail', customer_city='$ccity', customer_address='$caddress', customer_weightbeg='$cweibg', customer_weightcur='$cweicu', customer_weightdif='$cweidif', customer_program='$cprogram', customer_type='$cprgtype', customer_nodays='$cnodays', customer_total='$ctotal', customer_paid='$cpaid', customer_remain='$crem' WHERE customer_id='$cus_id'");
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
                        <th>Program Type</th>
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
                      $cus_code = $row['customer_code'];
                      $cus_name = $row['customer_name'];
                      $cus_phno = $row['customer_phno'];
                      $cus_whatphno = $row['customer_whatsapp'];
                      $cus_age = $row['customer_age'];
                      $cus_gender = $row['customer_gender'];
                      $cus_email = $row['customer_email'];
                      $cus_password = $row['customer_password'];
                      $cus_city = $row['customer_city'];
                      $cus_address = $row['customer_address'];
                      $cus_weightbeg = $row['customer_weightbeg'];
                      $cus_weightcur = $row['customer_weightcur'];
                      $cus_weightdif = $row['customer_weightdif'];
                      $cus_program = $row['customer_program'];
                      $cus_type = $row['customer_type'];
                      $cus_nodays = $row['customer_nodays'];
                      $cus_total = $row['customer_total'];
                      $cus_paid = $row['customer_paid'];
                      $cus_remain = $row['customer_remain'];
                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-customer.php?custid=<?php echo $cus_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit <i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-customer.php?userd_id=<?php echo $cus_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
                          <td class="py-1"><?php echo $cus_code; ?></td>
                          <td><?php echo $cus_name; ?></td>
                          <td><?php echo $cus_phno; ?></td>
                          <td><?php echo $cus_whatphno; ?></td>
                          <td><?php echo $cus_age; ?></td>
                          <td><?php echo $cus_gender; ?></td>
                          <td><?php echo $cus_email; ?></td>
                          <td><?php echo $cus_city; ?></td>
                          <td><?php echo $cus_address; ?></td>  
                          <td><?php echo $cus_weightbeg; ?>Kg</td>
                          <td><?php echo $cus_weightcur; ?>Kg</td>
                          <td><?php echo $cus_weightdif; ?>Kg</td>
                          <td><?php echo $cus_program; ?></td>
                          <td><?php echo $cus_type; ?></td>
                          <td><?php echo $cus_nodays; ?></td>
                          <td><?php echo $cus_total; ?></td>
                          <td><?php echo $cus_paid; ?></td>
                          <td><?php echo $cus_remain; ?></td>
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