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
  <title>Admin Price</title>
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
      $p_cat1 = $p_row1['pro_category'];
      $p_subcat1 = $p_row1['pro_subcat'];
      $p_mrp1 = $p_row1['pro_mrp'];
      $p_pri1 = $p_row1['pro_price'];
      $p_dis151 = $p_row1['pro_dis15'];
      $p_dis251 = $p_row1['pro_dis25'];
      $p_dis351 = $p_row1['pro_dis35'];
      $p_dis421 = $p_row1['pro_dis42'];
      $p_dis501 = $p_row1['pro_dis50'];
      $p_vp1 = $p_row1['pro_vp'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['pd_id'])) {
      $dl_id = $_GET['pd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM price WHERE pri_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $del = mysqli_query($conn, "DELETE FROM price WHERE pri_id='$dl_id'");
      if ($del) {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-price.php");
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
                <h1 class="card-title">Product Price</h1>
                <p class="card-description">Add Product Discount Details</p>
                <form method="post" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="prid" value="<?php echo $priid; ?>">
                  <div class="row">
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="prodcode" value="<?php echo $p_code1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="prodname" value="<?php echo $p_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product MRP</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="prodmrp" value="<?php echo $p_mrp1; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg col-md col-sm col-12">
                      <div class="form-group">
                        <label>Product Purchase Price</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="prodpur" value="<?php echo $p_pri1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <p>Discount Price</p> <br>
                    <div class="col">
                      <div class="form-group">
                        <label>15%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="dis15" value="<?php echo $p_dis151; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>25%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="dis25" value="<?php echo $p_dis251; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>35%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="dis35" value="<?php echo $p_dis351; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>42%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="dis42" value="<?php echo $p_dis421; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>50%</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="dis50" id="dis50" value="<?php echo $p_dis501; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="prodcat" value="<?php echo $p_cat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Subcategory</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" name="prodsubcat" value="<?php echo $p_subcat1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>VP</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Volume Point" name="provp" value="<?php echo $p_vp1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitp">Submit</button>
                  <a href="./admin-price.php" type="reset" class="btn btn-light rounded-pill">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
        if (isset($_POST["submitp"])) {
          $pcode = $_POST["prodcode"];
          $pname = $_POST["prodname"];
          $pcat = $_POST["prodcat"];
          $psubcat = $_POST["prodsubcat"];
          $pmrp = $_POST["prodmrp"];
          $ppur = $_POST["prodpur"];
          $pdis15 = $_POST["dis15"];
          $pdis25 = $_POST["dis25"];
          $pdis35 = $_POST["dis35"];
          $pdis42 = $_POST["dis42"];
          $pdis50 = $_POST["dis50"];
          $pvp = $_POST["provp"];

          // Fetch the shake ID from the form
          $pri_id = $_POST["prid"];

          if ($pri_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO price (pro_name, pro_code, pro_category, pro_subcat, pro_mrp, pro_price, pro_dis0, pro_dis15, pro_dis25, pro_dis35, pro_dis42, pro_dis50, pro_vp)
                                         VALUES ('$pname','$pcode','$pcat','$psubcat','$pmrp','$ppur','$pmrp','$pdis15','$pdis25','$pdis35','$pdis42','$pdis50','$pvp')");
          } else {
            // Update shake
            $sql = mysqli_query($conn, "UPDATE price SET pro_name='$pname', pro_code='$pcode', pro_category='$pcat', pro_subcat='$psubcat', pro_mrp='$pmrp', pro_price='$ppur', pro_dis0='$pmrp', pro_dis15='$pdis15', pro_dis25='$pdis25', pro_dis35='$pdis35', pro_dis42='$pdis42', pro_dis50='$pdis50', pro_vp='$pvp' WHERE pri_id='$pri_id'");
          }
          if ($sql == TRUE) {
            echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
            echo "<script>document.querySelector('form').reset();</script>";
          } else {
            echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
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
                        <th>Delete</th>
                        <th>Slno</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>MRP</th>
                        <th>Purchased Price</th>
                        <th>VP</th>
                        <th>15% Discount</th>
                        <th>25% Discount</th>
                        <th>35% Discount</th>
                        <th>42% Discount</th>
                        <th>50% Discount</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM price ORDER BY pri_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $pri_id = $row['pri_id'];
                      $pri_cod = $row['pro_code'];
                      $pri_nam = $row['pro_name'];
                      $pri_cat = $row['pro_category'];
                      $pri_subcat = $row['pro_subcat'];
                      $pri_mrp = $row['pro_mrp'];
                      $pri_pri = $row['pro_price'];
                      $pri_vp = $row['pro_vp'];
                      $pri_dis15 = $row['pro_dis15'];
                      $pri_dis25 = $row['pro_dis25'];
                      $pri_dis35 = $row['pro_dis35'];
                      $pri_dis42 = $row['pro_dis42'];
                      $pri_dis50 = $row['pro_dis50'];
                    ?>
                      <tbody>
                        <tr>
                          <td><a href="admin-price.php?pid=<?php echo $pri_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit<i class="ti-pencil-alt btn-icon-append"></i></a></td>
                          <td><a href="admin-price.php?pd_id=<?php echo $pri_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2" onclick="return confirmDelete();">Delete<i class="ti-trash btn-icon-prepend"></i></a></td>
                          <td class="py-1"><?php echo $serialNo++; ?></td>
                          <td class="py-1"><?php echo $pri_cod; ?></td>
                          <td><?php echo $pri_nam; ?></td>
                          <td><?php echo $pri_cat; ?></td>
                          <td><?php echo $pri_subcat; ?></td>
                          <td><?php echo $pri_mrp; ?></td>
                          <td><?php echo $pri_pri; ?></td>
                          <td><?php echo $pri_vp; ?></td>
                          <td><?php echo $pri_dis15; ?></td>
                          <td><?php echo $pri_dis25; ?></td>
                          <td><?php echo $pri_dis35; ?></td>
                          <td><?php echo $pri_dis42; ?></td>
                          <td><?php echo $pri_dis50; ?></td>
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
    document.addEventListener('DOMContentLoaded', function() {
      // Get the input element for 50% discount
      const dis50Input = document.getElementById('dis50');

      // Get the input element for Product Purchase Price
      const prodpurInput = document.getElementsByName('prodpur')[0]; // Assuming there's only one input with this name

      // Update the value of 50% discount input based on Product Purchase Price input
      prodpurInput.addEventListener('input', function() {
        dis50Input.value = prodpurInput.value; // Set the value of dis50Input to prodpurInput value
      });
    });
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>