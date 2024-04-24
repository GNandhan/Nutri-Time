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
      $p_query = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = '$cusid'");
      $p_row1 = mysqli_fetch_array($p_query);

      $cus_id1 = $p_row1['cust_id'];
      $cus_code1 = $p_row1['cust_code'];
      $cus_name1 = $p_row1['cust_name'];
      $cus_phno1 = $p_row1['cust_phno'];
      $cus_invite1 = $p_row1['cust_invited'];
      $cus_age1 = $p_row1['cust_age'];
      $cus_bodyage1 = $p_row1['cust_bodyage'];
      $cus_gender1 = $p_row1['cust_gender'];
      $cus_email1 = $p_row1['cust_email'];
      $cus_doj1 = $p_row1['cust_doj'];
      $cus_city1 = $p_row1['cust_city'];
      $cus_address1 = $p_row1['cust_address'];
      $cus_height1 = $p_row1['cust_height'];
      $cus_weight1 = $p_row1['cust_weight'];
      $cus_fat1 = $p_row1['cust_fat'];
      $cus_vcf1 = $p_row1['cust_vcf'];
      $cus_bmr1 = $p_row1['cust_bmr'];
      $cus_bmi1 = $p_row1['cust_bmi'];
      $cus_mm1 = $p_row1['cust_mm'];
      $cus_tsf1 = $p_row1['cust_tsf'];
      $cus_waketime1 = $p_row1['cust_waketime'];
      $cus_tea1 = $p_row1['cust_tea'];
      $cus_breakfast1 = $p_row1['cust_breakfast'];
      $cus_lunch1 = $p_row1['cust_lunch'];
      $cus_snack1 = $p_row1['cust_snack'];
      $cus_dinner1 = $p_row1['cust_dinner'];
      $cus_veg_nonveg1 = $p_row1['cust_veg_nonveg'];
      $cus_waterintake1 = $p_row1['cust_waterintake'];
      $cus_cond11 = $p_row1['cust_cond1'];
      $cus_cond21 = $p_row1['cust_cond2'];
      $cus_cond31 = $p_row1['cust_cond3'];
      $cus_prg1 = $p_row1['cust_prg'];
      $cus_prgtype1 = $p_row1['cust_prgtype'];
      $cus_nodays1 = $p_row1['cust_noday'];
      $cus_total1 = $p_row1['cust_total'];
      $cus_paid1 = $p_row1['cust_paid'];
      $cus_remain1 = $p_row1['cust_remain'];

    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['userd_id'])) {
      $dl_id = $_GET['userd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $del = mysqli_query($conn, "DELETE FROM customer WHERE cust_id='$dl_id'");
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Customer Id</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscode" value="<?php echo $cus_code1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusname" value="<?php echo $cus_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Customer Phno</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusphno" value="<?php echo $cus_phno1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Invited By</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuswhat" value="<?php echo $cus_whatphno1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusage" value="<?php echo $cus_age1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Body Age</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusage" value="<?php echo $cus_age1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusgender" value="<?php echo $cus_gender1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" class="form-control" style="border-radius: 16px;" name="cusemail" value="<?php echo $cus_email1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Date of Joining</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusweibg" value="<?php echo $cus_weightbeg1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscity" value="<?php echo $cus_city1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusaddress" value="<?php echo $cus_address1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Evaluation Record</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Height</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprogram" value="<?php echo $cus_program1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Weight</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprgtype" value="<?php echo $cus_type1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Fat %</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>VCF</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>BMR</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>BMI</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Muscle Mass</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>TCF</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Eating Habits</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Wake-Up Time</label>
                        <input type="time" class="form-control" style="border-radius: 16px;" name="cusprogram" value="<?php echo $cus_program1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Tea/ Coffee</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprgtype" value="<?php echo $cus_type1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Breakfast</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Lunch</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Snacks</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Dinner</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Veg / Non-Veg</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Water Intake</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Health Conditions</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Condition 1</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprogram" value="<?php echo $cus_program1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Condition 2</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprgtype" value="<?php echo $cus_type1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 3</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprgtype" value="<?php echo $cus_type1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Program Details</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Program</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprogram" value="<?php echo $cus_program1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Program Type</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprgtype" value="<?php echo $cus_type1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>No of Days</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Total Amount</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="custotal" value="<?php echo $cus_total1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Amount Paid</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuspaid" value="<?php echo $cus_paid1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Remaining Amount</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusrem" value="<?php echo $cus_remain1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitp">Submit</button>
                  <a href="./admin-customer.php" type="reset" class="btn btn-light rounded-pill">Cancel</a>
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
                        <th>Invited By</th>
                        <th>Age</th>
                        <th>Body Age</th>
                        <th>Gender</th>
                        <th>Mail</th>
                        <th>DOJ</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Fat %</th>
                        <th>VCF</th>
                        <th>BMR</th>
                        <th>BMI</th>
                        <th>Muscle Mass</th>
                        <th>TSF</th>
                        <th>Wake-Up Time</th>
                        <th>Tea/ Coffee</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Snacks</th>
                        <th>Dinner</th>
                        <th>Veg/Non-Veg</th>
                        <th>Water Intake</th>
                        <th>Condition 1</th>
                        <th>Condition 2</th>
                        <th>Condition 3</th>
                        <th>Program</th>
                        <th>Program Type</th>
                        <th>No of Days</th>
                        <th>Total Amount</th>
                        <th>Amount Paid</th>
                        <th>Remaining Amount</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM customer ORDER BY cust_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $cus_id = $row['cust_id'];
                      $cus_code = $row['cust_code'];
                      $cus_name = $row['cust_name'];
                      $cus_phno = $row['cust_phno'];
                      $cus_invite = $row['cust_invited'];
                      $cus_age = $row['cust_age'];
                      $cus_bodyage = $row['cust_bodyage'];
                      $cus_gender = $row['cust_gender'];
                      $cus_email = $row['cust_email'];
                      $cus_doj = $row['cust_doj'];
                      $cus_city = $row['cust_city'];
                      $cus_address = $row['cust_address'];
                      $cus_height = $row['cust_height'];
                      $cus_weight = $row['cust_weight'];
                      $cus_fat = $row['cust_fat'];
                      $cus_vcf = $row['cust_vcf'];
                      $cus_bmr = $row['cust_bmr'];
                      $cus_bmi = $row['cust_bmi'];
                      $cus_mm = $row['cust_mm'];
                      $cus_tsf = $row['cust_tsf'];
                      $cus_waketime = $row['cust_waketime'];
                      $cus_tea = $row['cust_tea'];
                      $cus_breakfast = $row['cust_breakfast'];
                      $cus_lunch = $row['cust_lunch'];
                      $cus_snack = $row['cust_snack'];
                      $cus_dinner = $row['cust_dinner'];
                      $cus_veg_nonveg = $row['cust_veg_nonveg'];
                      $cus_waterintake = $row['cust_waterintake'];
                      $cus_cond1 = $row['cust_cond1'];
                      $cus_cond2 = $row['cust_cond2'];
                      $cus_cond3 = $row['cust_cond3'];
                      $cus_prg = $row['cust_prg'];
                      $cus_prgtype = $row['cust_prgtype'];
                      $cus_nodays = $row['cust_noday'];
                      $cus_total = $row['cust_total'];
                      $cus_paid = $row['cust_paid'];
                      $cus_remain = $row['cust_remain'];
                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-customer.php?custid=<?php echo $cus_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit <i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-customer.php?userd_id=<?php echo $cus_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
                          <td class="py-1"><?php echo $cus_code; ?></td>
                          <td><?php echo $cus_name; ?></td>
                          <td><?php echo $cus_phno; ?></td>
                          <td><?php echo $cus_invite; ?></td>
                          <td><?php echo $cus_age; ?></td>
                          <td><?php echo $cus_bodyage; ?></td>
                          <td><?php echo $cus_gender; ?></td>
                          <td><?php echo $cus_email; ?></td>
                          <td><?php echo $cus_doj; ?></td>
                          <td><?php echo $cus_city; ?></td>
                          <td><?php echo $cus_address; ?></td>
                          <td><?php echo $cus_height; ?>Kg</td>
                          <td><?php echo $cus_weight; ?>Kg</td>
                          <td><?php echo $cus_fat; ?></td>
                          <td><?php echo $cus_vcf; ?></td>
                          <td><?php echo $cus_bmr; ?></td>
                          <td><?php echo $cus_bmi; ?></td>
                          <td><?php echo $cus_mm; ?></td>
                          <td><?php echo $cus_tsf; ?></td>
                          <td><?php echo $cus_waketime; ?></td>
                          <td><?php echo $cus_tea; ?></td>
                          <td><?php echo $cus_breakfast; ?></td>
                          <td><?php echo $cus_lunch; ?></td>
                          <td><?php echo $cus_snack; ?></td>
                          <td><?php echo $cus_dinner; ?></td>
                          <td><?php echo $cus_veg_nonveg; ?></td>
                          <td><?php echo $cus_waterintake; ?></td>
                          <td><?php echo $cus_cond1; ?></td>
                          <td><?php echo $cus_cond2; ?></td>
                          <td><?php echo $cus_cond3; ?></td>
                          <td><?php echo $cus_prg; ?></td>
                          <td><?php echo $cus_prgtype; ?></td>
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