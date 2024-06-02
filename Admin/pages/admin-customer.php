<?php
include './connect.php';
error_reporting(0);
$cus_id1 = $cus_code1 = $cus_name1 = $cus_phno1 = $cus_invite1 = $cus_age1 = $cus_bodyage1 = $cus_gender1 = $cus_email1 = $cus_doj1 = $cus_city1 = $cus_address1 = $cus_height1 = $cus_weight1 = $cus_idleweight1 = $cus_fat1 = $cus_vcf1 = $cus_bmr1 = $cus_bmi1 = $cus_mm1 = $cus_tsf1 = $cus_waketime1 = $cus_tea1 = $cus_breakfast1 = $cus_lunch1 = $cus_snack1 = $cus_dinner1 = $cus_veg_nonveg1 = $cus_waterintake1 = $cus_cond11 = $cus_cond21 = $cus_cond31 = $cus_cond41 = $cus_cond51 = $cus_cond61 = $cus_cond71 = $cus_cond81 = $cus_prg1 = $cus_prgtype1 = $cus_nodays1 = $cus_total1 = $cus_paid1 = $cus_remain1 = $cusid = $cus_paid3 = "";
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
  <!-- <meta http-equiv="refresh" content="3"> -->
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
    if (isset($_GET['cusid'])) {
      $cusid = $_GET['cusid'];
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
      $cus_idleweight1 = $p_row1['cust_idleweight'];
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
      $cus_cond41 = $p_row1['cust_cond4'];
      $cus_cond51 = $p_row1['cust_cond5'];
      $cus_cond61 = $p_row1['cust_cond6'];
      $cus_cond71 = $p_row1['cust_cond7'];
      $cus_cond81 = $p_row1['cust_cond8'];
      $cus_prg1 = $p_row1['cust_prg'];
      $cus_prgtype1 = $p_row1['cust_prgtype'];
      $cus_nodays1 = $p_row1['cust_noday'];
      $cus_total1 = $p_row1['cust_total'];
      $cus_paid1 = $p_row1['cust_paid'];
      $cus_date1 = $p_row1['cust_date'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['cusdid'])) {
      $dl_id = $_GET['cusdid'];
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
    <?php
    if (isset($_GET['cusmdid'])) {
      $cusid = $_GET['cusmdid'];
      $p_query = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = '$cusid'");
      $p_row1 = mysqli_fetch_array($p_query);

      $cus_id1 = $p_row1['cust_id'];
      $cus_total2 = $p_row1['cust_total'];
      $cus_paid2 = $p_row1['cust_paid'];
      $cus_date12 = $p_row1['cust_date'];
    }
    ?>
    <?php
    if (isset($_GET['cusmdid2'])) {
      $cusid = $_GET['cusmdid2'];
      $p_query = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = '$cusid'");
      $p_row1 = mysqli_fetch_array($p_query);

      $cus_id1 = $p_row1['cust_id'];
      $cus_total2 = $p_row1['cust_bmr'];
      $cus_paid2 = $p_row1['cust_bmi'];
      $cus_date12 = $p_row1['cust_date'];
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
                <form method="post" class="forms-sample">
                  <input type="hidden" name="custid" value="<?php echo $cusid; ?>">
                  <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Customer Id</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscode" value="<?php echo $cus_code1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusname" value="<?php echo $cus_name1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Customer Phno</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusphno" value="<?php echo $cus_phno1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Invited By</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusinvite" value="<?php echo $cus_invite1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusage" value="<?php echo $cus_age1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Body Age</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusbodyage" value="<?php echo $cus_bodyage1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusgender" value="<?php echo $cus_gender1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" class="form-control" style="border-radius: 16px;" name="cusemail" value="<?php echo $cus_email1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Date of Joining</label>
                        <input type="date" class="form-control" style="border-radius: 16px;" name="cusdoj" value="<?php echo $cus_doj1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscity" value="<?php echo $cus_city1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusaddress" value="<?php echo $cus_address1; ?>">
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Evaluation Record</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Height</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusheight" value="<?php echo $cus_height1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Weight</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusweight" value="<?php echo $cus_weight1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Ideal Weight</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusidleweight" value="<?php echo $cus_idleweight1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Fat %</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusfat" value="<?php echo $cus_fat1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>VCF</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusvcf" value="<?php echo $cus_vcf1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>BMR</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusbmr" value="<?php echo $cus_bmr1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>BMI</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusbmi" value="<?php echo $cus_bmi1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Muscle Mass</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusmm" value="<?php echo $cus_mm1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>TCF</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="custcf" value="<?php echo $cus_tsf1; ?>">
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Eating Habits</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Wake-Up Time</label>
                        <input type="time" class="form-control" style="border-radius: 16px;" name="cuswaketime" value="<?php echo $cus_waketime1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Tea/ Coffee</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="custea" value="<?php echo $cus_tea1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Breakfast</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusbreakfast" value="<?php echo $cus_breakfast1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Lunch</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuslunch" value="<?php echo $cus_lunch1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Snacks</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cussnack" value="<?php echo $cus_snack1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Dinner</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusdinner" value="<?php echo $cus_dinner1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Veg / Non-Veg</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusveg" value="<?php echo $cus_veg_nonveg1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Water Intake</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuswaterintake" value="<?php echo $cus_waterintake1; ?>">
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Health Conditions</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-4 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Condition 1</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond1" value="<?php echo $cus_cond11; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Condition 2</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond2" value="<?php echo $cus_cond21; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 3</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond3" value="<?php echo $cus_cond31; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 4</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond4" value="<?php echo $cus_cond41; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 5</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond5" value="<?php echo $cus_cond51; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 6</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond6" value="<?php echo $cus_cond61; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 7</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond7" value="<?php echo $cus_cond71; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 8</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond8" value="<?php echo $cus_cond81; ?>">
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Program Details</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Program</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprogram" value="<?php echo $cus_prg1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Program Type</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusprgtype" value="<?php echo $cus_prgtype1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>No of Days</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Total Amount</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="custotal" value="<?php echo $cus_total1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Amount Paid</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuspaid" value="<?php echo $cus_paid1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Program Ending Date</label>
                        <input type="date" class="form-control" style="border-radius: 16px;" name="cusdate" value="<?php echo $cus_date1; ?>">
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
          $cinvite = $_POST["cusinvite"];
          $cage = $_POST["cusage"];
          $cbodyage = $_POST["cusbodyage"];
          $cgender = $_POST["cusgender"];
          $cemail = $_POST["cusemail"];
          $cdoj = $_POST["cusdoj"];
          $ccity = $_POST["cuscity"];
          $caddress = $_POST["cusaddress"];
          $cheight = floatval($_POST["cusheight"]); // Convert string to float
          $cweight = floatval($_POST["cusweight"]); // Convert string to float
          $cidle = 100.0; // Assuming you want to subtract a float from the height
          $cidleweight = $cheight - $cidle;
          $cfat = $_POST["cusfat"];
          $cvcf = $_POST["cusvcf"];
          $cbmr = $_POST["cusbmr"];
          $cbmi = $_POST["cusbmi"];
          $cmm = $_POST["cusmm"];
          $ctcf = $_POST["custcf"];
          $cwaketime = $_POST["cuswaketime"];
          $ctea = $_POST["custea"];
          $cbreakfast = $_POST["cusbreakfast"];
          $clunch = $_POST["cuslunch"];
          $csnack = $_POST["cussnack"];
          $cdinner = $_POST["cusdinner"];
          $cveg = $_POST["cusveg"];
          $cwaterintake = $_POST["cuswaterintake"];
          $ccond1 = $_POST["cuscond1"];
          $ccond2 = $_POST["cuscond2"];
          $ccond3 = $_POST["cuscond3"];
          $ccond4 = $_POST["cuscond4"];
          $ccond5 = $_POST["cuscond5"];
          $ccond6 = $_POST["cuscond6"];
          $ccond7 = $_POST["cuscond7"];
          $ccond8 = $_POST["cuscond8"];
          $cprogram = $_POST["cusprogram"];
          $cprgtype = $_POST["cusprgtype"];
          $cnoday = $_POST["cusnoday"];
          $ctotal = floatval($_POST["custotal"]);
          $cpaid = floatval($_POST["cuspaid"]);
          $cdate = $_POST["cusdate"];
          $crem = $ctotal - $cpaid;

          // Fetch the shake ID from the form
          $cus_id = $_POST["custid"];

          if ($cus_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO customer (cust_code, cust_name, cust_phno, cust_invited, cust_age, cust_bodyage, cust_gender, cust_email, cust_doj, cust_city, cust_address, cust_height, cust_weight, cust_idleweight, cust_fat, cust_vcf, cust_bmr, cust_bmi, cust_mm, cust_tsf, cust_waketime, cust_tea, cust_breakfast, cust_lunch, cust_snack, cust_dinner, cust_veg_nonveg, cust_waterintake, cust_cond1, cust_cond2, cust_cond3, cust_cond4, cust_cond5, cust_cond6, cust_cond7, cust_cond8, cust_prg, cust_prgtype, cust_noday, cust_total, cust_paid, cust_remain, cust_date)
                                                      VALUES ('$ccode','$cname','$cphno','$cinvite','$cage','$cbodyage','$cgender','$cemail','$cdoj','$ccity','$caddress','$cheight','$cweight','$cidleweight','$cfat','$cvcf','$cbmr','$cbmi','$cmm','$ctcf','$cwaketime','$ctea','$cbreakfast','$clunch','$csnack','$cdinner','$cveg','$cwaterintake','$ccond1','$ccond2','$ccond3','$ccond4','$ccond5','$ccond6','$ccond7','$ccond8','$cprogram','$cprgtype','$cnoday','$ctotal','$cpaid','$crem','$cdate')");
          } else {
            // Update shake
            $sql = mysqli_query($conn, "UPDATE customer SET cust_code='$ccode', cust_name='$cname', cust_phno='$cphno', cust_invited='$cinvite', cust_age='$cage', cust_bodyage='$cbodyage', cust_gender='$cgender', cust_email='$cemail', cust_doj='$cdoj', cust_city='$ccity', cust_address='$caddress', cust_height='$cheight', cust_weight='$cweight', cust_idleweight='$cidleweight', cust_fat='$cfat', cust_vcf='$cvcf', cust_bmr='$cbmr', cust_bmi='$cbmi', cust_mm='$cmm', cust_tsf='$ctcf', cust_waketime='$cwaketime', cust_tea='$ctea', cust_breakfast='$cbreakfast', cust_lunch='$clunch', cust_snack='$csnack', cust_dinner='$cdinner', cust_veg_nonveg='$cveg', cust_waterintake='$cwaterintake', cust_cond1='$ccond1', cust_cond2='$ccond2', cust_cond3='$ccond3', cust_cond4='$ccond4', cust_cond5='$ccond5', cust_cond6='$ccond6', cust_cond7='$ccond7', cust_cond8='$ccond8', cust_prg='$cprogram', cust_prgtype='$cprgtype', cust_noday='$cnoday', cust_total='$ctotal', cust_paid='$cpaid', cust_remain='$crem', cust_date='$cdate' WHERE cust_id='$cus_id'");
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
                        <th>Payment</th>
                        <th>BMR History</th>
                        <th>Customer Code</th>
                        <th>Customer Name</th>
                        <th>Phno</th>
                        <th>Invited By</th>
                        <th>Age</th>
                        <th>Body Age</th>
                        <th>Gender</th>
                        <th>Mail / Username</th>
                        <th>Password</th>
                        <th>Joining Date</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Idle Weight</th>
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
                        <th>Condition 4</th>
                        <th>Condition 5</th>
                        <th>Condition 6</th>
                        <th>Condition 7</th>
                        <th>Condition 8</th>
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
                      $cus_password = $row['cust_password'];
                      $cus_doj = $row['cust_doj'];
                      $cus_city = $row['cust_city'];
                      $cus_address = $row['cust_address'];
                      $cus_height = $row['cust_height'];
                      $cus_weight = $row['cust_weight'];
                      $cus_idleweight = $row['cust_idleweight'];
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
                      $cus_cond4 = $row['cust_cond4'];
                      $cus_cond5 = $row['cust_cond5'];
                      $cus_cond6 = $row['cust_cond6'];
                      $cus_cond7 = $row['cust_cond7'];
                      $cus_cond8 = $row['cust_cond8'];
                      $cus_prg = $row['cust_prg'];
                      $cus_prgtype = $row['cust_prgtype'];
                      $cus_nodays = $row['cust_noday'];
                      $cus_total = $row['cust_total'];
                      $cus_paid0 = intval($row['cust_paid']); // Convert to integer
                      $cus_paid0date = $row['cust_paiddate'];
                      $cus_paid1 = intval($row['cust_paid1']); // Convert to integer
                      $cus_paid0date1 = $row['cust_paiddate1'];
                      $cus_paid2 = intval($row['cust_paid2']); // Convert to integer
                      $cus_paid0date2 = $row['cust_paiddate2'];
                      $cus_paid3 = intval($row['cust_paid3']); // Convert to integer
                      $cus_paid0date3 = $row['cust_paiddate3'];
                      $cus_paid4 = intval($row['cust_paid4']); // Convert to integer
                      $cus_paid0date4 = $row['cust_paiddate4'];
                      $cus_paid = $cus_paid0 + $cus_paid1 + $cus_paid2 + $cus_paid3 + $cus_paid4;
                      $cus_remain = $row['cust_remain'];
                      $cus_date = $row['cust_date'];
                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-customer.php?cusid=<?php echo $cus_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit <i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-customer.php?cusdid=<?php echo $cus_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
                          <td><a href="admin-customer.php?cusmdid=<?php echo $cus_id; ?>" class="btn btn-inverse-primary btn-icon-text p-3" data-toggle="modal" data-target="#exampleModal_<?php echo $cus_id; ?>">Add Payment</a></td>
                          <td><a href="admin-customer.php?cusmdid=<?php echo $cus_id; ?>" class="btn btn-inverse-primary btn-icon-text p-3" data-toggle="modal" data-target="#exampleModal2_<?php echo $cus_id; ?>">BMI & BMR</a></td>
                          <!-- <td class="py-1"><?php echo $cus_code; ?></td> -->
                          <td class="py-1"><a href="admin-customerdetails.php?prid=<?php echo $cus_id; ?>" class="text-dark"><?php echo $cus_code; ?></a></td>
                          <td><?php echo $cus_name; ?></td>
                          <td><?php echo $cus_phno; ?></td>
                          <td><?php echo $cus_invite; ?></td>
                          <td><?php echo $cus_age; ?></td>
                          <td><?php echo $cus_bodyage; ?></td>
                          <td><?php echo $cus_gender; ?></td>
                          <td><?php echo $cus_email; ?></td>
                          <td><?php echo $cus_password; ?></td>
                          <td><?php echo $cus_doj; ?></td>
                          <td><?php echo $cus_city; ?></td>
                          <td><?php echo $cus_address; ?></td>
                          <td><?php echo $cus_height; ?>Cm</td>
                          <td><?php echo $cus_weight; ?>Kg</td>
                          <td><?php echo $cus_idleweight; ?>Kg</td>
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
                          <td><?php echo $cus_cond4; ?></td>
                          <td><?php echo $cus_cond5; ?></td>
                          <td><?php echo $cus_cond6; ?></td>
                          <td><?php echo $cus_cond7; ?></td>
                          <td><?php echo $cus_cond8; ?></td>
                          <td><?php echo $cus_prg; ?></td>
                          <td><?php echo $cus_prgtype; ?></td>
                          <td><?php echo $cus_nodays; ?></td>
                          <td><?php echo $cus_total; ?></td>
                          <td><?php echo $cus_paid; ?></td>
                          <td><?php echo $cus_remain; ?></td>
                        </tr>
                      </tbody>

                      <div class="modal fade" id="exampleModal_<?php echo $cus_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="border-radius:20px;">
                            <form action="" method="POST">
                              <input type="hidden" name="custid2" value="<?php echo $cus_id; ?>">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Payment History</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h3>Total Amount :<span style="font-weight: bold;"><?php echo $cus_total; ?></span></h3>
                                <div class="form-group" id="paymentFields">
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">1st Paid</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid" value="<?php echo $cus_paid0; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Payment Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate" value="<?php echo $cus_paid0date; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">2nd Paid</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid1" value="<?php echo $cus_paid1; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Payment Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate1" value="<?php echo $cus_paid0date1; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">3rd Paid</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid2" value="<?php echo $cus_paid2; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Payment Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate2" value="<?php echo $cus_paid0date2; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">4th Paid</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid3" value="<?php echo $cus_paid3; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Payment Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate3" value="<?php echo $cus_paid0date3; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">5th Paid</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid4" value="<?php echo $cus_paid4; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Payment Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate4" value="<?php echo $cus_paid0date4; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-2" id="addPaymentField">+</button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submitpay" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- Modal for BMI and BMR -->
                      <div class="modal fade" id="exampleModal2_<?php echo $cus_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="border-radius:20px;">
                            <form action="" method="POST">
                              <input type="hidden" name="custid2" value="<?php echo $cus_id; ?>">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">BMI & BMR History</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group" id="paymentFields">
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">1st BMI</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid" value="<?php echo $cus_bmi; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">1st BMR</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid" value="<?php echo $cus_bmr; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate" value="<?php echo $cus_doj; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">2nd BMI</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid1" value="<?php echo $cus_bmi; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">2nd BMR</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid1" value="<?php echo $cus_bmr; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate1" value="<?php echo $cus_paid0date1; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">3rd BMI</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid2" value="<?php echo $cus_bmi; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">3rd BMR</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid1" value="<?php echo $cus_bmr; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate2" value="<?php echo $cus_paid0date2; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">4th BMI</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid3" value="<?php echo $cus_bmi; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">4th BMR</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid1" value="<?php echo $cus_bmr; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate3" value="<?php echo $cus_paid0date3; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">5th BMI</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid4" value="<?php echo $cus_bmi; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">5th BMR</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control  cus-paid" style="border-radius: 16px;" name="cuspaid1" value="<?php echo $cus_bmr; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cuspaiddate4" value="<?php echo $cus_paid0date4; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-2" id="addPaymentField">+</button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submitpay" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </table>
                  <!-- PHP CODE FOR INSERTING THE DATA -->
                  <?php
                  if (isset($_POST["submitpay"])) {
                    $ppaid = $_POST["cuspaid"];
                    $ppaiddate = $_POST["cuspaiddate"];
                    $ppaid1 = $_POST["cuspaid1"];
                    $ppaiddate1 = $_POST["cuspaiddate1"];
                    $ppaid2 = $_POST["cuspaid2"];
                    $ppaiddate2 = $_POST["cuspaiddate2"];
                    $ppaid3 = $_POST["cuspaid3"];
                    $ppaiddate3 = $_POST["cuspaiddate3"];
                    $ppaid4 = $_POST["cuspaid4"];
                    $ppaiddate4 = $_POST["cuspaiddate4"];
                    $pri_id = $_POST["custid2"];
                    $pri_paidtotal = $ppaid + $ppaid1 + $ppaid2 + $ppaid3 + $ppaid4;

                    $cu_query = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = '$pri_id'");
                    $cu_row1 = mysqli_fetch_array($cu_query);

                    $pri_total = $cu_row1['cust_total'];

                    $pri_remain = $pri_total - $pri_paidtotal;
                    // Check if the record already exists
                    if (empty($pri_id)) {
                      // If no record exists, insert a new one
                      $sql = mysqli_query($conn, "INSERT INTO customer (cust_paid, cust_paiddate, cust_paid1, cust_paiddate1, cust_paid2, cust_paiddate2, cust_paid3, cust_paiddate3, cust_paid4, cust_paiddate4, cust_remain)
                                                                VALUES ('$ppaid','$ppaiddate','$ppaid1','$ppaiddate1','$ppaid2','$ppaiddate2','$ppaid3','$ppaiddate3','$ppaid4','$ppaiddate4','$pri_remain')");
                    } else {
                      // If a record exists, update it
                      $sql = mysqli_query($conn, "UPDATE customer SET cust_paid='$ppaid', cust_paiddate='$ppaiddate', cust_paid1='$ppaid1', cust_paiddate1='$ppaiddate1', cust_paid2='$ppaid2', cust_paiddate2='$ppaiddate2', cust_paid3='$ppaid3', cust_paiddate3='$ppaiddate3', cust_paid4='$ppaid4', cust_paiddate4='$ppaiddate4', cust_remain='$pri_remain' WHERE cust_id='$pri_id'");
                    }
                    if ($sql) {
                      echo "<script>alert('Operation completed successfully.');</script>";
                      echo "<script>window.location='admin-customer.php';</script>";
                    } else {
                      echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
                    }
                  }
                  ?>

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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var counter = 6; // Starting from 4th paid
      document.getElementById("addPaymentField").addEventListener("click", function() {
        var row = document.createElement("div");
        row.className = "row";

        var col1 = document.createElement("div");
        col1.className = "col-lg col-md col-sm-4 col-6";
        var label1 = document.createElement("label");
        label1.textContent = counter + "th Paid";
        var input1 = document.createElement("input");
        input1.type = "text";
        input1.className = "form-control cus-paid";
        input1.style.borderRadius = "16px";
        input1.name = "cuspaid" + counter;
        col1.appendChild(label1);
        col1.appendChild(input1);

        var col2 = document.createElement("div");
        col2.className = "col-lg col-md col-sm-4 col-6";
        var label2 = document.createElement("label");
        label2.textContent = "Payment Date";
        var input2 = document.createElement("input");
        input2.type = "date";
        input2.className = "form-control";
        input2.style.borderRadius = "16px";
        input2.name = "cuspaiddate" + counter;
        col2.appendChild(label2);
        col2.appendChild(input2);

        row.appendChild(col1);
        row.appendChild(col2);

        document.getElementById("paymentFields").appendChild(row);

        counter++;
      });
    });
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>