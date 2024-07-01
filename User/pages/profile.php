<?php
include './connect.php';
error_reporting(0);
session_start();
if ($_SESSION["email"] == "") {
  header('location:login.php');
  exit();
}

// Fetch user details from the database
$email = $_SESSION["email"];
$query = "SELECT `cust_id`, `cust_code`, `cust_name`, `cust_phno`, `cust_invited`, `cust_age`, `cust_bodyage`, `cust_gender`, `cust_email`, `cust_password`, `cust_doj`, `cust_city`, `cust_address`, `cust_height`, `cust_weight`, `cust_idleweight`, `cust_fat`, `cust_vcf`, `cust_bmr`, `cust_bmi`, `cust_bmidate`, `cust_mm`, `cust_tsf`, `cust_waketime`, `cust_tea`, `cust_breakfast`, `cust_lunch`, `cust_snack`, `cust_dinner`, `cust_veg_nonveg`, `cust_waterintake`, `cust_cond1`, `cust_cond2`, `cust_cond3`, `cust_cond4`, `cust_cond5`, `cust_cond6`, `cust_cond7`, `cust_cond8`, `cust_prg`, `cust_prgtype`, `cust_noday`, `cust_total`, `cust_paid`, `cust_paiddate`, `cust_remain`, `cust_date` 
FROM `customer` 
WHERE `cust_email` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Fetch payment history for the logged-in user
$cust_id = $user['cust_id'];
$query_payments = "SELECT `pay_id`, `cust_id`, `cust_code`, `cust_name`, `cust_paid`, `cust_paiddate` FROM `pay_history` WHERE `cust_id` = ?";
$stmt_payments = $conn->prepare($query_payments);
$stmt_payments->bind_param("i", $cust_id);
$stmt_payments->execute();
$result_payments = $stmt_payments->get_result();
$payment_history = [];
while ($row = $result_payments->fetch_assoc()) {
  $payment_history[] = $row;
}
$stmt_payments->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutri-time Profile</title>
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

    body {
      background-color: rgb(248, 248, 248);
      font-family: "Outfit", sans-serif;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid bg-white shadow-sm">
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-2 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img src="../images/icon.png" class="icon1 me-2" width="90">
        </a>
        <ul class="nav">
          <li class="nav-item"><a href="./index2.php" class="nav-link text-dark">Home</a></li>
          <li class="nav-item"><a href="./program2.php" class="nav-link text-dark">Program</a></li>
          <li class="nav-item"><a href="./gallery2.php" class="nav-link text-dark">Gallery</a></li>
          <li class="nav-item"><a href="./product2.php" class="nav-link text-dark">Product</a></li>
          <li class="nav-item"><a href="./contact2.php" class="nav-link text-dark">Contact</a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-success border-bottom border-2 border-success" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person" width="24" height="24"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow rounded-4" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item text-success" href="./profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="./logout.php">Log out</a></li>
            </ul>
          </li>
        </ul>
      </header>
    </div>
  </div>
  <!-- navbar closed -->
  <!-- Program cards -->
  <div class="container-fluid px-5">
    <div class="row justify-content-between">
      <div class="col-lg col-md col-sm col-6 text-start h2 py-2 capitalize">Welcome <?php echo strtoupper(htmlspecialchars($user['cust_name'])); ?>,</div>
      <div class="col-lg col-md col-sm col-12 text-end h2 py-2">
        <button class="btn btn-light border border-1 rounded-5 px-4 p-2">Program : <?php echo htmlspecialchars($user['cust_prg']); ?></button>
        <button class="btn btn-primary border border-1 rounded-5 px-4 p-2"><?php echo htmlspecialchars($user['cust_noday']); ?> DAYS</button>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12 col-12 text-white">
        <div class="card rounded-5 mx-2 my-0 border-0 shadow">
          <img src="../images/profile.jpg" class="rounded-circle mx-auto py-3 d-block" alt="" width="100">
          <h4 class="text-center"><?php echo strtoupper(htmlspecialchars($user['cust_name'])); ?></h4>
          <h5 class="text-center"><?php echo htmlspecialchars($user['cust_code']); ?></h5>
        </div>
        <div class="card rounded-4 px-5 p-4 mx-2 my-4 border-0 shadow">
          <span class="py-1"><i class="bi bi-gender-ambiguous text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_gender']); ?></span></span>
          <span class="py-1"><i class="bi bi-calendar-week text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_age']); ?></span></span>
          <span class="py-1"><i class="bi bi-person-arms-up text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_height']); ?></span></span>
          <span class="py-1"><i class="bi bi-diagram-2 text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_weight']); ?></span></span>
          <span class="py-1"><i class="bi bi-telephone text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_phno']); ?></span></span>
          <span class="py-1"><i class="bi bi-envelope text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_email']); ?></span></span>
          <span class="py-1"><i class="bi bi-geo-alt text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_city']); ?></span></span>
          <span class="py-1"><i class="bi bi-map text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_address']); ?></span></span>
          <span class="py-1"><i class="bi bi-calendar2-week text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_doj']); ?></span></span>
          <span class="py-1"><i class="bi bi-person-check text-success" style="font-size: 1.5rem;"></i><span class="h5 mx-2"><?php echo htmlspecialchars($user['cust_invited']); ?></span></span>
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-12 col-12">
        <div class="row">
          <div class="col-lg col-md-6 col-sm col">
            <div class="card rounded-4 px-5 p-4 mx-3 my-4 border-0 shadow-sm"> .</div>
          </div>
          <div class="col-lg col-md-6 col-sm col">
            <div class="card rounded-4 px-5 p-4 mx-3 my-4 border-0 shadow-sm"> .</div>
          </div>
          <div class="col-lg col-md-12 col-sm col">
            <div class="card rounded-4 px-5 p-4 mx-3 my-4 border-0 shadow-sm"> .</div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg col-md col-sm col">
            <div class="card rounded-4 px-5 p-4 mx-3 my-4 border-0 shadow-sm"> .</div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg col-md col-sm col">
            <div class="card rounded-4 px-5 p-4 mx-3 my-4 border-0 shadow-sm">
              <div class="row">
                <div class="col-lg col-md col-sm col">Eating Habits</div>
                <div class="col-lg col-md col-sm col">Health Conditions</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md col-sm col">
        <div class="card rounded-4 px-5 p-4 mx-3 my-0 border-0 shadow">
          <h5>Payment Details</h5>
          <hr>
          <div class="row">
            <div class="col-6 text-start">Program :</div>
            <div class="col text-end"><span class="h5"><?php echo htmlspecialchars($user['cust_prg']); ?></span></div>
          </div>
          <div class="row">
            <div class="col-6 text-start">Program Type :</div>
            <div class="col text-end"><span class="h5"><?php echo htmlspecialchars($user['cust_prgtype']); ?></span></div>
          </div>
          <div class="row">
            <div class="col-6 text-start">No of Days :</div>
            <div class="col text-end"><span class="h5"><?php echo htmlspecialchars($user['cust_noday']); ?></span></div>
          </div>
          <div class="row">
            <div class="col-6 text-start">Total :</div>
            <div class="col text-end"><span class="h5"><?php echo htmlspecialchars($user['cust_total']); ?></span></div>
          </div>
          <div class="row">
            <div class="col-6 text-start">Amount Paid :</div>
            <div class="col text-end"><span class="h5"><?php echo htmlspecialchars($user['cust_paid']); ?></span></div>
          </div>
          <div class="row">
            <div class="col-6 text-start">Remaining Amount:</div>
            <div class="col text-end"><span class="h5"><?php echo htmlspecialchars($user['cust_remain']); ?></span></div>
          </div>
        </div>
        <div class="card rounded-4 px-5 p-4 mx-3 my-4 border-0 shadow">
          <h5>Payment History</h5>
          <div class="row mb-2">
            <div class="col-6 text-start">Date</div>
            <div class="col text-end">Amount</div>
          </div>
          <hr>
          <?php if (!empty($payment_history)) : ?>
            <?php foreach ($payment_history as $payment) : ?>
              <div class="row mb-2">
                <div class="col-6 text-start"><span class="h5"><span class="h5"><?php echo htmlspecialchars($payment['cust_paiddate']); ?></span></span></div>
                <div class="col text-end"><span class="h5"><?php echo htmlspecialchars($payment['cust_paid']); ?></div>
              </div>
              <hr>
            <?php endforeach; ?>
          <?php else : ?>
            <p class="text-center">No payment history available.</p>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>

  <!-- Program cards -->
  <!-- footer -->
  <footer class="d-flex container flex-wrap fixed-bottom justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <p>Powered by <a href="https://zionitedu.com/" class="text-decoration-none"><span class="text-danger fs-5">Zion</span> IT COMPANY</a></p>
    </div>
    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x" width="24" height="24"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" target="_blank" href="https://www.instagram.com/nutritimenutritionclub/"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
    </ul>
  </footer>
  <!-- Footer closed -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>