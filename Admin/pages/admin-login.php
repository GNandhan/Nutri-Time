<?php
include './connect.php';
error_reporting(0);
session_start();
$_SESSION["email"] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nutri-Time: Admin-Login</title>
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="icon" href="../images/icon-small.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class=" auth-form-light text-left py-5 px-4 px-sm-5 shadow-lg" style="border-radius: 15px;">
              <div class="brand-logo justify-content-center align-items-center text-center">
                <img src="../images/icon.png" alt="logo" width="100%">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form method="post" class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" style="border-radius:15px;" placeholder="Email id" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" style="border-radius:15px;" placeholder="Password" name="pass">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submitl">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST["submitl"])) {
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $sql = "SELECT * FROM admin WHERE admin_mail='$email' AND admin_pass='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // Successful login
      $loginTime = date("Y-m-d H:i:s");
      $insertQuery = "INSERT INTO login_details (admin_username, login_time) VALUES ('$email', '$loginTime')";
      mysqli_query($conn, $insertQuery);

      $_SESSION["email"] = $email;
      $_SESSION["pass"] = $password;

      echo '<script type="text/javascript">window.location = "admin-dashboard.php"</script>';
    } else {
      echo "<script type='text/javascript'>alert('Error: Invalid credentials');</script>";
    }
  }
  ?>
  <script src="../js/template.js"></script>
</body>

</html>