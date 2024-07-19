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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Customer</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>

<body>
  <div class="container-scroller">
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
                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
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
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Customer Phno</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusphno" value="<?php echo $cus_phno1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label>Wellness coach</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusinvite" value="<?php echo $cus_invite1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-1 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusage" value="<?php echo $cus_age1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-1 col-md-4 col-sm-4 col-6">
                      <div class="form-group">
                        <label>Body Age</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusbodyage" value="<?php echo $cus_bodyage1; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <label for="cusgender">Gender</label>
                        <select class="form-control" style="border-radius: 16px;" id="cusgender" name="cusgender">
                          <option value="male" <?php if ($cus_gender1 == 'male') echo 'selected'; ?>>Male</option>
                          <option value="female" <?php if ($cus_gender1 == 'female') echo 'selected'; ?>>Female</option>
                          <option value="other" <?php if ($cus_gender1 == 'other') echo 'selected'; ?>>Other</option>
                        </select>
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
                    <div class="col-lg-2 col-md col-sm col-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscity" value="<?php echo $cus_city1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" style="border-radius: 16px;" name="cusaddress"><?php echo $cus_address1; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Evaluation Record</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Height</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusheight" value="<?php echo $cus_height1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Weight</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusweight" value="<?php echo $cus_weight1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Ideal Weight</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusidleweight" value="<?php echo $cus_idleweight1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>Fat %</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusfat" value="<?php echo $cus_fat1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>VCF</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusvcf" value="<?php echo $cus_vcf1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>BMR</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusbmr" value="<?php echo $cus_bmr1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-4">
                      <div class="form-group">
                        <label>BMI</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusbmi" value="<?php echo $cus_bmi1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>Muscle Mass</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusmm" value="<?php echo $cus_mm1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md-3 col-sm-3 col-6">
                      <div class="form-group">
                        <label>TCF</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="custcf" value="<?php echo $cus_tsf1; ?>">
                      </div>
                    </div>
                  </div>
                  <p class="card-description">Add Eating Habits</p>
                  <hr>
                  <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-6">
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
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Condition 1</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond1" value="<?php echo $cus_cond11; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Condition 2</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond2" value="<?php echo $cus_cond21; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 3</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond3" value="<?php echo $cus_cond31; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 4</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond4" value="<?php echo $cus_cond41; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 5</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond5" value="<?php echo $cus_cond51; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 6</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond6" value="<?php echo $cus_cond61; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-12">
                      <div class="form-group">
                        <label>Condition 7</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuscond7" value="<?php echo $cus_cond71; ?>">
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm-4 col-12">
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
                    <div class="col-lg-2 col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label for="cusprgtype">Program Type</label>
                        <select class="form-control" style="border-radius: 16px;" name="cusprgtype" id="cusprgtype">
                          <option selected>Select Type</option>
                          <option value="Online" <?php if ($cus_prgtype1 == "Online") echo "selected"; ?>>Online</option>
                          <option value="Offline" <?php if ($cus_prgtype1 == "Offline") echo "selected"; ?>>Offline</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>No of Days</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cusnoday" value="<?php echo $cus_nodays1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Total Amount</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="custotal" value="<?php echo $cus_total1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm-4 col-6">
                      <div class="form-group">
                        <label>Amount Paid</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="cuspaid" value="<?php echo $cus_paid1; ?>">
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm-4 col-6">
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
          // Collect form data
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
          $cheight = floatval($_POST["cusheight"]);
          $cweight = floatval($_POST["cusweight"]);
          $cidle = 100.0;
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
            $sql = mysqli_query($conn, "INSERT INTO customer (cust_code, cust_name, cust_phno, cust_invited, cust_age, cust_bodyage, cust_gender, cust_email, cust_doj, cust_city, cust_address, cust_height, cust_weight, cust_idleweight, cust_fat, cust_vcf, cust_bmr, cust_bmi, cust_mm, cust_tsf, cust_waketime, cust_tea, cust_breakfast, cust_lunch, cust_snack, cust_dinner, cust_veg_nonveg, cust_waterintake, cust_cond1, cust_cond2, cust_cond3, cust_cond4, cust_cond5, cust_cond6, cust_cond7, cust_cond8, cust_prg, cust_prgtype, cust_noday, cust_total, cust_remain, cust_date)
      VALUES ('$ccode','$cname','$cphno','$cinvite','$cage','$cbodyage','$cgender','$cemail','$cdoj','$ccity','$caddress','$cheight','$cweight','$cidleweight','$cfat','$cvcf','$cbmr','$cbmi','$cmm','$ctcf','$cwaketime','$ctea','$cbreakfast','$clunch','$csnack','$cdinner','$cveg','$cwaterintake','$ccond1','$ccond2','$ccond3','$ccond4','$ccond5','$ccond6','$ccond7','$ccond8','$cprogram','$cprgtype','$cnoday','$ctotal','$crem','$cdate')");

            // Insert into pay_history
            $pay_history_sql = mysqli_query($conn, "INSERT INTO pay_history (cust_id, cust_code, cust_name, cust_paid, cust_paiddate) VALUES (LAST_INSERT_ID(), '$ccode', '$cname', '$cpaid', '$cdate')");
          } else {
            // Update customer
            $sql = mysqli_query($conn, "UPDATE customer SET cust_code='$ccode', cust_name='$cname', cust_phno='$cphno', cust_invited='$cinvite', cust_age='$cage', cust_bodyage='$cbodyage', cust_gender='$cgender', cust_email='$cemail', cust_doj='$cdoj', cust_city='$ccity', cust_address='$caddress', cust_height='$cheight', cust_weight='$cweight', cust_idleweight='$cidleweight', cust_fat='$cfat', cust_vcf='$cvcf', cust_bmr='$cbmr', cust_bmi='$cbmi', cust_mm='$cmm', cust_tsf='$ctcf', cust_waketime='$cwaketime', cust_tea='$ctea', cust_breakfast='$cbreakfast', cust_lunch='$clunch', cust_snack='$csnack', cust_dinner='$cdinner', cust_veg_nonveg='$cveg', cust_waterintake='$cwaterintake', cust_cond1='$ccond1', cust_cond2='$ccond2', cust_cond3='$ccond3', cust_cond4='$ccond4', cust_cond5='$ccond5', cust_cond6='$ccond6', cust_cond7='$ccond7', cust_cond8='$ccond8', cust_prg='$cprogram', cust_prgtype='$cprgtype', cust_noday='$cnoday', cust_total='$ctotal', cust_paid='$cpaid', cust_remain='$crem', cust_date='$cdate' WHERE cust_id='$cus_id'");

            // Insert into pay_history
            $pay_history_sql = mysqli_query($conn, "INSERT INTO pay_history (cust_id, cust_code, cust_name, cust_paid, cust_paiddate) VALUES ('$cus_id', '$ccode', '$cname', '$cpaid', '$cdate')");
          }

          if ($sql == TRUE && $pay_history_sql == TRUE) {
            echo "<script type='text/javascript'>alert('Operation completed successfully.');</script>";
          } else {
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) . "');</script>";
          }
        }
        ?>

        <div class="row">
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
                        <th>Joining Date</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Idle Weight</th>
                        <th>Fat %</th>
                        <th>Muscle Mass</th>
                        <th>TSF</th>
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
                      $cus_idleweight = $row['cust_idleweight'];
                      $cus_fat = $row['cust_fat'];
                      $cus_vcf = $row['cust_vcf'];
                      $cus_mm = $row['cust_mm'];
                      $cus_tsf = $row['cust_tsf'];
                      $cus_prg = $row['cust_prg'];
                      $cus_prgtype = $row['cust_prgtype'];
                      $cus_nodays = $row['cust_noday'];
                      $cus_total = $row['cust_total'];
                      $cus_remain = $row['cust_remain'];
                      $cus_date = $row['cust_date'];
                      // Calculate the total amount paid by this customer
                      $payment_sql = mysqli_query($conn, "SELECT SUM(cust_paid) as total_paid FROM pay_history WHERE cust_id = '$cus_id'");
                      $payment_row = mysqli_fetch_assoc($payment_sql);
                      $cus_paid = $payment_row['total_paid'];
                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-customer.php?cusid=<?php echo $cus_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit <i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-customer.php?cusdid=<?php echo $cus_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2" onclick="return confirmDelete();">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
                          <td><a href="admin-customer.php?cusmdid=<?php echo $cus_id; ?>" class="btn btn-inverse-primary btn-icon-text p-3" data-toggle="modal" data-target="#exampleModal_<?php echo $cus_id; ?>">Add Payment</a></td>
                          <td><a href="admin-customer.php?cusmdid=<?php echo $cus_id; ?>" class="btn btn-inverse-primary btn-icon-text p-3" data-toggle="modal" data-target="#exampleModal2_<?php echo $cus_id; ?>">Body Parameters</a></td>
                          <!-- <td class="py-1"><?php echo $cus_code; ?></td> -->
                          <td class="py-1"><a href="admin-customerdetails.php?prid=<?php echo $cus_id; ?>" class="text-dark"><?php echo $cus_code; ?></a></td>
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
                          <td><?php echo $cus_height; ?>Cm</td>
                          <td><?php echo $cus_weight; ?>Kg</td>
                          <td><?php echo $cus_idleweight; ?>Kg</td>
                          <td><?php echo $cus_fat; ?></td>
                          <td><?php echo $cus_mm; ?></td>
                          <td><?php echo $cus_tsf; ?></td>
                          <td><?php echo $cus_prg; ?></td>
                          <td><?php echo $cus_prgtype; ?></td>
                          <td><?php echo $cus_nodays; ?></td>
                          <td><?php echo $cus_total; ?></td>
                          <td><?php echo !empty($cus_paid) ? $cus_paid : '0'; ?></td> <!-- Display 0 if $cus_paid is empty -->
                          <td><?php echo $cus_remain; ?></td>
                        </tr>
                      </tbody>
                      <div class="modal fade" id="exampleModal_<?php echo $cus_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="border-radius:20px;">
                            <form action="" method="POST">
                              <input type="hidden" name="custid2" value="<?php echo $cus_id; ?>">
                              <input type="hidden" name="cust_code" value="<?php echo $cus_code; ?>">
                              <input type="hidden" name="cust_name" value="<?php echo $cus_name; ?>">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Payment History</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h3>Total Amount :<span style="font-weight: bold;"><?php echo $cus_total; ?></span></h3>
                                <h3 class="py-2">Remaining Amount :<span style="font-weight: bold;"><?php echo $cus_remain; ?></span></h3>
                                <hr>
                                <div class="form-group" id="paymentFields">
                                  <?php
                                  // Retrieve payment history for the current customer
                                  $paymentSql = mysqli_query($conn, "SELECT * FROM pay_history WHERE cust_id = '$cus_id'");
                                  while ($paymentRow = mysqli_fetch_assoc($paymentSql)) {
                                    $pay_id = $paymentRow['pay_id'];
                                    $cust_paid = $paymentRow['cust_paid'];
                                    $cust_paiddate = $paymentRow['cust_paiddate'];
                                  ?>
                                    <div class="row">
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">Paid Amount</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control cus-paid" style="border-radius: 16px;" name="existing_cuspaid[]" value="<?php echo $cust_paid; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">Payment Date</label>
                                        <div class="form-group">
                                          <input type="date" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_paiddate; ?>" readonly>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>

                                  <!-- Input fields for new payment -->
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">New Paid Amount</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-paid" style="border-radius: 16px;" name="new_cuspaid">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">New Payment Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="new_cuspaiddate">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <button type="button" class="btn btn-primary mt-2" id="addPaymentField">+</button> -->
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
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content" style="border-radius:20px;">
                            <form action="" method="POST">
                              <input type="hidden" name="custid2" value="<?php echo $cus_id; ?>">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Body Parameters</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group" id="paymentFields">
                                  <?php
                                  // Retrieve payment history for the current customer
                                  $paymentSql = mysqli_query($conn, "SELECT * FROM bmr_history WHERE cust_id = '$cus_id'");
                                  while ($paymentRow = mysqli_fetch_assoc($paymentSql)) {
                                    $bmr_id = $paymentRow['bmr_id'];
                                    $cust_bmr = $paymentRow['cust_bmr'];
                                    $cust_bmi = $paymentRow['cust_bmi'];
                                    $cust_vcf = $paymentRow['cust_vcf'];
                                    $cust_tcf = $paymentRow['cust_tcf'];
                                    $cust_fat = $paymentRow['cust_fat'];
                                    $cust_bage = $paymentRow['cust_bage'];
                                    $cust_weight = $paymentRow['cust_weight'];
                                    $cust_mass = $paymentRow['cust_mass'];
                                    $cust_bmidate = $paymentRow['cust_bmidate'];
                                  ?>
                                    <div class="row">
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">BMR</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control cus-paid" style="border-radius: 16px;" name="existing_cuspaid[]" value="<?php echo $cust_bmr; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">BMI</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_bmi; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">VCF</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_vcf; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">TCF</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_tcf; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">Fat</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_fat; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">Body Age</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_bage; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">Weight</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_weight; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">Muscle Mass</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" style="border-radius: 16px;" name="existing_cuspaiddate[]" value="<?php echo $cust_mass; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg col-md col-sm-4 col-6">
                                        <label class="">Date</label>
                                        <div class="form-group">
                                          <input type="date" class="form-control" style="border-radius: 16px;" name="cusbmidate" value="<?php echo $cust_bmidate; ?>">
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  <div class="row">
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">BMR</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-bmi" style="border-radius: 16px;" name="cusbmi" value="<?php echo $cus_bmi; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">BMI</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-bmr" style="border-radius: 16px;" name="cusbmr" value="<?php echo $cus_bmr; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">VCF</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-vcf" style="border-radius: 16px;" name="cusvcf" value="<?php echo $cus_vcf; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">TCF</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-tcf" style="border-radius: 16px;" name="custcf" value="<?php echo $cus_tcf; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Fat</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-fat" style="border-radius: 16px;" name="cusfat" value="<?php echo $cus_fat; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Body Age</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-bage" style="border-radius: 16px;" name="cusbage" value="<?php echo $cus_bage; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Weight</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-weight" style="border-radius: 16px;" name="cusweight" value="<?php echo $cus_weight; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Muscle Mass</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control cus-mass" style="border-radius: 16px;" name="cusmass" value="<?php echo $cus_mass; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg col-md col-sm-4 col-6">
                                      <label class="">Date</label>
                                      <div class="form-group">
                                        <input type="date" class="form-control" style="border-radius: 16px;" name="cusbmidate" value="<?php echo $cus_bmidate; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submitbmi" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </table>
                  <!-- PHP CODE FOR INSERTING THE PAYMENT DATA -->
                  <?php
                  ob_start(); // Start output buffering
                  if (isset($_POST['submitpay'])) {
                    $cust_id = $_POST['custid2'];
                    $cust_code = $_POST['cust_code'];
                    $cust_name = $_POST['cust_name'];
                    $new_cuspaid = $_POST['new_cuspaid'];
                    $new_cuspaiddate = $_POST['new_cuspaiddate'];

                    // Insert new payment record into pay_history table
                    if (!empty($new_cuspaid) && !empty($new_cuspaiddate)) {
                      $insertPaymentSql = "INSERT INTO pay_history (cust_id, cust_code, cust_name, cust_paid, cust_paiddate) VALUES ('$cust_id', '$cust_code', '$cust_name', '$new_cuspaid', '$new_cuspaiddate')";
                      if (mysqli_query($conn, $insertPaymentSql)) {
                        echo "<script>alert('New payment added successfully.');</script>";
                      } else {
                        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
                      }
                    }

                    // Optionally, update the remaining amount in the customer table
                    $updateCustomerSql = "UPDATE customer SET cust_remain = cust_remain - '$new_cuspaid' WHERE cust_id = '$cust_id'";
                    if (mysqli_query($conn, $updateCustomerSql)) {
                      echo "<script>alert('Remaining amount updated successfully.');</script>";
                    } else {
                      echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
                    }

                    // Redirect to avoid form resubmission
                    header("Location: admin-customer.php");
                    ob_end_flush(); // End output buffering and flush the buffer
                    exit(); // Ensure no further code is executed after the redirect
                  }
                  ?>
                  <!-- PHP CODE FOR INSERTING THE PAYMENT DATA -->
                  <?php
                  if (isset($_POST["submitbmi"])) {
                    $cbmr = $_POST["cusbmr"];
                    $cbmi = $_POST["cusbmi"];
                    $cvcf = $_POST["cusvcf"];
                    $ctcf = $_POST["custcf"];
                    $cfat = $_POST["cusfat"];
                    $cbage = $_POST["cusbage"];
                    $cweight = $_POST["cusweight"];
                    $cmass = $_POST["cusmass"];
                    $cbmidate = $_POST["cusbmidate"];
                    $pri_id = $_POST["custid2"];

                    $insertBMRSql = "INSERT INTO bmr_history (cust_id, cust_code, cust_name, cust_bmr, cust_bmi, cust_vcf, cust_tcf, cust_fat, cust_bage, cust_weight, cust_mass, cust_bmidate) 
                    VALUES ('$pri_id', '$cust_code', '$cus_name', '$cbmr', '$cbmi', '$cvcf', '$ctcf', '$cfat', '$cbage', '$cweight', '$cmass', '$cbmidate')";

                    if (mysqli_query($conn, $insertBMRSql)) {
                      echo "<script>alert('Body parameters history added successfully.');</script>";
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
        </div>
      </div>
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All rights reserved.</span>
        </div>
      </footer>
    </div>
  </div>
  </div>
  <script>
    function confirmDelete() {
      return confirm('Are you sure you want to delete this Customer?');
    }
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>