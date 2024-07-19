<?php
include './connect.php';
// error_reporting(0);
$sh_reci1 = $pro_id = $sh_name1 = $sh_goal1 = $sh_extra1 = $sh_extraprice1 = $sh_expen1 = $sh_raw1 = $sh_disc1 = $sh_id =  $sh_assoc1 = ''; //for declaring the variable and not to show errors in the page
session_start();
if ($_SESSION["email"] == "") {
  header('location:admin-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Shake</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
  <style>
    .form-control {
      border-radius: 15px !important;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <?php
    include './topbar.php';
    ?>
    <?php
    if (isset($_GET['sid'])) {
      $sh_id = $_GET['sid'];
      $s_query = mysqli_query($conn, "SELECT * FROM shake WHERE shake_id = '$sh_id'");
      $s_row1 = mysqli_fetch_array($s_query);

      $sh_name1 = $s_row1['shake_name'];
      $sh_assoc1 = $s_row1['shake_assoc'];
      $sh_cusname1 = $s_row1['customer_name'];
      $sh_goal1 = $s_row1['shake_goal'];
      $sh_reci1 = $s_row1['shake_recipes'];
      $sh_scoop1 = $s_row1['shake_scoops'];
      $sh_extra1 = $s_row1['shake_extra'];
      $sh_extraprice1 = $s_row1['shake_extraprice'];
      $sh_disc1 = $s_row1['shake_discount'];
      $sh_expen1 = $s_row1['shake_expence'];
    }
    if (isset($_GET['sd_id'])) {
      $dl_id = $_GET['sd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM shake WHERE shake_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $del = mysqli_query($conn, "DELETE FROM shake WHERE shake_id='$dl_id'");
      if ($del) {
        header("location:admin-shake.php");
      } else {
        echo "Deletion Failed";
      }
    }
    ?>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1 class="card-title">Shakes</h1>
                <p class="card-description">Add Shakes Details</p>
                <form method="post" enctype="multipart/form-data" class="forms-sample">
                  <input type="hidden" name="shid" value="<?php echo $sh_id; ?>">
                  <div class="row">
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <select class="form-control" style="border-radius: 16px;" name="cusname">
                          <option selected>Select Customers</option>
                          <?php
                          $query = mysqli_query($conn, "SELECT * FROM customer");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $cus_id = $row["cust_id "];
                            $cus_name = $row["cust_name"];
                          ?>
                            <option value="<?php echo $cus_name; ?>" <?php if ($row['cust_name'] == $sh_name1) ?>><?php echo $cus_name; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-6">
                      <div class="form-group">
                        <label>Shake Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="#00A001" name="shname" value="<?php echo $sh_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Shake Goal</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Weight Gainer" name="shgoal" value="<?php echo $sh_goal1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Shake Recipe</label><br>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM price");
                        while ($row = mysqli_fetch_assoc($query)) {
                          $pro_name = $row["pro_name"];
                        ?>
                          <div class="form-check ml-4 py-2">
                            <input class="form-check-input" style="transform:scale(1.5)" type="checkbox" name="shrecipe[]" value="<?php echo $pro_name; ?>" onchange="displayScoopInput(this, '<?php echo $pro_name; ?>')">
                            <label class="form-check-label"><?php echo $pro_name; ?></label>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md col-sm col-2">
                      <div class="form-group">
                        <label for="scoops">No of Scoops</label>
                        <div id="scoopInputs">
                          <!-- Dynamic scoop input fields will be added here -->
                        </div>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col">
                      <div class="form-group">
                        <label>Ingredient Prices (MRP)</label>
                        <div id="ingredientPrices">
                          <!-- Ingredient prices will be dynamically updated here -->
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md col-sm col">
                      <div class="col">
                        <div class="form-group">
                          <label>Ingredients Price Total</label>
                          <input type="text" class="form-control" style="border-radius: 16px;" id="ingredientsPriceTotal" name="shmrp" readonly required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Extra Ingredients</label>
                          <input type="text" class="form-control" style="border-radius: 16px;" name="shextra" value="<?php echo $sh_extra1; ?>" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Extra Ingredient Price</label>
                          <input type="text" class="form-control" style="border-radius: 16px;" name="shextra_price" value="<?php echo $sh_extraprice1; ?>" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg col-md col-sm col-7">
                      <div class="form-group">
                        <label>Wellness Coach</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="shassoc" placeholder="Enter Asssociate name" value="<?php echo $sh_assoc1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-5">
                      <div class="form-group">
                        <label>Discount %</label>
                        <select class="form-control" style="border-radius: 16px;" name="shdiscount" required>
                          <option selected>Select Discount Percentage</option>
                          <option value="15" <?php if ($sh_disc1 == 15) echo "selected"; ?>>15%</option>
                          <option value="25" <?php if ($sh_disc1 == 25) echo "selected"; ?>>25%</option>
                          <option value="35" <?php if ($sh_disc1 == 35) echo "selected"; ?>>35%</option>
                          <option value="42" <?php if ($sh_disc1 == 42) echo "selected"; ?>>42%</option>
                          <option value="50" <?php if ($sh_disc1 == 50) echo "selected"; ?>>50%</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-5">
                      <div class="form-group">
                        <label>Service Charge</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="shcharge" value="<?php echo $sh_expen1; ?>" required>
                      </div>
                    </div>
                    <!-- <div class="col-lg col-md col-sm col-7">
                      <div class="form-group">
                        <label>Shake Image</label>
                        <div class="input-group mb-3">
                          <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="shimg" onchange="displaySelectedFileName(this)" value="<?php echo $sh_img1; ?>" required>
                          <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <img src="../images/shake/<?php echo $p_img1; ?>" alt="" width="100">
                      </div>
                    </div> -->
                  </div>
                  <input type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitsh" value="Submit">
                  <a href="./admin-shake.php" class="btn btn-light rounded-pill">Cancel</a>
                </form>
              </div>
            </div>
          </div>
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
            // Fetch ingredient prices from the global JavaScript variable
            // $sh_mrp = $ingredientPrices['shake_mrp'];
            $sh_mrp = $_POST["shmrp"];
            $sh_extra = $_POST["shextra"];
            $sh_extra_price = $_POST["shextra_price"];
            $sh_disc = $_POST["shdiscount"];
            $sh_sercharge = $_POST["shcharge"];
            $sh_assoc = $_POST["shassoc"];
            // $sh_img = $_FILES['shimg']['name'];
            $total_cost = floatval($sh_sercharge) + floatval($sh_extra_price) + floatval($sh_mrp);
            // Image uploading formats
            // $filename = $_FILES['shimg']['name'];
            // $tempname = $_FILES['shimg']['tmp_name'];
            // Handle scoops data
            $scoopsData = $_POST["scoops"]; // This is an associative array
            // Initialize an empty array to store formatted scoops data
            $formattedScoops = [];
            // Iterate through each product and its scoops count
            foreach ($scoopsData as $product => $scoops) {
              // Format each entry and push to the formatted array
              $formattedScoops[] = "$product : $scoops";
            }
            // Join the formatted scoops with commas and store in database-friendly format
            $sh_scoops = implode(", ", $formattedScoops);

            if ($sh_id == '') {
              $sql = mysqli_query($conn, "INSERT INTO shake (shake_name,shake_assoc, customer_id, customer_name, shake_goal, shake_recipes, shake_mrp, shake_extra, shake_extraprice, shake_discount, shake_expence, shake_total, shake_scoops)
                                                     VALUES ('$sh_name','$sh_assoc','$cus_name','$cus_name','$sh_goal','$sh_reci','$sh_mrp','$sh_extra','$sh_extra_price','$sh_disc','$sh_sercharge','$total_cost','$sh_scoops')");
            } else {
              if ($filename) {
                $imgs = '../images/shake/' . $sh_img;
                unlink($imgs);
                $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_assoc='$sh_assoc', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_mrp='$sh_mrp', shake_extra='$sh_extra', shake_extraprice='$sh_extra_price', shake_discount='$sh_disc', shake_expence='$sh_sercharge', shake_scoops='$sh_scoops' WHERE shake_id='$sh_id'");
              } else {
                $sql = mysqli_query($conn, "UPDATE shake SET shake_name='$sh_name', shake_assoc='$sh_assoc', shake_goal='$sh_goal', shake_recipes='$sh_reci', shake_mrp='$sh_mrp', shake_extra='$sh_extra', shake_extraprice='$sh_extra_price', shake_discount='$sh_disc', shake_expence='$sh_sercharge', shake_scoops='$sh_scoops' WHERE shake_id='$sh_id'");
              }
            }
            if ($sql == TRUE) {
              // Subtract the scoops from the pro_scoopqua in the price table
              foreach ($scoopsData as $product => $scoops) {
                $product = mysqli_real_escape_string($conn, $product);
                $scoops = intval($scoops);
                // Fetch the current quantity
                $result = mysqli_query($conn, "SELECT pro_scoopqua FROM price WHERE pro_name='$product'");
                if ($result && mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $currentQuantity = intval($row['pro_scoopqua']);
                  $newQuantity = $currentQuantity - $scoops;
                  // Update the new quantity in the database
                  mysqli_query($conn, "UPDATE price SET pro_scoopqua='$newQuantity' WHERE pro_name='$product'");
                }
              }
              // After successful SQL operation (insert or update)
              foreach ($scoopsData as $product => $scoops) {
                // Fetch pro_scoopqua from price table for the current product
                $result = mysqli_query($conn, "SELECT pro_scoopqua, pro_scoop FROM price WHERE pro_name='$product'");
                if ($result && mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $pro_scoopqua = intval($row['pro_scoopqua']);
                  $pro_scoops = intval($row['pro_scoop']);

                  // Calculate new pro_curquantity
                  $pro_curquantity = $pro_scoopqua / $pro_scoops;

                  // Update pro_curquantity in price table
                  mysqli_query($conn, "UPDATE price SET pro_curquantity='$pro_curquantity' WHERE pro_name='$product'");
                }
              }

              echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
            } else {
              echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
            }
          }
          ?>
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
                        <th>Shake History</th>
                        <th>Sl-no</th>
                        <th>Customer Name</th>
                        <th>Shake Name</th>
                        <th>Associate Name</th>
                        <th>Shake Goal</th>
                        <th>Recipes</th>
                        <th>Scoop Price</th>
                        <th>No of Scoops</th>
                        <th>Extra Ingredients</th>
                        <th>Extra Ingredients Cost</th>
                        <th>Discount</th>
                        <th>Service Charge</th>
                        <th>Shake Price</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM shake ORDER BY shake_id ");
                    $serialNo = 1;
                    $displayedCustomerNames = array(); // Initialize the array to keep track of displayed customer names
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $sh_id = $row['shake_id'];
                      $cu_name = $row['customer_name'];
                      $sh_name = $row['shake_name'];
                      $sh_assoc = $row['shake_assoc'];
                      $sh_goal = $row['shake_goal'];
                      $sh_recipe = $row['shake_recipes'];
                      $sh_mrp = $row['shake_mrp'];
                      $sh_scoop = $row['shake_scoops'];
                      $sh_extra = $row['shake_extra'];
                      $sh_extraprice = $row['shake_extraprice'];
                      $sh_discount = $row['shake_discount'];
                      $sh_expense = $row['shake_expence'];
                      $sh_total = $row['shake_total'];

                      if (!in_array($cu_name, $displayedCustomerNames)) {
                        $displayedCustomerNames[] = $cu_name; // Add the customer name to the array
                    ?>
                        <tbody>
                          <tr>
                            <td><a href="admin-shake.php?sid=<?php echo $sh_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i class="ti-pencil-alt btn-icon-append"></i></a></td>
                            <td><a href="admin-shake.php?sd_id=<?php echo $sh_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2" onclick="return confirmDelete();">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
                            <td><a href="admin-shake.php?cusmdid=<?php echo $sh_id; ?>" class="btn btn-inverse-primary btn-icon-text p-3" data-toggle="modal" data-target="#exampleModal_<?php echo $sh_id; ?>">Shake History</a></td>
                            <td class="py-1"><?php echo $serialNo++; ?></td>
                            <td><?php echo $cu_name; ?></td>
                            <td><?php echo $sh_name; ?></td>
                            <td><?php echo $sh_assoc; ?></td>
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
                        <div class="modal fade" id="exampleModal_<?php echo $sh_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg"> <!-- Adjust modal size if needed -->
                            <div class="modal-content" style="border-radius:15px;">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Shake History</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <div class="col-lg col-md col-sm col">
                                  <h3>Customer Name : <span style="font-weight: bold;"> <?php echo $cu_name; ?></span></h3>
                                  <div class="row border-bottom mt-4">
                                    <div class="col-lg col-md col-sm col h4">Shake Name</div>
                                    <div class="col-lg col-md col-sm col h4">Associate Name</div>
                                    <div class="col-lg col-md col-sm col h4">Shake Goal</div>
                                    <div class="col-lg col-md col-sm col h4">Recipes</div>
                                    <div class="col-lg col-md col-sm col h4">Scoop Price</div>
                                    <div class="col-lg col-md col-sm col h4">No of Scoops</div>
                                    <div class="col-lg col-md col-sm col h4">Extra Ingredients</div>
                                    <div class="col-lg col-md col-sm col h4">Extra Ingredients Cost</div>
                                    <div class="col-lg col-md col-sm col h4">Discount</div>
                                    <div class="col-lg col-md col-sm col h4">Service Charge</div>
                                    <div class="col-lg col-md col-sm col h4">Shake Price</div>
                                  </div>
                                  <?php
                                  // Query to fetch all shakes for the current customer
                                  $customer_shakes_sql = mysqli_query($conn, "SELECT * FROM shake WHERE customer_name = '$cu_name'");
                                  while ($customer_shake = mysqli_fetch_assoc($customer_shakes_sql)) {
                                    $sh_name_modal = $customer_shake['shake_name'];
                                    $sh_assoc_modal = $customer_shake['shake_assoc'];
                                    $sh_goal_modal = $customer_shake['shake_goal'];
                                    $sh_recipe_modal = $customer_shake['shake_recipes'];
                                    $sh_mrp_modal = $customer_shake['shake_mrp'];
                                    $sh_scoop_modal = $customer_shake['shake_scoops'];
                                    $sh_extra_modal = $customer_shake['shake_extra'];
                                    $sh_extraprice_modal = $customer_shake['shake_extraprice'];
                                    $sh_discount_modal = $customer_shake['shake_discount'];
                                    $sh_expense_modal = $customer_shake['shake_expence'];
                                    $sh_total_modal = $customer_shake['shake_total'];
                                  ?>
                                    <div class="row mt-2">
                                      <div class="col-lg"><?php echo $sh_name_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_assoc_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_goal_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_recipe_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_mrp_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_scoop_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_extra_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_extraprice_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_discount_modal; ?>%</div>
                                      <div class="col-lg"><?php echo $sh_expense_modal; ?></div>
                                      <div class="col-lg"><?php echo $sh_total_modal; ?></div>
                                    </div>
                                    <hr>
                                  <?php
                                  }
                                  ?>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submitpay" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php
                      }
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All rights reserved.</span>
    </div>
  </footer>
  </div>
  </div>
  </div>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script>
    var ingredientPrices = {}; // Define global variable to store ingredient prices
    $(document).ready(function() {
      $('select[name="shdiscount"]').change(function() {
        var discount = $(this).val();
        var selectedRecipes = [];
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
                totalMRP = parseFloat(value);
                ingredientPrices += '<div class="py-3">Total Price: ' + value + '</div>';
              } else {
                ingredientPrices += '<div class="py-3">' + key + ' Price: ' + value + '</div>';
              }
            });
            // Update ingredient prices HTML
            $('#ingredientPrices').html(ingredientPrices);
            // Set hidden input field to calculated total MRP
            // Set value of Ingredients Price Total input field
            $('#ingredientsPriceTotal').val(totalMRP);
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });
    });
  </script>
  <script>
    function displayScoopInput(checkbox, productName) {
      const scoopContainer = document.getElementById('scoopInputs');
      if (checkbox.checked) {
        const inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mb-3';
        inputGroup.setAttribute('data-product', productName);
        const inputField = document.createElement('input');
        inputField.type = 'number';
        inputField.className = 'form-control';
        inputField.name = 'scoops[' + productName + ']';
        inputField.placeholder = 'Scoops for ' + productName;
        inputGroup.appendChild(inputField);
        scoopContainer.appendChild(inputGroup);
      } else {
        const inputGroups = scoopContainer.getElementsByClassName('input-group');
        for (let i = 0; i < inputGroups.length; i++) {
          if (inputGroups[i].getAttribute('data-product') === productName) {
            scoopContainer.removeChild(inputGroups[i]);
            break;
          }
        }
      }
    }
  </script>
  <script>
    function confirmDelete() {
      return confirm('Are you sure you want to delete this Shake?');
    }
  </script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>