<?php
include './connect.php';
error_reporting(0);
session_start();
if ($_SESSION["email"] == "") {
  header('location:admin-login.php');
}
// Fetch the customer's name based on the logged-in user's email
$email = $_SESSION["email"];
$query = mysqli_query($conn, "SELECT `admin_name` FROM `admin` WHERE `admin_mail`='$email'");
if ($row = mysqli_fetch_assoc($query)) {
  $AdminName = $row['admin_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin-Dashboard</title>
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
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome <?php echo $AdminName; ?> </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-flex align-items-center">
          <!-- newly arrived product carousel -->
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg" style="position: relative;">
              <!-- Newly Arrived Product text -->
              <div style="position: absolute; top: 10px; left: 10px; z-index: 1; background-color: rgba(255, 255, 255, 0.322); padding: 10px; border-radius: 10px;">
                <h4>Newly Arrived Product</h4>
              </div>
              <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM product ORDER BY product_id ");
                  $firstItem = true; // Variable to track the first item
                  while ($row = mysqli_fetch_assoc($sql)) {
                    $pro_img = $row['product_img'];
                  ?>
                    <div class="carousel-item <?php if ($firstItem) {
                                                echo 'active';
                                                $firstItem = false;
                                              } ?>">
                      <img src="../images/product/<?php echo htmlspecialchars($pro_img, ENT_QUOTES, 'UTF-8'); ?>" class="d-block w-100 img-fluid" alt="Product Image" style="object-fit: cover; height: 300px; border-radius: 20px;">
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>

          <?php
          // Query to get the counts
          $result = $conn->query("SELECT COUNT(*) AS customer_count FROM customer WHERE cust_prgtype = 'Online'");
          $row = $result->fetch_assoc();
          $cateringonline_count = $row['customer_count'];

          $result = $conn->query("SELECT COUNT(*) AS customer_count FROM customer WHERE cust_prgtype = 'Offline'");
          $row = $result->fetch_assoc();
          $customeroffline_count = $row['customer_count'];

          $result = $conn->query("SELECT COUNT(*) AS staff_count FROM staff");
          $row = $result->fetch_assoc();
          $staff_count = $row['staff_count'];

          $result = $conn->query("SELECT COUNT(*) AS customer_count FROM customer");
          $row = $result->fetch_assoc();
          $customer_count = $row['customer_count'];
          ?>
          <!-- newly arrived product carousel -->
          <div class="col-md-6 grid-margin transparent">
            <div class="row">
              <div class="col-md-6 col-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                    <p class="mb-4">Online Customer</p>
                    <h2 class="fs-3 mb-2"><?php echo $cateringonline_count; ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Offline Customer</p>
                    <h2 class="fs-3 mb-2"><?php echo $customeroffline_count; ?></h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-6 mb-4 stretch-card transparent">
                <div class="card card-light-blue">
                  <div class="card-body">
                    <p class="mb-4">Number of Staff</p>
                    <h2 class="fs-3 mb-2"><?php echo $staff_count; ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-6 mb-4 stretch-card transparent">
                <div class="card card-light-danger">
                  <div class="card-body">
                    <p class="mb-4">Number of Clients</p>
                    <h2 class="fs-3 mb-2"><?php echo $customer_count; ?></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
              <div class="card-body">
                <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row">
                        <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                          <div class="ml-xl-4 mt-3">
                            <p class="card-title">Detailed Reports</p>
                            <h1 class="text-primary">Sales</h1>
                            <!-- <h3 class="font-weight-500 mb-xl-4 text-primary">Branch wise</h3> -->
                            <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                          </div>
                        </div>
                        <div class="col-md-12 col-xl-9">
                          <div class="row">
                            <div class="col-md border-right">
                              <div class="table-responsive mb-3 mb-md-0 mt-3">
                                <table class="table table-borderless report-table">
                                  <?php
                                  $sql = mysqli_query($conn, "SELECT * FROM sales ORDER BY sales_id");

                                  // Initialize an array to store the highest sales quantity for each customer
                                  $customer_sales = [];

                                  while ($row = mysqli_fetch_assoc($sql)) {
                                    $sales_cus = $row['sales_cus'];
                                    $sales_quan = $row['sales_quan'];

                                    // Update the sales quantity for the customer if it's higher than the previous value
                                    if (!isset($customer_sales[$sales_cus]) || $customer_sales[$sales_cus] < $sales_quan) {
                                      $customer_sales[$sales_cus] = $sales_quan;
                                    }
                                  }

                                  $colors = ['bg-primary', 'bg-warning', 'bg-danger', 'bg-info']; // Array of Bootstrap color classes
                                  $color_index = 0; // Index to track the color
                                  $max_quantity = 100; // Assuming maximum sales quantity is 100

                                  foreach ($customer_sales as $sales_cus => $sales_quan) {
                                    $progress_width = ($sales_quan / $max_quantity) * 100; // Calculate width of progress bar
                                  ?>
                                    <tr>
                                      <td class="text-muted"><?php echo $sales_cus; ?></td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar <?php echo $colors[$color_index]; ?>" role="progressbar" style="width: <?php echo $progress_width; ?>%" aria-valuenow="<?php echo $progress_width; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0"><?php echo $sales_quan; ?></h5>
                                      </td>
                                    </tr>
                                  <?php
                                    // Increment color index and reset if it exceeds the length of the colors array
                                    $color_index++;
                                    if ($color_index >= count($colors)) {
                                      $color_index = 0;
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
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md stretch-card grid-margin">
            <div class="card">
              <div class="card-body">
                <p class="card-title mb-0">Newly Orders</p>
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="pl-0 pb-2 border-bottom">Product</th>
                        <th class="border-bottom pb-2">Place</th>
                        <th class="border-bottom pb-2">Order</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM stock ORDER BY stock_associate, stock_id");
                      $current_place = null;
                      $total_quantity = 0;

                      while ($row = mysqli_fetch_assoc($sql)) {
                        $stock_id = $row['stock_id'];
                        $stock_product = $row['stock_proname'];
                        $stock_quan = $row['stock_quantity'];
                        $stock_location = $row['stock_associate'];
                        $stock_price = $row['stock_price'];
                        $stock_total = $row['stock_total'];
                        $stock_date = $row['stock_date'];

                        // Check if place has changed
                        if ($stock_location !== $current_place) {
                          // Output row for previous place if not first iteration
                          if ($current_place !== null) {
                            echo '
            <tr>
              <td class="pl-0 pl-4 border-right">' . htmlspecialchars($stock_product, ENT_QUOTES, 'UTF-8') . '</td>
              <td class="border-right">
                <p class="mb-0"><span class="font-weight-bold mr-2">' . htmlspecialchars($current_place, ENT_QUOTES, 'UTF-8') . '</span></p>
              </td>
              <td class="text-muted border-right"><span class="font-weight-bold">' . $total_quantity . '</span></td>
            </tr>';
                          }

                          // Reset total_quantity for the new place
                          $current_place = $stock_location;
                          $total_quantity = 0;
                        }

                        // Add current row quantity to total_quantity
                        $total_quantity += $stock_quan;
                      }

                      // Output last row after loop ends
                      if ($current_place !== null) {
                        echo '
        <tr>
          <td class="pl-0 pl-4 border-right">' . htmlspecialchars($stock_product, ENT_QUOTES, 'UTF-8') . '</td>
          <td class="border-right">
            <p class="mb-0"><span class="font-weight-bold mr-2">' . htmlspecialchars($current_place, ENT_QUOTES, 'UTF-8') . '</span></p>
          </td>
          <td class="text-muted border-right"><span class="font-weight-bold">' . $total_quantity . '</span></td>
        </tr>';
                      }
                      ?>
                    </tbody>
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
  <script src="../js/dashboard.js"></script>
</body>

</html>