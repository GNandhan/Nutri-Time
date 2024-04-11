<?php
include './connect.php';
//  error_reporting(0);
$p_code1 =  $p_cat1 = $p_sub1 = $p_name1 ='';
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
  <title>Admin Product</title>
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
      $p_query = mysqli_query($conn, "SELECT * FROM price WHERE pri_id = '$proid'");
      $p_row1 = mysqli_fetch_array($p_query);

      $p_name1 = $p_row1['pro_name'];
      $p_code1 = $p_row1['pro_code'];
      $p_cat1 = $p_row1['pro_category'];
      $p_sub1 = $p_row1['pro_subcat'];
      $p_mrp1 = $p_row1['pro_mrp'];
      $p_pri1 = $p_row1['pro_price'];
      $p_qua1 = $p_row1['pro_quantity'];
      $p_img1 = $p_row1['pro_img'];
      // $p_dis1 = $p_row1['pro_distribution'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['pd_id'])) {
      $dl_id = $_GET['pd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM price WHERE pri_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $img = '../images/product/' . $dl_row1['pro_image'];
      $del = mysqli_query($conn, "DELETE FROM price WHERE pri_id='$dl_id'");
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
  var purchasePriceInput = document.getElementById("proprice");

  // Set the price, code, category, subcategory, and purchase price fields based on selected material
  if (selectedMaterial && materialPrices[selectedMaterial]) {
    priceInput.value = materialPrices[selectedMaterial]; // Set MRP value

    // AJAX request to fetch product details based on selected product name
    $.post('get_product_details.php', { product_name: selectedMaterial }, function(data) {
      var productDetails = JSON.parse(data);
      if (productDetails && productDetails.pro_code) {
        codeInput.value = productDetails.pro_code; // Set product code value
        purchasePriceInput.value = productDetails.pro_price; // Set purchase price value
        categoryInput.value = productDetails.pro_category; // Set category value
        subcategoryInput.value = productDetails.pro_subcat; // Set subcategory value
      } else {
        codeInput.value = ""; // Clear product code if no data found
        purchasePriceInput.value = ""; // Clear purchase price if no data found
        categoryInput.value = ""; // Clear category if no data found
        subcategoryInput.value = ""; // Clear subcategory if no data found
      }
    });
  } else {
    priceInput.value = ""; // Clear the price field if no material is selected
    codeInput.value = ""; // Clear the code field if no material is selected
    purchasePriceInput.value = ""; // Clear the purchase price field if no material is selected
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
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <select class="form-control" name="proname" id="proname" onchange="updatePrice()">
                        <option selected>Select the Product</option>
                              <?php 
                    $query = mysqli_query($conn,"select * from price");
                    while ($row = mysqli_fetch_assoc($query))
                      {
                      $pro_id=$row["pro_id"];
                      $pro_name=$row["pro_name"];
                  ?>
                    <option value="<?php echo $pro_name; ?>" <?php if($row['pro_name'] == $p_name1){echo 'selected';} ?> ><?php echo $pro_name; ?></option>
                    <?php
                      }
                    ?>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" placeholder="Weight Gainer" name="procode" id="procode" value="<?php echo $p_code1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                      <label>Category</label>
                        <input type="text" class="form-control" placeholder="Category" name="procat" id="procat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                      <label>Subcategory</label>
                        <input type="text" class="form-control" placeholder="Subcategory" name="prosubcat" id="prosubcat" value="<?php echo $p_sub1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>MRP</label>
                        <input type="number" class="form-control" name="promrp" id="promrp" value="<?php echo $p_mrp1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Purchased Price</label>
                        <input type="number" class="form-control" name="proprice" id="proprice" value="<?php echo $p_pri1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="proquant" value="<?php echo $p_qua1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Image</label>
                        <div class="input-group mb-3">
                          <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="proimg" onchange="displaySelectedFileName(this)" value="<?php echo $p_img1; ?>" required>
                          <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <img src="../images/material/<?php echo $p_img1; ?>" alt="" width="100">
                      </div>
                    </div>
                    <div class="col">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="prodesc" rows="1" placeholder="Enter Product Description"></textarea>
            </div>
        </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submitp">Submit</button>
                  <a href="./admin-product.php" type="reset" class="btn btn-light">Cancel</a>
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
          $pcat = $_POST["procat"];
          $psubcat = $_POST["prosubcat"];
          $pmrp = $_POST["promrp"];
          $pprice = $_POST["proprice"];
          $pquan = $_POST["proquant"];
          $pdesc = $_POST["prodesc"];
          $pimg = $_FILES['proimg']['name'];

          // Image uploading formats
          $filename = $_FILES['proimg']['name'];
          $tempname = $_FILES['proimg']['tmp_name'];
          // Fetch the material ID from the URL parameters
          $pro_id = $_POST["pid"];

          if ($pro_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO price (pro_name, pro_quantity, pro_curquantity, pro_desc, pro_img)
                                                     VALUES ('$pname','$pquan','$pquan','$pdesc','$pimg')");
          } else {
            // Update existing material
            if ($filename) {
              // Remove the existing image
              $imgs = '../images/product/' . $pimg;
              unlink($imgs);
              // Update material with new image
              $sql = mysqli_query($conn, "UPDATE price SET pro_name='$pname', pro_quantity='$pquan', pro_curquantity='$pquan', pro_desc='$pdesc', pro_img='$pimg' WHERE pri_id='$pro_id'");
            } else {
              // Update material without changing the image
              $sql = mysqli_query($conn, "UPDATE price SET pro_name='$pname', pro_quantity='$pquan', pro_curquantity='$pquan' pro_desc='$pdesc', WHERE pri_id='$pro_id'");
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
                        <th>Product Code</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quanity</th>
                        <th>Current Quantity</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>MRP</th>
                        <th>Purchased Price</th>
                        <th>Purchased Total</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM price ORDER BY pri_id");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $pro_id = $row['pri_id'];
                      $pro_cod = $row['pro_code'];
                      $pro_img = $row['pro_img'];
                      $pro_nam = $row['pro_name'];
                      $pro_desc = $row['pro_desc'];
                      $pro_qua = $row['pro_quantity'];
                      $pro_curqua = $row['pro_quantity'];
                      $pro_cat = $row['pro_category'];
                      $pro_subcat = $row['pro_subcat'];
                      $pro_mrp = $row['pro_mrp'];
                      $pro_price = $row['pro_price'];;

                      $pro_purtotal = (int)$pro_price * (int)$pro_qua;
                    ?>
                      <tbody>
                        <tr>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td class="py-1">#<?php echo $pro_cod; ?></td>
                          <td><img src="../images/product/<?php echo $pro_img; ?>"  width="50" class="rounded-circle"></td>
                          <td><?php echo $pro_nam; ?></td>
                          <td><?php echo $pro_desc; ?></td>
                          <td><?php echo $pro_qua; ?></td>
                          <td><?php echo $pro_curqua; ?></td>
                          <td><?php echo $pro_cat; ?></td>
                          <td><?php echo $pro_subcat; ?></td>
                          <td><?php echo $pro_mrp; ?></td>
                          <td><?php echo $pro_price; ?></td>
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