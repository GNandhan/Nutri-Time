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
  <title>Admin Materials</title>
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
  <!-- code for getteing the subcategory as per the actegory selected -->
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- including the sidebar,navbar -->
    <?php
    include './topbar.php';
    ?>
    <?php
    if (isset($_GET['pid'])) {
      $proid = $_GET['pid'];
      $p_query = mysqli_query($conn, "SELECT * FROM product WHERE pro_id = '$proid'");
      $p_row1 = mysqli_fetch_array($p_query);

      $p_code1 = $p_row1['pro_code'];
      $p_name1 = $p_row1['pro_name'];
      $p_cat1 = $p_row1['pro_category'];
      $p_sub1 = $p_row1['pro_subcategory'];
      $p_brand1 = $p_row1['pro_brand'];
      $p_pri1 = $p_row1['pro_price'];
      $p_mrp1 = $p_row1['pro_mrp'];
      $p_qua1 = $p_row1['pro_quantity'];
      $p_img1 = $p_row1['pro_image'];
      // $p_dis1 = $p_row1['pro_distribution'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['pd_id'])) {
      $dl_id = $_GET['pd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM product WHERE pro_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $img = '../images/product/' . $dl_row1['pro_image'];
      $del = mysqli_query($conn, "DELETE FROM product WHERE pro_id='$dl_id'");
      if ($del) {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-product.php");
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
            } else {
              codeInput.value = ""; // Clear product code if no data found
              categoryInput.value = ""; // Clear category if no data found
              subcategoryInput.value = ""; // Clear subcategory if no data found
            }
          });
        } else {
          priceInput.value = ""; // Clear the price field if no material is selected
          codeInput.value = ""; // Clear the code field if no material is selected
          categoryInput.value = ""; // Clear the category field if no material is selected
          subcategoryInput.value = ""; // Clear the subcategory field if no material is selected
        }
      }
    </script>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1 class="card-title">Product</h1>
                <p class="card-description">Add Product Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="pid" value="<?php echo $proid; ?>">
                  <div class="row">
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <select class="form-control" name="proname" id="proname" onchange="updatePrice()">
                          <option selected>Select the Product</option>
                          <?php
                          $query = mysqli_query($conn, "select * from price");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $pro_id = $row["pro_id"];
                            $pro_name = $row["pro_name"];
                          ?>
                            <option value="<?php echo $pro_name; ?>" <?php if ($row['pro_name'] == $sh_raw1) {
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
                        <input type="text" class="form-control" placeholder="Weight Gainer" name="procode" id="procode" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Offline Customer Name</label>
                        <input type="text" class="form-control" placeholder="Customer Name" name="provendo" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="Category" name="procat" id="procat" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Subcategory</label>
                        <input type="text" class="form-control" placeholder="Subcategory" name="prosubcat" id="prosubcat" required>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="proaddress" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>MRP</label>
                        <input type="number" class="form-control" name="promrp" id="promrp" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="proquant" value="<?php echo $p_qua1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>VP</label>
                        <input type="number" class="form-control" name="provp" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label>GST</label>
                        
                        <input type="number" class="form-control" name="properprice" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Discount Percentage</label>
                        <select class="form-control" name="shdiscount" id="shdiscount" onchange="updateDiscount()">
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
                        <input type="number" class="form-control" name="properprice" id="properprice" readonly required>
                      </div>
                    </div>

                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submitp">Submit</button>
                  <button type="reset" class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
        if (isset($_POST["submitp"])) {
          $pcode = $_POST["procode"];
          $pname = $_POST["proname"];
          $pcat_name = $_POST["procat"];
          $psubcat_name = $_POST["prosubcat"];
          $pbrand = "Herbalife";
          $pmrp = $_POST["promrp"];
          $pprice = $_POST["proprice"];
          $pquan = $_POST["proquant"];
          $pimg = $_FILES['proimg']['name'];

          // Image uploading formats
          $filename = $_FILES['proimg']['name'];
          $tempname = $_FILES['proimg']['tmp_name'];
          // Fetch the material ID from the URL parameters
          $pro_id = $_POST["pid"];

          if ($pro_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO product (pro_code, pro_name, pro_category, pro_subcategory, pro_brand, pro_price, pro_mrp, pro_quantity, pro_curquantity, pro_image)
                                       VALUES ('$pcode','$pname','$pcat_name','$psubcat_name','$pbrand','$pprice', '$pmrp','$pquan','$pquan','$pimg')");
          } else {
            // Update existing material
            if ($filename) {
              // Remove the existing image
              $imgs = '../images/product/' . $pimg;
              unlink($imgs);
              // Update material with new image
              $sql = mysqli_query($conn, "UPDATE product SET pro_code='$pcode', pro_name='$pname', pro_category='$pcat_name', pro_subcategory='$psubcat_name', pro_brand='$pbrand', pro_price='$pprice', pro_mrp='$pmrp', pro_quantity='$pquan', pro_curquantity='$pquan', pro_image='$pimg' WHERE pro_id='$pro_id'");
            } else {
              // Update material without changing the image
              $sql = mysqli_query($conn, "UPDATE product SET pro_code='$pcode', pro_name='$pname', pro_category='$pcat_name', pro_subcategory='$psubcat_name', pro_brand='$pbrand', pro_price='$pprice', pro_mrp='$pmrp', pro_quantity='$pquan', pro_curquantity='$pquan' WHERE pro_id='$pro_id'");
            }
          }

          if ($sql == TRUE) {
            // echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
            move_uploaded_file($tempname, "../images/product/$filename");
            echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
          } else {
            echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
          }
        }
        ?>
        <div class="row ">
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product</h4>
                <div class="row">
                  <div class="col-md-9">
                    <p class="card-description">Product Details</p>
                  </div>
                  <div class="col-md-3">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By:
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <p class="pl-3">Type</p>
                        <div class="dropdown-item">
                          <input type="checkbox" id="checkCategory" class="filter-checkbox" value="category">
                          <label for="checkCategory">Used Product</label>
                        </div>
                        <div class="dropdown-item">
                          <input type="checkbox" id="checkSubcategory" class="filter-checkbox" value="subcategory">
                          <label for="checkSubcategory">Unused Product</label>
                        </div>
                        <!-- Add more checkbox items for other filter options -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Slno</th>
                        <th>Offline Customer Name</th>
                        <th>Address</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>MRP</th>
                        <th>Quantity</th>
                        <th>Current Quantity</th>
                        <th>VP</th>
                        <th>Discount Percentage</th>
                        <th>Percentage Amount</th>
                        <th>Total Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM product ORDER BY pro_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $pro_id = $row['pro_id'];
                      $pro_cod = $row['pro_code'];
                      $pro_nam = $row['pro_name'];
                      $pro_cat = $row['pro_category'];
                      $pro_subcat = $row['pro_subcategory'];
                      $pro_bra = $row['pro_brand'];
                      $pro_mrp = $row['pro_mrp'];
                      $pro_pri = $row['pro_price'];
                      $pro_qua = $row['pro_quantity'];
                      $pro_curqua = $row['pro_curquantity'];
                      $pro_img = $row['pro_image'];
                      $pro_sta = $row['pro_status'];

                      $pro_mrptotal = $pro_mrp * $pro_qua;
                      $pro_purtotal = $pro_pri * $pro_qua;
                      $pro_purprofit = $pro_mrptotal - $pro_purtotal;
                      // $pro_sellprofit = $pro_mrp * ($pro_qua - $pro_dis);
                    ?>
                      <tbody>
                        <tr>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td class="py-1">#<?php echo $pro_cod; ?></td>
                          <td><?php echo $pro_nam; ?></td>
                          <td><?php echo $pro_cat; ?></td>
                          <td><?php echo $pro_subcat; ?></td>
                          <td><?php echo $pro_bra; ?></td>
                          <td><?php echo $pro_mrp; ?></td>
                          <td><?php echo $pro_pri; ?></td>
                          <td><?php echo $pro_qua; ?></td>
                          <td><?php echo $pro_curqua; ?></td>
                          <td><?php echo $pro_mrptotal; ?></td>
                          <td><?php echo $pro_purtotal; ?></td>
                          <td>
                            <a href="admin-product.php?pid=<?php echo $pro_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i class="ti-pencil-alt btn-icon-append"></i>
                            </a>
                          </td>
                          <td>
                            <a href="admin-product.php?pd_id=<?php echo $pro_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete<i class="ti-trash btn-icon-prepend"></i>
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


  <script>
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