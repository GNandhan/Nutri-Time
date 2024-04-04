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
  <title>Admin Shake</title>
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
    <?php
    if (isset($_GET['sid'])) {
      $sh_id = $_GET['sid'];
      $s_query = mysqli_query($conn, "SELECT * FROM shake WHERE shake_id = '$sh_id'");
      $s_row1 = mysqli_fetch_array($s_query);

      $sh_name1 = $s_row1['shake_name'];
      $sh_goal1 = $s_row1['shake_goal'];
      $sh_reci1 = $s_row1['shake_recipes'];
      $sh_raw1 = $s_row1['shake_raw'];
      $sh_mcost1 = $s_row1['shake_mcost'];
      $sh_scost1 = $s_row1['shake_scost'];
      $sh_gst1 = $s_row1['shake_gst'];
      $sh_disc1 = $s_row1['shake_desc'];
      $sh_bene1 = $s_row1['shake_benefit'];
      $sh_img1 = $s_row1['shake_img'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['sd_id'])) {
      $dl_id = $_GET['sd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM shake WHERE shake_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $img = '../images/shake/' . $dl_row1['shake_img'];
      $del = mysqli_query($conn, "DELETE FROM shake WHERE shake_id='$dl_id'");
      if ($del) {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-shake.php");
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
                <h1 class="card-title">Shakes</h1>
                <p class="card-description">Add Shakes Details</p>
                <form method="post" enctype="multipart/form-data" class="forms-sample">
                  <input type="hidden" name="shid" value="<?php echo $sh_id; ?>">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <select class="form-control" name="shname">
                          <option selected>Select Customers</option>
                          <?php
                          $query = mysqli_query($conn, "SELECT * FROM customer");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $cus_id = $row["customer_id "];
                            $cus_fname = $row["customer_fname"];
                            $cus_lname = $row["customer_lname"];
                            $fullname = $cus_fname . ' ' . $cus_lname;
                          ?>
                            <option value="<?php echo $fullname; ?>" <?php if ($row['customer_fname'] == $sh_raw1) ?>><?php echo $fullname; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Shake Name</label>
                        <input type="text" class="form-control" placeholder="#00A001" name="shname" value="<?php echo $sh_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Shake Goal</label>
                        <input type="text" class="form-control" placeholder="Weight Gainer" name="shgoal" value="<?php echo $sh_goal1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Shake Recipe</label><br>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM material");
                        while ($row = mysqli_fetch_assoc($query)) {
                          $pro_id = $row["pro_id"];
                          $pro_name = $row["pro_name"];
                          $pro_mrp = $row["pro_mrp"];
                        ?>
                          <div class="form-check ml-4">
                            <input class="form-check-input" type="checkbox" name="shraw[]" value="<?php echo $pro_name; ?>" <?php if (in_array($pro_name, explode(",", $sh_raw1))) echo "checked"; ?>>
                            <label class="form-check-label"><?php echo $pro_name; ?></label>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Ingredient Prices (MRP)</label><br>
                        <ul>
                          <?php
                          $query = mysqli_query($conn, "SELECT * FROM material");
                          while ($row = mysqli_fetch_assoc($query)) {
                            // $pro_name = $row["pro_name"];
                            $pro_price = $row["pro_price"]; // Fetch raw material price
                          ?>
                            <li class="mb-2"><?php echo $pro_price; ?></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        No of Scoops
                        <ul>
                          <?php
                          $query = mysqli_query($conn, "SELECT * FROM material");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $pro_name = $row["pro_name"];
                            $pro_price = $row["pro_price"];
                          ?>
                            <li>
                              <div class="form-group mb-2">
                                <!-- <label><?php echo $pro_name; ?> Scoops</label> -->
                                <input type="number" class="form-control" style="height: 8px; width: aut0;" name="<?php echo $pro_name; ?>_scoops" value="<?php echo isset($scoops[$pro_name]) ? $scoops[$pro_name] : ''; ?>" required>
                              </div>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>Extra Incredients</label>
                        <input type="text" class="form-control" name="shbene" value="<?php echo $sh_bene1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Discount %</label>
                        <select class="form-control" name="shscost" required>
                          <option selected>Select Discount Percentage</option>
                          <option value="15" <?php if ($sh_scost1 == 15) echo "selected"; ?>>15%</option>
                          <option value="25" <?php if ($sh_scost1 == 25) echo "selected"; ?>>25%</option>
                          <option value="35" <?php if ($sh_scost1 == 35) echo "selected"; ?>>35%</option>
                          <option value="42" <?php if ($sh_scost1 == 42) echo "selected"; ?>>42%</option>
                          <option value="50" <?php if ($sh_scost1 == 50) echo "selected"; ?>>50%</option>
                        </select>
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>Service Charge</label>
                        <input type="text" class="form-control" name="shbene" value="<?php echo $sh_bene1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submitsh">Submit</button>
                  <a href="./admin-shake.php" class="btn btn-light">Cancel</a>
                </form>
              </div>
              <!-- Form Closed -->
            </div>
          </div>
          <!-- PHP CODE FOR INSERTING THE DATA -->
          <?php
          if (isset($_POST["submitsh"])) {
            $sh_id = $_POST["shid"];
            $sh_name = $_POST["shname"];
            $sh_goal = $_POST["shgoal"];
            $sh_reci = $_POST["shrecipe"];
            $sh_raw = $_POST["shraw"];
            $sh_mcost = $_POST["shmcost"];
            $sh_gst = $_POST["shgst"];
            $sh_disc = $_POST["shdis"];
            $sh_bene = $_POST["shbene"];
            $sh_img = $_FILES['shimg']['name'];

            // Calculate selling price
            $price = $sh_mcost * ($sh_gst / 100);
            $selling_price = $sh_mcost + $price;


            // Image uploading formats
            $filename = $_FILES['shimg']['name'];
            $tempname = $_FILES['shimg']['tmp_name'];

            // Fetch the shake ID from the form
            $sh_id = $_POST["shid"];

            if ($sh_id == '') {
              $sql = mysqli_query($conn, "INSERT INTO shake (shake_name, shake_goal, shake_recipes, shake_raw, shake_mcost, shake_scost, shake_desc, shake_benefit, shake_gst, shake_img)
                                        VALUES ('$sh_name','$sh_goal','$sh_reci','$sh_raw','$sh_mcost','$selling_price','$sh_disc','$sh_bene','$sh_gst','$sh_img')");
            } else {
              // Update existing material
              if ($filename) {
                // Remove the existing image
                $imgs = '../images/shake/' . $sh_img;
                unlink($imgs);
                // Update shake with new image
                $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_raw='$sh_raw', shake_mcost='$sh_mcost', shake_scost='$selling_price', shake_desc='$sh_disc', shake_benefit='$sh_bene', shake_gst='$sh_gst', shake_img='$sh_img' WHERE shake_id='$sh_id'");
              } else {
                // Update shake without changing the image
                $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_raw='$sh_raw', shake_mcost='$sh_mcost', shake_scost='$selling_price', shake_desc='$sh_disc', shake_benefit='$sh_bene', shake_gst='$sh_gst' WHERE shake_id='$sh_id'");
              }
            }
            if ($sql == TRUE) {
              move_uploaded_file($tempname, "../images/shake/$filename");
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
                <h4 class="card-title">Shakes</h4>
                <p class="card-description">Shake Details</p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Sl-no</th>
                        <th>Customer Name</th>
                        <th>Shake Name</th>
                        <th>Shake Goal</th>
                        <th>Recipes</th>
                        <th>MRP</th>
                        <th>No of Scoops</th>
                        <th>Ectra Incredients</th>
                        <th>Discount</th>
                        <th>Service Charge</th>
                        <th>Total</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM shake ORDER BY shake_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $s_id = $row['shake_id'];
                      $s_name = $row['shake_name'];
                      $s_goal = $row['shake_goal'];
                      $s_reci = $row['shake_recipes'];
                      $s_raw = $row['shake_raw'];
                      $s_mcost = $row['shake_mcost'];
                      $s_scost = $row['shake_scost'];
                      $s_gst = $row['shake_gst'];
                      $s_bene = $row['shake_benefit'];
                      $s_disc = $row['shake_desc'];
                      $s_img = $row['shake_img'];

                      // Calculate total price
                      $s_total = $s_scost + $s_gst;
                    ?>
                      <tbody>
                        <tr>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td><img src="../images/shake/<?php echo $s_img; ?>" alt=""></td>
                          <td><?php echo $s_name; ?></td>
                          <td><?php echo $s_goal; ?></td>
                          <td><?php echo $s_reci; ?></td>
                          <td><?php echo $s_raw; ?></td>
                          <td><?php echo $s_mcost; ?></td>
                          <td><?php echo $s_gst; ?></td>
                          <td><?php echo $s_scost; ?></td>
                          <td><?php echo $s_bene; ?></td>
                          <td><?php echo $s_disc; ?></td>
                          <td>
                            <a href="admin-shake.php?sid=<?php echo $s_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit
                              <i class="ti-pencil-alt btn-icon-append"></i>
                            </a>
                          </td>
                          <td>
                            <a href="admin-shake.php?sd_id=<?php echo $s_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete
                              <i class="ti-trash btn-icon-prepend"></i>
                            </a>
                          </td>
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
  <script>
    function displaySelectedFileName(input) {
      var fileName = input.files[0].name;
      var label = input.nextElementSibling;
      label.innerText = fileName;

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