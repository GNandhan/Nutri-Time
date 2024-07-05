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
                <div class="table-responsive my-4">
                  <table id="reportTable" class="table table-striped">
                    <h4>PRODUCT STOCK SUMMARY - NC ( <span id="reportMonthYear">JULY 2024</span> )</h4>
                    <thead>
                      <tr>
                        <th>Items</th>
                        <th>Stock</th>
                        <?php
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
                      $sql = "SELECT pri_id, pro_name, pro_code, pro_category, pro_price, pro_quantity, pro_curquantity FROM price";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $used = $row['pro_quantity'] - $row['pro_curquantity'];
                          echo "<tr>
                                  <td>{$row['pro_name']}</td>
                                  <td>{$row['pro_quantity']}</td>";

                          $dayStock = array_fill(1, 31, "");

                          $productId = $row['pri_id'];
                          $stockQuery = "SELECT DAY(stock_date) AS day, SUM(stock_quantity) AS stock_quantity FROM stock WHERE stock_proid = $productId GROUP BY day";
                          $stockResult = $conn->query($stockQuery);

                          while ($stockRow = $stockResult->fetch_assoc()) {
                            $stockDate = $stockRow['day'];
                            $dayStock[$stockDate] = $stockRow['stock_quantity'];
                          }

                          for ($day = 1; $day <= 31; $day++) {
                            echo "<td>{$dayStock[$day]}</td>";
                          }

                          echo "<td>$used</td>
                                <td>{$row['pro_curquantity']}</td>
                                </tr>";
                        }
                      } else {
                        echo "<tr><td colspan='34'>No data available</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                <div class="table-responsive my-5">
                  <table id="salesTable" class="table table-striped">
                    <h4>PRODUCT SALES SUMMARY - NC ( <span id="salesMonthYear">JULY 2024</span> )</h4>
                    <thead>
                      <tr>
                        <th>Items</th>
                        <th>Sold</th>
                        <?php
                        for ($day = 1; $day <= 31; $day++) {
                          echo "<th>$day</th>";
                        }
                        ?>
                        <th>Total Sold</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT sales_proid, sales_proname, SUM(sales_quan) AS total_sold FROM sales GROUP BY sales_proid";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <td>{$row['sales_proname']}</td>
                                  <td>{$row['total_sold']}</td>";

                          $daySales = array_fill(1, 31, "");

                          $productId = $row['sales_proid'];
                          $salesQuery = "SELECT DAY(sales_date) AS day, SUM(sales_quan) AS sales_quan FROM sales WHERE sales_proid = $productId GROUP BY day";
                          $salesResult = $conn->query($salesQuery);

                          while ($salesRow = $salesResult->fetch_assoc()) {
                            $salesDate = $salesRow['day'];
                            $daySales[$salesDate] = $salesRow['sales_quan'];
                          }

                          for ($day = 1; $day <= 31; $day++) {
                            echo "<td>{$daySales[$day]}</td>";
                          }

                          echo "<td>{$row['total_sold']}</td>
                                </tr>";
                        }
                      } else {
                        echo "<tr><td colspan='34'>No data available</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                <div class="table-responsive my-5">
                  <table id="priceTable" class="table table-striped">
                    <h4>PRODUCT PRICE SUMMARY - NC ( <span id="priceMonthYear">JULY 2024</span> )</h4>
                    <thead>
                      <tr>
                        <th>Items</th>
                        <th>Price</th>
                        <?php
                        for ($day = 1; $day <= 31; $day++) {
                          echo "<th>$day</th>";
                        }
                        ?>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT pri_id, pro_name, pro_price FROM price";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <td>{$row['pro_name']}</td>
                                  <td>{$row['pro_price']}</td>";

                          $dayPrices = array_fill(1, 31, "");

                          $productId = $row['pri_id'];
                          $priceQuery = "SELECT DAY(sales_date) AS day, SUM(sales_quan * {$row['pro_price']}) AS total_price FROM sales WHERE sales_proid = $productId GROUP BY day";
                          $priceResult = $conn->query($priceQuery);

                          while ($priceRow = $priceResult->fetch_assoc()) {
                            $priceDate = $priceRow['day'];
                            $dayPrices[$priceDate] = $priceRow['total_price'];
                          }

                          $totalPrice = array_sum($dayPrices);

                          for ($day = 1; $day <= 31; $day++) {
                            echo "<td>{$dayPrices[$day]}</td>";
                          }

                          echo "<td>$totalPrice</td>
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
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Nutri-time. All rights reserved.</span>
        </div>
      </footer>
    </div>
  </div>
  <script>
    document.getElementById('exportBtn').addEventListener('click', function() {
      var wb = XLSX.utils.book_new();

      var ws1 = XLSX.utils.table_to_sheet(document.getElementById('reportTable'));
      XLSX.utils.book_append_sheet(wb, ws1, "Stock Summary");

      var ws2 = XLSX.utils.table_to_sheet(document.getElementById('salesTable'));
      XLSX.utils.book_append_sheet(wb, ws2, "Sales Summary");

      var ws3 = XLSX.utils.table_to_sheet(document.getElementById('priceTable'));
      XLSX.utils.book_append_sheet(wb, ws3, "Price Summary");

      var reportMonthYear = document.getElementById('reportMonthYear').innerText.trim();

      XLSX.writeFile(wb, `Report-${reportMonthYear}.xlsx`);
    });
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>