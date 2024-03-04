<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email"]=="")
 {
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
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
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
if(isset($_GET['prid']))
{
    $progid = $_GET['prid'];
    $pr_query = mysqli_query($conn,"SELECT * FROM program WHERE program_id = '$progid'");
    $pr_row1=mysqli_fetch_array($pr_query);

        $pr_name1 = $pr_row1['program_name'];
        $pr_purpose1 = $pr_row1['program_purpose'];
        $pr_dur1 = $pr_row1['program_duration']; 
        $pr_age1 = $pr_row1['program_age']; 
        $pr_fee1 = $pr_row1['program_fee']; 
        $pr_cond1 = $pr_row1['program_condition']; 
        $pr_mode1 = $pr_row1['program_mode']; 
}
// fetching the data from the URL for deleting the subject form
if(isset($_GET['prd_id']))
{
    $dl_id = $_GET['prd_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM program WHERE program_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../images/material/'.$dl_row['pro_image'];
    $del = mysqli_query($conn,"DELETE FROM program WHERE program_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-program.php");
    }
    else
    {
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
                  <p class="card-description">
                    Add Program Details
                  </p>
                  <form method="post" class="forms-sample">
                  <input type="hidden" name="prid" value="<?php echo $progid; ?>">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Program Name</label>
                          <input type="text" class="form-control"  placeholder="Weight Gainer" name="pname" value="<?php echo $pr_name1; ?>" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Purpose</label>
                          <input type="text" class="form-control"  placeholder="Weight Gainer" name="ppurpose" value="<?php echo $pr_purpose1; ?>" required>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Duration</label>
                            <select class="form-control"  name="pduration" required>
                              <option <?php if($pr_dur1=='10 Days' ) echo 'selected' ; ?> value="10-Days">10 Days</option>
                              <option <?php if($pr_dur1=='20 Days' ) echo 'selected' ; ?> value="20-Days">20 Days</option>
                              <option <?php if($pr_dur1=='25 Days' ) echo 'selected' ; ?> value="25-Days">25 Days</option>
                            </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Age limit</label>
                            <select class="form-control"  name="pagel" required>
                              <option <?php if($pr_age1=='20-30' ) echo 'selected' ; ?>  value="20-30">20-30</option>
                              <option <?php if($pr_age1=='30-50' ) echo 'selected' ; ?>  value="30-50">30-50</option>
                            </select>
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Fee (per/month)</label>
                          <input type="number" class="form-control" name="pfee" value="<?php echo $pr_fee1; ?>" required>
                        </div>
                      </div>
                    </div>      
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Program Condition</label>
                          <input type="text" class="form-control"  name="pcond" value="<?php echo $pr_cond1; ?>" required>
                        </div> 
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleSelectGender">Program Mode</label>
                            <select class="form-control"  name="pmode"  required>
                              <option <?php if($pr_mode1=='Online' ) echo 'selected' ; ?> value="Online">Online</option>
                              <option <?php if($pr_mode1=='Offline' ) echo 'selected' ; ?> value="Offline">Offline</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2"  name="submitpr">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
                <!-- Form Closed -->
              </div>
            </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
if(isset($_POST["submitpr"])) 
{ 
    $pr_id= $_POST["prid"];
    $pr_name= $_POST["pname"];
    $pr_purpose= $_POST["ppurpose"];
    $pr_dur= $_POST["pduration"];
    $pr_age= $_POST["pagel"];
    $pr_fee= $_POST["pfee"];
    $pr_cond= $_POST["pcond"];
    $pr_mode= $_POST["pmode"];

    if($pr_id=='')
    {
      $sql = mysqli_query($conn,"INSERT INTO program (program_name, program_purpose, program_duration, program_age, program_fee, program_condition, program_mode) 
                         VALUES ('$pr_name','$pr_purpose','$pr_dur','$pr_age','$pr_fee','$pr_cond','$pr_mode')");
    }
    else {
      $sql = mysqli_query($conn, "UPDATE program SET program_name='$pr_name', program_purpose='$pr_purpose', program_duration='$pr_dur', program_age='$pr_age', program_fee='$pr_fee', program_condition='$pr_cond', program_mode='$pr_mode' WHERE program_id='$pr_id'");
  }
  
    if ($sql == TRUE) {
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
                <p class="card-description">
                 Program Details
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>sl-no</th>
                        <th>Program Name</th>
                        <th>Purpose</th>
                        <th>Duration</th>
                        <th>Age Limit</th>
                        <th>Fee</th>
                        <th>Program Conditions</th>
                        <th>Program Mode</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM program ORDER BY program_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $pro_id=$row['program_id'];
    $pro_name=$row['program_name'];
    $pro_pur=$row['program_purpose'];
    $pro_dura=$row['program_duration'];
    $pro_age=$row['program_age']; 
    $pro_fee=$row['program_fee'];
    $pro_con=$row['program_condition']; 
    $pro_mode=$row['program_mode']; 
?>
                    <tbody>
                      <tr>
                        <td class="py-1">#<?php echo $pro_id; ?></td>
                        <td><?php echo $pro_name; ?></td>
                        <td><?php echo $pro_pur; ?></td>
                        <td><?php echo $pro_dura; ?></td>
                        <td><?php echo $pro_age; ?></td>
                        <td><?php echo $pro_fee; ?></td>
                        <td><?php echo $pro_con; ?></td>
                        <td><?php echo $pro_mode; ?></td>
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
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
