<?php
include './connect.php';
// error_reporting(0);
$stoloct1 = $stoqua1 = $sh_raw1 = $sto_id = $stoassoc1 = "";
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
  <title>Admin Stock</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>

<body>
  <div class="container-scroller">
    <?php
    include './topbar.php';
    ?>
    <?php
    if (isset($_GET['stoid'])) {
      $stoid = $_GET['stoid'];
      $sto_query = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = '$stoid'");
      $sto_row1 = mysqli_fetch_array($sto_query);

      $stoproname1 = $sto_row1['stock_proname'];
      $stoqua1 = $sto_row1['stock_quantity'];
      $stoassoc1 = $sto_row1['stock_associate'];
      $storpri1 = $sto_row1['stock_price'];
      $stodate1 = $sto_row1['stock_date'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['stod_id'])) {
      $dl_id = $_GET['stod_id'];
      $del = mysqli_query($conn, "DELETE FROM stock WHERE stock_id='$dl_id'");
      if ($del) {
        header("location:admin-stocktrans.php");
      } else {
        echo "Deletion Failed";
      }
    }
    ?>
    <!-- Fetching prices of all materials from the database -->
    <?php
    $material_prices = array();
    $query = mysqli_query($conn, "SELECT pri_id, pro_name, pro_price FROM price");
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
        var proIdInput = document.getElementById("pro_id");

        if (selectedMaterial && materialPrices[selectedMaterial]) {
          priceInput.value = materialPrices[selectedMaterial]; // Set the purchase price input
          quantityInput.value = document.querySelector('#stomaterial option:checked').getAttribute('data-quantity'); // Retrieve and set the product quantity input
          proIdInput.value = document.querySelector('#stomaterial option:checked').getAttribute('data-proid'); // Retrieve and set the product ID
        } else {
          priceInput.value = "";
          quantityInput.value = ""; // Clear fields if no material is selected
          proIdInput.value = ""; // Clear product ID
        }
      }
    </script>
     <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1 class="card-title">Stock Transfer</h1>
                <p class="card-description">Stock Transfer Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data" id="stockTransferForm">
                  <input type="hidden" name="pri_id" id="pri_id" value="<?php echo isset($stoid) ? $stoid : ''; ?>">
                  <input type="hidden" name="pro_id" id="pro_id" value="">
                  <div id="productEntries">
                    <div class="row product-entry">
                      <div class="col-lg-6 col-md col-sm col-12">
                        <div class="form-group">
                          <label>Product</label>
                          <select class="form-control" style="border-radius: 16px;" name="stomaterial[]" id="stomaterial" onchange="updatePrice(this)">
                            <option selected>Select the Product</option>
                            <?php
                            $query = mysqli_query($conn, "SELECT pri_id, pro_name, pro_curquantity FROM price");
                            while ($row = mysqli_fetch_assoc($query)) {
                              $pro_id = $row["pri_id"];
                              $pro_name = $row["pro_name"];
                              $pro_quantity = $row["pro_curquantity"];
                            ?>
                              <option value="<?php echo $pro_name; ?>" data-quantity="<?php echo $pro_quantity; ?>" data-proid="<?php echo $pro_id; ?>"><?php echo $pro_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" class="form-control" style="border-radius: 16px;" name="stoqua[]" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Purchased Price</label>
                          <input type="number" class="form-control" style="border-radius: 16px;" name="stopri[]" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="stoloc" value="<?php echo $stoassoc1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Stock Transfer Date</label>
                        <input type="date" class="form-control" style="border-radius: 16px;" name="stodate" value="<?php echo $stodate1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-secondary mr-2 rounded-pill" onclick="addProductEntry()">Add Product</button>
                  <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitsto">Submit</button>
                  <button class="btn btn-light rounded-pill">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
if (isset($_POST["submitsto"])) {
  $stoloct = $_POST["stoloc"];
  $stodate = $_POST["stodate"];
  $sto_id = $_POST["pri_id"];

  $stomaterials = $_POST["stomaterial"];
  $stoquas = $_POST["stoqua"];
  $stopris = $_POST["stopri"];
  
  for ($i = 0; $i < count($stomaterials); $i++) {
    $stomat = $stomaterials[$i];
    $stoqua = $stoquas[$i];
    $stopri = $stopris[$i];
    
    $sal_curquan_query = mysqli_query($conn, "SELECT pro_curquantity FROM price WHERE pro_name='$stomat'");
    $sal_curquan_row = mysqli_fetch_assoc($sal_curquan_query);
    $sal_curquan = $sal_curquan_row['pro_curquantity'];
    
    $sal_curquan1 = $sal_curquan - $stoqua;
    
    $stototal = intval($stoqua) * intval($stopri);
    
    if ($sto_id == '') {
      $sql = mysqli_query($conn, "INSERT INTO stock (stock_proname, stock_quantity, stock_associate, stock_price, stock_total, stock_date)
                                  VALUES ('$stomat', $stoqua, '$stoloct', $stopri, $stototal, '$stodate')");
      
      if ($sql) {
        $update_query = mysqli_query($conn, "UPDATE price SET pro_curquantity='$sal_curquan1' WHERE pro_name='$stomat'");
      }
    } else {
      $sql = mysqli_query($conn, "UPDATE stock SET stock_proname='$stomat', stock_quantity=$stoqua, stock_associate='$stoloct', stock_price=$stopri, stock_total=$stototal, stock_date='$stodate' WHERE stock_id='$sto_id'");
    }
    
    if ($sql) {
      $price_query = mysqli_query($conn, "SELECT pro_curquantity, pro_scoop FROM price WHERE pro_name = '$stomat'");
      $price_row = mysqli_fetch_assoc($price_query);
      $pro_curquantity = $price_row['pro_curquantity'];
      $pro_scoop = $price_row['pro_scoop'];
      
      $pro_scoopqua = $pro_curquantity * $pro_scoop;
      
      $update_price = mysqli_query($conn, "UPDATE price SET pro_scoopqua = '$pro_scoopqua' WHERE pro_name = '$stomat'");
      if ($update_price) {
        echo "<script>alert('Sales data inserted successfully.');</script>";
      } else {
        echo "<script>alert('Error updating pro_scoopqua: " . mysqli_error($conn) . "');</script>";
      }
    } else {
      echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
  }
}
?>
        <div class="row">
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
                        <th>Stock Transfer Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Current Quantity</th>
                        <th>Location/Associate</th>
                        <th>Price</th>
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
                      $stock_location = $row['stock_associate'];
                      $stock_price = $row['stock_price'];
                      $stock_total = $row['stock_total'];
                      $stock_date = $row['stock_date'];
                      // Fetch current quantity from the price table based on the product name
                      $currentQuantity = 0; // Default value if no quantity found
                      $currentQuantityQuery = mysqli_query($conn, "SELECT pro_curquantity FROM price WHERE pro_name = '$stock_product'");
                      if ($currentQuantityRow = mysqli_fetch_assoc($currentQuantityQuery)) {
                        $currentQuantity = $currentQuantityRow['pro_curquantity'];
                      }

                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-stocktrans.php?stoid=<?php echo $stock_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-stocktrans.php?stod_id=<?php echo $stock_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete<i class="ti-trash btn-icon-prepend"></i></a>
                          </td>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td><?php echo $stock_date; ?></td>
                          <td class="py-1"><?php echo $stock_product; ?></td>
                          <td><?php echo $stock_quan; ?></td>
                          <td><?php echo $currentQuantity; ?></td>
                          <td><?php echo $stock_location; ?></td>
                          <td><?php echo $stock_price; ?></td>
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
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
  <script>
          function updatePrice(selectElement) {
            var selectedMaterial = selectElement.value;
            var priceInput = selectElement.closest('.product-entry').querySelector('input[name="stopri[]"]');
            var quantityInput = selectElement.closest('.product-entry').querySelector('input[name="stoqua[]"]');

            var materialPrices = <?php echo json_encode($material_prices); ?>;
            if (selectedMaterial && materialPrices[selectedMaterial]) {
              priceInput.value = materialPrices[selectedMaterial];
              quantityInput.value = selectElement.options[selectElement.selectedIndex].getAttribute('data-quantity');
            } else {
              priceInput.value = "";
              quantityInput.value = "";
            }
          }

          function addProductEntry() {
            var newEntry = document.querySelector('.product-entry').cloneNode(true);
            newEntry.querySelectorAll('input').forEach(input => input.value = '');
            newEntry.querySelector('select').selectedIndex = 0;
            document.getElementById('productEntries').appendChild(newEntry);
          }
        </script>                                                       
</body>

</html>