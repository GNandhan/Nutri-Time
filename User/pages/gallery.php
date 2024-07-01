<?php
include './connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutri-time Gallery</title>
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

    body {
      background-color: rgb(250, 250, 250);
      font-family: "Outfit", sans-serif;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid bg-white shadow-sm">
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-2 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img src="../images/icon.png" class="icon1 me-2" width="90"></a>
        <ul class="nav">
          <li class="nav-item"><a href="../../index.html" class="nav-link text-dark">Home</a></li>
          <li class="nav-item"><a href="./program.php" class="nav-link text-dark">Program</a></li>
          <li class="nav-item"><a href="./gallery.php" class="nav-link text-success border-bottom border-2 border-success text-success">Gallery</a></li>
          <li class="nav-item"><a href="./product.php" class="nav-link text-dark">Product</a></li>
          <li class="nav-item"><a href="./contact.php" class="nav-link text-dark">Contact</a></li>
          <li class="nav-item"><a href="./login.php" class="nav-link text-dark">Sign in</a></li>
        </ul>
      </header>
    </div>
  </div>
  <!-- navbar closed -->
  <!-- Gallery Images -->
  <div class="container">
    <div class="row">
      <div class="h2 py-4 px-5 border-start bg-white rounded-5 shadow">Gallery</div>
      <div class="card border-0 shadow-lg rounded-5">
        <div class="row text-center p-4">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM gallery ORDER BY gallery_id ");
          while ($row = mysqli_fetch_assoc($sql)) {
            $gal_name = $row['gallery_dis'];
            $gal_img = $row['gallery_img'];
          ?>
            <div class="col-lg-3 col-md col-sm-6 col my-2">
              <div class="card rounded-4 shadow-lg d-flex flex-column border-0 h-100" style="height: 200px; object-fit: cover; border-radius: 20px 20px 0px 0px">
                <img src="../../Admin/images/gallery/<?php echo $gal_img; ?>" class="rounded-top-4" alt="..." style="height: 200px; object-fit: cover; border-radius: 20px 20px 0px 0px">
                <!-- <div class="card-body">
                <p class="card-text"><?php echo $gal_name; ?></p>
              </div> -->
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Gallery Images Closed -->
  <!-- footer -->
  <footer class="d-flex container fixed-bottom flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <p>Powered by <a href="https://zionitedu.com/" class="text-decoration-none"><span class="text-danger">Zion</span> IT Company</a></p>
    </div>
    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x" width="24" height="24"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" target="_blank" href="https://www.instagram.com/nutritimenutritionclub/"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
    </ul>
  </footer>
  <!-- Footer closed -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>