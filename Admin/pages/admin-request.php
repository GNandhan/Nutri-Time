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
  <title>Admin Request</title>
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
                <h4 class="card-title">Request</h4>
                <p class="card-description">Customer request Details</p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>User Id</th>
                        <th>User Name</th>
                        <th>Customer Name</th>
                        <th>Program Name</th>
                        <th>Program Status</th>
                        <th>Payment Status </th>
                        <th>Duration</th>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                        <th>Total Amount</th>
                        <th>Amount Paid</th>
                        <th>Remaining Amount</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <button class="btn btn-inverse-secondary btn-icon-text p-2">Edit
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
                        <td class="py-1">#00A001</td>
                        <td>username 1</td>
                        <td>Customer 1</td>
                        <td>Fat reducer</td>
                        <td>Processing</td>
                        <td>Completed</td>
                        <td>20 Days</td>
                        <td>10/01/2024</td>
                        <td>30/01/2024</td>
                        <td>10,000</td>
                        <td>10,000</td>
                        <td>0</td>

                      </tr>
                    </tbody>
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