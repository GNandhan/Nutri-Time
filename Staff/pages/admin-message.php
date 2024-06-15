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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Gallery</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/icon-small.png" />
  <style>
    .large-checkbox {
      transform: scale(1.5);
      margin: 5px;
      /* Adjust the margin to fit the larger checkbox */
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- including the sidebar,navbar -->
    <?php
    include './topbar.php';
    ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Message Details</h4>
                <p class="card-description">Add Message Content</p>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleTextarea1">Message content</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Thank You For choosing Nutri-Time. Your Program Id id #00Ad001"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary mr-2 rounded-pill" data-toggle="modal" data-target="#staticBackdrop">Send individually</button>
                  <button type="submit" class="btn btn-primary mr-2 rounded-pill">Broadcast</button>
                  <button class="btn btn-light rounded-pill">Cancel</button>
                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" style="border-radius: 20px;">
                        <div class="modal-header">
                          <h4 class="modal-title" id="staticBackdropLabel">Customers List</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-hover">
                            <tbody>
                              <?php
                              $sql = mysqli_query($conn, "SELECT * FROM customer ORDER BY cust_id ");
                              while ($row = mysqli_fetch_assoc($sql)) {
                                $u_id = $row['cust_id'];
                                $u_name = $row['cust_name'];
                              ?>
                                <tr>
                                  <td style="width: 6%;"><input type="checkbox" class="large-checkbox"></td>
                                  <td style="width: 50%;"><?php echo htmlspecialchars($u_name); ?></td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Send Message</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:../../partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All
            rights reserved.</span>
        </div>
      </footer>
    </div>
    <!-- </div> -->
  </div>
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/template.js"></script>
</body>

</html>