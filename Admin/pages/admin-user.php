<?php
 include './connect.php';
//  error_reporting(0);
//  session_start();
//  if($_SESSION["email"]=="")
//  {
//     header('location:admin-login.php');
//  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin User</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
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
                <h4 class="card-title">Customer</h4>
                <p class="card-description">
                  Customer Details
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>User Id</th>
                        <th>Customer Image</th>
                        <th>Customer Name</th>
                        <th>Phno</th>
                        <th>Address</th>
                        <th>Blood Group</th>
                        <th>City</th>
                        <th>Program</th>
                        <th>Payment Method</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="py-1">#CUSA001</td>
                        <td><img src="../images/user.jpg" alt=""></td>
                        <td>Albert</td>
                        <td>9985968513</td>
                        <td>North-mavoor, kozhikode</td>
                        <td>B+</td>
                        <td>Vadakara</td>
                        <td>Fitness</td>
                        <td>GPay</td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="py-1">#CUSA002</td>
                        <td><img src="../images/user.jpg" alt=""></td>
                        <td>Alfred</td>
                        <td>9985968513</td>
                        <td>North-mavoor, kozhikode 2</td>
                        <td>B-</td>
                        <td>Mavoor</td>
                        <td>Fitness</td>
                        <td>GPay</td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="py-1">#CUSA003</td>
                        <td><img src="../images/user.jpg" alt=""></td>
                        <td>Mubasheer</td>
                        <td>9985968513</td>
                        <td>North-mavoor, kozhikode 3</td>
                        <td>A+</td>
                        <td>Kozhikode</td>
                        <td>Fitness</td>
                        <td>GPay</td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="py-1">#CUSA004</td>
                        <td><img src="../images/user.jpg" alt=""></td>
                        <td>Althaf</td>
                        <td>9985968513</td>
                        <td>North-mavoor, kozhikode 4</td>
                        <td>A-</td>
                        <td>Kozhikode</td>
                        <td>Fitness</td>
                        <td>GPay</td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="py-1">#CUSA005</td>
                        <td><img src="../images/user.jpg" alt=""></td>
                        <td>Muhammed zhabir</td>
                        <td>9985968513</td>
                        <td>North-mavoor, kozhikode 5</td>
                        <td>O+</td>
                        <td>Kozhikode</td>
                        <td>Fitness</td>
                        <td>GPay</td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="py-1">#CUSA006</td>
                        <td><img src="../images/user.jpg" alt=""></td>
                        <td>Mahesh</td>
                        <td>9985968513</td>
                        <td>North-mavoor, kozhikode 6</td>
                        <td>O-</td>
                        <td>Kozhikode</td>
                        <td>Fitness</td>
                        <td>GPay</td>
                        <td>
                          <button class="btn btn-inverse-danger btn-icon-text p-2">Delete 
                            <i class="ti-trash btn-icon-prepend"></i>
                          </button>
                        </td>
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
