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
  <title>Admin Attendence</title>
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
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Attendence</h4>
                <p class="card-description">Customer Attendence Marking</p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>User Id</th>
                        <th>User Name</th>
                        <th>Customer Name</th>
                        <th>Program Name</th>
                        <th>Mark Attendence</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>username 1</td>
                        <td>Customer 1</td>
                        <td>Fat reducer</td>
                        <td><input type="checkbox"></td>
                      </tr>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>username 1</td>
                        <td>Customer 1</td>
                        <td>Fat reducer</td>
                        <td><input type="checkbox"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <button class="btn btn-primary">Submit Attendence</button>
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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>