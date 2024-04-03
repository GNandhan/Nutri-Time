<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email"]=="")
 {
    header('location:login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-time Contact</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                <li class="nav-item"><a href="index2.php" class="nav-link text-dark">Home</a></li>
                <li class="nav-item"><a href="./program2.php" class="nav-link text-dark">Program</a></li>
                <li class="nav-item"><a href="./gallery2.php" class="nav-link text-dark">Gallery</a></li>
                <li class="nav-item"><a href="./product2.php" class="nav-link text-dark">Product</a></li>
                <li class="nav-item"><a href="contact2.php" class="nav-link text-success border-bottom border-2 border-success text-success">Contact</a></li>
                <li class="nav-item"><a href="./login.php" class="nav-link text-dark">Log out</a></li>
              </ul>
            </header>
        </div>
     </div>
    <!-- navbar closed -->
<div class="container">
    <div class="row ">
        <div class="col-lg-4 col-md col-sm col">
            <div class="card text-light  p-4 rounded-4 shadow border-0" style="background-color:rgb(44, 202, 44);">
                <div class="h2">Address</div>
                <div>Ashraf K P</div>
                <P class="border-bottom py-3">1st Floor, NUTRI TIME, WELLNESS HUB, NTA Complex Bypass Junction, Mankave Kozhikode, Kerala, 673007 </P>
                <div class="h5">Email id</div>
                <p class="border-bottom">nutritime@gmail.com</p>
                <div class="h5">Contact</div>
                <p>+91 9447737273</p>
            </div>
        </div>
    </div>
</div>
      <!-- footer -->
    <footer class="d-flex flex-wrap container fixed-bottom justify-content-between align-items-center py-3 my-4 border-top">
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