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
  <title>Admin Gallery</title>
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
                  <h4 class="card-title">Gallery</h4>
                  <p class="card-description">Add Gallery Image</p>
                  <form class="forms-sample">
                  <div class="form-group">
                      <label for="exampleTextarea1">Img Description</label>
                      <textarea class="form-control" style="border-radius: 15px;" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Add Images</label>
                      <div class="input-group mb-3">
                            <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="shimg" onchange="displaySelectedFileName(this)"  value="<?php echo $sh_img1; ?>" required>
                            <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                            <input type="hidden" name="current_shimg" value="<?php echo $sh_img1; ?>">
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submitg">Upload</button>
                    <a href="./admin-gallery.php" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
<div class="row row-cols-1 row-cols-md-3">
<div class="col mb-4">
    <div class="card shadow h-100 d-flex flex-column">
        <img src="../images/shake2.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px" alt="...">
        <div class="card-body flex-fill">
            <p class="card-text">This is a longer card with supporting  This content is a little bit longer.</p>
        </div>
        <div class="mt-auto card-footer"> <!-- 'mt-auto' will push the button to the bottom -->
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
    </div>
</div>

<div class="col mb-4">
    <div class="card shadow h-100 d-flex flex-column">
        <img src="../images/shake2.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px" alt="...">
        <div class="card-body flex-fill">
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="mt-auto card-footer"> <!-- 'mt-auto' will push the button to the bottom -->
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
    </div>
</div>

<div class="col mb-4">
    <div class="card shadow h-100 d-flex flex-column">
        <img src="../images/shake2.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px" alt="...">
        <div class="card-body flex-fill">
            <p class="card-text">This is ale bit longer.</p>
        </div>
        <div class="mt-auto card-footer"> <!-- 'mt-auto' will push the button to the bottom -->
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
    </div>
</div>

<div class="col mb-4">
    <div class="card shadow h-100 d-flex flex-column">
        <img src="../images/shake2.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px" alt="...">
        <div class="card-body flex-fill">
            <p class="card-text">This is  This content is a little bit longer.</p>
        </div>
        <div class="mt-auto card-footer"> <!-- 'mt-auto' will push the button to the bottom -->
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
    </div>
</div>

</div>
                    </div>
                </div>
            </div>
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