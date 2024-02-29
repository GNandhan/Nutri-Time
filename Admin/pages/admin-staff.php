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
  <title>Admin Staff</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
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
                <div class="card-body">
                  <h4 class="card-title">Staff Details</h4>
                  <p class="card-description">
                    Add staff Details
                  </p>
                  <form class="forms-sample">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputName1">Staff Name</label>
                          <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                      </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email Id</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                          <select class="form-control" id="exampleSelectGender">
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleInputCity1">Phone No</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                    </div>
                  </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Staff Details</h4>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Staff Name</th>
                        <th>Username</th>
                        <th>Email Id</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Phone No</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="py-1">Staff 1</td>
                        <td>user12</td>
                        <td>email123@gmail.com</td>
                        <td>Password123</td>
                        <td>Male</td>
                        <td>Kozhikode</td>
                        <td>9988559966</td><td>
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
                        <td class="py-1">Staff 1</td>
                        <td>user12</td>
                        <td>email123@gmail.com</td>
                        <td>Password123</td>
                        <td>Male</td>
                        <td>Kozhikode</td>
                        <td>9988559966</td>
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
                        <td class="py-1">Staff 1</td>
                        <td>user12</td>
                        <td>email123@gmail.com</td>
                        <td>Password123</td>
                        <td>Male</td>
                        <td>Kozhikode</td>
                        <td>9988559966</td>
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
                        <td class="py-1">Staff 1</td>
                        <td>user12</td>
                        <td>email123@gmail.com</td>
                        <td>Password123</td>
                        <td>Male</td>
                        <td>Kozhikode</td>
                        <td>9988559966</td>
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
                        <td class="py-1">Staff 1</td>
                        <td>user12</td>
                        <td>email123@gmail.com</td>
                        <td>Password123</td>
                        <td>Male</td>
                        <td>Kozhikode</td>
                        <td>9988559966</td>
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
                        <td class="py-1">Staff 1</td>
                        <td>user12</td>
                        <td>email123@gmail.com</td>
                        <td>Password123</td>
                        <td>Male</td>
                        <td>Kozhikode</td>
                        <td>9988559966</td>
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
                        <td class="py-1">Staff 1</td>
                        <td>user12</td>
                        <td>email123@gmail.com</td>
                        <td>Password123</td>
                        <td>Male</td>
                        <td>Kozhikode</td>
                        <td>9988559966</td>
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
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>
</html>