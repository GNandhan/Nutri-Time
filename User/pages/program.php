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
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="../images/icon.png" class="icon1 me-2" width="90">
                    <use xlink:href="#bootstrap" />
                    <!-- <span class="fs-4 text-success" >Nutri-Time</span> -->
                </a>
                <ul class="nav">
                    <li class="nav-item"><a href="../../index.html" class="nav-link text-dark">Home</a></li>
                    <li class="nav-item"><a href="./program.php"
                            class="nav-link text-success border-bottom border-2 border-success text-success">Program</a>
                    </li>
                    <li class="nav-item"><a href="./gallery.php" class="nav-link text-dark">Gallery</a></li>
                    <li class="nav-item"><a href="./product.php" class="nav-link text-dark">Product</a></li>
                    <li class="nav-item"><a href="./login.php" class="nav-link text-dark">Sign in</a></li>
                </ul>
            </header>
        </div>
    </div>
    <!-- navbar closed -->


    <div class="container">
        <div class="row my-5">
            <?php  
$sql=mysqli_query($conn,"SELECT * FROM program ORDER BY program_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $prg_name=$row['program_name'];
    $prg_purp=$row['program_purpose'];
    $prg_dur=$row['program_duration'];
    $prg_age=$row['program_age'];
    $prg_fee=$row['program_fee'];
    $prg_con=$row['program_condition']; 
    $prg_mode=$row['program_mode'];
?>
            <div class="col-lg-3 col-md col-sm col my-5">
                <div class="card rounded-5  pt-5 border-0"
                    style="width: 14rem; position: relative;background-color: #C5EBAA;" data-bs-toggle="collapse"
                    data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                    <img src="../images/diet1.png" alt="" class="rounded-circle border border-5 border-light-subtle shadow-lg z-3 position-absolute" width="120"
                        style="margin: auto; top: -60px; left: 0; right: 0;">
                    <div class="card-body pt-3">
                        <h5 class="card-title text-uppercase"><?php echo $prg_name; ?></h5>
                        <p class="card-text"><?php echo $prg_con; ?></p>
                        <div class="text-secondary"><?php echo $prg_mode; ?></div>
                    </div>
                </div>
        <!-- Collapse -->
            <div style="min-height: 120px;">
                <div class="collapse collapse-horizontal" id="collapseWidthExample">
                    <div class="card card-body" style="width: 300px;">
                    <?php echo $prg_purp; ?>
                    </div>
                </div>
            </div>
            </div>
<?php
}
?>
        </div>
    </div>

    <!-- Active plan -->
    <!-- <div class="container my-5">
      <div class="d-flex mb-4 justify-content-between align-items-center">
          <h2 class="text-start d-flex me-auto">Currently <span class="text-success">&nbsp;Active plan</span></h2>
          <a href="#" class="text-end d-flex align-items-center text-success text-decoration-none">
              View All
          </a>
      </div>
      <div class="row ">
          <div class="col-lg-6">
              <h5>21 Days</h5>
              <div class="row my-4">
                  <div class="col-lg-6">
                      <div class="d-flex align-items-center">
                          <img src="../images/diet1.png" alt="" width="40" class="mr-3">
                          <span class="">Day 1: Vitamins</span>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="d-flex align-items-center">
                          <img src="..//images/diet1.png" alt="" width="40" class="mr-3">
                          <span class="">Day 2: Sugar free</span>
                      </div>
                  </div>
              </div>
              <div class="row my-4">
                  <div class="col-lg-6">
                      <div class="d-flex align-items-center">
                          <img src="..//images/diet1.png" alt="" width="40" class="mr-3">
                          <span class="">Day 2: Protein</span>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="d-flex align-items-center">
                          <img src="..//images/diet1.png" alt="" width="40" class="mr-3">
                          <span class="">Day 4: Creatine</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center text-center" style="position: relative;">
              <div style="margin-right: 200px;">
                  <div class="h3">16 Days</div>
                  <div>Left</div>
                  <div class="progress" role="progressbar" aria-label="succetext-success example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-succetext-success" style="width: 50%">50%</div>
                  </div>
              </div>
              <div style="border-radius: 20px; position: absolute; right: 0; top: 0; bottom: 0; width: 50%; background: linear-gradient(to left, rgba(255, 255, 255, 0), rgb(250, 250, 250)), url('..//images/bg1.jpg'); background-size: cover;"></div>
          </div>                              
      </div>
      <div class="row">
        
      </div>
  </div> -->
    <!-- Active plan CLosed -->
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
                <li class="ms-3"><a class="text-body-secondary" href="#"><img src="../images/icon-twitter.png"
                            width="24" height="24" alt="twitter icon"></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><img src="../images/icon-facebook.png"
                            width="24" height="24" alt="facebook icon"></a></li>
                <li class="ms-3"><a class="text-body-secondary" target="_blank"
                        href="https://www.instagram.com/nutritimenutritionclub/"><img src="../images/icon-instagram.png"
                            width="24" height="24" alt="instagram icon"></a></li>
            </ul>
        </footer>
    </div>
    <!-- Footer closed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>