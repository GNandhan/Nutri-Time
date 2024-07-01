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
  <title>Admin Report</title>
  <meta http-equiv="refresh" content="10">
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <?php include './topbar.php'; ?>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg col-md col-sm col-12 col-xl-8 mb-1 mb-xl-0">
                    <h4 class="card-title">Report</h4>
                    <p class="card-description">Complete Sales and Overview Report Details</p>
                  </div>
                  <div class="col-lg col-md col-sm col-12 col-xl-4 mb-4 mb-xl-0 text-right">
                    <button class="btn btn-primary rounded-pill" id="exportBtn">Export</button>
                  </div>
                </div>
                <div class="table-responsive">
                  <table id="reportTable" class="table table-striped">
                    <h4>PRODUCT STOCK SUMMARY - NC ( <span>JULY 2024</span> )</h4>
                    <thead>
                      <tr>
                        <th>Items</th>
                        <th>Stock</th>
                        <?php
                        // Generate table headers for each day of the month
                        for ($day = 1; $day <= 31; $day++) {
                          echo "<th>$day</th>";
                        }
                        ?>
                        <th>Used</th>
                        <th>Balance</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT pri_id, pro_name, pro_quantity, pro_curquantity FROM price";
                      $result = $conn->query($sql);
                      
                      // Fetch stock data
                      $stock_sql = "SELECT stock_proid, stock_quantity, stock_date FROM stock WHERE stock_date LIKE '2024-07-%'";
                      $stock_result = $conn->query($stock_sql);
                      $stock_data = [];

                      if ($stock_result->num_rows > 0) {
                        while ($stock_row = $stock_result->fetch_assoc()) {
                          $day = date('j', strtotime($stock_row['stock_date'])); // Day of the month without leading zeros
                          $stock_data[$stock_row['stock_proid']][$day] = $stock_row['stock_quantity'];
                        }
                      }

                      if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                          $used = $row['pro_quantity'] - $row['pro_curquantity'];
                          echo "<tr>
                                  <td>{$row['pro_name']}</td>
                                  <td>{$row['pro_quantity']}</td>";
                          // Generate columns for each day of the month
                          for ($day = 1; $day <= 31; $day++) {
                            $quantity = isset($stock_data[$row['pri_id']][$day]) ? $stock_data[$row['pri_id']][$day] : 0;
                            echo "<td>$quantity</td>";
                          }
                          echo "<td>$used</td>
                                <td>{$row['pro_curquantity']}</td>
                                </tr>";
                        }
                      } else {
                        echo "<tr><td colspan='34'>No data available</td></tr>";
                      }

                      $conn->close();
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
  <script>
    document.getElementById('exportBtn').addEventListener('click', function() {
      var wb = XLSX.utils.table_to_book(document.getElementById('reportTable'), { sheet: "Sheet JS" });
      XLSX.writeFile(wb, 'report.xlsx');
    });
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>
