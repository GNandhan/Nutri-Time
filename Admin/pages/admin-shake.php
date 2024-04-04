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
                        <select class="form-control" name="cusname">
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
                            <input class="form-check-input" type="checkbox" name="shrecipe[]" value="<?php echo $pro_name; ?>" <?php if (in_array($pro_name, explode(",", $sh_raw1))) echo "checked"; ?>>
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
                            <li name="price" class="mb-2"><?php echo $pro_price; ?></li>
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
                        <input type="text" class="form-control" name="shextra" value="<?php echo $sh_bene1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Discount %</label>
                        <select class="form-control" name="shdiscount" required>
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
                        <input type="text" class="form-control" name="shcharge" value="<?php echo $sh_bene1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Shake Image</label>
                        <div class="input-group mb-3">
                          <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="shimg" onchange="displaySelectedFileName(this)" value="<?php echo $p_img1; ?>" required>
                          <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <img src="../images/shake/<?php echo $p_img1; ?>" alt="" width="100">
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
            $cus_name = $_POST["cusname"];
            $sh_name = $_POST["shname"];
            $sh_goal = $_POST["shgoal"];

            // Get selected shake recipes
            $sh_reci_array = isset($_POST["shrecipe"]) ? $_POST["shrecipe"] : array();
            // Convert array to comma-separated string
            $sh_reci = implode(",", $sh_reci_array);
            $total_price = 0; // Initialize total price variable

            // Loop through each selected recipe to calculate total price
            foreach ($sh_reci_array as $recipe) {
                $query = mysqli_query($conn, "SELECT pro_price FROM material WHERE pro_name = '$recipe'");
                $row = mysqli_fetch_assoc($query);
                $recipe_price = $row['pro_price']; // Fetch the price of the selected recipe
                $total_price += $recipe_price; // Add the price to the total price
            }
            

            $sh_price = $total_price;
            $sh_number = $_POST["number"];
            $sh_extra = $_POST["shextra"];
            $sh_disc = $_POST["shdiscount"];
            $sh_sercharge = $_POST["shcharge"];
            $sh_img = $_FILES['shimg']['name'];

// Calculate total cost after applying discount and adding service charge
$total_cost = $total_price - ($total_price * ($sh_disc / 100)) + $sh_sercharge;

            // Image uploading formats
            $filename = $_FILES['shimg']['name'];
            $tempname = $_FILES['shimg']['tmp_name'];

            // Fetch the shake ID from the form
            $sh_id = $_POST["shid"];

            if ($sh_id == '') {
              $sql = mysqli_query($conn, "INSERT INTO shake (shake_name, customer_id, customer_name, shake_goal, shake_recipes, shake_mrp, shake_scoops, shake_extra, shake_discount, shake_expence, shake_total, shake_image)
                                        VALUES ('$sh_name','$cus_name','$cus_name','$sh_goal','$sh_reci','$sh_price','$sh_number','$sh_extra','$sh_disc','$sh_sercharge','$total_cost','$sh_img')");
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
                        <th>Shake Img</th>
                        <th>Shake Name</th>
                        <th>Shake Goal</th>
                        <th>Recipes</th>
                        <th>MRP</th>
                        <th>No of Scoops</th>
                        <th>Extra Incredients</th>
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
                      $sh_id = $row['shake_id'];
                      $cu_name = $row['customer_name'];
                      $sh_img = $row['shake_image'];
                      $sh_name = $row['shake_name'];
                      $sh_goal = $row['shake_goal'];
                      $sh_recipe = $row['shake_recipes'];
                      $sh_mrp = $row['shake_mrp'];
                      $sh_scoop = $row['shake_scoops'];
                      $sh_extra = $row['shake_extra'];
                      $sh_discount = $row['shake_discount'];
                      $sh_expense = $row['shake_expence'];
                      $sh_total = $row['shake_total'];

                    ?>
                      <tbody>
                        <tr>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td><?php echo $cu_name; ?></td>
                          <td><img src="../images/shake/<?php echo $sh_img; ?>" alt="" width="50" class="rounded-circle"></td>
                          <td><?php echo $sh_name; ?></td>
                          <td><?php echo $sh_goal; ?></td>
                          <td><?php echo $sh_recipe; ?></td>
                          <td><?php echo $sh_mrp; ?></td>
                          <td><?php echo $sh_scoop; ?></td>
                          <td><?php echo $sh_extra; ?></td>
                          <td><?php echo $sh_discount; ?>%</td>
                          <td><?php echo $sh_expense; ?></td>
                          <td><?php echo $sh_total; ?></td>
                          <td>
                            <a href="admin-shake.php?sid=<?php echo $s_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit
                              <i class="ti-pencil-alt btn-icon-append"></i>
                            </a>
                          </td>
                          <td>
                            <a href="admin-shake.php?sd_id=<?php echo $sh_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete
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