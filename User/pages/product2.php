<?php
include './connect.php';
error_reporting(0);
session_start();
if ($_SESSION["email"] == "") {
  header('location:login.php');
}
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
          <li class="nav-item"><a href="./index2.php" class="nav-link text-dark">Home</a></li>
          <li class="nav-item"><a href="./program2.php" class="nav-link text-dark">Program</a></li>
          <li class="nav-item"><a href="./gallery2.php" class="nav-link text-dark">Gallery</a></li>
          <li class="nav-item"><a href="./product2.php" class="nav-link text-success border-bottom border-2 border-success text-success">Product</a></li>
          <li class="nav-item"><a href="./contact2.php" class="nav-link text-dark">Contact</a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-dark" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person" width="24" height="24"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow rounded-4" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="./logout.php">Log out</a></li>
            </ul>
          </li>
        </ul>
      </header>
    </div>
  </div>
  <!-- navbar closed -->
  <!-- Program cards -->

  <!-- Program cards -->
  <!-- footer -->
  <footer class="d-flex container flex-wrap fixed-bottom justify-content-between align-items-center py-3 my-4 border-top">
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