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
  <title>Admin Add-Product</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- including the sidebar,navbar -->
    <?php
    include './topbar.php';
    ?>
    <?php
    if (isset($_GET['prid'])) {
      $progid = $_GET['prid'];
      $pr_query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$progid'");
      $pr_row1 = mysqli_fetch_array($pr_query);

      $pro_name1 = $pr_row1['product_name'];
      $pro_img1 = $pr_row1['product_img'];
      $pro_desc1 = $pr_row1['product_desc'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['prd_id'])) {
      $dl_id = $_GET['prd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $img = '../images/product/' . $dl_row1['product_img'];
      $del = mysqli_query($conn, "DELETE FROM product WHERE product_id='$dl_id'");
      if ($del) {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-addproduct.php");
      } else {
        echo "Deletion Failed";
      }
    }
    ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <!-- Form -->
              <div class="card-body">
                <h1 class="card-title">Product</h1>
                <p class="card-description">Add Product Details</p>
                <form method="post" enctype="multipart/form-data" class="forms-sample">
                  <input type="hidden" name="prid" value="<?php echo $progid; ?>">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Program Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Weight Gainer" name="pname" value="<?php echo $pro_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Program Image</label>
                        <div class="input-group mb-3">
                          <input type="file" class="custom-file-input form-control file-upload-info" style="border-radius: 16px;" id="inputGroupFile01" name="pimg" onchange="displaySelectedFileName(this)" required>
                          <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                          <input type="hidden" style="border-radius: 16px;" name="current_primg" value="<?php echo $pro_img1; ?>">
                        </div>
                        <!-- Display existing image if available -->
                        <?php if ($pro_img1) : ?>
                          <div id="existingImage">
                            <img src="../images/product/<?php echo $pro_img1; ?>" alt="Product Image" style="width: 200px; height: auto; margin-top: 10px; border-radius: 16px;">
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="pdesc" rows="3"><?php echo isset($pro_desc1) ? $pro_desc1 : ''; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitpr">Submit</button>
                  <a href="./admin-addproduct.php" class="btn btn-light rounded-pill">Cancel</a>
                </form>
              </div>
              <!-- Form Closed -->
            </div>
          </div>
          <!-- PHP CODE FOR INSERTING THE DATA -->
          <?php
          if (isset($_POST["submitpr"])) {
            $pro_name = $_POST["pname"];
            $pro_desc = $_POST["pdesc"];
            $pro_img = $_FILES['pimg']['name'];
            // Image uploading formats
            $filename = $_FILES['pimg']['name'];
            $tempname = $_FILES['pimg']['tmp_name'];
            // Fetch the shake ID from the form
            $pro_id = $_POST["prid"];

            if ($pro_id == '') {
              $sql = mysqli_query($conn, "INSERT INTO product (product_name, product_img, product_desc) 
                         VALUES ('$pro_name','$pro_img','$pro_desc')");
            } else {
              if ($filename) {
                // Remove the existing image
                $imgs = '../images/product/' . $pr_img;
                if (file_exists($imgs)) {
                  unlink($imgs);
                }
                // Update shake with new image
                $sql = mysqli_query($conn, "UPDATE product SET product_name='$pro_name', product_img='$pro_img', product_desc='$pro_desc' WHERE product_id='$pro_id'");
              }
              $sql = mysqli_query($conn, "UPDATE product SET product_name='$pro_name', product_desc='$pro_desc'  WHERE product_id='$pro_id'");
            }
            if ($sql == TRUE) {
              move_uploaded_file($tempname, "../images/product/$filename");
              echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
            } else {
              echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
            }
          }
          ?>
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product</h4>
                <p class="card-description">Product Details</p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>sl-no</th>
                        <th>Product Name</th>
                        <th>Product images</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM product ORDER BY product_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $pro_id = $row['product_id'];
                      $pro_name = $row['product_name'];
                      $pro_img = $row['product_img'];
                      $pro_desc = $row['product_desc'];
                    ?>
                      <tbody>
                        <tr>
                          <td>
                            <a href="admin-addproduct.php?prid=<?php echo $pro_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit
                              <i class="ti-pencil-alt btn-icon-append"></i>
                            </a>
                          </td>
                          <td>
                            <a href="admin-addproduct.php?prd_id=<?php echo $pro_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete
                              <i class="ti-trash btn-icon-prepend"></i>
                            </a>
                          </td>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td><?php echo $pro_name; ?></td>
                          <td><img src="../images/product/<?php echo $pro_img; ?>" alt=""></td>
                          <td><?php echo $pro_desc; ?></td>
                        </tr>
                      </tbody>
                    <?php
                    }
                    ?>
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
  <!-- endinject -->
  <script>
    function displaySelectedFileName(input) {
      var fileName = input.files[0].name;
      var label = input.nextElementSibling;
      label.innerText = fileName;
      // Toggle visibility of existing image
      var existingImage = document.getElementById('existingImage');
      if (input.files.length > 0) {
        existingImage.style.display = 'none';
      } else {
        existingImage.style.display = 'block';
      }
      // Display selected image
      var fileReader = new FileReader();
      fileReader.onload = function(e) {
        var img = document.createElement("img");
        img.src = e.target.result;
        img.style.width = "350px"; // Set width
        img.style.height = "auto"; // Maintain aspect ratio
        img.style.borderRadius = "8px"; // Border radius
        img.style.marginTop = "50px"; // Optional margin
        label.parentNode.appendChild(img);
      };
      fileReader.readAsDataURL(input.files[0]);
    }
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>