<?php
 include './connect.php';
 error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-time Product</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Example using Font Awesome for the play button icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
        body{
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
            </a>
            <ul class="nav">
              <li class="nav-item"><a href="../../index.html" class="nav-link text-dark">Home</a></li>
              <li class="nav-item"><a href="./program.php" class="nav-link text-dark">Program</a></li>
              <li class="nav-item"><a href="./gallery.php" class="nav-link text-dark">Gallery</a></li>
              <li class="nav-item"><a href="./product.php" class="nav-link text-success border-bottom border-2 border-success text-success">Product</a></li>
              <li class="nav-item"><a href="./contact.php" class="nav-link text-dark">Contact</a></li>
              <li class="nav-item"><a href="./login.php" class="nav-link text-dark">Sign in</a></li>
            </ul>
          </header>
      </div>
   </div>
<!-- navbar closed -->
<!-- Program cards -->
<div class="container">
    <div class="row">
      <div class="h2 py-4 px-5 border-start bg-white rounded-5 shadow">Product</div>
      <div class="card border-0 shadow-lg rounded-5">
        <div class="row text-center p-4">
        <?php  
            $sql = mysqli_query($conn, "SELECT * FROM product ORDER BY product_id");
            $modalIndex = 0;
            while ($row = mysqli_fetch_assoc($sql)) {
                $pro_name = $row['product_name'];
                $pro_img = $row['product_img'];
                $pro_desc = $row['product_desc'];
                $modalIndex++;
            ?>
<div class="col-lg-3 col-md col-sm-6 col my-3">
  <div class="card rounded-4 shadow d-flex flex-column border-0 h-100" style="height: 200px; object-fit: cover; border-radius: 20px;">
    <img src="../../Admin/images/product/<?php echo $pro_img; ?>" class="rounded-top-4" alt="..." style="height: 200px; object-fit: cover; border-radius: 20px 20px 0px 0px;">
    <div class="card-body d-flex justify-content-between align-items-center">
      <p class="card-text"><?php echo $pro_name; ?></p>
      <!-- <p class="card-text">$<?php echo $pro_mrp; ?></p> Assuming $pro_price contains the price -->
    </div>
    <div class="card-footer bg-transparent border-top-0">
      <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#productModalLabel<?php echo $modalIndex; ?>">View Product</div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="productModalLabel<?php echo $modalIndex; ?>" tabindex="-1" aria-labelledby="productModalLabel<?php echo $modalIndex; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="productModalLabel<?php echo $modalIndex; ?>"><?php echo $pro_name; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="../../Admin/images/product/<?php echo $pro_img; ?>" class="rounded-4" alt="Product Image" width="80%">
          <div><?php echo $pro_name; ?></div>
          <div><?php echo $pro_cat; ?></div>
          <div><?php echo $pro_desc; ?></div>
      </div>
      <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn text-white" style="background-color: rgb(44, 202, 44);">Buy Now</button> -->
      <!-- </div> -->
    </div>
  </div>
</div>
<!-- modal closed -->
<?php
        }
?>
        </div>
      </div>
    </div>
  </div>
<!-- Program cards -->
<!-- footer -->
<footer class="d-flex container fixed-bottom flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
      <p>Powered by <a href="https://allenzion.com/" class="text-decoration-none">Allen<span class="text-danger">Zion</span></a></p>
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