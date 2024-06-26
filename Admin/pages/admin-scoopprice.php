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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Scoop Price</title>
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
    if (isset($_GET['pid'])) {
      $priid = $_GET['pid'];
      $p_query = mysqli_query($conn, "SELECT * FROM price WHERE pri_id = '$priid'");
      $p_row1 = mysqli_fetch_array($p_query);

      $p_code1 = $p_row1['pro_code'];
      $p_name1 = $p_row1['pro_name'];
      $p_scoop1 = $p_row1['pro_scoop'];
      $p_scoop01 = $p_row1['pro_scoop0'];
      $p_scoop151 = $p_row1['pro_scoop15'];
      $p_scoop251 = $p_row1['pro_scoop25'];
      $p_scoop351 = $p_row1['pro_scoop35'];
      $p_scoop421 = $p_row1['pro_scoop42'];
      $p_scoop501 = $p_row1['pro_scoop50'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['pd_id'])) {
      $dl_id = $_GET['pd_id'];
      $dl_query = mysqli_query($conn, "SELECT pro_scoop, pro_scoop15, pro_scoop25, pro_scoop35, pro_scoop42, pro_scoop50  FROM price WHERE pri_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $del = mysqli_query($conn, "DELETE FROM price WHERE pri_id='$dl_id'");
      if ($del) {
        header("location:admin-scoopprice.php");
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
                <h1 class="card-title">Product Scoop Price</h1>
                <p class="card-description">Add Product Scoop Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="prid" value="<?php echo $pri_id; ?>">
                  <div class="row">
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <select class="form-control" style="border-radius: 16px;" name="proname" id="proname">
                          <option selected>Select the Product</option>
                          <?php
                          $query = mysqli_query($conn, "select * from price");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $pro_id = $row["pro_id"];
                            $pro_name = $row["pro_name"];
                          ?>
                            <option value="<?php echo $pro_name; ?>" <?php if ($row['pro_name'] == $p_name1) {
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
                        <label>No of Scoops</label>
                        <input type="number" class="form-control" style="border-radius: 16px;" name="scoop" value="<?php echo $p_scoop1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <p>Rate per Scoop</p> <br>
                    <div class="col">
                      <div class="form-group">
                        <label>0%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="scoop0" value="<?php echo $p_scoop01; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>15%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="scoop15" value="<?php echo $p_scoop151; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>25%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="scoop25" value="<?php echo $p_scoop251; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>35%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="scoop35" value="<?php echo $p_scoop351; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>42%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="scoop42" value="<?php echo $p_scoop421; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>50%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="scoop50" value="<?php echo $p_scoop501; ?>" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitp">Submit</button>
                  <a href="./admin-scoopprice.php" type="reset" class="btn btn-light rounded-pill">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
        if (isset($_POST["submitp"])) {
          $pname = $_POST["proname"];
          $pscoop = $_POST["scoop"];
          $pscoop0 = $_POST["scoop0"];
          $pscoop15 = $_POST["scoop15"];
          $pscoop25 = $_POST["scoop25"];
          $pscoop35 = $_POST["scoop35"];
          $pscoop42 = $_POST["scoop42"];
          $pscoop50 = $_POST["scoop50"];

          // Check if a product is selected
          if (!empty($pname)) {
            // Retrieve existing record based on selected product name
            $existing_product_query = mysqli_query($conn, "SELECT * FROM price WHERE pro_name = '$pname'");
            $existing_product = mysqli_fetch_assoc($existing_product_query);

            if ($existing_product) {
              // Update existing product record with additional details
              $pri_id = $existing_product['pri_id']; // Get the ID of the existing product
              $sql = mysqli_query($conn, "UPDATE price SET 
                                          pro_scoop = '$pscoop', 
                                          pro_scoop0 = '$pscoop0', 
                                          pro_scoop15 = '$pscoop15', 
                                          pro_scoop25 = '$pscoop25', 
                                          pro_scoop35 = '$pscoop35', 
                                          pro_scoop42 = '$pscoop42', 
                                          pro_scoop50 = '$pscoop50' 
                                      WHERE pri_id = '$pri_id'");

              if ($sql) {
                echo "<script>alert('Product details added successfully.');</script>";
              } else {
                echo "<script>alert('Error updating details: " . mysqli_error($conn) . "');</script>";
              }
            } else {
              echo "<script>alert('Selected product not found.');</script>";
            }
          } else {
            echo "<script>alert('Please select a product.');</script>";
          }
        }

        ?>
        <div class="row ">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product</h4>
                <div class="row">
                  <div class="col-md-9">
                    <p class="card-description">Product Discount Details</p>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Edit</th>
                        <th>Slno</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>No of Scoops</th>
                        <th>0% Scoop</th>
                        <th>15% Scoop</th>
                        <th>25% Scoop</th>
                        <th>35% Scoop</th>
                        <th>42% Scoop</th>
                        <th>50% Scoop</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM price ORDER BY pri_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $pri_id = $row['pri_id'];
                      $pri_cod = $row['pro_code'];
                      $pri_nam = $row['pro_name'];
                      $pri_scoop = $row['pro_scoop'];
                      $pri_scoop0 = $row['pro_scoop0'];
                      $pri_scoop15 = $row['pro_scoop15'];
                      $pri_scoop25 = $row['pro_scoop25'];
                      $pri_scoop35 = $row['pro_scoop35'];
                      $pri_scoop42 = $row['pro_scoop42'];
                      $pri_scoop50 = $row['pro_scoop50'];
                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-scoopprice.php?pid=<?php echo $pri_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td class="py-1"><?php echo $pri_cod; ?></td>
                          <td><?php echo $pri_nam; ?></td>
                          <td><?php echo $pri_scoop; ?></td>
                          <td><?php echo $pri_scoop0; ?></td>
                          <td><?php echo $pri_scoop15; ?></td>
                          <td><?php echo $pri_scoop25; ?></td>
                          <td><?php echo $pri_scoop35; ?></td>
                          <td><?php echo $pri_scoop42; ?></td>
                          <td><?php echo $pri_scoop50; ?></td>
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
</body>

</html>