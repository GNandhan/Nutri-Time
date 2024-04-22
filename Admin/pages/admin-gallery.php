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
   <!-- plugins:css -->
   <link rel="stylesheet" href="../vendors/feather/feather.css">
   <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
   <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
   <!-- endinject -->
   <!-- Plugin css for this page -->
   <link rel="stylesheet" href="../vendors/select2/select2.min.css">
   <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
   <!-- endinject -->
   <link rel="shortcut icon" href="../images/icon-small.png" />
 </head>
 <body>
   <div class="container-scroller">
     <!-- including the sidebar,navbar -->
     <?php
      include './topbar.php';
      ?>
     <?php
      if (isset($_GET['eid'])) {
        $gl_id = $_GET['eid'];
        $g_query = mysqli_query($conn, "SELECT * FROM gallery WHERE gallery_id = '$gl_id'");
        $g_row1 = mysqli_fetch_array($g_query);

        $gl_dis1 = $g_row1['gallery_dis'];
        $gl_img1 = $g_row1['gallery_img'];
      }
      // fetching the data from the URL for deleting the subject form
      if (isset($_GET['did'])) {
        $dl_id = $_GET['did'];
        $dl_query = mysqli_query($conn, "SELECT * FROM gallery WHERE gallery_id = '$dl_id'");
        $dl_row1 = mysqli_fetch_array($dl_query);
        $img = '../images/gallery/' . $dl_row1['gallery_img'];
        $del = mysqli_query($conn, "DELETE FROM gallery WHERE gallery_id='$dl_id'");
        if ($del) {
          unlink($img); //for deleting the existing image from the folder
          header("location:admin-gallery.php");
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
               <div class="card-body">
                 <h4 class="card-title">Gallery</h4>
                 <p class="card-description">Add Gallery Image</p>
                 <form class="forms-sample" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="gallid" value="<?php echo $gl_id; ?>">
                   <div class="form-group">
                     <label for="exampleTextarea1">Img Description</label>
                     <input type="text" class="form-control" style="border-radius: 15px;" name="galldis" value="<?php echo $gl_dis1; ?>">
                   </div>
                   <div class="form-group">
                     <label for="exampleTextarea1">Add Images</label>
                     <div class="input-group mb-3">
                       <input type="file" class="custom-file-input form-control file-upload-info" id="inputGroupFile01" name="glimg" onchange="displaySelectedFileName(this)" value="<?php echo $gl_img1; ?>" required>
                       <label class="input-group-text custom-file-label" for="inputGroupFile01">Choose file</label>
                       <input type="hidden" name="current_shimg" value="<?php echo $gl_img1; ?>">
                     </div>
                   </div>
                   <button type="submit" class="btn btn-primary mr-2" name="submitg">Upload</button>
                   <a href="./admin-gallery.php" class="btn btn-light">Cancel</a>
                 </form>
               </div>
             </div>
           </div>
         </div>
         <!-- PHP CODE FOR INSERTING THE DATA -->
         <?php
          if (isset($_POST["submitg"])) {
            $gl_id = $_POST["gallid"];
            $gl_name = $_POST["galldis"];
            $gl_img = $_FILES['glimg']['name'];
            // Image uploading formats
            $filename = $_FILES['glimg']['name'];
            $tempname = $_FILES['glimg']['tmp_name'];
            // Fetch the shake ID from the form
            $gl_id = $_POST["gallid"];

            if ($gl_id == '') {
              $sql = mysqli_query($conn, "INSERT INTO gallery (gallery_dis, gallery_img)
                                         VALUES ('$gl_name','$gl_img')");
            } else {
              // Update existing material
              if ($filename) {
                // Remove the existing image
                $imgs = '../images/gallery/' . $gl_img;
                unlink($imgs);
                // Update shake with new image
                $sql = mysqli_query($conn, "UPDATE gallery SET gallery_dis='$gl_name', gallery_img='$gl_img' WHERE gallery_id='$gl_id'");
              } else {
                // Update shake without changing the image
                $sql = mysqli_query($conn, "UPDATE gallery SET gallery_dis='$gl_name' WHERE gallery_id='$gl_id'");
              }
            }
            if ($sql == TRUE) {
              move_uploaded_file($tempname, "../images/gallery/$filename");
              echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
            } else {
              echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
            }
          }
          ?>
         <div class="row">
           <div class="col-12 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <div class="row row-cols-1 row-cols-md-3">
                   <?php
                    $sql = mysqli_query($conn, "SELECT * FROM gallery ORDER BY gallery_id ");
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $gall_id = $row['gallery_id'];
                      $gall_dis = $row['gallery_dis'];
                      $gall_img = $row['gallery_img'];
                    ?>
                     <div class="col mb-4">
                       <div class="card shadow h-100 d-flex flex-column">
                         <img src="../images/gallery/<?php echo $gall_img; ?>" class="card-img-top" style="height: 200px; object-fit: cover; border-radius: 20px 20px 0px 0px" alt="...">
                         <div class="card-body flex-fill">
                           <p class="card-text"><?php echo $gall_dis; ?></p>
                         </div>
                         <div class="mt-auto card-footer"> <!-- 'mt-auto' will push the button to the bottom -->
                           <a href="admin-gallery.php?eid=<?php echo $gall_id; ?>" class="btn btn-primary">
                             <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                 <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                 <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                               </svg></span></a>
                           <a href="admin-gallery.php?did=<?php echo $gall_id; ?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                               <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                               <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                             </svg></a>
                         </div>
                       </div>
                     </div>
                   <?php
                    }
                    ?>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <!-- content-wrapper ends -->
       <!-- partial:../../partials/_footer.html -->
       <footer class="footer">
         <div class="d-sm-flex justify-content-center justify-content-sm-between">
           <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Nutri-time. All
             rights reserved.</span>
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
   <script src="../vendors/js/vendor.bundle.base.js"></script>
   <!-- endinject -->
   <script src="../js/off-canvas.js"></script>
   <script src="../js/template.js"></script>
 </body>
 </html>