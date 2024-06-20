<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Report</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>

<body>
  <div class="container-scroller">
    <?php
    include './topbar.php';
    ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <!-- table view -->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h4 class="card-title">Report Table</h4>
                    <p class="card-description">Complete Sales and Overview Report Details</p>
                  </div>
                  <div class="col-12 col-xl-4 mb-4 mb-xl-0 text-right">
                    <button class="btn btn-primary rounded-pill">Export</button>
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
                      <tr>
                        <td class="py-1">#00A001</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- table view closed -->
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>