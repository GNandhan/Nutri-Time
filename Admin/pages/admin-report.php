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
                                            // Fetch product details
                                            $sql = "SELECT pri_id, pro_name, pro_quantity, pro_curquantity FROM price";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $pro_id = $row['pri_id'];
                                                    $pro_name = $row['pro_name'];
                                                    $initial_stock = $row['pro_quantity'];
                                                    $current_stock = $row['pro_curquantity'];
                                                    $used = $initial_stock - $current_stock;

                                                    echo "<tr>
                                                            <td>$pro_name</td>
                                                            <td>$initial_stock</td>";

                                                    // Fetch stock and sales data for each day
                                                    $daily_data = [];
                                                    for ($day = 1; $day <= 31; $day++) {
                                                        $date = sprintf('2024-07-%02d', $day);

                                                        // Fetch stock data
                                                        $stock_query = "SELECT SUM(stock_quantity) AS stock_qty FROM stock WHERE stock_proid='$pro_id' AND stock_date='$date'";
                                                        $stock_result = $conn->query($stock_query);
                                                        $stock_qty = $stock_result->num_rows > 0 ? $stock_result->fetch_assoc()['stock_qty'] : 0;

                                                        // Fetch sales data
                                                        $sales_query = "SELECT SUM(sales_quan) AS sales_qty FROM sales WHERE sales_proid='$pro_id' AND sales_date='$date'";
                                                        $sales_result = $conn->query($sales_query);
                                                        $sales_qty = $sales_result->num_rows > 0 ? $sales_result->fetch_assoc()['sales_qty'] : 0;

                                                        $daily_data[$day] = $stock_qty - $sales_qty;
                                                        echo "<td>{$daily_data[$day]}</td>";
                                                    }

                                                    echo "<td>$used</td>
                                                          <td>$current_stock</td>
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
        document.getElementById('exportBtn').addEventListener('click', function () {
            var wb = XLSX.utils.table_to_book(document.getElementById('reportTable'), { sheet: "Sheet JS" });
            XLSX.writeFile(wb, 'report.xlsx');
        });
    </script>
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/template.js"></script>
</body>

</html>
