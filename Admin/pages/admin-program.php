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
  <title>Admin Program</title>
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
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <!-- Form -->
                <div class="card-body">
                  <h1 class="card-title">Program</h1>
                  <p class="card-description">
                    Add Program Details
                  </p>
                  <form class="forms-sample">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Program Name</label>
                          <input type="text" class="form-control"  placeholder="Weight Gainer">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Purpose</label>
                          <input type="text" class="form-control"  placeholder="Weight Gainer">
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Duration</label>
                            <select class="form-control">
                              <option>10 Days</option>
                              <option>20 Days</option>
                              <option>25 Days</option>
                            </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Age limit</label>
                            <select class="form-control">
                              <option>20-30</option>
                              <option>30-50</option>
                            </select>
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Fee (per/month)</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Program Condition</label>
                          <input type="text" class="form-control">
                        </div> 
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Program Mode</label>
                            <select class="form-control">
                              <option>Online</option>
                              <option>Offline</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
                <!-- Form Closed -->
              </div>
            </div>
              <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Shakes</h4>
                <p class="card-description">
                 Shake Details
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>sl-no</th>
                        <th>Program Name</th>
                        <th>Purpose</th>
                        <th>Duration</th>
                        <th>Age Limit</th>
                        <th>Fee</th>
                        <th>Program Conditions</th>
                        <th>Program Mode</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>Program 1</td>
                        <td>Fat reducing</td>
                        <td>10 Days</td>
                        <td>15-50</td>
                        <td>1000</td>
                        <td>Condition 1</td>
                        <td>Online</td>
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
                      </tr>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>Program 1</td>
                        <td>Fat reducing</td>
                        <td>10 Days</td>
                        <td>15-50</td>
                        <td>1000</td>
                        <td>Condition 1</td>
                        <td>Online</td>
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
                      </tr>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>Program 1</td>
                        <td>Fat reducing</td>
                        <td>10 Days</td>
                        <td>15-50</td>
                        <td>1000</td>
                        <td>Condition 1</td>
                        <td>Online</td>
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
                      </tr>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>Program 1</td>
                        <td>Fat reducing</td>
                        <td>10 Days</td>
                        <td>15-50</td>
                        <td>1000</td>
                        <td>Condition 1</td>
                        <td>Online</td>
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
                      </tr>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>Program 1</td>
                        <td>Fat reducing</td>
                        <td>10 Days</td>
                        <td>15-50</td>
                        <td>1000</td>
                        <td>Condition 1</td>
                        <td>Online</td>
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
                      </tr>
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>Program 1</td>
                        <td>Fat reducing</td>
                        <td>10 Days</td>
                        <td>15-50</td>
                        <td>1000</td>
                        <td>Condition 1</td>
                        <td>Online</td>
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
</body>

</html>
