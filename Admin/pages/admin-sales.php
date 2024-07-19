<?php
include './connect.php';
error_reporting(0);
$sale_procode1 = $sale_proname1 = $sale_vp1 = $sale_cus1 = $sale_procat1 = $sale_prosubcat1 = $sale_address1 = "";
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
  <title>Admin Sales</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>

<body>
  <!-- code for getteing the subcategory as per the actegory selected -->
  <div class="container-scroller">
    <?php
    include './topbar.php';
    ?>
    <?php
    if (isset($_GET['sid'])) {
      $saleid = $_GET['sid'];
      $s_query = mysqli_query($conn, "SELECT * FROM sales WHERE sales_id = '$saleid'");
      $s_row1 = mysqli_fetch_array($s_query);

      // Populate variables with fetched data
      $sale_id1 = $s_row1['sales_id'];
      $sale_proid1 = $s_row1['sales_proid'];
      $sale_procode1 = $s_row1['sales_procode'];
      $sale_proname1 = $s_row1['sales_proname'];
      $sale_procat1 = $s_row1['sales_procat'];
      $sale_prosubcat1 = $s_row1['sales_prosubcat'];
      $sale_mrp1 = $s_row1['sales_mrp'];
      $sale_quan1 = $s_row1['sales_quan'];
      $sale_vp1 = $s_row1['sales_vp'];
      $sale_gst1 = $s_row1['sales_gst'];
      $sale_dis1 = $s_row1['sales_dis'];
      $sale_dispri1 = $s_row1['sales_dispri'];
      $sale_cus1 = $s_row1['sales_cus'];
      $sale_address1 = $s_row1['sales_address'];
      $sale_total1 = $s_row1['sales_total'];
      $sale_date1 = $s_row1['sales_date'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['sd_id'])) {
      $dl_id = $_GET['sd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM sales WHERE sales_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $del = mysqli_query($conn, "DELETE FROM sales WHERE sales_id='$dl_id'");
      if ($del) {
        header("location:admin-sales.php");
      } else {
        echo "Deletion Failed";
      }
    }
    ?>
    <!-- Fetching prices of all materials from the database -->
    <?php
    $material_prices = array();
    $query = mysqli_query($conn, "SELECT pro_name, pro_mrp FROM price");
    while ($row = mysqli_fetch_assoc($query)) {
      $material_prices[$row['pro_name']] = $row['pro_mrp'];
    }
    ?>
    <!-- JavaScript to update the price field -->
    <script>
      // Define a JavaScript object to store material prices
      var materialPrices = <?php echo json_encode($material_prices); ?>;

      // JavaScript to update the price, product code, category, subcategory, and purchase price fields
      function updatePrice() {
        var selectedMaterial = document.getElementById("proname").value;
        var priceInput = document.getElementById("promrp");
        var codeInput = document.getElementById("procode");
        var categoryInput = document.getElementById("procat");
        var subcategoryInput = document.getElementById("prosubcat");
        var vpInput = document.getElementById("provp");
        var quaInput = document.getElementById("procurqua");
        var proidInput = document.getElementById("proid");

        // Set the price, code, category, subcategory, and purchase price fields based on selected material
        if (selectedMaterial && materialPrices[selectedMaterial]) {
          priceInput.value = materialPrices[selectedMaterial]; // Set MRP value

          // AJAX request to fetch product details based on selected product name
          $.post('get_product_details.php', {
            product_name: selectedMaterial
          }, function(data) {
            var productDetails = JSON.parse(data);
            if (productDetails && productDetails.pro_code) {
              codeInput.value = productDetails.pro_code; // Set product code value
              categoryInput.value = productDetails.pro_category; // Set category value
              subcategoryInput.value = productDetails.pro_subcat; // Set subcategory value
              vpInput.value = productDetails.pro_vp; // Set vp value
              quaInput.value = productDetails.pro_curquantity; // Set vp value
              proidInput.value = productDetails.pri_id; // Set product ID
            } else {
              codeInput.value = ""; // Clear product code if no data found
              categoryInput.value = ""; // Clear category if no data found
              subcategoryInput.value = ""; // Clear subcategory if no data found
              proidInput.value = ""; // Clear product ID if no data found
            }
          });
        } else {
          priceInput.value = ""; // Clear the price field if no material is selected
          codeInput.value = ""; // Clear the code field if no material is selected
          categoryInput.value = ""; // Clear the category field if no material is selected
          subcategoryInput.value = ""; // Clear the subcategory field if no material is selected
          proidInput.value = ""; // Clear product ID if no material is selected
        }
      }
    </script>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1 class="card-title">Sales</h1>
                <p class="card-description">Add Product Sales Details</p>
                <form method="post" class="forms-sample">
                  <input type="hidden" name="saleid" value="<?php echo $saleid; ?>">
                  <input type="hidden" name="proid" id="proid" value="<?php echo $sale_proid1; ?>">
                  <div class="row">
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <select class="form-control" style="border-radius: 16px;" name="proname" id="proname" onchange="updatePrice()">
                          <option selected>Select the Product</option>
                          <?php
                          $query = mysqli_query($conn, "select * from price");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $pro_id = $row["pro_id"];
                            $pro_name = $row["pro_name"];
                          ?>
                            <option value="<?php echo $pro_name; ?>" <?php if ($row['pro_name'] == $sale_proname1) {
                                                                        echo 'selected';
                                                                      } ?>><?php echo $pro_name; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Weight Gainer" name="procode" id="procode" value="<?php echo $sale_procode1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Offline Customer Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Customer Name" name="provend" value="<?php echo $sale_cus1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Category" name="procat" id="procat" value="<?php echo $sale_procat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Subcategory</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Subcategory" name="prosubcat" id="prosubcat" value="<?php echo $sale_prosubcat1; ?>" required>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Address" name="proaddress" value="<?php echo $sale_address1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>MRP</label>
                        <input type="number" class="form-control" style="border-radius: 16px;" name="promrp" id="promrp" value="<?php echo $sale_mrp1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" style="border-radius: 16px;" name="proquant" id="procurqua" value="<?php echo $sale_quan1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>VP</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="provp" id="provp" value="<?php echo $sale_vp1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>GST</label>
                        <input type="number" class="form-control" style="border-radius: 16px;" name="progst" value="<?php echo $sale_gst1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Discount Percentage</label>
                        <select class="form-control" style="border-radius: 16px;" name="shdiscount" id="shdiscount" onchange="updateDiscount()">
                          <option value="pro_dis0">0%</option>
                          <option value="pro_dis15">15%</option>
                          <option value="pro_dis25">25%</option>
                          <option value="pro_dis35">35%</option>
                          <option value="pro_dis42">42%</option>
                          <option value="pro_dis50">50%</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Percentage Price</label>
                        <input type="number" class="form-control" style="border-radius: 16px;" name="properprice" id="properprice" readonly value="<?php echo $sale_dispri1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Sales Date</label>
                        <input type="date" class="form-control" style="border-radius: 16px;" name="prodate" value="<?php echo $sale_date1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitp" value="Submit">
                  <button type="reset" class="btn btn-light rounded-pill">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->

        <?php
        if (isset($_POST["submitp"])) {
          $sal_proname = $_POST["proname"];
          $sal_procode = $_POST["procode"];
          $sal_cus = $_POST["provend"];
          $sal_procat = $_POST["procat"];
          $sal_prosubcat = $_POST["prosubcat"];
          $sal_address = $_POST["proaddress"];
          $sal_mrp = $_POST["promrp"];
          $sal_quan = $_POST["proquant"];
          $sal_vp = $_POST["provp"];
          $sal_date = $_POST["prodate"];
          $sal_vptotal = $sal_vp * $sal_quan;
          $sal_gst = $_POST["progst"];
          // Extract the numeric portion of the discount percentage
          $discountValue = $_POST["shdiscount"];
          $numericDiscount = filter_var($discountValue, FILTER_SANITIZE_NUMBER_INT);
          // Now $numericDiscount contains only the numeric value (e.g., "15", "25", etc.)
          $sal_dis = $numericDiscount; // Use this numeric value for further processing
          $sal_dispri = $_POST["properprice"];
          // Calculate subtotal
          $subtotal = $sal_dispri * $sal_quan;
          // Calculate GST (considering 18%)
          // $gstAmount = ($subtotal * $sal_gst) / 100;
          // Calculate total including GST
          $sal_total = $subtotal;
          $sal_proid = $_POST["proid"]; // Get the product ID

          // Retrieve the current quantity from the price table for the given product
          $sal_curquan_query = mysqli_query($conn, "SELECT pro_curquantity FROM price WHERE pro_name = '$sal_proname'");
          $sal_curquan_row = mysqli_fetch_assoc($sal_curquan_query);
          $sal_curquan = $sal_curquan_row['pro_curquantity'];

          $sal_curquan1 = $sal_curquan - $sal_quan;
          // Determine if this is an INSERT or UPDATE operation based on saleid
          $sale_id = $_POST["saleid"];
          if (empty($sale_id)) {
            // Perform INSERT operation
            $sql = mysqli_query($conn, "INSERT INTO sales (sales_proid, sales_procode, sales_proname, sales_procat, sales_prosubcat, sales_mrp, sales_quan, sales_vp, sales_vptotal, sales_gst, sales_dis, sales_dispri, sales_cus, sales_address, sales_total, sales_date)
            VALUES ('$sal_proid','$sal_procode','$sal_proname','$sal_procat','$sal_prosubcat','$sal_mrp','$sal_quan','$sal_vp', '$sal_vptotal','$sal_gst','$sal_dis','$sal_dispri','$sal_cus','$sal_address','$sal_total','$sal_date')");

            // Update the current quantity in the price table
            $sql_update = mysqli_query($conn, "UPDATE price SET pro_curquantity='$sal_curquan1' WHERE pro_name='$sal_proname'");
          } else {
            // Perform UPDATE operation
            $sql = mysqli_query($conn, "UPDATE sales SET sales_proid='$sal_proid', sales_procode='$sal_procode', sales_proname='$sal_proname', sales_procat='$sal_procat', sales_prosubcat='$sal_prosubcat', sales_mrp='$sal_mrp', sales_quan='$sal_quan', sales_vp='$sal_vp', sales_vptotal='$sal_vptotal', sales_gst='$sal_gst', sales_dis='$sal_dis', sales_dispri='$sal_dispri', sales_cus='$sal_cus', sales_address='$sal_address', sales_total='$sal_total' WHERE sales_id='$sale_id'");

            // Update the current quantity in the price table
            $sql_update = mysqli_query($conn, "UPDATE price SET pro_curquantity='$sal_curquan1' WHERE pro_name='$sal_proname'");
          }
          // Check if the query was successful
          if ($sql === TRUE) {
            // Fetch pro_curquantity from price table
            $price_query = mysqli_query($conn, "SELECT pro_curquantity, pro_scoop FROM price WHERE pro_name = '$sal_proname'");
            $price_row = mysqli_fetch_assoc($price_query);
            $pro_curquantity = $price_row['pro_curquantity'];
            $pro_scoop = $price_row['pro_scoop'];

            // Calculate pro_scoopqua
            $pro_scoopqua = $pro_curquantity * $pro_scoop;

            // Update pro_scoopqua in the price table
            $update_price = mysqli_query($conn, "UPDATE price SET pro_scoopqua = '$pro_scoopqua' WHERE pro_name = '$sal_proname'");
            if ($update_price) {
              echo "<script>alert('Sales data inserted successfully.');</script>";
            } else {
              echo "<script>alert('Error updating pro_scoopqua: " . mysqli_error($conn) . "');</script>";
            }
          } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
          }
        }
        ?>
        <div class="row ">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Sales</h4>
                <div class="row">
                  <div class="col-md-9">
                    <p class="card-description">Product Sales Details</p>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Slno</th>
                        <th>Sales Date</th>
                        <th>Offline Customer Name</th>
                        <th>Address</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>MRP</th>
                        <th>Sales Quantity</th>
                        <th>Current Quantity</th>
                        <th>VP</th>
                        <th>VP Total</th>
                        <th>GST</th>
                        <th>Discount Percentage</th>
                        <th>Percentage Amount</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM sales ORDER BY sales_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $sale_id = $row['sales_id'];
                      $sale_proid = $row['sales_proid'];
                      $sale_procode = $row['sales_procode'];
                      $sale_proname = $row['sales_proname'];
                      $sale_procat = $row['sales_procat'];
                      $sale_prosubcat = $row['sales_prosubcat'];
                      $sale_mrp = $row['sales_mrp'];
                      $sale_quan = $row['sales_quan'];
                      $sale_date = $row['sales_date'];
                      // Fetch current quantity from the price table based on the product name
                      $currentQuantity = 0; // Default value if no quantity found
                      $currentQuantityQuery = mysqli_query($conn, "SELECT pro_curquantity FROM price WHERE pro_name = '$sale_proname'");
                      if ($currentQuantityRow = mysqli_fetch_assoc($currentQuantityQuery)) {
                        $currentQuantity = $currentQuantityRow['pro_curquantity'];
                      }
                      $sale_vp = $row['sales_vp'];
                      $sale_vptotal = $row['sales_vptotal'];
                      $sale_gst = $row['sales_gst'];
                      $sale_dis = $row['sales_dis'];
                      $sale_dispri = $row['sales_dispri'];
                      $sale_cus = $row['sales_cus'];
                      $sale_address = $row['sales_address'];
                      $sale_total = $row['sales_total'];
                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-sales.php?sid=<?php echo $sale_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-sales.php?sd_id=<?php echo $sale_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2" onclick="return confirmDelete();">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td><?php echo $sale_date; ?></td>
                          <td><?php echo $sale_cus; ?></td>
                          <td><?php echo $sale_address; ?></td>
                          <td class="py-1"><?php echo $sale_procode; ?></td>
                          <td><?php echo $sale_proname; ?></td>
                          <td><?php echo $sale_procat; ?></td>
                          <td><?php echo $sale_prosubcat; ?></td>
                          <td><?php echo $sale_mrp; ?></td>
                          <td><?php echo $sale_quan; ?></td>
                          <td><?php echo $currentQuantity; ?></td>
                          <td><?php echo $sale_vp; ?></td>
                          <td><?php echo $sale_vptotal; ?></td>
                          <td><?php echo $sale_gst; ?>%</td>
                          <td><?php echo $sale_dis; ?>%</td>
                          <td><?php echo $sale_dispri; ?></td>
                          <td><?php echo $sale_total; ?></td>
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
  <script>
    function confirmDelete() {
      return confirm('Are you sure you want to delete this item?');
    }

    function updateDiscount() {
      var selectedDiscount = document.getElementById("shdiscount").value;
      var productName = document.getElementById("proname").value;
      // AJAX request to fetch the discount value from the database based on the selected product and discount type
      $.post('get_discount_value.php', {
        product_name: productName,
        discount_type: selectedDiscount
      }, function(data) {
        // Update the Percentage Price field with the fetched discount value
        document.getElementById("properprice").value = data.trim(); // Display the fetched discount value
      });
    }
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>