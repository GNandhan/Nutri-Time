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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Customer Details</title>
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
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <?php
                if (isset($_GET['prid'])) {
                    $progid = intval($_GET['prid']); // Ensure it's an integer
                    $cus_query = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = $progid");

                    if ($cus_query && mysqli_num_rows($cus_query) > 0) {
                        $c_row = mysqli_fetch_array($cus_query);

                        $cus_id = $c_row['cust_id'];
                        $cus_code = $c_row['cust_code'];
                        $cus_name = $c_row['cust_name'];
                        $cus_phno = $c_row['cust_phno'];
                        $cus_invite = $c_row['cust_invited'];
                        $cus_age = $c_row['cust_age'];
                        $cus_bodyage = $c_row['cust_bodyage'];
                        $cus_gender = $c_row['cust_gender'];
                        $cus_mail = $c_row['cust_email'];
                        $cus_pass = $c_row['cust_password'];
                        $cus_doj = $c_row['cust_doj'];
                        $cus_city = $c_row['cust_city'];
                        $cus_address = $c_row['cust_address'];
                        $cus_height = $c_row['cust_height'];
                        $cus_weight = $c_row['cust_weight'];
                        $cus_idleweight = $c_row['cust_idleweight'];
                        $cus_fat = $c_row['cust_fat'];
                        $cus_vcf = $c_row['cust_vcf'];
                        $cus_bmr = $c_row['cust_bmr'];
                        $cus_bmi = $c_row['cust_bmi'];
                        $cus_mm = $c_row['cust_mm'];
                        $cus_tsf = $c_row['cust_tsf'];
                        $cus_wake = $c_row['cust_waketime'];
                        $cus_tea = $c_row['cust_tea'];
                        $cus_break = $c_row['cust_breakfast'];
                        $cus_lunch = $c_row['cust_lunch'];
                        $cus_snack = $c_row['cust_snack'];
                        $cus_dinner = $c_row['cust_dinner'];
                        $cus_veg = $c_row['cust_veg_nonveg'];
                        $cus_water = $c_row['cust_waterintake'];
                        $cus_cond1 = $c_row['cust_cond1'];
                        $cus_cond2 = $c_row['cust_cond2'];
                        $cus_cond3 = $c_row['cust_cond3'];
                        $cus_cond4 = $c_row['cust_cond4'];
                        $cus_cond5 = $c_row['cust_cond5'];
                        $cus_cond6 = $c_row['cust_cond6'];
                        $cus_cond7 = $c_row['cust_cond7'];
                        $cus_cond8 = $c_row['cust_cond8'];
                        $cus_prg = $c_row['cust_prg'];
                        $cus_prgtype = $c_row['cust_prgtype'];
                        $cus_nodays = $c_row['cust_noday'];
                        $cus_total = $c_row['cust_total'];
                        $cus_paid = intval($c_row['cust_paid']);
                        $cus_paiddate = $c_row['cust_paiddate'];
                        $cus_paid1 = intval($c_row['cust_paid1']);
                        $cus_paiddate1 = $c_row['cust_paiddate1'];
                        $cus_paid2 = intval($c_row['cust_paid2']);
                        $cus_paiddate2 = $c_row['cust_paiddate2'];
                        $cus_paid3 = intval($c_row['cust_paid3']);
                        $cus_paiddate3 = $c_row['cust_paiddate3'];
                        $cus_paid4 = intval($c_row['cust_paid4']);
                        $cus_paiddate4 = $c_row['cust_paiddate4'];
                        $cus_paid5 = intval($c_row['cust_paid5']);
                        $cus_paiddate5 = $c_row['cust_paiddate5'];
                        $cus_remain = $c_row['cust_remain'];
                        $cus_date = $c_row['cust_date'];
                        $cus_paidtotal = $cus_total - $cus_remain;
                        // Fetch payment history
                        $pay_history_query = mysqli_query($conn, "SELECT `pay_id`, `cust_id`, `cust_code`, `cust_name`, `cust_paid`, `cust_paiddate` FROM `pay_history` WHERE `cust_id` = $progid");

                        if ($pay_history_query && mysqli_num_rows($pay_history_query) > 0) {
                            $payment_history = [];
                            while ($pay_row = mysqli_fetch_assoc($pay_history_query)) {
                                $payment_history[] = $pay_row;
                            }
                        } else {
                            $payment_history = [];
                        }
                        // Fetch BMI and BMR history
                        $bmr_history_query = mysqli_query($conn, "SELECT `bmr_id`, `cust_id`, `cust_code`, `cust_name`, `cust_bmr`, `cust_bmi`, `cust_vcf`, `cust_tcf`, `cust_fat`, `cust_bage`, `cust_weight`, `cust_mass`, `cust_bmidate` FROM `bmr_history` WHERE `cust_id` = $progid");

                        if ($bmr_history_query && mysqli_num_rows($bmr_history_query) > 0) {
                            $bmr_history = [];
                            while ($bmr_row = mysqli_fetch_assoc($bmr_history_query)) {
                                $bmr_history[] = $bmr_row;
                            }
                        } else {
                            $bmr_history = [];
                        }
                    } else {
                        echo "<div class='alert alert-danger'>No customer found with the given ID.</div>";
                    }
                ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card my-3">
                                <div class="card-body">
                                    <h1 class="card-title" style="font-size:30px;"><?php echo $cus_name; ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md col-sm col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">Basic Details</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg col-md col-sm col">
                                            <ul>
                                                <li class="card-description">Code : <span style="font-weight:bold; color:black;"><?php echo $cus_code; ?></span></li>
                                                <li class="card-description">Invited by : <span style="font-weight:bold; color:black;"><?php echo $cus_invite; ?></span></li>
                                                <li class="card-description">Phno : <span style="font-weight:bold; color:black;"><?php echo $cus_phno; ?></span></li>
                                                <li class="card-description">Age : <span style="font-weight:bold; color:black;"><?php echo $cus_age; ?></span></li>
                                                <li class="card-description">Body Age : <span style="font-weight:bold; color:black;"><?php echo $cus_bodyage; ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg col-md col-sm col">
                                            <ul>
                                                <li class="card-description">Gender : <span style="font-weight:bold; color:black;"><?php echo $cus_gender; ?></span></li>
                                                <li class="card-description">Date of Joining : <span style="font-weight:bold; color:black;"><?php echo $cus_doj; ?></span></li>
                                                <li class="card-description">Email id : <span style="font-weight:bold; color:black;"><?php echo $cus_mail; ?></span></li>
                                                <li class="card-description">City : <span style="font-weight:bold; color:black;"><?php echo $cus_city; ?></span></li>
                                                <li class="card-description">Address : <span style="font-weight:bold; color:black;"><?php echo $cus_address; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md col-sm col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">Evaluation Records</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg col-md col-sm col">
                                            <ul>
                                                <li class="card-description">Height : <span style="font-weight:bold; color:black;"><?php echo $cus_height; ?></span></li>
                                                <li class="card-description">Weight : <span style="font-weight:bold; color:black;"><?php echo $cus_weight; ?></span></li>
                                                <li class="card-description">Idle Weight : <span style="font-weight:bold; color:black;"><?php echo $cus_idleweight; ?></span></li>
                                                <li class="card-description">Fat : <span style="font-weight:bold; color:black;"><?php echo $cus_fat; ?></span></li>
                                                <li class="card-description">VCF : <span style="font-weight:bold; color:black;"><?php echo $cus_vcf; ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg col-md col-sm col">
                                            <ul>
                                                <li class="card-description">BMR : <span style="font-weight:bold; color:black;"><?php echo $cus_bmr; ?></span></li>
                                                <li class="card-description">BMI : <span style="font-weight:bold; color:black;"><?php echo $cus_bmi; ?></span></li>
                                                <li class="card-description">Muscle Mass : <span style="font-weight:bold; color:black;"><?php echo $cus_mm; ?></span></li>
                                                <li class="card-description">TSF : <span style="font-weight:bold; color:black;"><?php echo $cus_tsf; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md col-sm col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">Eating Habits</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg col-md col-sm col">
                                            <ul>
                                                <li class="card-description">Wakeup Time : <span style="font-weight:bolder; color:black;"><?php echo $cus_wake; ?></span></li>
                                                <li class="card-description">Tea / Coffee : <span style="font-weight:bolder; color:black;"><?php echo $cus_tea; ?></span></li>
                                                <li class="card-description">Breakfast : <span style="font-weight:bolder; color:black;"><?php echo $cus_break; ?></span></li>
                                                <li class="card-description">Lunch : <span style="font-weight:bolder; color:black;"><?php echo $cus_lunch; ?></span></li>
                                                <li class="card-description">Snacks : <span style="font-weight:bolder; color:black;"><?php echo $cus_snack; ?></span></li>
                                                <li class="card-description">Dinner : <span style="font-weight:bolder; color:black;"><?php echo $cus_dinner; ?></span></li>
                                                <li class="card-description">Veg/ Non Veg : <span style="font-weight:bolder; color:black;"><?php echo $cus_veg; ?></span></li>
                                                <li class="card-description">Water Intake : <span style="font-weight:bolder; color:black;"><?php echo $cus_water; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md col-sm col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">Health Conditions</p>
                                    <hr>
                                    <ul>
                                        <li class="card-description">Condition 1 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond1; ?></span></li>
                                        <li class="card-description">Condition 2 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond2; ?></span></li>
                                        <li class="card-description">Condition 3 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond3; ?></span></li>
                                        <li class="card-description">Condition 4 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond4; ?></span></li>
                                        <li class="card-description">Condition 5 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond5; ?></span></li>
                                        <li class="card-description">Condition 6 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond6; ?></span></li>
                                        <li class="card-description">Condition 7 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond7; ?></span></li>
                                        <li class="card-description">Condition 8 : <span style="font-weight:bolder; color:black;"><?php echo $cus_cond8; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md col-sm col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">Program Details</p>
                                    <hr>
                                    <ul>
                                        <li class="card-description"> Program : <span style="font-weight:bolder; color:black;"><?php echo $cus_prg; ?></span></li>
                                        <li class="card-description"> Program Type: <span style="font-weight:bolder; color:black;"><?php echo $cus_prgtype; ?></span></li>
                                        <li class="card-description"> No of Days: <span style="font-weight:bolder; color:black;"><?php echo $cus_nodays; ?></span></li>
                                        <li class="card-description"> Total Amount: <span style="font-weight:bolder; color:black;"><?php echo $cus_total; ?></span></li>
                                        <li class="card-description"> Amount paid: <span style="font-weight:bolder; color:black;"><?php echo $cus_paidtotal; ?></span></li>
                                        <li class="card-description"> Balance Amount: <span style="font-weight:bolder; color:black;"><?php echo $cus_remain; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md col-sm col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">Payment History</p>
                                    <hr>
                                    <ul>
                                        <?php
                                        $payment_counter = 1; // Initialize counter
                                        foreach ($payment_history as $payment) { ?>
                                            <li class="card-description">
                                                <?php echo $payment_counter; ?>th Payment :
                                                <span style="font-weight:bolder; color:black;">
                                                    <?php echo $payment['cust_paid']; ?> (<?php echo $payment['cust_paiddate']; ?>)
                                                </span>
                                            </li>
                                        <?php
                                            $payment_counter++; // Increment counter
                                        } ?>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md col-sm col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">Body Parameters</p>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>BMI</th>
                                                    <th>BMR</th>
                                                    <th>VCF</th>
                                                    <th>TCF</th>
                                                    <th>FAT</th>
                                                    <th>Body Age</th>
                                                    <th>Weight</th>
                                                    <th>Mass</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $serial_number = 1; // Initialize serial number
                                                foreach ($bmr_history as $bmr_item) { ?>
                                                    <tr>
                                                        <td><?php echo $serial_number; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_bmi']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_bmr']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_vcf']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_tcf']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_fat']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_bage']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_weight']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_mass']; ?></td>
                                                        <td class="border-right" style="font-weight:bolder; color:black;"><?php echo $bmr_item['cust_bmidate']; ?></td>
                                                    </tr>
                                                <?php
                                                    $serial_number++; // Increment serial number
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
                } else {
                    echo "<div class='alert alert-danger'>Customer ID is not set in the URL.</div>";
                }
                ?>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All rights reserved.</span>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/template.js"></script>
</body>

</html>