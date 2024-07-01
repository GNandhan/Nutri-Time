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
  <meta http-equiv="refresh" content="3">
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
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg col-md col-sm col-12 col-xl-8 mb-1 mb-xl-0">
                    <h4 class="card-title">Report</h4>
                    <p class="card-description">Complete Sales and Overview Report Details</p>
                  </div>
                  <div class="col-lg col-md col-sm col-12 col-xl-4 mb-4 mb-xl-0 text-right">
                    <button class="btn btn-primary rounded-pill">Export</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-md col-sm col">
                    <h5>Total Customers</h5>
                    <h5>cus</h5>
                    <h5>cus</h5>
                    <h5>cus</h5>
                  </div>
                </div>
                <div class="table-responsive">
                  <table id="reportTable" class="table table-striped">
                    <thead>
                      <tr>
                        <th>Sl No</th>
                        <th>Total Customers</th>
                        <th>Total Products</th>
                        <th>Total Shakes</th>
                        <th>Total revenue</th>
                        <th>Distributed Stock Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $sql = "SELECT pri_id, pro_name, pro_code, pro_category, pro_subcat, pro_mrp, pro_price, pro_dis0, pro_dis15, pro_dis25, pro_dis35, pro_dis42, pro_dis50, pro_vp, pro_vptotal, pro_scoop, pro_scooptotal, pro_scoopqua, pro_scoop0, pro_scoop15, pro_scoop25, pro_scoop35, pro_scoop42, pro_scoop50, pro_quantity, pro_curquantity, pro_hsn, pro_img, pro_date FROM price";
                      // $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <td>" . $row["pri_id"] . "</td>
                                  <td>" . $row["pro_name"] . "</td>
                                  <td>" . $row["pro_code"] . "</td>
                                  <td>" . $row["pro_category"] . "</td>
                                  <td>" . $row["pro_price"] . "</td>
                                  <td>" . $row["pro_curquantity"] . "</td>
                                </tr>";
                        }
                      } else {
                        echo "<tr><td colspan='6'>No data available</td></tr>";
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
  </div>
  <script>
    $(document).ready(function() {
      // Add click event listener to export button
      $(".btn-primary").on('click', function() {
        // Create new jsPDF instance
        var doc = new jsPDF();
        // Get table content
        var tableContent = $("#reportTable").get(0);
        // Add table content to PDF
        doc.autoTable({
          html: tableContent
        });
        // Save or download the PDF file
        doc.save('report.pdf');
      });
    });
  </script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>