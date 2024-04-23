<?php
include './connect.php';
// error_reporting(0);
$stoloct1 = $stoqua1 =  $sh_raw1 = "";
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
  <title>Admin Stock</title>
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
    <?php
    if (isset($_GET['stoid'])) {
      $stoid = $_GET['stoid'];
      $sto_query = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '$stoid'");
      $sto_row1 = mysqli_fetch_array($p_query);

      $stoloct1 = $sto_row1['stock_place'];
      $stomat1 = $sto_row1['stock_name'];
      $stoqua1 = $sto_row1['stock_quantity'];
      $stocom1 = $sto_row1['stock_comname'];
      $stopri1 = $sto_row1['stock_price'];
      $stogst1 = $sto_row1['stock_gst'];
      $stototal1 = $sto_row1['stock_total'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['stod_id'])) {
      $dl_id = $_GET['stod_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $del = mysqli_query($conn, "DELETE FROM stock WHERE stock_id='$dl_id'");
      if ($del) {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-stocktrans.php");
      } else {
        echo "Deletion Failed";
      }
    }
    ?>
    <!-- Fetching prices of all materials from the database -->
    <?php
    $material_prices = array();
    $query = mysqli_query($conn, "SELECT pro_name, pro_price FROM price");
    while ($row = mysqli_fetch_assoc($query)) {
      $material_prices[$row['pro_name']] = $row['pro_price'];
    }
    ?>

    <!-- JavaScript to update the price field -->
    <script>
      // Define a JavaScript object to store material prices
      var materialPrices = <?php echo json_encode($material_prices); ?>;

      // Function to update price field based on selected raw material
      function updatePrice() {
        var selectedMaterial = document.getElementById("stomaterial").value;
        var priceInput = document.getElementById("stopri");
        var quantityInput = document.getElementById("stocurqua");

        if (selectedMaterial && materialPrices[selectedMaterial]) {
          priceInput.value = materialPrices[selectedMaterial]; // Set the purchase price input
          quantityInput.value = document.querySelector('#stomaterial option:checked').getAttribute('data-quantity'); // Retrieve and set the product quantity input
        } else {
          priceInput.value = "";
          quantityInput.value = ""; // Clear fields if no material is selected
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
                <h1 class="card-title">Stock Transfer</h1>
                <p class="card-description">Stock Transfer Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="pri_id" id="pri_id">
                  <div class="row">
                    <div class="col-lg-6 col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product</label>
                        <select class="form-control" name="stomaterial" id="stomaterial" onchange="updatePrice()">
                          <option selected>Select the Product</option>
                          <?php
                          $query = mysqli_query($conn, "SELECT pri_id, pro_name, pro_curquantity FROM price");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $pro_id = $row["pri_id"];
                            $pro_name = $row["pro_name"];
                            $pro_quantity = $row["pro_curquantity"];
                          ?>
                            <option value="<?php echo $pro_name; ?>" data-quantity="<?php echo $pro_quantity; ?>" <?php if ($row['pro_name'] == $sh_raw1) {
                                                                                                                    echo 'selected';
                                                                                                                  } ?>><?php echo $pro_name; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="stoqua" id="stocurqua" value="<?php echo $stoqua1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="stoloc" value="<?php echo $stoloct1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Purchased Price</label>
                        <input type="number" class="form-control" name="stopri" id="stopri" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submitsto">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
        if (isset($_POST["submitsto"])) {
          $stomat = $_POST["stomaterial"];
          $stoqua = $_POST["stoqua"];
          $stoloct = $_POST["stoloc"];
          $stopri = $_POST["stopri"];
          $priId = $_POST["pri_id"];

          // $total = $stopri * ($stogst / 100);
          $stototal = intval($stoqua) * intval($stopri);

          // Fetch the shake ID from the form
          $sto_id = $_POST["stoid"];

          if ($sto_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO stock (stock_proid, stock_proname, stock_quantity, stock_location, stock_price, stock_total, stock_date)
                                         VALUES ('$priId','$stomat','$stoqua','$stoloct','$stopri','$stototal', NOW())");
          } else {
            // Update shake
            $sql = mysqli_query($conn, "UPDATE stock SET stock_proid='$priId', stock_proname='$stomat', stock_quantity='$stoqua', stock_location='$stoloct', stock_price='$stopri', stock_total='$stototal' WHERE stock_id='$sto_id'");
          }
          if ($sql == TRUE) {
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
                <h4 class="card-title">Stock</h4>
                <div class="row">
                  <div class="col-md-9">
                    <p class="card-description">Stock Details</p>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Slno</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Remaining Quantity</th>
                        <th>Location</th>
                        <!-- <th>Price</th> -->
                        <th>Total</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM stock ORDER BY stock_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $stock_id = $row['stock_id'];
                      $stock_product = $row['stock_proname'];
                      $stock_quan = $row['stock_quantity'];
                      $stock_location = $row['stock_location'];
                      $stock_price = $row['stock_price'];
                      $stock_total = $row['stock_total'];
                      $stock_date = $row['stock_date'];
                      $sql = mysqli_query($conn, "SELECT pro_curquantity FROM price ");
                      while ($row = mysqli_fetch_assoc($sql)) {
                        $stock_curquan1 = $row['pro_curquantity'];
                      }
                    ?>
                      <tbody>
                        <tr>
                          <td>
                            <a href="admin-stocktrans.php?stoid=<?php echo $stock_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i class="ti-pencil-alt btn-icon-append"></i>
                            </a>
                          </td>
                          <td>
                            <a href="admin-stocktrans.php?stod_id=<?php echo $stock_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete<i class="ti-trash btn-icon-prepend"></i>
                            </a>4
                          </td>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td class="py-1"><?php echo $stock_product; ?></td>
                          <td><?php echo $stock_quan; ?></td>
                          <td><?php echo $stock_curquan1; ?></td>
                          <td><?php echo $stock_location; ?></td>
                          <td><?php echo $stock_total; ?></td>
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
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All
            rights reserved.</span>
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