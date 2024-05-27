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
  <title>Admin Program</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/icon-small.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- including the sidebar,navbar -->
    <?php
    include './topbar.php';
    ?>
    <?php
    if (isset($_GET['prid'])) {
      $progid = $_GET['prid'];
      $pr_query = mysqli_query($conn, "SELECT * FROM program WHERE program_id = '$progid'");
      $pr_row1 = mysqli_fetch_array($pr_query);

      $pr_name1 = $pr_row1['program_name'];
      $pr_date1 = $pr_row1['program_date'];
      $pr_time1 = $pr_row1['program_time'];
      $pr_location1 = $pr_row1['program_venue'];
      $pr_img1 = $pr_row1['program_img'];
    }
    // fetching the data from the URL for deleting the subject form
    if (isset($_GET['prd_id'])) {
      $dl_id = $_GET['prd_id'];
      $dl_query = mysqli_query($conn, "SELECT * FROM program WHERE program_id = '$dl_id'");
      $dl_row1 = mysqli_fetch_array($dl_query);
      $img = '../images/program/' . $dl_row1['program_img'];
      $del = mysqli_query($conn, "DELETE FROM program WHERE program_id='$dl_id'");
      if ($del) {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-program.php");
      } else {
        echo "Deletion Failed";
      }
    }
    ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <!-- Form -->
              <div class="card-body">
                <h1 class="card-title">Program</h1>
                <p class="card-description">Add Program Details</p>
                <form method="post" enctype="multipart/form-data" class="forms-sample">
                  <input type="hidden" name="prid" value="<?php echo $progid; ?>">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Program Name</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Enter Program name" name="pname" value="<?php echo $pr_name1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Venue / Location</label>
                        <input type="text" class="form-control" style="border-radius: 16px;" placeholder="Enter Location" name="plocation" value="<?php echo $pr_location1; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Program Date</label>
                        <input type="date" class="form-control" style="border-radius: 16px;" name="pdate" value="<?php echo $pr_date1; ?>" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="exampleSelectGender">Program Time</label>
                        <input type="time" class="form-control" style="border-radius: 16px;" name="ptime" value="<?php echo $pr_time1; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Program Image</label>
                      <div class="input-group mb-3">
                        <input type="file" class="custom-file-input form-control file-upload-info" style="border-radius: 16px;" id="inputGroupFile01" name="prgimg" onchange="displaySelectedFileName(this)" value="<?php echo $pr_img1; ?>" required>
                        <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                        <input type="hidden" style="border-radius: 16px;" name="current_primg" value="<?php echo $pr_img1; ?>">
                      </div>
                    </div>
                  </div>
              <!-- </div> -->
              <button type="submit" class="btn btn-primary mr-2 rounded-pill" name="submitpr">Submit</button>
              <a href="./admin-program.php" class="btn btn-light rounded-pill">Cancel</a>
              </form>
            </div>
            <!-- Form Closed -->
          </div>
        </div>
        <!-- PHP CODE FOR INSERTING THE DATA -->
        <?php
        if (isset($_POST["submitpr"])) {
          $pr_id = $_POST["prid"];
          $pr_name = $_POST["pname"];
          $pr_location = $_POST["plocation"];
          $pr_date = $_POST["pdate"];
          $pr_time = $_POST["ptime"];
          $pr_img = $_FILES['prgimg']['name'];

          // Image uploading formats
          $filename = $_FILES['prgimg']['name'];
          $tempname = $_FILES['prgimg']['tmp_name'];

          // Fetch the shake ID from the form
          $pr_id = $_POST["prid"];

          if ($pr_id == '') {
            $sql = mysqli_query($conn, "INSERT INTO program (program_name, program_date, program_time, program_venue, program_img) 
                         VALUES ('$pr_name','$pr_date','$pr_time','$pr_location','$pr_img')");
          } else {
            if ($filename) {
              // Remove the existing image
              $imgs = '../images/program/' . $pr_img;
              if (file_exists($imgs)) {
                unlink($imgs);
              }
              // Update shake with new image
              $sql = mysqli_query($conn, "UPDATE program SET program_name='$pr_name', program_img='$pr_img', program_date='$pr_date', program_time='$pr_time', program_venue='$pr_location' WHERE program_id='$pr_id'");
            }
            $sql = mysqli_query($conn, "UPDATE program SET program_name='$pr_name', program_date='$pr_date', program_time='$pr_time', program_venue='$pr_location' WHERE program_id='$pr_id'");
          }
          if ($sql == TRUE) {
            move_uploaded_file($tempname, "../images/program/$filename");
            echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
          } else {
            echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
          }
        }
        ?>
        <!-- table view -->
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Program</h4>
              <p class="card-description">Program Details</p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>sl-no</th>
                      <th>Program Name</th>
                      <th>Program images</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Program Venue</th>
                    </tr>
                  </thead>
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM program ORDER BY program_id ");
                  $serialNo = 1;
                  while ($row = mysqli_fetch_assoc($sql)) {
                    $pro_id = $row['program_id'];
                    $pro_name = $row['program_name'];
                    $pro_img = $row['program_img'];
                    $pro_date = $row['program_date'];
                    $pro_time = $row['program_time'];
                    $pro_venue = $row['program_venue'];
                  ?>
                    <tbody>
                      <tr>
                        <td>
                          <a href="admin-program.php?prid=<?php echo $pro_id; ?>" class="btn btn-inverse-secondary btn-icon-text p-2">Edit
                            <i class="ti-pencil-alt btn-icon-append"></i>
                          </a>
                        </td>
                        <td>
                          <a href="admin-program.php?prd_id=<?php echo $pro_id; ?>" class="btn btn-inverse-danger btn-icon-text p-2">Delete
                            <i class="ti-trash btn-icon-prepend"></i>
                          </a>
                        </td>
                        <td class="py-1"><?php echo $serialNo++; ?></td>
                        <td><?php echo $pro_name; ?></td>
                        <td><img src="../images/program/<?php echo $pro_img; ?>" alt=""></td>
                        <td><?php echo $pro_date; ?></td>
                        <td><?php echo $pro_time; ?></td>
                        <td><?php echo $pro_venue; ?></td>

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
        <!-- table view closed -->
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All rights reserved.</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <script>
    function displaySelectedFileName(input) {
      var fileName = input.files[0].name;
      var label = input.nextElementSibling;
      label.innerText = fileName;

      // Display selected image
      var fileReader = new FileReader();
      fileReader.onload = function(e) {
        var img = document.createElement("img");
        img.src = e.target.result;
        img.style.width = "350px"; // Set width
        img.style.height = "auto"; // Maintain aspect ratio
        img.style.borderRadius = "8px"; // Border radius
        img.style.marginTop = "50px"; // Optional margin
        label.parentNode.appendChild(img);
      };
      fileReader.readAsDataURL(input.files[0]);
    }
  </script>
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>