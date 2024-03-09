<?php
 include './connect.php';
 error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutri-time Index</title>
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- Example using Font Awesome for the play button icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
          <img src="../images/icon.png" class="icon1 me-2" width="90">
          <use xlink:href="#bootstrap" />
          <!-- <span class="fs-4 text-success" >Nutri-Time</span> -->
        </a>
        <ul class="nav">
          <li class="nav-item"><a href="../../index.html" class="nav-link text-dark">Home</a></li>
          <li class="nav-item"><a href="./program.php" class="nav-link text-dark">Program</a></li>
          <li class="nav-item"><a href="./gallery.php"class="nav-link text-success border-bottom border-2 border-success text-success">Gallery</a></li>
          <li class="nav-item"><a href="./product.php" class="nav-link text-dark">Product</a></li>
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

        $sql=mysqli_query($conn,"SELECT * FROM gallery ORDER BY gallery_id ");
        while($row=mysqli_fetch_assoc($sql))
        {
            $gal_name=$row['gallery_dis'];
            $gal_img=$row['gallery_img'];
        ?>
          <div class="col-lg-3 col-md col-sm-6 col my-2">
            <div class="card rounded-4 shadow-lg d-flex flex-column border-0 h-100" style="height: 200px; object-fit: cover; border-radius: 20px 20px 0px 0px">
              <img src="../../Admin/images/gallery/<?php echo $gal_img; ?>" class="rounded-top-4" alt="..." style="height: 200px; object-fit: cover; border-radius: 20px 20px 0px 0px">
              <div class="card-body">
                <p class="card-text"><?php echo $gal_name; ?></p>
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
  <!-- Gallery Images Closed -->

  <!-- footer -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2024 Company, Inc</span>
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary" href="#"><img src="../images/icon-twitter.png" width="24"
              height="24" alt="twitter icon"></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><img src="../images/icon-facebook.png" width="24"
              height="24" alt="facebook icon"></a></li>
        <li class="ms-3"><a class="text-body-secondary" target="_blank"
            href="https://www.instagram.com/nutritimenutritionclub/"><img src="../images/icon-instagram.png" width="24"
              height="24" alt="instagram icon"></a></li>
      </ul>
    </footer>
  </div>
  <!-- Footer closed -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>