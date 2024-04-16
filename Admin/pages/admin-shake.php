<?php
include './connect.php';
// error_reporting(0);
$sh_reci1 = $pro_id = $sh_name1 = $sh_goal1 = $sh_extra1 = $sh_extraprice1 = $sh_expen1 = $sh_raw1 = $sh_disc1 = $sh_id = ''; //for declaring the variable and not to show errors in the page
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
      $sh_cusname1 = $s_row1['customer_name'];
      $sh_goal1 = $s_row1['shake_goal'];
      $sh_reci1 = $s_row1['shake_recipes'];
      $sh_mrp1 = $s_row1['shake_mrp'];
      $sh_scoop1 = $s_row1['shake_scoops'];
      $sh_extra1 = $s_row1['shake_extra'];
      $sh_extraprice1 = $s_row1['shake_extraprice'];
      $sh_disc1 = $s_row1['shake_discount'];
      $sh_expen1 = $s_row1['shake_expence'];
      $sh_img1 = $s_row1['shake_image'];
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
                            $cus_name = $row["customer_name"];
                            // $cus_lname = $row["customer_lname"];
                            // $fullname = $cus_fname . ' ' . $cus_lname;
                          ?>
                            <option value="<?php echo $cus_name; ?>" <?php if ($row['customer_name'] == $sh_name1) ?>><?php echo $cus_name; ?></option>
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
                        $query = mysqli_query($conn, "SELECT * FROM price");
                        while ($row = mysqli_fetch_assoc($query)) {
                          $pro_name = $row["pro_name"];
                        ?>
                          <div class="form-check ml-4">
                            <input class="form-check-input" type="checkbox" name="shrecipe[]" value="<?php echo $pro_name; ?>" onchange="displayIngredientPrices()">
                            <label class="form-check-label"><?php echo $pro_name; ?></label>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Ingredient Prices (MRP)</label>
                        <div id="ingredientPrices">
                          <!-- Ingredient prices will be dynamically updated here -->
                          <input type="hidden" name="total_price" value="">
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        No of Scoops
                        <ul>
                          <?php
                          $query = mysqli_query($conn, "SELECT * FROM price");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $pro_name = $row["pro_name"];
                            $pro_scoop = $row["pro_scoop"];
                          ?>
                            <li>
                              <div class="form-group mb-2">
                                <!-- <label><?php echo $pro_name; ?> Scoops</label> -->
                                <input type="number" class="form-control" style="height: 8px; width: aut0;" name="<?php echo $pro_name; ?>_scoops" value="<?php echo $pro_scoop; ?>">
                              </div>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <div class="col">
                      <div class="col">
                        <div class="form-group">
                          <label>Extra Ingredients</label>
                          <input type="text" class="form-control" name="shextra" value="<?php echo $sh_extra1; ?>" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Extra Ingredient Price</label>
                          <input type="text" class="form-control" name="shextra_price" value="<?php echo $sh_extraprice1; ?>" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Discount %</label>
                        <select class="form-control" name="shdiscount" required>
                          <option selected>Select Discount Percentage</option>
                          <option value="15" <?php if ($sh_disc1 == 15) echo "selected"; ?>>15%</option>
                          <option value="25" <?php if ($sh_disc1 == 25) echo "selected"; ?>>25%</option>
                          <option value="35" <?php if ($sh_disc1 == 35) echo "selected"; ?>>35%</option>
                          <option value="42" <?php if ($sh_disc1 == 42) echo "selected"; ?>>42%</option>
                          <option value="50" <?php if ($sh_disc1 == 50) echo "selected"; ?>>50%</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Service Charge</label>
                        <input type="text" class="form-control" name="shcharge" value="<?php echo $sh_expen1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Shake Image</label>
                        <div class="input-group mb-3">
                          <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="shimg" onchange="displaySelectedFileName(this)" value="<?php echo $sh_img1; ?>" required>
                          <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <img src="../images/shake/<?php echo $p_img1; ?>" alt="" width="100">
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary mr-2" name="submitsh" value="Submit">
                  <a href="./admin-shake.php" class="btn btn-light">Cancel</a>
                </form>
              </div>
              <!-- Form Closed -->
            </div>
          </div>
          <!-- PHP CODE FOR INSERTING THE DATA -->
          <?php
          if (isset($_POST["submitsh"])) {
            // Retrieve shake_mrp from the form // Default value if 'number' is not set
            // var_dump($_POST);
            $sh_id = $_POST["shid"];
            $cus_name = $_POST["cusname"];
            $sh_name = $_POST["shname"];
            $sh_goal = $_POST["shgoal"];
            // Get selected shake recipes
            $sh_reci_array = isset($_POST["shrecipe"]) ? $_POST["shrecipe"] : array();
            // Convert array to comma-separated string
            $sh_reci = implode(",", $sh_reci_array);

            // Fetch ingredient prices from the global JavaScript variable
            // $sh_mrp = $ingredientPrices['shake_mrp'];

            // $sh_mrp = $_POST["number"];
            $sh_extra = $_POST["shextra"];
            $sh_extra_price = $_POST["shextra_price"];
            $sh_disc = $_POST["shdiscount"];
            $sh_sercharge = $_POST["shcharge"];
            $sh_img = $_FILES['shimg']['name'];
            // Calculate total cost by adding service charge and extra ingredient price
            $total_cost = floatval($sh_sercharge) + floatval($sh_extra_price);
            $sh_mrp = isset($_POST["total_price"]) ? $_POST["total_price"] : 0;
            // Image uploading formats
            $filename = $_FILES['shimg']['name'];
            $tempname = $_FILES['shimg']['tmp_name'];
            // Fetch the shake ID from the form
            $sh_id = $_POST["shid"];

            if ($sh_id == '') {
              $sql = mysqli_query($conn, "INSERT INTO shake (shake_name, customer_id, customer_name, shake_goal, shake_recipes, shake_mrp, shake_extra, shake_extraprice, shake_discount, shake_expence, shake_total, shake_image)
                                                     VALUES ('$sh_name','$cus_name','$cus_name','$sh_goal','$sh_reci','$sh_mrp','$sh_extra','$sh_extra_price','$sh_disc','$sh_sercharge','$total_cost','$sh_img')");
            } else {
              // Update existing material
              if ($filename) {
                // Remove the existing image
                $imgs = '../images/shake/' . $sh_img;
                unlink($imgs);
                // Update shake with new image
                $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_mrp='$sh_mrp', shake_extra='$sh_extra', shake_extraprice='$sh_extra_price', shake_discount='$sh_disc', shake_expence='$sh_sercharge', shake_image='$sh_img' WHERE shake_id='$sh_id'");
              } else {
                // Update shake without changing the image
                $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_mrp='$sh_mrp', shake_extra='$sh_extra', shake_extraprice='$sh_extra_price', shake_discount='$sh_disc', shake_expence='$sh_sercharge' WHERE shake_id='$sh_id'");
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
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Sl-no</th>
                        <th>Customer Name</th>
                        <th>Shake Img</th>
                        <th>Shake Name</th>
                        <th>Shake Goal</th>
                        <th>Recipes</th>
                        <th>MRP</th>
                        <th>No of Scoops</th>
                        <th>Extra Incredients</th>
                        <th>Extra Incredients Cost</th>
                        <th>Discount</th>
                        <th>Service Charge</th>
                        <th>Total</th>
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
                      $sh_extraprice = $row['shake_extraprice'];
                      $sh_discount = $row['shake_discount'];
                      $sh_expense = $row['shake_expence'];
                      $sh_total = $row['shake_total'];
                    ?>
                      <tbody>
                        <tr>
                          <td>
                            <a href="admin-shake.php?sid=<?php echo $sh_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit
                              <i class="ti-pencil-alt btn-icon-append"></i>
                            </a>
                          </td>
                          <td>
                            <a href="admin-shake.php?sd_id=<?php echo $sh_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete
                              <i class="ti-trash btn-icon-prepend"></i>
                            </a>
                          </td>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td><?php echo $cu_name; ?></td>
                          <td><img src="../images/shake/<?php echo $sh_img; ?>" alt="" width="50" class="rounded-circle"></td>
                          <td><?php echo $sh_name; ?></td>
                          <td><?php echo $sh_goal; ?></td>
                          <td><?php echo $sh_recipe; ?></td>
                          <td><?php echo $sh_mrp; ?></td>
                          <td><?php echo $sh_scoop; ?></td>
                          <td><?php echo $sh_extra; ?></td>
                          <td><?php echo $sh_extraprice; ?></td>
                          <td><?php echo $sh_discount; ?>%</td>
                          <td><?php echo $sh_expense; ?></td>
                          <td><?php echo $sh_total; ?></td>

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
  <script>
    var ingredientPrices = {}; // Define global variable to store ingredient prices

    $(document).ready(function() {
      $('select[name="shdiscount"]').change(function() {
        var discount = $(this).val();
        var selectedRecipes = [];

        // Collect selected recipe checkboxes
        $('input[name="shrecipe[]"]:checked').each(function() {
          selectedRecipes.push($(this).val());
        });

        // AJAX call to fetch prices of selected recipes based on the selected discount
        $.ajax({
          type: 'POST',
          url: 'get_prices.php',
          data: {
            discount: discount,
            recipes: selectedRecipes
          },
          dataType: 'json',
          success: function(response) {
            var ingredientPrices = '';
            var totalMRP = 0;

            // Loop through response to display prices and calculate total MRP
            $.each(response, function(key, value) {
              if (key === 'shake_mrp') {
                // Update hidden input field with the total price
                // Inside the success callback of the AJAX request
                $('input[name="total_price"]').val(totalMRP);

                ingredientPrices += '<div>Total Price: ' + value + '</div>';
              } else {
                ingredientPrices += '<div>' + key + ' Price: ' + value + '</div>';
              }

              if (key === 'shake_mrp') {
                totalMRP = parseFloat(value);
              }
            });

            // Update ingredient prices HTML
            $('#ingredientPrices').html(ingredientPrices);

            // Set hidden input field to calculated total MRP
            $('input[name="number"]').val(totalMRP);
          },

          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });
    });
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