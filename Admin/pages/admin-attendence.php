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
  <title>Admin Attendence</title>
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
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <!-- table view -->
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
